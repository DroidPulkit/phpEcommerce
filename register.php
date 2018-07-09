<!--Changing the Header of the page -->
<?php $PageTitle = "Amazing Mart - Register"; ?>

<?php require "header.php"; ?>
<?php require "database_connect.php"; ?>
<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="page-title text-center">
                    <h2>Register</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcumb Area End ##### -->

<?php

if (isset($_POST["submit"])) {

    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $dob = isset($_POST['dob']) ? $_POST['dob'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    //echo "Name : $name , Phone : $phone , Gender : $gender , Address : $address , DOB : $dob , Email : $email , Password : $password";

    $sql = "INSERT INTO user (email, password, name, phone, gender, dob, address) VALUES ('$email', '$password', '$name', '$phone', '$gender', '$dob', '$address')";

    if(mysqli_query($connection, $sql)){
        //User registered
        echo ("<SCRIPT LANGUAGE='JavaScript'>window.alert('Succesfully Registered'); window.location.href='index.php';</SCRIPT>");
    } else {
        //Error
        echo mysqli_error($connection);
    }
    
}

?>

    <div class="login-area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="checkout_details_area mt-50 clearfix">

                        <div class="cart-page-heading mb-30">
                            <h5>Register</h5>
                        </div>

                        <form action="register.php" method="post">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="name">Name <span>*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>

                                <div class="col-12 mb-3">
                                    <label for="phone_number">Phone No <span>*</span></label>
                                    <input type="number" class="form-control" id="phone_number" name="phone" min="0" required>
                                </div>

                                <div class="col-12 mb-3">
                                    <label for="gender">Gender <span>*</span></label>
                                    <select class="w-100" id="gender" name="gender">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>

                                <div class="col-12 mb-3">
                                    <label for="autocomplete">Address <span>*</span></label>
                                    <input type="address" class="form-control mb-3" id="autocomplete" name="address" required>
                                </div>

                                <div class="col-12 mb-3">
                                    <label for="dob">Date of birth <span>*</span></label>
                                    <input type="date" name="dob"> class="form-control mb-3" id="dob" max=<?php echo date('Y-m-d');?> required>
                                </div>

                                <div class="col-12 mb-4">
                                    <label for="email_address">Email Address <span>*</span></label>
                                    <input type="email" name="email" class="form-control" id="email_address" required>
                                </div>

                                <div class="col-12 mb-4">
                                    <label for="password">Password <span>*</span></label>
                                    <input type="password" name="password" class="form-control" id="password" required>
                                </div>

                                <div class="col-12">
                                    <button name="submit" type="submit" class="btn essence-btn">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php

    function customPageFooter(){?>
    
    <script>

      var autocomplete;

      function initAutocomplete() {
        autocomplete = new google.maps.places.Autocomplete((document.getElementById('autocomplete')),{types: ['geocode']});

        autocomplete.addListener('place_changed', document.getElementById('autocomplete'));
      }


    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZgMoAWs12puxRwY8embBTiK-V6dg_5Rw&libraries=places&callback=initAutocomplete"
        async defer></script>

    <?php } ?>

<?php require "footer.php"; ?>