<?php
session_start();

if (!isset($_SESSION['userId']))
{

    die("you have to login to see this page");
}

if (isset($_GET['id']))
{
    require './boot.php';
    require 'cssandhtml.php';
    $product = new Product($conn, intval(htmlspecialchars($_GET['id'])));
//var_dump($productObj);
    
    require './product.view.php';
}
else
{
    echo 'There is no data to view';    
}