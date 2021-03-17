<?php
  include('connection_inc.php');
  include('function_inc.php');
  if($_SESSION['ADMIN_LOGIN'] && $_SESSION['ADMIN_LOGIN']!=''){

  }else {
    header('location:admin-login.php');
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smarty Shopping</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
  </head>
  <body>

    <input type="checkbox" id="check">
    <!--header area start-->
    <header>
        <label for="check">
          <i class="fas fa-bars" id="sidebar_btn"></i>
        </label>
        <div class="left_area">
          <h3>Smarty <span>Shopping</span></h3>
        </div>
        <div class="right_area">
          <a href="logout.php" class="logout_btn">Logout</a>
        </div>
    </header>
    <!--header area end-->
    <!--mobile navigation bar start-->
    <div class="mobile_nav">
      <div class="nav_bar">
        <img src="image/profile.jpg" class="mobile_profile_image" alt="">
        <i class="fa fa-bars nav_btn"></i>
      </div>
      <div class="mobile_nav_items">
      <a href="index.php" class="a"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
      <a href="category.php" class="a"><i class="fas fa-cogs"></i><span>Category</span></a>
      <a href="product.php" class="a" ><i class="fas fa-table"></i><span>Product</span></a>
      <a href="order.php" class="a"><i class="fas fa-th"></i><span>Order</span></a>
      <a href="customer.php" class="a"><i class="fas fa-info-circle"></i><span>Customer</span></a>
      <a href="contact.php" class="a"><i class="fas fa-sliders-h"></i><span>Contact</span></a>
      </div>
    </div>
    <!--mobile navigation bar end-->
    <!--sidebar start-->
    <div class="sidebar" id="sidebar">
      <div class="profile_info">
        <img src="../media/admin/admin1.png" class="profile_image" alt="">
        <h4><?php echo $_SESSION['ADMIN_NAME']; ?></h4>
      </div>
      <a href="index.php" class="a"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
      <a href="category.php" class="a"><i class="fas fa-cogs"></i><span>Category</span></a>
      <a href="product.php" class="a" ><i class="fas fa-table"></i><span>Product</span></a>
      <a href="order.php" class="a"><i class="fas fa-th"></i><span>Order</span></a>
      <a href="customer.php" class="a"><i class="fas fa-info-circle"></i><span>Customer</span></a>
      <a href="contact.php" class="a"><i class="fas fa-sliders-h"></i><span>Contact</span></a>
    </div>
    <!--sidebar end-->
    <script type="text/javascript">
    
    $(document).ready(function(){
      $('.nav_btn').click(function(){
        $('.mobile_nav_items').toggleClass('active');
      });
    });

    // Add active class to the current button (highlight it)
      var sidebar = document.getElementById("sidebar");
      var a = sidebar.getElementsByClassName("a");
      for (var i = 0; i < a.length; i++) {
        a[i].addEventListener("click", function() {
        var current = document.getElementsByClassName("active");
        if (current.length > 0) { 
        current[0].className = current[0].className.replace(" active", "");
        }
        this.className += " active";
        });
      }
    </script>

  </body>
</html>