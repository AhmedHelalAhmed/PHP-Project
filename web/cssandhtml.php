<html>
    <head>
        <title>Shopping App</title>
        <link type="text/css" rel="stylesheet" href="./css/mystyle.css"/>
        <link type="text/css" rel="stylesheet" href="./css/autocompletestyle.css">
    </head>
    <body>

        <header>
            <input type="text" placeholder="Search for product" id="searchProduct"/>
            <?php if (!isset($_SESSION['userId']) || !$_SESSION['userId']): ?>
                <a href="login.php">Login</a>
                <a href="register.php">Register</a>
            <?php else: ?>
                <a href="account.php">Account</a>
                <a href="editprofile.php">Edit Account</a>
                <a href = "index.php">home</a> 
                <?php if ($_SESSION['userId']==1): ?>
                <a href = "addproduct.php">Add product</a> 
                <?php endif; ?>
                <a href = "logout.php">Logout</a> 
            <?php endif; ?>

         
                <span class="cart"><a href="/checkout.php">Check out</a> <span id="cartcount"></span></span>
        </header>

        <!--v-->

        <script src="js/jquery-1.12.4.js"></script>
        <script src="js/jquery-ui.js"></script>
<!--        <script src="js/jquery-3.1.0.min.js"></script>-->
        <script src="js/myscript.js"></script>


    </body>
</html>