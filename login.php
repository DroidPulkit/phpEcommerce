<!--Changing the Header of the page -->
<?php $PageTitle = "Amazing Mart - Login"; ?>

<?php require "header.php"; ?>
<?php require "database_connect.php"; ?>
<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="page-title text-center">
                    <h2>Login</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcumb Area End ##### -->

<?php

if (isset($_POST["submit"])) {

    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";

    $result = mysqli_query($connection, $sql);

    $rows = mysqli_num_rows($result);
    if($rows==1){
        $_SESSION['user'] = $email;
        // Redirect user to index.php
        header("Location: index.php");
    }else{
        echo ("<SCRIPT LANGUAGE='JavaScript'>window.alert('Username or Password incorrect');</SCRIPT>");
    }
    
}

?>

    <div class="login-area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="checkout_details_area mt-50 clearfix">

                        <div class="cart-page-heading mb-30">
                            <h5>Billing Address</h5>
                        </div>

                        <form action="login.php" method="post">
                            <div class="row">
                                
                                <div class="col-12 mb-4">
                                    <label for="email_address">Email Address <span>*</span></label>
                                    <input type="email" class="form-control" id="email_address" name="email" required>
                                </div>

                                <div class="col-12 mb-4">
                                    <label for="password">Password <span>*</span></label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>

                                <div class="col-12 mb-4">
                                    <button name="submit" type="submit" class="btn essence-btn">Login</button>
                                </div>

                                <div class="col-12 mb-4">
                                    <div>Not registered? <a href="register.php">Create an account</a></div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

<?php require "footer.php"; ?>