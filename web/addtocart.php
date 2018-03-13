<?php
session_start();
require './killacccessforvisitors.php';


require 'boot.php';

header('Content-Type: application/json');
$output = ['success' => true, 'id' => intval(htmlspecialchars($_POST['text']))];

array_push($_SESSION['cart'], intval(htmlspecialchars($_POST['text']))); //strore to session

echo json_encode($output);

