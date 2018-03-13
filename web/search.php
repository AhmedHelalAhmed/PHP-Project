<?php
session_start();
require 'boot.php';
//we search for product
$productsObj = new Products($conn);
//$_GET['term'] ===> search for this name 
$products    = $productsObj->filter(htmlspecialchars($_GET['term']));//give me all products with that name

$return   = array();//make array
foreach ($products as $product)
{
    $return[] = array('label' => $product->getName(), 'value' => $product->getId());
}
//echo var_dump($return);
//die();
//to make this page as source of json 
echo json_encode($return);

