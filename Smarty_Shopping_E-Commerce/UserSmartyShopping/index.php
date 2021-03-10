
 <?php
        require('header.php');

   ?>
   
  <!-- ----------------Carousel----------------------  -->
   <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
    
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
    
          <div class="item active">
            <img src="images/baner1.jpg" alt="Los Angeles" style="width:100%;">
            <div class="carousel-caption">
              <h3>Los Angeles</h3>
              <p>LA is always so much fun!</p>
            </div>
          </div>
    
          <div class="item">
            <img src="images/baner2.jpg" alt="Chicago" style="width:100%;">
            <div class="carousel-caption">
              <h3>Chicago</h3>
              <p>Thank you, Chicago!</p>
            </div>
          </div>
        
          <div class="item">
            <img src="images/baner3.jpeg" alt="New York" style="width:100%;">
            <div class="carousel-caption">
              <h3>New York</h3>
              <p>We love the Big Apple!</p>
            </div>
          </div>
      
        </div>
    
        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
 <!-------------------- Featured Categories ----------------------->
<div class="categories">
  <div class="small-container">
      <div class="row row1">
          <div class="col-3">
              <img src="images/category-1.jpg" alt="">
          </div>
          <div class="col-3">
              <img src="images/category-2.jpg" alt="">
          </div>
          <div class="col-3">
              <img src="images/category-3.jpg" alt="">
          </div>
      </div>
  </div>
</div>

<!-------------------- Featured Products ----------------------->

