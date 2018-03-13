<?php
session_start();
//home

if (!isset($_SESSION['cart']))
{
    //if ($_SESSION['cart'] == [])
    //{
        $_SESSION['cart'] = [];
   // }
}


require 'boot.php';
require 'index.view.php';

