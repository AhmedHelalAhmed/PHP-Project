<?php
session_start();
require './killacccessforvisitors.php';
require 'boot.php';

if (!isset($_SESSION['userId']) || !$_SESSION['userId'])
{
    header("Location: login.php");
    exit;
}

$userId =$_SESSION['userId'];


$user = new User($conn, $userId);

?>

<a href = "index.php">home</a> <br/>
<h1>LoggedIn User Info</h1>
<img src="<?= $user->getPhoto() ?>" width="100" height="100" />
<h3>Name: <?= $user->getName() ?></h3>
<h3>Username: <?= $user->getUsername() ?></h3>
<h3>Email: <?= $user->getEmail() ?></h3>
<h3>Phone: <?= $user->getPhone() ?></h3>

<?php if ($userId == $_SESSION['userId']): ?>
    <h3><a href="editprofile.php">Edit Profile</a></h3>
    <h3> <a href="logout.php">Logout</a></h3>
    
<?php endif; ?>