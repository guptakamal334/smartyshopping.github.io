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
      }else{
        $payment_status='pending';
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
   
      mysqli_query($con,"insert into `order`(user_id,address,city,state,pincode,payment_type,payment_status,order_status,added_on,total_price) values('$user_id','$address','$city','$state','$pincode','$payment_mode','$payment_status','$order_status','$date','$total_price')");

      

      $order_id=mysqli_insert_id($con);

      foreach($_SESSION['cart'] as $key=>$val){
        $product=get_product($con,'','',$key);
        $price=$product[0]['price'];
        $qty=$val['qty'];
        $price=$price*$qty;
        mysqli_query($con,"insert into `order_detail`(order_id,product_id,qty,price) values('$order_id','$key','$qty','$price')");
    }
    // header('header:index.php');
    unset($_SESSION['cart']);
    ?>
	<script>
		window.location.href='thank.php';
	</script>
	<?php


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