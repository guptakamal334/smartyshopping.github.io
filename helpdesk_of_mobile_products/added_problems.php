
<?php
        require('header.php');
        $sql="select product.*, customer.*,problem.*,problem_title.name,problem_category.cat_name, problem_status.status_name from product,customer,problem,problem_title,problem_category, problem_status where product.customer_id=customer.customer_id and product.product_id=problem.product_id and problem.problem_title_id=problem_title.id and problem.problem_category_id=problem_category.id and problem.problem_status_id=problem_status.id";
        $res=mysqli_query($con,$sql);
        $count=mysqli_num_rows($res);
?>

  <!-- -------------------------path seciton----------------------------- -->
  <div class="path">
          <span>
            <a href="index.html">Home /</a>  <a href="#">Added Problems Report</a>
          </span>
    </div>
   <!-- -----------------------------Mobile Product Report------------------------ -->
   <div class=" login mobile_product" >
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
              <a class="view" href="update_status.php?request_no=<?php echo $row['request_no']?>">Update Status</a>
              
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
