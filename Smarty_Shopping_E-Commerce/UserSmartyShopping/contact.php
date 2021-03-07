<?php
  require('header.php');
?>
   <!-- ------------------path----------------------------- -->
<div class="path">
    <a href="index.php">Home &nbsp;&nbsp;/</a> 
    <a href="">Contact Us</a>
</div>
<!-- -----------------------contact Us form ------------------------ -->
<div class="sign">
    <form class="sign-in sign-up contact" id="contact">
        <h1>Contact Us</h1>
        <table>
            <tr>
                <td>
                    <p>NAME</p>
                    <input type="text" name="name" id="name" placeholder="Enter Name....">
                    <span class="error_msg" id="error_name" ></span>   
                </td>
                <td>
                    <p>MOBILE NUMBER</p>
                    <input type="text" name="mobile" id="mobile" placeholder="Enter Mobile Number....">
                    <span  class="error_msg" id="error_mobile"></span>  
                </td>
                <td>
                    <p>E-MAIL</p>
                    <input type="text" name="email" id="email" placeholder="Enter E-mail ....">
                    <span  class="error_msg" id="error_email"></span>  
                </td>
            </tr>
        </table>
        <P>QUERY</P>
        <textarea name="query" id="query" cols="30" rows="5"></textarea>
        <span class="error_msg" id="error_query"></span>
        <button type="button" onclick="send_message()">SUBMIT</button>
        <span  class="error_msg" id="error_button"></span>  
    </form>
</div>
 <?php
  include('footer.php');
?>