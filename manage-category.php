<?php

  require('top.php');
  $category='';
  $msg='';

  if(isset($_GET['id']) && $_GET['id']!=''){
      $id=get_safe_value($con,$_GET['id']);
      $res=mysqli_query($con,"select * from categories where id='$id'");
      $count=mysqli_num_rows($res);
      if($count>0){
      $row=mysqli_fetch_assoc($res);
      $category=$row['categories'];
      }else{
          header('location:Category.php');
          die();
      }
  }

  if(isset($_POST['submit'])){
    $category=get_safe_value($con,$_POST['category']);
    $res=mysqli_query($con,"select * from categories where categories='$category'");
    $count=mysqli_num_rows($res);
    if($count>0){
        if(isset($_GET['id']) && $_GET['id']!=''){
        $getdata=mysqli_fetch_assoc($res);
         if($id==$getdata['id']){

    }else {
        $msg="Categories already exist";
    }
   } else {
    $msg="Categories already exist";
   }
}
  
    
    if($msg==''){
        if(isset($_GET['id']) && $_GET['id']!=''){
        mysqli_query($con,"update categories set categories='$category' where id='$id'");
    }else{
        mysqli_query($con,"insert into categories(categories,status) values ('$category','1')");
    }
    header('location:Category.php');
    die();
}
  }


?>
    <div class="content">
        <div class="content-header">
            <div class="subheader">
                <h2>CATEGORY FORM</h2>
            </div>
            <form method="post" action="" >
                    <label for="name">Category Name</label><br>
                    <input type="text" name="category" value="<?php echo $category; ?>" id="name" placeholder="Enter Category Name*" required><br>
                    <button type="submit" name="submit">Submit</button>
                    <button type="reset">Reset</button>
                    <div class="msg"><?php echo $msg; ?></div>
            </form>
        </div>
    </div>
 <?php
  include('footer.php');
?>