<div class="small-container">
    <h2 class="title">Featured Products</h2>
 
    <div class="row">
        <?php 
            $get_product=get_product($con,8);
           
            if(count($get_product)>0){  
                foreach($get_product as $list){       
                    $imageArr=explode(",",$list['image']);
                    
		?>
       <div class="col-4">
                <a href="product.php?id=<?php echo $list['id'];?>">
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
                    <h5>10% Off</h5>
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
  
  <!-- ---------------------latest Products------------------------------ -->
  <h2 class="title">Latest Products</h2>
  <div class="row">
      <div class="col-4">
          <img src="images/product-5.jpg" alt="">
          <h4>Red Printed T-Shirt</h4>
          <div class="rating">
              <li class="fa fa-star"></li>
              <li class="fa fa-star"></li>
              <li class="fa fa-star"></li>
              <li class="fa fa-star"></li>
              <li class="fa fa-star-o"></li>
          </div>
          <p>$50.00</p>
      </div>
      <div class="col-4">
          <img src="images/product-6.jpg" alt="">
          <h4>Red Printed T-Shirt</h4>
          <div class="rating">
              <li class="fa fa-star"></li>
              <li class="fa fa-star"></li>
              <li class="fa fa-star"></li>
              <li class="fa fa-star"></li>
              <li class="fa fa-star-o"></li>
          </div>
          <p>$50.00</p>
      </div>
      <div class="col-4">
          <img src="images/product-7.jpg" alt="">
          <h4>Red Printed T-Shirt</h4>
          <div class="rating">
              <li class="fa fa-star"></li>
              <li class="fa fa-star"></li>
              <li class="fa fa-star"></li>
              <li class="fa fa-star"></li>
              <li class="fa fa-star-half-o"></li>
          </div>
          <p>$50.00</p>
      </div>
      <div class="col-4">
          <img src="images/product-8.jpg" alt="">
          <h4>Red Printed T-Shirt</h4>
          <div class="rating">
              <li class="fa fa-star"></li>
              <li class="fa fa-star"></li>
              <li class="fa fa-star"></li>
              <li class="fa fa-star-half-o"></li>
              <li class="fa fa-star-o"></li>
          </div>
          <p>$50.00</p>
      </div>
  </div>
  <div class="row">
      <div class="col-4">
          <img src="images/product-9.jpg" alt="">
          <h4>Red Printed T-Shirt</h4>
          <div class="rating">
              <li class="fa fa-star"></li>
              <li class="fa fa-star"></li>
              <li class="fa fa-star"></li>
              <li class="fa fa-star"></li>
              <li class="fa fa-star-o"></li>
          </div>
          <p>$50.00</p>
      </div>
      <div class="col-4">
          <img src="images/product-10.jpg" alt="">
          <h4>Red Printed T-Shirt</h4>
          <div class="rating">
              <li class="fa fa-star"></li>
              <li class="fa fa-star"></li>
              <li class="fa fa-star"></li>
              <li class="fa fa-star"></li>
              <li class="fa fa-star-o"></li>
          </div>
          <p>$50.00</p>
      </div>
      <div class="col-4">
          <img src="images/product-11.jpg" alt="">
          <h4>Red Printed T-Shirt</h4>
          <div class="rating">
              <li class="fa fa-star"></li>
              <li class="fa fa-star"></li>
              <li class="fa fa-star"></li>
              <li class="fa fa-star"></li>
              <li class="fa fa-star-half-o"></li>
          </div>
          <p>$50.00</p>
      </div>
      <div class="col-4">
          <img src="images/product-12.jpg" alt="">
          <h4>Red Printed T-Shirt</h4>
          <div class="rating">
              <li class="fa fa-star"></li>
              <li class="fa fa-star"></li>
              <li class="fa fa-star"></li>
              <li class="fa fa-star-half-o"></li>
              <li class="fa fa-star-o"></li>
          </div>
          <p>$50.00</p>
      </div>
  </div>
</div>

 <!-- ---------------testimonial---------------- -->
 <div class="testimonial">
  <div class="small-container">
      <div class="row row1">
          <div class="col-3">
              <i class="fa fa-quote-left"></i>
              <p>Lorem, ipsum dolor sit amet tutee consectetur adipisicing elit. Explicabo eos consequuntur maxime tempore vitae eaque molestiae deleniti non iste repudiandae. </p>
              <div class="rating">
                  <li class="fa fa-star"></li>
                  <li class="fa fa-star"></li>
                  <li class="fa fa-star"></li>
                  <li class="fas fa-star-half-alt fa"></li>  
                    <li class="far fa-star"></li>
              </div>
              <img src="images/user-1.png" alt="">
              <h3>Sean Parker</h3>
          </div>
          <div class="col-3">
              <i class="fa fa-quote-left"></i>
              <p>Lorem, ipsum dolor sit amet tutee consectetur adipisicing elit. Explicabo eos consequuntur maxime tempore vitae eaque molestiae deleniti non iste repudiandae. </p>
              <div class="rating">
                  <li class="fa fa-star"></li>
                  <li class="fa fa-star"></li>
                  <li class="fa fa-star"></li>
                  <li class="fa fa-star"></li>
                  <li class="fas fa-star-half-alt fa"></li>  
              </div>
              <img src="images/user-2.png" alt="">
              <h3>Mike Smith</h3>
          </div>
          <div class="col-3">
              <i class="fa fa-quote-left"></i>
              <p>Lorem, ipsum dolor sit amet tutee consectetur adipisicing elit. Explicabo eos consequuntur maxime tempore vitae eaque molestiae deleniti non iste repudiandae. </p>
              <div class="rating">
                  <li class="fa fa-star"></li>
                  <li class="fa fa-star"></li>
                  <li class="fa fa-star"></li>
                  <li class="fa fa-star"></li>
                  <li class="fas fa-star-half-alt fa"></li>  
              </div>
              <img src="images/user-3.png" alt="">
              <h3>Mabel Joe</h3>
          </div>
      </div>
  </div>

<!-- --------------------Brands----------- -->
<div class="brands">
  <div class="small-container">
      <div class="row row1">
          <div class="col-5">
              <img src="images/logo-godrej.png" alt="">
          </div>
          <div class="col-5">
              <img src="images/logo-oppo.png" alt="">
          </div>
          <div class="col-5">
              <img src="images/logo-coca-cola.png" alt="">
          </div>
          <div class="col-5">
              <img src="images/logo-paypal.png" alt="">
          </div>
          <div class="col-5">
              <img src="images/logo-philips.png" alt="">
          </div>
      </div>
  </div>
</div>

<?php
        require('footer.php');
?>