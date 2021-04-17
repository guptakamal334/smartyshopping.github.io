
<?php
        require('header.php');
        $sql="select product.*, customer.* from product,customer where product.customer_id=customer.customer_id";
        $res=mysqli_query($con,$sql);
        $count=mysqli_num_rows($res);
?>

  <!-- -------------------------path seciton----------------------------- -->
  <div class="path">
          <span>
            <a href="index.html">Home /</a>  <a href="#">Mobile Product Report</a>
          </span>
    </div>
   <!-- -----------------------------Mobile Product Report------------------------ -->
   <div class=" login mobile_product" >
     <h2 class="title">Mobile Products</h2>
      <div class="search">
        <form action="search_imi" method="get">
            <input type="text" name="imi" Placeholder="Enter IMI Number">
            <input type="submit" name="search" value="SEARCH">
        </form>
      </div>
     <table>
       <tr>
          <th>S.NO</th>
          <th>IMEI NUMBER</th>
          <th>PRODUCT NAME</th>
          <th>MODEL NUMBER</th>
          <th>CUSTOMER NAME</th>
          <th>DATE OF PURCHASE</th>
          <th>DATE OF EXPIRE</th>
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
          <td><?php echo $row['product_name'];?></td>
          <td><?php echo $row['model_no'];?></td>
          <td><?php echo $row['title']." ".$row['first_name']." ".$row['last_name']; ?></td>
          <td><?php echo $row['date_of_purchase'];?></td>
          <td><?php echo $row['expire_date'];?></td>
          <td>
              <a class="view" href="product_detail.php?product_id=<?php echo $row['product_id']?>">PRODUCT DETAIL</a>
              <a class="add_problem" href="add_problem.php?product_id=<?php echo $row['product_id']?>">ADD PROBLEM</a>
          </td>
       </tr>
       <?php
                  $i++;   
                  }  } else {
                  ?>
                  <tr>
                     <td colspan="8" align="center">No Records Found!</td>
                  </tr>
                  <?php
                     }   
                  ?>
       
     </table>
      
   </div>
<?php
    require('footer.php');
?>
