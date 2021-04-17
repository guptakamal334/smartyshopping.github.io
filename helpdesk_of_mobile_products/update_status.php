
<?php
        require('header.php');
       
        if(isset($_GET['request_no']) && $_GET['request_no']!=''){
          $request_no=get_safe_value($con,$_GET['request_no']);
          $sql="select product.*, customer.*,problem.*,problem_title.name,problem_category.cat_name, problem_status.status_name from product,customer,problem,problem_title,problem_category, problem_status where product.customer_id=customer.customer_id and product.product_id=problem.product_id and problem.problem_title_id=problem_title.id and problem.problem_category_id=problem_category.id and problem.problem_status_id=problem_status.id and problem.request_no='$request_no'";
          $res=mysqli_query($con,$sql);
          $count=mysqli_num_rows($res);
          if($count>0){
            $row=mysqli_fetch_assoc($res);
            $request_no=$row['request_no'];
            $product_id=$row['product_id'];
            $product_name=$row['product_name'];
            $imei_no=$row['imei_no'];
            $model_no=$row['model_no'];
            $customer_name= $row['title']." ".$row['first_name']." ".$row['last_name'];
            $problem_title=$row['name'];
            $problem_category=$row['cat_name'];
            $description=$row['problem_description'];
            $curr_date=$row['curr_time'];
            $date_of_purchase=$row['date_of_purchase'];
            $expire_date=$row['expire_date'];
            $alt_number=$row['alt_number'];
          }else{
              header('location:home.php');
              die();
          }
      }

        if(isset($_GET['submit'])){
          $request_no=get_safe_value($con,$_GET['request_no']);
          $problem_status=get_safe_value($con,$_GET['problem_status']);
          date_default_timezone_set('Asia/Kolkata');
          $currentTime = date( 'Y-m-d H:i:s');
          
          mysqli_query($con,"update problem set problem_status_id='$problem_status' where request_no='$request_no'");
          echo '<script> alert("Your Problem Status has been Updated");</script>';

          // header('location:added_problems.php');
         
          // echo "Your Problem Status has been Updated";

          
        }
        
       
?>

  <!-- -------------------------path seciton----------------------------- -->
  <div class="path">
          <span>
            <a href="home.php">Home /</a>  <a href="added_problems.php">Added Problem /</a><a href="#">Update Status </a>
          </span>
    </div>
   <!-- -----------------------------Update Status ------------------------ -->
   <div class="login add_prob" >
     <h2 class="title">UPDATE STATUS</h2>
     <div class="problem_form"> 
     <form action="" method="get">
        <label for="">Request Number</label>
        <span name='name'><?php echo $request_no;?></span>
        <input class="product_id" type="text" name="request_no" value="<?php echo $request_no;?>">
        <label for="">Product Name</label>
        <span name='name'><?php echo $product_name;?></span>
        <label for="">IMEI Number</label>
        <span><?php echo $imei_no;?></span>
        <label for="">Model Number</label>
        <span><?php echo $model_no;?></span>
        
        <label for="">Customer Name</label>
        <span><?php echo $customer_name; ?></span>
        <label for="">Purchase Date</label>
        <span><?php echo $date_of_purchase;?></span> 
        <label for="">Warranty Expire Date</label>
        <span><?php echo $expire_date;?></span> 

        <label for="">Problem Title</label>
        <span><?php echo $problem_title; ?></span>
        <label for="">Porblem Category</label>
        <span><?php echo $problem_category;?></span> 
        <label for="">Added Problem Date</label>
        <span><?php echo $curr_date;?></span> 
        <label for="">Alternet Number</label>
        <span><?php echo $alt_number;?></span> 
        <label for="">Description</label>
        <span><?php echo $description;?></span> 
        <br>
        
        <label for="">Status</label>
        <span>
          <select name="problem_status" id="problem_status" required>
              <option value="">Select Problem Status...</option>
                <?php
                  $sql=mysqli_query($con,"select * from problem_status");
                  while($row=mysqli_fetch_assoc($sql)){
                      echo "<option value=".$row['id'].">".$row['status_name']."</option>";
                      }
                ?>
          </select>
        </span>
        
          <br> 
          <input type="submit" value="Submit" name="submit">
          <input type="reset" value="Reset">
         
       </form>
    </div>
  </div>
<?php
    require('footer.php');
?>



