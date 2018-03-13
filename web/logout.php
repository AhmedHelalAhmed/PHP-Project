<?php
session_start(); //to ensure you are using same session
require './killacccessforvisitors.php';


unset($_SESSION['username']);
// Delete all session variables
// Delete certain session
// session_destroy();
session_destroy(); //destroy the session
header("location:/index.php"); //to redirect back to "index.php" after logging out
exit();
