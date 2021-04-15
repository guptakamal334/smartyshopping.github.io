
<?php
        require('header.php');
       
        if(isset($_GET['request_no']) && $_GET['request_no']!=''){
          $request_no=get_safe_value($con,$_GET['request_no']);
          $sql="select product.*, customer.*,problem.*,problem_title.name,problem_category.cat_name, problem_status.status_name from product,customer,problem,problem_title,problem_category, problem_status where product.customer_id=customer.customer_id and product.product_id=problem.product_id and problem.problem_title_id=problem_title.id and problem.problem_category_id=problem_category.id and problem.problem_status_id=problem_status.id and problem.request_no='$request_no'";
          $res=mysqli_query($con,$sql);
          $count=mysqli_num_rows($res);
          if($count>0){
            $row=mysqli_fetch_assoc($res);
            $product_id=$row['product_id'];
            $product_name=$row['product_name'];
            $imei_no=$row['imei_no'];
            $model_no=$row['model_no'];
            $customer_name= $row['first_name'].$row['last_name'];
            $date_of_purchase=$row['date_of_purchase'];
            $expire_date=$row['expire_date'];
          }else{
              header('location:home.php');
              die();
          }
      }

        if(isset($_GET['submit'])){
          $product_id=get_safe_value($con,$_GET['product_id']);
          $problem_title=get_safe_value($con,$_GET['problem_tit']);
          $problem_category=get_safe_value($con,$_GET['problem_cat']);
          $description=get_safe_value($con,$_GET['description']);
          $status=1;
          $request_no="REQ".rand(10000,100000);
          date_default_timezone_set('Asia/Kolkata');
          $currentTime = date( 'Y-m-d H:i:s');
          
          mysqli_query($con,"insert into problem (product_id,problem_title_id,problem_category_id,problem_description,problem_status_id,curr_time,request_no) values ('$product_id','$problem_title','$problem_category','$description','$status','$currentTime','$request_no')");

          echo "your Request has been added Successfull and your Request Number is ".$request_no;

          
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
        <label for="">Product Name</label>
        <span name='name'><?php echo $product_name;?></span>
        <label for="">IMEI Number</label>
        <input class="product_id" type="number" name="product_id" value="<?php echo $product_id;?>">
        <span name="imei_no" value="<?php echo $imei_no;?>"><?php echo $imei_no;?></span>
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
        
        <label for="">Problem Title</label>
        <span>
          <select name="problem_tit" id="problem_title" required>
              <option value="">Select Problem Title...</option>
                <?php
                  $sql=mysqli_query($con,"select * from problem_title");
                  while($row=mysqli_fetch_assoc($sql)){
                      echo "<option value=".$row['id'].">".$row['name']."</option>";
                      }
                ?>
          </select>
        </span>
        <label for="">Problem Category</label>
        <span>
          <select name="problem_cat" id="problem_category" required>
            <option value="">Select Problem Category.....</option>
          </select>
        </span>  <br> 
        <label for="">Problem Description</label>
      
        <textarea name="description" id="" cols="30" rows="5" required></textarea>

          <input type="submit" value="Submit" name="submit">
          <input type="reset" value="Reset">
         
       </form>
    </div>
  </div>
<?php
    require('footer.php');
?>



