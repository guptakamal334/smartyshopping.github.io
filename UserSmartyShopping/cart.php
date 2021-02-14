<?php
  require('header.php');
  
?>
   <!-- ------------------path----------------------------- -->
<div class="path">
    <a href="index.php">Home &nbsp;&nbsp;/</a> 
    <a href="">Shopping Cart</a>
</div>
<!-- -----------------------cart Items-----------------      -->
<div class="small-container cart-page">
    <table>
        <tr>
            <th>Product</th>
            <th>Remove</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>
        <?php
            if(isset($_SESSION['cart'])){
            $total_amt=0;
            foreach($_SESSION['cart'] as $key=>$val){
                $product=get_product($con,'','',$key);
                $id=$key;
                $name=$product[0]['name'];
                $price=$product[0]['price'];
                $qty=$val['qty'];
                $total_amt=$total_amt+($qty*$price);
                $imgAr=explode(',',$product[0]['image']);
                
                $image=$imgAr[0];
        ?>
        <tr>
            <td>
                <div class="cart-info">
                    <a href="product.php?id=<?php echo $id?>"><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$image; ?>" alt=""></a>
                    <div>
                        <p><?php echo $name?></p>
                        <small><i class="fas fa-rupee-sign"></i>Price: <?php echo $price?></small><br>
                    </div>
                </div>
            </td>
            <td><a href="javascript:void(0)" onclick="manage_cart('<?php echo $id?>','remove')"><i class="fas fa-trash-alt"></i></a></td>
            <td>
                <!-- <input type="number" id="<?php echo $id?>qty" value="<?php echo $qty;?>">
                <a href="javascript:void(0)" onclick="manage_cart('<?php echo $id;?>','update')">UPDATE</a> -->

                
	                <span class="minus" onclick="manage_cart('<?php echo $id;?>','update')">-</span>
	                <input type="text" id="<?php echo $id?>qty" value="<?php echo $qty;?>"/>
	                <span class="plus" onclick="manage_cart('<?php echo $id;?>','update')">+</span>
                
            </td>
            
            <td><i class="fas fa-rupee-sign"></i><?php echo $price*$qty; ?></td>
       </tr>
       <?php
             }  
       ?>
       
    </table>
    <div class="total-price">
        <table>
            <!-- <tr>
                <td>Subtotal</td>
                <td><i class="fas fa-rupee-sign"></i>110.00</td>
            </tr>
            <tr>
               <td>Tax</td>
               <td><i class="fas fa-rupee-sign"></i>35.00</td>
           </tr> -->
           <tr>
               <td>Total</td>
               <td><i class="fas fa-rupee-sign"></i><?php echo $total_amt;?></td>
           </tr>
           <?php
             }  
       ?>
        </table>
    </div>
</div>

<div class="checkout">
    <a href="index.php">CONTINUE SHOPPING</a>
    <a href="checkout.php">CHECKOUT</a>
</div>

 
 <?php
  include('footer.php');
?>

<script>

// --------------------for check out input--------------------

$(document).ready(function() {
    $('.minus').click(function () {
        var $input = $(this).parent().find('input');
        var count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        $input.val(count);
        $input.change();
        return false;
    });
    $('.plus').click(function () {
        var $input = $(this).parent().find('input');
        $input.val(parseInt($input.val()) + 1);
        $input.change();
        return false;
    });
});

</script>