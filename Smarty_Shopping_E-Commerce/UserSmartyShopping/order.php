<?php 
require('header.php');
if(!isset($_SESSION['USER_LOGIN'])){
    // header("location:index.php");
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
?>


<div class="path">
        <a href="index.php">Home &nbsp;&nbsp;/</a> 
        <a href="">Order &nbsp;</a>
    
    </div>
   
  <!-- -----------------------------order page---------------------- -->
<div class="small-container cart-page">
    <table class="order_page">
        <tr>
            <th>ORDER ID</th>
            <th>ORDER DATE</th>
            <th>ADDRESS</th>
            <th>PAYMENT TYPE</th>
            <TH>PAYMENT STATUS</TH>
            <TH>ORDER STATUS</TH>
        </tr>       
        <?php
            $uid=$_SESSION['USER_ID'];
            $res=mysqli_query($con,"select * from `order` where user_id='$uid'");
            
            while($row=mysqli_fetch_assoc($res)){
        ?>
        <tr>
            <a href="order_detail.php?id=<?php echo $row['id'];?>"><td><?php echo $row['id'];?></td></a>
            <td><?php echo $row['added_on'];?></td>
            <td><?php echo $row['address'].",".$row['city'].",".$row['state'].",".$row['pincode'];?></td>
            <td><?php echo $row['payment_type'];?></td>
            <td><?php echo $row['payment_status'];?></td>
            <td><?php echo $row['order_status'];?></td>
        </tr>
        <?php } ?>
    </table>
</div>

<?php
        require('footer.php');
?>