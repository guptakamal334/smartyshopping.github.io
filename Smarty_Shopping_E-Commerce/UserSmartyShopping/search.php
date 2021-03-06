<?php
  require('header.php');

    $search_str=get_safe_value($con,$_GET['search_str']);
        if($search_str!=''){
            $get_product=get_product($con,'','','',$search_str);
        }else{
            header('location:index.php');
        }
 
?>
    <!-- ------------------path----------------------------- -->
<div class="path">
    <a href="index.php">Home &nbsp;&nbsp;/</a> 
    <a href="Search.php">Search &nbsp;&nbsp;/</a>
    <a href="#"><?php echo $search_str; ?></a>
</div>
<!-------------------- Categories wise product ----------------------->

<div class="small-container">
    <?php 
        if(count($get_product)>0){ 
    ?>
  <!-- <h2 class="title"><?php echo $get_product[0]['categories'];?></h2> -->

  <div class="row">
        <?php 
            
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
        <?php } }else{
                echo "prodcut not found";
            }?>
    </div>
</div>

 <?php
  include('footer.php');
?>