<?php
  require('header.php');
  if(isset($_GET['id']) && $_GET['id']!=''){
    $pro_id=get_safe_value($con,$_GET['id']);
      if($pro_id>0){
          $get_single_product=get_product($con,'','',$pro_id);
          
      }else{
          header('location:index.php');
      }
}else {
  header('location:index.php');
}
?>
<!-- ------------------path----------------------------- -->
<div class="path">
    <a href="index.php">Home &nbsp;&nbsp;/</a> 
    <a href="category.php?id=<?php echo $get_single_product[0]['categories_id']?>"><?php echo $get_single_product[0]['categories']?> &nbsp;&nbsp;/</a>
    <a href=""><?php echo $get_single_product[0]['name']?> </a>

</div>

<!-- -----------------single product----- -->
<div class="single-product">
    <div class="row">
        <div class="col-2">
            <?php 
                $imgAr=explode(",",$get_single_product[0]['image']);
            ?>
            <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$imgAr[0];?>" alt="" width="100%" id="ProductImg">
            <div class="small-img-row">
                <?php 
                    foreach($imgAr as $key=>$val){
                ?>
                <div class="small-img-col">
                    <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$val;?>" alt="" class="small-img">
                </div>                    
                <?php }?>
            </div>
         </div>
        <div class="col-2">
            <h1><?php echo $get_single_product[0]['name']?></h1>
            <div class="price proDetail">
                <h4><i class="fas fa-rupee-sign"></i><?php echo $get_single_product[0]['price']?></h4>&nbsp;&nbsp;&nbsp;
                <h5><del><i class="fas fa-rupee-sign"></i><?php echo $get_single_product[0]['mrp']?></del></h5>
                <h5>10% Off</h5>
            </div>
            <select name="" id="">
                <option value="">Select Size</option>
                <option value="">XXL</option>
                <option value="">XL</option>
                <option value="">Large</option>
                <option value="">Medium</option>
            </select>
            <input type="number" value="1" name="" id="qty">
            <a class="btn-cart" href="javascript:void(0)" onclick="manage_cart('<?php echo $get_single_product[0]['id']?>','add')"> Add to Cart</a>
            
            <h3>Product Details <i class="fa fa-indent"></i></h3>
            <br>
            <p><?php echo $get_single_product[0]['description']?></p>
        </div>
    </div>
</div>
<?php 

?>

    
<!-------------------- Related product ----------------------->
    <div class="small-containerr">
        <h2 class="title">Related Product </h2>
        <div class="row">
        <?php 
            $get_product=get_product($con,'',$get_single_product[0]['categories_id'],'','','',$pro_id);
                foreach($get_product as $list){       
                    $imageArr=explode(",",$list['image']);      
		?>
       <div class="col-4">
                <a href="product.php?id= <?php echo $list['id'];?>">
                    <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$imageArr[0];?>" alt="">
                </a>
           <div class="cardDetail">
                <h4><?php echo $list['name'];?></h4>
                <div class="rating">
                    <li class="fa fa-star"></li>
                    <li class="fa fa-star"></li>
                    <li class="fa fa-star"></li>
                    <li class="fas fa-star-half-alt fa"></li>  
                    <li class="far fa-star"></li>   
                </div>
                <div class="price">
                    <h4><i class="fas fa-rupee-sign"></i><?php echo $list['price'];?></h4>
                    <h5><del><i class="fas fa-rupee-sign"></i><?php echo $list['mrp'];?></del></h5>
                    <h5> 
                    <?php 
                        $discount=($list['mrp']-$list['price'])/$list['price']*100;
                        echo round($discount)." off";
                    ?></h5>
                </div>
                <div class="btn card">
                    <a href=""><i class="far fa-heart"></i>Sort</a>
                    <input type="number" value="1" id="qty" class="hide_qty">
                    <a class="btn-cart" href="javascript:void(0)" onclick="manage_cart('<?php echo $list['id']?>','add')"><i class="fas fa-shopping-cart" ></i> Add Cart</a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    </div>
           
 <?php
  include('footer.php');
?>
 