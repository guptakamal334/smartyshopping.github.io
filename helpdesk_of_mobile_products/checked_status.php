
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
            
          }else{
              
            // header('location:status.php');  
           echo '<SCRipt> alert("Please Enter Valid Request Number")</SCRipt>';
            
              die();
          }
      }

    
        
       
?>

  <!-- -------------------------path seciton----------------------------- -->
  <div class="path">
          <span>
            <a href="home.php">Home /</a>  <a href="#">Check Status</a> 
          </span>
    </div>
   <!-- -----------------------------Update Status ------------------------ -->
   <div class="login add_prob" >
     <h2 class="title">CHECK STATUS</h2>
     <div class="problem_form"> 
 
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
        <label for="">Description</label>
        <span><?php echo $description;?></span> 
        <label for="">Status</label>
        <span><?php echo $row['status_name'];?></span>
     
    </div>
  </div>
<?php
    require('footer.php');
?>



