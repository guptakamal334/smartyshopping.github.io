<?php
  require('header.php');
  if(count($_SESSION['cart'])==0){
    header('location:index.php');
  }

  $total_amt=0;
  if(isset($_POST['submit'])){
      $address=get_safe_value($con,$_POST['street']);
      $city=get_safe_value($con,$_POST['city']);
      $state=get_safe_value($con,$_POST['state']);
      $pincode=get_safe_value($con,$_POST['pincode']);
      $user_id=$_SESSION['USER_ID'];
      $payment_mode=get_safe_value($con,$_POST['mode']);
      if($_POST['mode']=='COD'){
          $payment_status='Success';
      }
      $order_status='1';
      date_default_timezone_set("Asia/kolkata");
      $date=date("Y-m-d H:i:sa");
      

      foreach($_SESSION['cart'] as $key=>$val){
          $product=get_product($con,'','',$key);
          $price=$product[0]['price'];
          $qty=$val['qty'];
          $total_amt=$total_amt+($qty*$price);
      }
      $total_price=$total_amt;

      $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
      
      if($_POST['mode']=='COD'){
      mysqli_query($con,"insert into `order`(user_id,address,city,state,pincode,payment_type,payment_status,order_status,added_on,total_price,txnid) values('$user_id','$address','$city','$state','$pincode','$payment_mode','$payment_status','$order_status','$date','$total_price','$txnid')");
      }

      if($_POST['mode']=='PayUmoney'){
        mysqli_query($con,"insert into `order`(user_id,address,city,state,pincode,payment_type,order_status,added_on,total_price,txnid) values('$user_id','$address','$city','$state','$pincode','$payment_mode','$order_status','$date','$total_price','$txnid')");
      }
      

      $order_id=mysqli_insert_id($con);

      foreach($_SESSION['cart'] as $key=>$val){
        $product=get_product($con,'','',$key);
        $price=$product[0]['price'];
        $qty=$val['qty'];
        $price=$price*$qty;
        mysqli_query($con,"insert into `order_detail`(order_id,product_id,qty,price) values('$order_id','$key','$qty','$price')");
    }
    unset($_SESSION['cart']);

    if($_POST['mode']=='PayUmoney'){
        $MERCHANT_KEY = "gtKFFx"; 
		$SALT = "eCwWELxi";
		$hash_string = '';
		//$PAYU_BASE_URL = "https://secure.payu.in";
		$PAYU_BASE_URL = "https://test.payu.in";
		$action = '';
		$posted = array();
		if(!empty($_POST)) {
		  foreach($_POST as $key => $value) {    
			$posted[$key] = $value; 
		  }
		}
		
		$userArr=mysqli_fetch_assoc(mysqli_query($con,"select * from users where id='$user_id'"));
		
		$formError = 0;
		$posted['txnid']=$txnid;
		$posted['amount']=$total_price;
		$posted['firstname']=$userArr['name'];
		$posted['email']=$userArr['email'];
		$posted['phone']=$userArr['mobile'];
		$posted['productinfo']="productinfo";
		$posted['key']=$MERCHANT_KEY ;
		$hash = '';
		$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
		if(empty($posted['hash']) && sizeof($posted) > 0) {
		  if(
				  empty($posted['key'])
				  || empty($posted['txnid'])
				  || empty($posted['amount'])
				  || empty($posted['firstname'])
				  || empty($posted['email'])
				  || empty($posted['phone'])
				  || empty($posted['productinfo'])
				 
		  ) {
			$formError = 1;
		  } else {    
			$hashVarsSeq = explode('|', $hashSequence);
			foreach($hashVarsSeq as $hash_var) {
			  $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
			  $hash_string .= '|';
			}
			$hash_string .= $SALT;
			$hash = strtolower(hash('sha512', $hash_string));
			$action = $PAYU_BASE_URL . '/_payment';
		  }
		} elseif(!empty($posted['hash'])) {
		  $hash = $posted['hash'];
		  $action = $PAYU_BASE_URL . '/_payment';
		}


		$formHtml ='<form method="post" name="payuForm" id="payuForm" action="'.$action.'"><input type="hidden" name="key" value="'.$MERCHANT_KEY.'" /><input type="hidden" name="hash" value="'.$hash.'"/><input type="hidden" name="txnid" value="'.$posted['txnid'].'" /><input name="amount" type="hidden" value="'.$posted['amount'].'" /><input type="hidden" name="firstname" id="firstname" value="'.$posted['firstname'].'" /><input type="hidden" name="email" id="email" value="'.$posted['email'].'" /><input type="hidden" name="phone" value="'.$posted['phone'].'" /><textarea name="productinfo" style="display:none;">'.$posted['productinfo'].'</textarea><input type="hidden" name="surl" value="'.SITE_PATH.'/UserSmartyShopping/payment_complete.php" /><input type="hidden" name="furl" value="'.SITE_PATH.'/UserSmartyShopping/payment_fail.php"/><input type="submit" style="display:none;"/></form>';
		echo $formHtml;
		echo '<script>document.getElementById("payuForm").submit();</script>';
	}else{	
    // header('header:index.php');
    ?>
	<script>
		window.location.href='thank.php';
	</script>
	<?php
    }

  }
?>

    <div class="path">
        <a href="index.php">Home &nbsp;&nbsp;/</a> 
        <a href="">Cart &nbsp;/</a>
        <a href="">Check Out</a>
    </div>
