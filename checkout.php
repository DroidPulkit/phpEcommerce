<!--Changing the Header of the page -->
<?php $PageTitle = "Amazing Mart - Checkout"; ?>

<?php require "header.php"; ?>
<?php require "database_connect.php"; ?>

<?php 

if (isset($_POST["submit"])) {

    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';

    $_SESSION['checkout']['email'] = $email;
    $_SESSION['checkout']['address'] = $address;

    header("Location: store.php");
    exit;
    
}




?>

<!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area section-padding-80">
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-6">
                    <div class="checkout_details_area mt-50 clearfix">

                        <div class="cart-page-heading mb-30">
                            <h5>Customer Details</h5>
                        </div>

                        <!-- <form action="checkout.php" method="post">
                            <div class="row">

                                <div class="col-12 mb-4">
                                    <label for="email_address">Email Address <span>*</span></label>
                                    <input type="email" class="form-control" id="email_address" value="" required>
                                </div>

                                <div class="col-12 mb-3">
                                    <label for="street_address">Address <span>*</span></label>
                                    <input type="text" class="form-control mb-3" id="autocomplete" value="" required>
                                </div>

                                <div class="col-12 mb-3">
                                    <input type="submit" class="btn essence-btn" name="Submit" value="Submit">
                                </div>

                            </div>
                        </form> -->

                        <?php 

                        $totalCost = 0;

                        //$cart = $_SESSION['cart'];
                            if(isset($_SESSION['cart'])) {

                                //Products are in the cart

                                $cart = $_SESSION['cart'];

                                foreach ($cart as $key => $value){
                                    //echo $key . " -> " . $value . "<br>";
                                    $productID = $key;

                                    $costOfProduct = floatval($value['price']) * floatval($value['quantity']);

                                    $totalCost += $costOfProduct;
                                }

                            } else {
                                //No product in cart

                            }

                            $discount = 0;

                            //This is used to check if the user is logged in or not.
                            if (isset($_SESSION['user'])) {
                                //Yeah logged in :), so check the discount

                                $user = $_SESSION['user'];
                                $sql = "SELECT * FROM user WHERE email = '" . $user . "'";

                                //echo $sql;

                                $address = "";

                                $result = mysqli_query($connection, $sql);

                                $sum = 0;
                                    // output data of each row
                                while($row = mysqli_fetch_assoc($result)) 
                                {
                                    $sum = floatval($row["sum"]);
                                    $address = $row['address'];
                                }

                                $onePercent = $sum / 100;
                                $fifteenPercent = 15 * ($totalCost / 100);
                                if ($onePercent < $fifteenPercent) {
                                    $discount = $onePercent;
                                } else {
                                    $discount = $fifteenPercent;
                                }


                                //Add the form below

                                echo '<form action="checkout.php" method="post">
                                        <div class="row">

                                            <div class="col-12 mb-4">
                                                <label for="email_address">Email Address <span>*</span></label>
                                                <input type="email" class="form-control" id="email_address" name="email" value="'. $user .'" required readonly>
                                            </div>

                                            <div class="col-12 mb-3">
                                                <label for="street_address">Address <span>*</span></label>
                                                <input type="text" class="form-control mb-3" id="autocomplete" name="address" value="' . $address . '" required readonly>
                                            </div>

                                            <div class="col-12 mb-3">
                                                <input type="submit" class="btn essence-btn" name="submit" value="Submit">
                                            </div>

                                        </div>
                                    </form>';

                            } else {
                                //No it's a guest user
                                //Add form below

                                echo '<form action="checkout.php" method="post">
                                        <div class="row">

                                            <div class="col-12 mb-4">
                                                <label for="email_address">Email Address <span>*</span></label>
                                                <input type="email" class="form-control" id="email_address" value="" required>
                                            </div>

                                            <div class="col-12 mb-3">
                                                <label for="street_address">Address <span>*</span></label>
                                                <input type="text" class="form-control mb-3" id="autocomplete" value="" required>
                                            </div>

                                            <div class="col-12 mb-3">
                                                <input type="submit" class="btn essence-btn" name="submit" value="Submit">
                                            </div>

                                        </div>
                                    </form>';



                            }

                            $finalTotal = $totalCost - $discount;
                        ?>

                        <?php /*
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th scope="col">Product</th>
                              <th scope="col">Price</th>
                              <th scope="col">Quantity</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>Mark</td>
                              <td>Otto</td>
                              <td>@mdo</td>
                            </tr>
                            <tr>
                              <td>Jacob</td>
                              <td>Thornton</td>
                              <td>@fat</td>
                            </tr>
                            <tr>
                              <td colspan="2">Larry the Bird</td>
                              <td>@twitter</td>
                            </tr>
                          </tbody>
                        </table>

                        */ ?>

                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                    <div class="order-details-confirmation">

                        <div class="cart-page-heading">
                            <h5>Cart summary</h5>
                        </div>

                        <ul class="order-details-form mb-4">
                            <li><span>Product</span> <span>Total</span></li>

                            <?php

                                if(isset($_SESSION['cart'])) {

                                $cart = $_SESSION['cart'];

                                foreach ($cart as $key => $value){
                                    $productID = $key;

                                    $quantity = floatval($value['quantity']);
                                    $price = floatval($value['price']);

                                    $cost = $quantity * $price;

                                    $title = $value['title'];

                                    $out = strlen($title) > 35 ? substr($title,0,35)."..." : $title;

                                    echo "<li><span>" . $out . "</span> <span>" . $cost . "</span></li>";

                                }

                            } else {
                                //No product in cart

                            }

                            ?>
                            <li><span>Subtotal</span> <span>$<?php echo $totalCost; ?></span></li>
                            <li><span>Discount *</span> <span>$<?php echo $discount; ?></span></li>
                            <!-- <li><span>Shipping</span> <span>$0</span></li> -->
                            <li><span>Total</span> <span>$<?php echo $finalTotal; ?></span></li>
                        </ul>

                        <p> * This depends on the past orders. Login or register to get the benifits. </p>
                        <!-- <p> ** Orders are limited to 10 </p> -->

                        <!-- <a href="#" class="btn essence-btn">Place Order</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->

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