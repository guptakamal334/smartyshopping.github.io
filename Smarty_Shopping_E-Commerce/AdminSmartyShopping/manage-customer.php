<?php

  require('top.php');
//   require('connection_inc.php');
//   require('function_inc.php');
  $msg='';
  $name='';
  $email='';
  $mobile='';
  $address='';

  if(isset($_GET['id']) && $_GET['id']!=''){
      $id=get_safe_value($con,$_GET['id']);
      $res=mysqli_query($con,"select * from users where id='$id'");
      $count=mysqli_num_rows($res);
      if($count>0){
      $row=mysqli_fetch_assoc($res);
      $name=$row['name'];
      $email=$row['email'];
      $mobile=$row['mobile'];
      $address=$row['address'];
    
      }else{
          header('location:customer.php');
          die();
      }
  }

  if(isset($_POST['submit'])){
    $name=get_safe_value($con,$_POST['name']);
    $email=get_safe_value($con,$_POST['email']);
    $mobile=get_safe_value($con,$_POST['mobile']);
    $address=get_safe_value($con,$_POST['address']);
    date_default_timezone_set("Asia/Kolkata");
    $date=date("Y-m-d h:i:sa");
    $res=mysqli_query($con,"select * from users where email='$email'");
    $count=mysqli_num_rows($res);
    if($count>0){
        if(isset($_GET['id']) && $_GET['id']!=''){
        $getdata=mysqli_fetch_assoc($res);
         if($id==$getdata['id']){

    }else {
        $msg="E-mail already exist";
    }
   } else {
    $msg="E-mail already exist";
   }
}
  
    
    if($msg==''){
        if(isset($_GET['id']) && $_GET['id']!=''){
        mysqli_query($con,"update users set name='$name', mobile='$mobile',email='$email',address='$address' where id='$id'");
    }else{
        mysqli_query($con,"insert into users(name,email,mobile,address,added_on,status) values ('$name','$email','$mobile','$address','$date','1')");
       
    }
    header('location:customer.php');
    die();
}
  }


?>
    <div class="content">
        <div class="content-header">
            <div class="subheader">
                <h2>CUSTOMER FORM</h2>
            </div>
            <form method="post" action="" >
                    <label for="name">Customr Name</label><br>
                    <input type="text" name="name" value="<?php echo $name; ?>" id="name" placeholder="Enter Customer Name*" required><br>

                    <label for="email">E-mail</label><br>
                    <input type="email" name="email" value="<?php echo $email; ?>" id="email" placeholder="Enter Category Name*" required><br>

                    <label for="mobile">Mobile</label><br>
                    <input type="mobile" name="mobile" value="<?php echo "$mobile"; ?>" id="mobile" placeholder="Enter Mobile Number*" maxlength="13" minimum="13" required><br>

                    <label for="address">Address</label><br>
                    <input type="address" name="address" value="<?php echo $address; ?>" id="address" placeholder="Enter Address*" required><br>
                    
                    <button type="submit" name="submit">Submit</button>
                    <button type="reset">Reset</button>
                    <div class="msg"><?php echo $msg; ?></div>
            </form>
        </div>
    </div>
 <?php
  include('footer.php');
?>