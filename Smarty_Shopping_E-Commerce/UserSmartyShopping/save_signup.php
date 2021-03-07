<?php
    require('connection_inc.php');
    require('function_inc.php');
    
    $name=get_safe_value($con,$_POST['name']);
    $mobile=get_safe_value($con,$_POST['mobile']);
    $email=get_safe_value($con,$_POST['email']);
    $password=get_safe_value($con,$_POST['password']);
    $added=date('Y-m-d h:i:s');
    $res=mysqli_query($con,"select * from users where email='$email'");
    
    if(mysqli_num_rows($res)>0){
            // echo "exist";
            echo "Your Mail-id Already Exist";
        }else {
            mysqli_query($con,"insert into users (name,email,mobile,password,added_on,status) values('$name','$email','$mobile','$password','$added','0')");
            echo "Your Signup is successful";        
            }   
?>