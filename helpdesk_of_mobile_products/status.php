<?php
        require('header.php');
        // if(isset($_GET['check'])){
        //   $request_no=get_safe_value($con,$_GET['request_no']);
        //   $sql="select product.*, customer.*,problem.*,problem_title.name,problem_category.cat_name, problem_status.status_name from product,customer,problem,problem_title,problem_category, problem_status where product.customer_id=customer.customer_id and product.product_id=problem.product_id and problem.problem_title_id=problem_title.id and problem.problem_category_id=problem_category.id and problem.problem_status_id=problem_status.id and problem.request_no='$request_no'";
        //   $res=mysqli_query($con,$sql);
        //   $count=mysqli_num_rows($res);
        //   if($count>0){
        //      header('location:checked_status.php?request_no=REQ');
        //   }else{
              
              
        //     echo "Please Enter Valid Request Number.";
            
        //   }
        // }
?>
           <!-- -------------------------path seciton----------------------------- -->
    <div class="path">
          <span>
            <a href="index.html">Home /</a>  <a href="#">Status</a>
          </span>
    </div>
   <!-- -----------------------------Login------------------------ -->
   <div class="login status" >
     <h2 class="title">Check Status</h2>
     <div class="row">
        <div class="colu-2">
            <form action="checked_status.php" method="get">
                 <label for="request">REQUEST NUMBER</label><br>
                 <input type="text" name="request_no" id="request" placeholder="Enter Your Request Number........." required>
                 <input type="submit" name="check" value="Check Status"  >
             </form>
        </div>
        <div class="colu-2">
            <img src="media/login.jpg" alt="contact page">
        </div>
    </div>
  </div>

<?php
    require('footer.php');
?>

