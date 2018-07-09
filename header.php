<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title><?= isset($PageTitle) ? $PageTitle : "Amazing Mart" ?></title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

    <?php 
    if (function_exists('customPageHeader')){
        customPageHeader();
    }
    ?>

</head>

<body>
    <!-- ##### Header Area Start ##### -->
    <header class="header_area">
        <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
            <!-- Classy Menu -->
            <nav class="classy-navbar" id="essenceNav">
                <!-- Logo -->
                <a class="nav-brand" href="index.php">Amazing Mart</a>
                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>
                <!-- Menu -->
                <div class="classy-menu">
                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>
                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li><a href="#">Shop</a>
                                <ul class="dropdown">
                                    <li><a href="clothing.php">Clothing</a></li>
                                    <li><a href="shoes.php">Shoes</a></li>
                                    <li><a href="accessories.php">Accessories</a></li>
                                </ul>
                            </li>
                            <li><a href="customerservice.php">Contact</a></li>
                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>

            <!-- Header Meta Data -->
            <div class="header-meta d-flex clearfix justify-content-end">
                <?php
                    session_start(); 
                    if (isset($_SESSION['user'])) {
                        //User is logged in
                        echo '<!-- User Login Info -->
                        <div class="user-login-info">
                            <a href="logout.php"><img src="img/core-img/logout.png" alt="Logout"></a>
                        </div>';
                    } else {
                        //User is not logged in
                        echo '<!-- User Login Info -->
                        <div class="user-login-info">
                            <a href="login.php"><img src="img/core-img/user.svg" alt="Login"></a>
                        </div>';
                    }
                ?>
                <!-- Cart Area -->
                <div class="cart-area">
                    <a href="cart.php" id="essenceCartBtn"><img src="img/core-img/bag.svg" alt=""> <span><!--Enter the amount of items in cart --></span></a>
                </div>
            </div>

        </div>
    </header>
    <!-- ##### Header Area End ##### -->