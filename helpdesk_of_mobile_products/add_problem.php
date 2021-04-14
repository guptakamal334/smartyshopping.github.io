
<?php
        require('header.php');
        $product_id=get_safe_value($con,$_GET['product_id']);
        $sql="select product.*, customer.* from product,customer where product.customer_id=customer.customer_id and product.product_id='$product_id'";
        $res=mysqli_query($con,$sql);
        $count=mysqli_num_rows($res);
       
?>

  <!-- -------------------------path seciton----------------------------- -->
  <div class="path">
          <span>
            <a href="index.html">Home /</a>  <a href="mobile_product.php">Mobile Product Report /</a><a href="#">Add Problem </a>
          </span>
    </div>
   <!-- -----------------------------Add Problem ------------------------ -->
   <div class="login add_prob" >
     <h2 class="title">ADD PROBLEM</h2>
     <div class="problem_form">
       <?php 
           if ($count>0){
           $row=mysqli_fetch_assoc($res);
       ?>
        <label for="">Product Name</label>
        <span><?php echo $row['product_name'];?></span>
        <label for="">IMEI Number</label>
        <span><?php echo $row['imei_no'];?></span>
        <label for="">Model Number</label>
        <span><?php echo $row['model_no'];?></span>
        <br>
        <label for="">Customer Name</label>
        <span><?php echo $row['first_name'].$row['last_name']; ?></span>
        <label for="">Purchase Date</label>
        <span><?php echo $row['date_of_purchase'];?></span> 
        <label for="">Warranty Expire Date</label>
        <span><?php echo $row['expire_date'];?></span> 
        <br>
        <label for="">Problem Title</label>
        <span><select name="" id="">
          <option value="">kamal</option>
        </select></span>
        <label for="">Problem Category</label>
        <span><select name="" id="">
          <option value="">kamal</option>
          <option value="">kamal</option>
          <option value="">kamal</option>
        </select></span>  <br>
        <label for="">Problem Description</label>
      
          <textarea name="" id="" cols="30" rows="5"></textarea>
  
          <input type="submit" value="Submit">
          <input type="reset" value="Reset">
          <?php }else{
             header('location:home.php');
             die();
          }?>
    </div>
  </div>
<?php
    require('footer.php');
?>
