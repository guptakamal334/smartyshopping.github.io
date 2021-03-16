<?php
        require('header.php');
        if(!isset($_SESSION['USER_LOGIN'])){
            ?>
            <script>
            window.location.href='index.php';
            </script>
            <?php
        }

   ?>

<div class="path">
        <a href="index.php">Home &nbsp;&nbsp;/</a> 
        <a href="order.php">Order  &nbsp;/</a>
        <a href="">Order Details &nbsp;</a>
    
    </div>
   
  <!-- -----------------------------order page---------------------- -->
<div class="small-container cart-page">
    <table>
        <tr>
            <th>PRODUCT IMAGE</th>
            <th>PRODUCT NAME</th>
            <th>QUANTITY</th>
            <th>PRICE</th>
            <TH>TOTAL PRICE</TH>
        </tr>    
        <?php 
            $order_id=get_safe_value($con,$_GET['id']);
            $uid=get_safe_value($con,$_SESSION['USER_ID']);
            $res=mysqli_query($con,"select order_detail.*,product.name,product.image from order_detail,product where order_detail.order_id='$order_id' and order_detail.product_id=product.id");
			$total_price=0;
			while($row=mysqli_fetch_assoc($res)){
            $imageArr=explode(",",$row['image']);
			$total_price=$total_price+($row['qty']*$row['price']);
			?>
            <tr>
				<td class="product-name"><?php echo $row['name']?></td>
                <td class="product-name"> <a href="product.php?id=<?php echo $row['product_id'];?>"><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$imageArr[0]?>"></a></td>
				<td class="product-name"><?php echo $row['qty']?></td>
				<td class="product-name"><?php echo $row['price']?></td>
				<td class="product-name"><?php echo $row['qty']*$row['price']?></td>
                
            </tr>
            <?php } ?>
			<tr>
				<td colspan="3"></td>
				<td class="product-name">Total Price</td>
				<td class="product-name"><?php echo $total_price?></td>
                
            </tr>
    </table>
</div>

<?php
        require('footer.php');
?>