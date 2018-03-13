<?php
session_start();
require './killacccessforvisitors.php';
require './boot.php';


$userId = $_SESSION['userId'];

$user = new User($conn, $userId);

if (!empty($_POST))
{
    $filename    = $_FILES['fileToUpload']['tmp_name'];
    $filePath    = '/uploads/' . time() . '.png';
    $destination = __DIR__ . $filePath;
    if (!move_uploaded_file($filename, $destination))
    {
        echo "cant upload";
    }
  
    $user->setPhoto($filePath);
    $user->setUsername($_POST['username']);
    $user->setName($_POST['name']);
    $user->setPhone($_POST['phone']);
    $user->setEmail($_POST['email']);
    $user->update();

    header("Location: account.php");
    exit;
}
?>



<form method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" required id="fileToUpload">
    <br/>
    Username<input name="username" required value="<?= $user->getUsername() ?>" />
    <br/>
    Email<input name="email" required value="<?= $user->getEmail() ?>" />
    <br/>
    Phone<input name="phone" required value="<?= $user->getPhone() ?>" />
    <br/>
    Name<input name="name" required value="<?= $user->getName() ?>" />
    <br/>

    <button type="submit">Update</button>
</form>