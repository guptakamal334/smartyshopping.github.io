
<?php
        require('header.php');
        $sql="select product.*, customer.*,problem.*,problem_title.name,problem_category.cat_name, problem_status.status_name from product,customer,problem,problem_title,problem_category, problem_status where product.customer_id=customer.customer_id and product.product_id=problem.product_id and problem.problem_title_id=problem_title.id and problem.problem_category_id=problem_category.id and problem.problem_status_id=problem_status.id";
        $res=mysqli_query($con,$sql);
        $count=mysqli_num_rows($res);

        if(isset($_GET['operation']) && $_GET['operation']!=''){
         $request_no=get_safe_value($con,$_GET['request_no']);
         $operation=get_safe_value($con,$_GET['operation']);
         date_default_timezone_set('Asia/Kolkata');
          $currentTime = date( 'Y-m-d H:i:s');
         
         $ress=mysqli_query($con,"select problem_status_id from problem where request_no='$request_no' and problem_status_id='3'");
         $countt=mysqli_num_rows($ress);
         
         if($countt<=0){
         echo '<script> alert("Please do problem status success then you can deliver ");</script>';
         }else{
         if($operation =='deliver'){
             $deliver='1';
             $update_sql="update problem set deliver='$deliver',delivery_date='$currentTime' where request_no ='$request_no'";
             mysqli_query($con,$update_sql);
             }else{
               $deliver='0';
               $update_sql="update problem set deliver='$deliver',delivery_date='$currentTime' where request_no ='$request_no'";
               mysqli_query($con,$update_sql);
             }
             header("location:added_problems.php");
             
         }
      }
         
   
?>

  <!-- -------------------------path seciton----------------------------- -->
  <div class="path">
          <span>
            <a href="index.html">Home /</a>  <a href="#">Added Problems Report</a>
          </span>
    </div>
   <!-- -----------------------------Mobile Product Report------------------------ -->
   <div class=" login mobile_product added_problems" >
     <h2 class="title">Added Problems</h2>
      <div class="search">
        <form action="search_imi" method="get">
            <input type="text" name="imi" Placeholder="Enter IMI Number">
            <input type="submit" name="search" value="SEARCH">
        </form>
      </div>
     <table>
       <tr>
          <th>S.NO</th>
          <th>IMEI NO.</th>
          <th>REQUEST NO.</th>
          <th>CUSTOMER NAME</th>
          <th>PRODUCT NAME</th>
          <th>MODEL NUMBER</th>
          <th>PROBLEM TITLE</th>
          <th>PROBLEM CATEGORY</th>
          <th>ADDED PROBLEM DATE</th>
          <th>STATUS</th>
          <th>ACTION</th>
       </tr>
       <?php 
                if($count>0){
                $i=1;
                while($row=mysqli_fetch_assoc($res)){
                ?>
       <tr>
          <td><?php echo $i;?></td>
          <td><?php echo $row['imei_no'];?></td>
          <td><?php echo $row['request_no'];?></td>
          <td><?php echo $row['title']." ".$row['first_name']." ".$row['last_name']; ?></td>
          
          <td><?php echo $row['product_name'];?></td>
          <td><?php echo $row['model_no'];?></td>
          
          
          <td><?php echo $row['name'];?></td>
          <td><?php echo $row['cat_name'];?></td>
          <td><?php echo $row['curr_time'];?></td>
          <td><?php echo $row['status_name'];?></td>
          <td>
              <span><a class="view" href="update_status.php?request_no=<?php echo $row['request_no']?>">Update Status</a></span>

              <?php
                    if($row['deliver']==1){
                        echo "<span class='btn active'><a href='?operation=not_deliver&request_no=".$row['request_no']."'>Deliver</a></span>";
                    }else{
                        echo"<span class='btn deactive'><a href='?operation=deliver&request_no=".$row['request_no']."' >Not Deliver</a></span>";
                    }  
               ?>
              
          </td>
       </tr>
       <?php
                  $i++;   
                  }  } else {
                  ?>
                  <tr>
                     <td colspan="11" align="center">No Records Found!</td>
                  </tr>
                  <?php
                     }   
                  ?>
       
     </table>
      
   </div>
<?php
    require('footer.php');
?>
