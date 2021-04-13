
<?php
        require('header.php');
        $product_id=get_safe_value($con,$_GET['product_id']);
?>

  <!-- -------------------------path seciton----------------------------- -->
  <div class="path">
          <span>
            <a href="index.html">Home /</a>  <a href="mobile_product.php">Mobile Product Report /</a><a href="#">Add Problem </a>
          </span>
    </div>
   <!-- -----------------------------Add Problem ------------------------ -->
   <div class="login add_prob" >
     <h2 class="title">ADD PROBLEM</h2>
     <div class="row">
        <label for="">Product Name</label>
        <span>fder</span>
        <label for="">IMEI Number</label>
        <span>fder</span>
        <label for="">Model Number</label>
        <span>fder</span>
        
        <label for="">Customer Name</label>
        <span>fder</span>
        <label for="">Expire Date</label>
        <span>fder</span> 
    </div>
  </div>
<?php
    require('footer.php');
?>
