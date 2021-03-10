<?php
  require('header.php');
  if($_SESSION['USER_LOGIN']=='yes'){
    header("location:index.php");
  }
?>
   <div class="path">
    <a href="index.php">Home &nbsp;&nbsp;/</a> 
    <a href="">Sign In</a>
</div>
<!-- -----------------------sign IN ------------------------ -->
<div class="sign">
    <form action="" method="" class="sign-in" >
        <h1>Sign In</h1>
        <P>USERNAME</P>
        <input type="text" name="username" id="email-l" placeholder="Enter User Name....">
        <span id="wrong_email"></span>
        <P>PASSWORD</P>
        <input type="password" name="password" id="password-d" placeholder="Enter Password ...">
        <span id="wrong_password"></span>
        <button type="button" onclick="sign_in()">LOGIN</button>
        <span id="login_button"></span><br>
        <a href="#">Forget Password</a><br>
        <a href="signup.php">Register Here</a>
    </form>
</div>
 <?php
  include('footer.php');
?>