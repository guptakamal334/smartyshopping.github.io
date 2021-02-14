<?php
    include('connection_inc.php');
    include('function_inc.php');
    $msg='';
    if(isset($_POST['submit'])){
        $username=get_safe_value($con,$_POST['username']);
        $password=get_safe_value($con,$_POST['password']);
        $sql="select * from admin_users where username='$username' and password='$password'";
        $res=mysqli_query($con,$sql);
        $count=mysqli_num_rows($res);
        if($count>0){
            if(isset($_POST['remember'])){
                setcookie('username',$username,time()+60*60);
                setcookie('password',$password,time()+60*60);
            }else{
                setcookie('username',$username,30);
                setcookie('password',$password,30);
            }    
            $_SESSION['ADMIN_LOGIN']='yes';
            $_SESSION['ADMIN_USERNAME']=$username;
            $row=mysqli_fetch_assoc($res);
            $_SESSION['ADMIN_NAME']=$row['name'];
            header('location:index.php');
            die();
        }else{
            $msg="Please enter correct login details";
        }
    }

    $username_cookie='';
    $password_cookie='';
    $set_remember="";
    if(isset($_COOKIE['username']) && isset($_COOKIE['password'])){
        $username_cookie=$_COOKIE['username'];
        $password_cookie=$_COOKIE['password'];
        $set_remember="checked='checked'";	
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smarty Shopping Admin Login </title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
</head>
<body>    
    <div class="admin-login">
        <form method="post">
            <h1>Welcome to Smarty <span>Shopping</span></h1>
            <label for="username">USERNAME</label><br>
            <input type="text" name="username" placeholder="enter username" value=<?php echo $username_cookie?>>
            <label for="password">Password</label><br>
            <input type="password" name="password" placeholder="enter Password" value=<?php echo $password_cookie?>>
            <input type="checkbox" name="remember" <?php echo $set_remember?>> 
            <label class="remember">Remember Me</label>
            <button type="submit" name="submit" >Submit</button>
            <button type="reset">Reset</button>
            <div class="msg"><?php echo $msg; ?></div>
        </form>
        
    </div>
</body>
</html>