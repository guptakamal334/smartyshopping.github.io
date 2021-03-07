<?php
session_start();
$con=mysqli_connect("localhost","root","","smartyshopping");

define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/Smarty_Shopping_E-Commerce');
define('SITE_PATH','http://localhost/Smarty_Shopping_E-Commerce');

define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'/media/product/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'/media/product/');

// echo $_SERVER['DOCUMENT_ROOT'];
// echo PRODUCT_IMAGE_SERVER_PATH;


?>