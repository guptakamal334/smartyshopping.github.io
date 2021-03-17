<?php
  require('top.php');
?>
    <div class="content">
        <div class="content-header">
            <div class="subheader">
                <h2>ORDER </h2>
                
            </div>
            <table>
                <tr>
                    <th>ORDER ID</th>
                    <th>ORDER DATE</th>
                    <th>ADDRESS</th>
                    <th>PAYMENT TYPE</th>
                    <th>PAYMENT STATUS</th>
                    <th>ORDER STATUS</th>
                </tr>
                <?php
            
            $res=mysqli_query($con,"select `order`.*,order_status.name as order_status_str from `order`,order_status where order_status.id=`order`.order_status");
            while($row=mysqli_fetch_assoc($res)){
        ?>
        <tr>
            <td><a href="order_detail.php?id=<?php echo $row['id'];?>"><?php echo $row['id'];?></a></td>
            <td><?php echo $row['added_on'];?></td>
            <td><?php echo $row['address'].",".$row['city'].",".$row['state'].",".$row['pincode'];?></td>
            <td><?php echo $row['payment_type'];?></td>
            <td><?php echo $row['payment_status'];?></td>
            <td><?php echo $row['order_status_str'];?></td>
        </tr>
        <?php } ?>
               
            </table>
        </div>
    </div>
   
 <?php
  include('footer.php');
?>