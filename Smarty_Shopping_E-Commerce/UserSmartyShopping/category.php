<?php
  require('header.php');
  $price_high_selected="";
  $price_low_selected="";
  $first_selected="";
  $old_selected="";
  $sort_order="";
    if(isset($_GET['sort'])){
      $sort=get_safe_value($con,$_GET['sort']);
      if($sort=='Price_low'){
          $sort_order= "order by product.price asc";
          $price_low_selected="selected";
      }
      if($sort=='Price_high'){
          $sort_order= "order by product.price desc";
          $price_high_selected="selected";
      }
      if($sort=='sort_first'){
          $sort_order= "order by product.id asc";
          $first_selected="selected";
      }
      if($sort=='sort_old'){
          $sort_order= "order by product.id desc";
          $old_selected="selected";
      }
  }
  if(isset($_GET['id']) && $_GET['id']!=''){
      $cat_id=get_safe_value($con,$_GET['id']);
    //   $cat_name=get_safe_value($con,$_GET['cat_name']);
      
        if($cat_id>0){
            $get_product=get_product($con,'',$cat_id,'','',$sort_order);
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
    <a href="">Category</a>
</div>
<!-------------------- Categories wise product ----------------------->

<div class="small-container">
    <?php 
        if(count($get_product)>0){ 
    ?>
    <div class="row">
        <h2 class="title"><?php echo $get_product[0]['categories'];?></h2>
         <select onchange="select('<?php echo $cat_id;?>','<?php echo SITE_PATH;?>')" id="select_id" class="drop_down">
            <option value="">Default Sorting</option>
             <option value="Price_low" <?php echo $price_low_selected;?>>Sort by Price Low To High</option>
             <option value="Price_high" <?php echo $price_high_selected;?>>Sort by Price High To Low</option>
              <option value="sort_first" <?php echo $first_selected;?>>Sort by new First</option>
             <option value="sort_old" <?php echo $old_selected;?>>Sort by old first</option>
        </select>
    </div>
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