<?php
  require('top.php');
// include('connection_inc.php');
// include('function_inc.php');

$order_id=get_safe_value($con,$_GET['id']);

  if(isset($_POST['update_order_status'])){
      $update_order_status=get_safe_value($con,$_POST['update_order_status']);
      mysqli_query($con,"update `order` set order_status='$update_order_status' where id='$order_id'");
  }
?>
    <div class="content">
        <div class="content-header">
            <div class="subheader">
                <h2>ORDER DETAIL</h2>
                
            </div>
            <table>
        <tr>
            <th>PRODUCT IMAGE</th>
            <th>PRODUCT NAME</th>
            <th>QUANTITY</th>
            <th>PRICE</th>
            <TH>TOTAL PRICE</TH>
        </tr>    
        <?php 
            
            $res=mysqli_query($con,"select order_detail.*,product.name,product.image,`order`.* from order_detail,product,`order` where order_detail.order_id='$order_id' and order_detail.product_id=product.id and order_detail.order_id=`order`.id");

			$total_price=0;
			while($row=mysqli_fetch_assoc($res)){
            $address=$row['address'];
            $city=$row['city'];
            $state=$row['state'];
            $pincode=$row['pincode'];
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
            <tr>
                <td colspan="2">  <strong> Address </strong> </td>
                <td colspan="3"> <?php echo $address.','.$city.','.$state.','.$pincode;?>  </td>
                
            </tr>
            <tr>
                <?php 
                    $ress=mysqli_query($con,"select order_status.name from order_status, `order` where `order`.id='$order_id' and `order`.order_status=order_status.id ");
                    $order_status=mysqli_fetch_assoc($ress);
                 
                ?>
                <td colspan="2" > <strong> Order Status </strong></td>
                <td colspan="3"><?php echo $order_status['name']; ?></td>
            </tr>
            <tr>
                <form method="post" >
                    <td colspan="3" >
                        <select id="" name="update_order_status">
                            <option >Select Status...</option>
                            <?php
                            $sql=mysqli_query($con,"select * from order_status");
                            while($row=mysqli_fetch_assoc($sql)){
                                if($row['id']==$row['id']){
                                    echo "<option selected value=".$row['id'].">".$row['name']."</option>";
                                }else{
                                    echo "<option value=".$row['id'].">".$row['name']."</option>";
                                }
                            }
                            ?>
                        </select>    
                    </td>
                    <td colspan="2">
                        <input type="submit" Value="submit"></input>

                     
                    </td>
                </form>
                
            </tr>
    </table>
        </div>
    </div>
   
 <?php
  include('footer.php');
?>