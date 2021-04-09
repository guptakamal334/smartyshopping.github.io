<?php
        require('header.php');
?>
           <!-- -------------------------path seciton----------------------------- -->
    <div class="path">
          <span>
            <a href="index.html">Home /</a>  <a href="#">Status</a>
          </span>
    </div>
   <!-- -----------------------------Login------------------------ -->
   <div class="login status" >
     <h2 class="title">Check Status</h2>
     <div class="row">
        <div class="colu-2">
            <form action="">
                 <label for="request">REQUEST NUMBER</label><br>
                 <input type="text" name="request" id="request" placeholder="Enter Your Request Number.........">
                 <input type="submit" name="check" value="Check Status"  >
             </form>
        </div>
        <div class="colu-2">
            <img src="media/login.jpg" alt="contact page">
        </div>
    </div>
  </div>

<?php
    require('footer.php');
?>

