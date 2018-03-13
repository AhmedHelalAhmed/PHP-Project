<?php
session_start();
require './killacccessforvisitors.php';
require 'boot.php';


$userId = $_SESSION['userId'];
if ($userId != 1)
{
    die("you are not allow to see this page");
}



if (!empty($_POST))
{




    $filename    = $_FILES['fileToUpload']['tmp_name'];
    $filePath    = '/uploads/' . time() . '.png';
    $destination = __DIR__ . $filePath;
    if (!move_uploaded_file($filename, $destination))
    {
        die('cant upload');
    }

    $product = new Product($conn, false);
    $product->setPhoto($filePath);
    $product->setDescription($_POST['description']);
    $product->setName($_POST['name']);
    $product->setPrice($_POST['price']);
    $product->setCategoryId($_POST['category']);
    $product->save();

    header("Location: index.php");
    exit;
}
?>
<form method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" required id="fileToUpload">
    <br/><br/>
    name<input name="name" required type="text"  />
    <br/><br/>
    description<textarea name="description" required type="text" ></textarea>
    <br/><br/>
    price<input name="price" type="text" required />
    <br/><br/>
    category<input name="category" type="text" required />    
    <br/><br/>
    <button type="submit">Add</button>
