<?php
session_start();
require './killacccessforvisitors.php';

require './boot.php';
require 'cssandhtml.php';
//var_dump($_SESSION['cart']);

$totalprice = 0;
//dd($_SESSION['cart']!=[]);
if ($_SESSION['cart']!=[])
{
    foreach ($_SESSION['cart'] as $product)
    {
        $product = new Product($conn, $product);
        $totalprice=$totalprice+$product->getPrice();

        //var_dump($product);
//  echo '<br>'; 
        require './product.view.php';
//    //$product = new Product($conn, intval(htmlspecialchars($_GET['id'])));



        echo '<br/>';
////    var_dump($product);
    }
    
    echo "<h1>Total price is : {$totalprice}</h1>";
}


