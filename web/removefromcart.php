<?php
session_start();
require './killacccessforvisitors.php';

require 'boot.php';
header('Content-Type: application/json');

$output =array ('success'=>true);

        

//remove from the session

if (($key = array_search(intval(htmlspecialchars($_POST['text'])), $_SESSION['cart'])) !== false) {
    unset($_SESSION['cart'][$key]);
}



echo json_encode($output);

