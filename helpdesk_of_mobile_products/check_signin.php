<?php
    require('connection_inc.php');
    require('function_inc.php');
    
    $email=get_safe_value($con,$_POST['email']);
    $password=get_safe_value($con,$_POST['password']);
    
    $res=mysqli_query($con,"select * from admin_users where username='$email' && password='$password'");
    
    if(mysqli_num_rows($res)>0){
            $row=mysqli_fetch_assoc($res);
            $_SESSION['ADMIN_LOGIN']='yes';
            $_SESSION['ADMIN_NAME']=$row['name'];
            $_SESSION['ADMIN_ID']=$row['id'];
            echo "You have been Login Successful";
        }else {
            echo "Plese enter username and Password correct";        
            }   
?>