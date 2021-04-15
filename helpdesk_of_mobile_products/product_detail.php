
<?php
        require('header.php');
        if(isset($_GET['product_id']) && $_GET['product_id']!=''){
          $product_id=get_safe_value($con,$_GET['product_id']);
          $sql="select product.*, customer.* from product,customer where product.customer_id=customer.customer_id and product.product_id='$product_id'";
          $res=mysqli_query($con,$sql);
          $count=mysqli_num_rows($res);
          if($count>0){
            $row=mysqli_fetch_assoc($res);
            $product_id=$row['product_id'];
            $product_name=$row['product_name'];
            $imei_no=$row['imei_no'];
            $model_no=$row['model_no'];
            $date_of_purchase=$row['date_of_purchase'];
            $expire_date=$row['expire_date'];
            $customer_name= $row['title'] ." ".$row['first_name']." " . $row['last_name'];
            $customer_mobile=$row['phone_number'];
            $address=$row['street']." ".$row['city']." ".$row['state'];
            $pincode=$row['pincode'];
          }else{
              header('location:home.php');
              die();
          }
      }
?>

  <!-- -------------------------path seciton----------------------------- -->
  <div class="path">
          <span>
            <a href="home.php">Home /</a>  <a href="mobile_product.php">Mobile Product Report /</a><a href="#">Add Problem </a>
          </span>
    </div>
   <!-- -----------------------------pRODCUT DETAIL ------------------------ -->
   <div class="login add_prob" >
     <h2 class="title"> PRODUCT DETAIL</h2>
     <div class="product_detail problem_form"> 
     
        <label for="">Product Name</label>
        <span name='name'><?php echo $product_name;?></span>
        <label for="">IMEI Number</label>
        <input class="product_id" type="number" name="product_id" value="<?php echo $product_id;?>">
        <span n><?php echo $imei_no;?></span>
        <label for="">Model Number</label>
        <span><?php echo $model_no;?></span>
        <br>
        <label for="">Customer Name</label>
        <span><?php echo $customer_name; ?></span>
        <label for="">Purchase Date</label>
        <span><?php echo $date_of_purchase;?></span> 
        <label for="">Warranty Expire Date</label>
        <span><?php echo $expire_date;?></span> 
        <br>

        <label for="">Customer Mobile No.</label>
        <span><?php echo $customer_mobile;?></span> 
        <label for="">Customer Addres.</label>
        <span><?php echo $address;?></span> 
        <label for="">Pincode</label>
        <span><?php echo $pincode;?></span> 

       
        </div>
  </div>



<?php
    require('footer.php');
?>
