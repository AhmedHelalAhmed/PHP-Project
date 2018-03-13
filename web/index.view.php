<html>
    <head>
        <title>Shopping App</title>
        <link type="text/css" rel="stylesheet" href="./css/mystyle.css"/>
        <link type="text/css" rel="stylesheet" href="./css/autocompletestyle.css">
    </head>
    <body>
        <?php
        if (isset($_GET['category']))
        {
            $cat = intval(htmlspecialchars($_GET['category'])); //flag for the category this must be here because it will change through search later
        }

//dd($cat);
        ?>

        <header>
            <input type="text" placeholder="Search for product" id="searchProduct"/>
            <?php if (!isset($_SESSION['userId']) || !$_SESSION['userId']): ?>
                <a href="login.php">Login</a>
                <a href="register.php">Register</a>
            <?php else: ?>
                <a href="account.php">Account</a>
                <a href="editprofile.php">Edit Account</a>
                <a href="logout.php">Logout</a>
                <span class="cart"><a href="/checkout.php">Check out</a> <span id="cartcount"></span></span>

            <?php endif; ?>

        </header>




        <ul>
            <li>
                <?php
//                $url              = $_SERVER['PHP_SELF'];
//                echo"<a href = {$url}>All</a>";
                $url              = htmlspecialchars($_SERVER['PHP_SELF']) . "?category=0";
                echo"<a href = {$url}>All</a>";
                ?>
            </li>

            <?php
            $categoriesobject = new Categories($conn);
            $categories       = $categoriesobject->getCategories();
            ?>
            <?php foreach ($categories as $category): ?>
                <li>
                    <?php
                    $url = htmlspecialchars($_SERVER['PHP_SELF']) . "?category={$category->getId()}";
                    echo"<a href = {$url}>" . ucfirst($category->getName()) . "</a>";
                    ?>

                </li>
                <?php //var_dump(cat); ?>
            <?php endforeach; ?>

        </ul>



        <?php
        if (!isset($cat))
        {
            $products    = new Products($conn);
            $productsObj = $products->getProducts();
        }
        else if ($cat == 0)
        {
            $products    = new Products($conn);
            $productsObj = $products->getProducts();
        }
        else
        {
            //     dd($cat);
            //dd($conn);
            // $category    = new Category($conn);
            $productsObj = $category::getProducts($conn, $cat);
        }
        $row = 0;
        ?>
        <?php foreach ($productsObj as $product): ?>
            <?php $row++ ?>
            <?php
            require './product.view.php';
            ?>
            <?php if ($row % ITEM_PER_ROW == 0): ?>
                <?= '<br/>' ?>
            <?php endif ?>
        <?php endforeach; ?>


        <!--v-->

        <script src="./js/jquery-1.12.4.js"></script>
        <script src="./js/jquery-ui.js"></script>
<!--        <script src="js/jquery-3.1.0.min.js"></script>-->
        <script src="js/myscript.js"></script>


    </body>
</html>