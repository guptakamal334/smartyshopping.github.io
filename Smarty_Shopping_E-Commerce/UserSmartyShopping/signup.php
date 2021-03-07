<?php
  require('header.php');
?>
   <!-- ------------------path----------------------------- -->
<div class="path">
    <a href="index.php">Home &nbsp;&nbsp;/</a> 
    <a href="">Sign Up</a>
</div>
<!-- -----------------------sign UP ------------------------ -->
<div class="sign">
    <form class="sign-in sign-up" id="signup">
        <h1>Sign Up</h1>
        <table>
            <tr>
                <td>
                    <p>NAME</p>
                    <input type="text" name="name" id="name" placeholder="Enter Name....">
                    <span class="error_msg" id="error_name"></span>   
                </td>
                <td>
                    <p>MOBILE NUMBER</p>
                    <input type="text" name="mobile" id="mobile" placeholder="Enter Mobile Number....">
                    <span class="error_msg" id="error_mobile"></span>   
                </td>
            </tr>
            <tr>
                <td>
                    <p>E-MAIL</p>
                    <input type="text" name="email" id="email" placeholder="Enter E-mail ....">
                    <span class="error_msg" id="error_email"></span>   
                </td>
                <td>
                    <P>PASSWORD</P>
                    <input type="password" name="password" id="password" placeholder="Enter Password ...">
                    <span class="error_msg" id="error_password"></span>   
                </td>
            </tr>
        </table>
        <button type="button" onclick="sign_up()">SUBMIT</button>
        <span  class="error_msg" id="error_button"></span>  <br>
        <a href="signin.php">If you have username and password click here!</a>
    </form>
</div>
 <?php
  include('footer.php');
?>