<?php
//login
error_reporting(E_ALL);
ini_set('display_errors', 1);
//TODO
// if sumbit
// check username and password
// incase of true ==> redirect to account.php
// incase of false ==> show error username and password


require './boot.php';
$error = "";
if (!empty($_POST))
{
    // $_POST['username'] $_POST['password']
    if (!isset($_POST['username']) || !$_POST['username'])
    {
//error
//        die('No Username');
        $error .= "No Username given<br>";
    }

    if (!isset($_POST['password']) || !$_POST['password'])
    {
//error
//        die('No Password');
        $error .= "No Password given<br>";
    }

    //Success $_POST['username'] $_POST['password']
    if ($error == "")
    {
        $loggedIn    = false;
        $usersObject = new Users($conn);
        $database    = $usersObject->getUsers();
         
        
       // dd($database);
        
        foreach ($database as $user)
        {
           // dd($user);
           
//           var_dump($user->username);
//                      echo '<br/>';
//           var_dump($_POST['username']);
//           echo '<br/>';
//             var_dump($user->password);
//             echo '<br/>';
//           var_dump($_POST['password']);      
//           echo '<br/>';
           
            if ($user->username == $_POST['username'] && $user->password == $_POST['password'])
            {
                
                //var_dump($user);die();
                //true login
                session_start();
                $_SESSION['user'] = $user;
                $_SESSION['userId'] = $user->id;
                $loggedIn         = true;
                break;
            }
        }
                
        if ($loggedIn)
        {
            
            //acount.php
            header('Location: account.php');
            exit;
        }
        else
        {
            //error
            $error .= "Erorr username and password";
        }
    }
}
?>
<style>
    .error{
        color: red;
    }
</style>
<h1>Please Login to your account</h1>
<div class="error">
    <?php echo $error ?>
</div>
<form method="post" >
    <input name="username" required type="text" />
    <br/>
    <br/>
    <input name="password" required type="password" />
    <br/>
    <br/>
    <button id="subbtn"type="submit">Login</button>
</form>