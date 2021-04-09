<?php
require('connection_inc.php');
unset($_SESSION['ADMIN_LOGIN']);
unset($_SESSION['ADMIN_ID']);
unset($_SESSION['ADMIN_NAME']);
header('location:home.php');
die();
?>
