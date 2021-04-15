<?php
    require('connection_inc.php');
    require('function_inc.php');
    
    $name=get_safe_value($con,$_POST['name']);
    $mobile=get_safe_value($con,$_POST['mobile']);
    $email=get_safe_value($con,$_POST['email']);
    $query=get_safe_value($con,$_POST['query']);
    
    date_default_timezone_set('Asia/Kolkata');
    $added=date('Y-m-d h:i:s');

    mysqli_query($con,"insert into contact_us(name,email,mobile,comment,added_on) values('$name','$email','$mobile','$query','$added')");
    echo "send Your Request Succesfull";
?>