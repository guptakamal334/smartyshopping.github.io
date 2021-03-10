<?php
    require('connection_inc.php');
    require('function_inc.php');
    require('add_cart_inc.php');
    
    $obj= new add_to_cart();
    $totalProduct=$obj->totalProduct();
    
    $cat_res=mysqli_query($con,"select * from categories where status=1 order by categories asc");
    $cat_arr=array();
    while($row=mysqli_fetch_assoc($cat_res)){
        $cat_arr[]=$row;	
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMARTY SHOPPING</title>
    <link rel="stylesheet" href="style/style.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"> -->
    <!-- <link rel="stylesheet" href="localhost/fontawesome-free-5.15.2-web/css/all.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
  <!-- ---------------------------header----------------------------   -->
   <div class="nav top">
        <div class="contact">
            <p><i class="fas fa-phone-alt"></i>+91 9555899891 &nbsp&nbsp&nbsp<i class="fas fa-envelope"></i>smarty@gmail.com</p>
        </div>
        <div class="btn login">
        <?php
            if(isset($_SESSION['USER_LOGIN'])) {
                echo "<a href='logout.php'><i class='fas fa-sign-out-alt'></i>Log Out</a>";
                echo '<a href="order.php"><i class="fas fa-user"></i>'.$_SESSION['USER_NAME'].'</a>';
            } else {
                echo "<a href='signin.php'><i class='fas fa-sign-in-alt'></i>Sign In</a>";
                echo "<a href='signup.php'><i class='fas fa-user-plus'></i>Sign Up</a>";    
            }
        
        ?>
            
            
        </div>
    </div>
    <div class="nav mid">
        <div class="logo">
            <a href="index.php"><h2><b> SMARTY SHOPPING</b></h2></a>
        </div> 
        <div class="search-box">
            <form action="">
                <input type="text" placeholder="Enter Search...."/>
                <input type="submit" name="search" value="SEARCH" />
            </form>
        </div>
        <div class="cartfav">
          <a href=""><i class="far fa-heart"></i><sup>0</sup></a>
          <a href="cart.php"><i class="fas fa-shopping-cart"></i><sup id="cart_count"><?php echo $totalProduct;?></sup></a>
        </div>
        
    </div>
    <div class="nav down">
        <nav>
            <ul id="MenuItems">
            <?php
                foreach($cat_arr as $list){
            ?>
            <li><a href="category.php?id=<?php echo $list['id']?>"><?php echo $list['categories']?></a></li>
            <?php
                }
            ?>
                
                <li><a href="contact.php">CONTACT US</a></li>
            </ul>
        </nav>
    </div>  
</body>
</html>