<!-- ------------------------checkout------------form------------------ -->
    <div class="row container-checkout">
        <div class="checkout-form">
            <div class="heading">
                <h2 onclick="height1()">LOGIN DETAIL </h2>
            </div>
            <?php 
                     if(!isset($_SESSION['USER_LOGIN'])) {
                ?>
            <div class="row" id="check__form">
                <div class="col-2 loign-form">
                    <form action="" method="" class="checkout-sign" >
                        <h4>Sign In</h4>
                        <label for="">USERNAME</label>
                        <input type="text" name="username" id="email-l" placeholder="Enter User Name....">
                        <span id="wrong_email"></span>
                        <label for="">PASSWORD</label>
                        <input type="password" name="password" id="password-d" placeholder="Enter Password ...">
                        <span id="wrong_password"></span>
                        <button type="button" onclick="sign_in()">LOGIN</button>
                        <span id="login_button"></span><br>
                    </form>
                </div>
                <div class="col-2 registraion-form">
                    <form class="checkout-registraion" id="signup">
                        <h4>Sign Up</h4>
                            <label for="">NAME</label>
                            <input type="text" name="name" id="name" placeholder="Enter Name...." autocomplete="off">
                            <span class="error_msg" id="error_name"></span>   
                            <label for="">MOBILE NUMBER</label>
                            <input type="text" name="mobile" id="mobile" placeholder="Enter Mobile Number...." autocomplete="off">
                            <span class="error_msg" id="error_mobile"></span>   
                            <label for="">E-MAIL</label>
                            <input type="text" name="email" id="email" placeholder="Enter E-mail ...." autocomplete="off">
                            <span class="error_msg" id="error_email"></span>   
                            <label for="">PASSWORD</label>
                            <input type="password" name="password" id="password" placeholder="Enter Password ..." >
                            <span class="error_msg" id="error_password"></span>   
                            <button type="button" onclick="sign_up()">SUBMIT</button>
                            <span  class="error_msg" id="error_button"></span> 
                    </form>
                </div>
            </div>
            <?php }?>
            <div class="heading" onclick="height2()">
                <h2>BILLING ADDRESS DETAIL</h2>
            </div>
            <?php 
                if(isset($_SESSION['USER_LOGIN'])){
            ?>
            <div class="row col-1 billing-Address" id="billing__form">
                <div class="col-2">
                    <form method="post">
                    <label for="">HOUSE NO./ STREET</label>
                    <input type="text" name="street" placeholder="enter House Number/Street">
                    <label for="">CITY</label>
                    <input type="text" name="city" placeholder="enter city....">
                </div>
                <div class="col-2">
                    <label for="">STATE</label>
                    <input type="text" name="state" placeholder="enter state..">
                    <label for="">PINCODE</label>
                    <input type="number" name="pincode" placeholder="enter pincode..">
                </div>
            </div>
            <?PHP }?>
            <div class="heading" onclick="height3()">
                <h2>PAYMENT MODE</h2>
            </div>
            <?php 
                if(isset($_SESSION['USER_LOGIN'])){
            ?>
            <div class="col-1 payment-mode" id="payment__form">
                <label for="">Choose Payment Mode option</label>
                <label for="">COD</label>
                <input type="radio" name="mode" value="COD">
                <label for="">PayUmoney</label>
                <input type="radio" name="mode" value="PayUmoney">
                <input type="Submit" value="SUBMIT" name="submit">
            </div>
            </form>
            <?PHP }?>
        </div>
        
        <div class="checkout-order">
            <div class="heading" style="text-align: center;">
                <h2>YOUR ORDER</h2>
            </div>
                <table>
                    <?php
                        $total_amt=0;
                        foreach($_SESSION['cart'] as $key=>$val){
                            $product=get_product($con,'','',$key);
                            $id=$key;
                            $name=$product[0]['name'];
                            $price=$product[0]['price'];
                            $qty=$val['qty'];
                            $total_amt=$total_amt+($qty*$price);
                            $imgAr=explode(',',$product[0]['image']);
                            
                            $image=$imgAr[0];
                    ?>
                    <tr>
                        <td><a href="product.php?id=<?php echo $id?>"><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$image; ?>" alt=""></a></td>
                        <td><p><?php echo $name?></p><p><i class="fas fa-rupee-sign"></i>Price: <?php echo $price?></p></td>
                        <td><a href="javascript:void(0)" onclick="manage_cart('<?php echo $id?>','remove')"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                    <?php }?>
                    <tr>
                        <td colspan="2">ORDER TOTAL</td>
                        <td><h4><i class="fas fa-rupee-sign"><?php echo $total_amt; ?></h4></td>
                    </tr>
                </table>
        </div>
    </div>



<?php
  include('footer.php');
?>


<script>
 var MenuItems1=document.getElementById("check__form");
    MenuItems1.style.maxHeight="20px";
    function height1(){
        if(MenuItems1.style.maxHeight=="20px")
        {
            MenuItems1.style.maxHeight="500px";
        }
        else
        {
            MenuItems1.style.maxHeight="20px";
        }
    }


    var MenuItems2=document.getElementById("billing__form");
    MenuItems2.style.maxHeight="20px";
    function height2(){
        if(MenuItems2.style.maxHeight=="20px")
        {
            MenuItems2.style.maxHeight="500px";
        }
        else
        {
            MenuItems2.style.maxHeight="20px";
        }
    }



    var MenuItems3=document.getElementById("payment__form");
    MenuItems3.style.maxHeight="20px";
    function height3(){
        if(MenuItems3.style.maxHeight=="20px")
        {
            MenuItems3.style.maxHeight="500px";
        }
        else
        {
            MenuItems3.style.maxHeight="20px";
        }
    }



</script>