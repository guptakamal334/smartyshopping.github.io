
<?php
        require('header.php');
?>

  <!-- -------------------------path seciton----------------------------- -->
  <div class="path">
          <span>
            <a href="index.html">Home /</a>  <a href="#">login</a>
          </span>
    </div>
   <!-- -----------------------------Login------------------------ -->
   <div class="login" >
     <h2 class="title">LOGIN PAGE</h2>
     <div class="row">
        <div class="colu-2">
            <img src="media/login.jpg" alt="contact page">
        </div>
        <div class="colu-2">
         <form id="sign">
            <label for="username">USERNAME</label><br>
            <input type="text" name="username" id="username" placeholder="Enter Username.....">
            <span class="error_msg" id="error_username" ></span><br>

            <label for="password">PASSWORD</label><br>
            <input type="password" name="password" id="password" placeholder="Enter Password.....">
            <span class="error_msg" id="error_password" ></span><br>  
              
            <button type="button" onclick="sign_in()">LOGIN</button>
            <span class="error_msg" id="error_button" ></span><br>  
          </form>
        </div>
    </div>
  </div>
<?php
    require('footer.php');
?>
