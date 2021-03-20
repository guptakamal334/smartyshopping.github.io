<?php
session_start();
$con=mysqli_connect("localhost","root","","smartyshopping");

define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/smartyshopping.github.io/Smarty_Shopping_E-Commerce');
define('SITE_PATH','http://localhost/smartyshopping.github.io/Smarty_Shopping_E-Commerce');

define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'/media/product/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'/media/product/');

// echo $_SERVER['DOCUMENT_ROOT'];
// echo PRODUCT_IMAGE_SERVER_PATH;


// Visitor Counter 


$visitorArr=mysqli_fetch_assoc(mysqli_query($con,"select visitor_count from visitor "));
$visit=$visitorArr['visitor_count'];
// echo $visit;
mysqli_query($con,"update visitor set visitor_count=$visit+1 where id='1'");
// $visitor_count
// $userArr=mysqli_fetch_assoc(mysqli_query($con,"select * from users"));
// print_r($userArr['name']);


?>