<!--Changing the Header of the page -->
<?php $PageTitle = "Amazing Mart - Cart"; ?>

<?php 
//This is to remove the spinner in the input number
function customPageHeader() { ?>
<style>
    input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button 
    { 
        -webkit-appearance: none; 
        margin: 0; 
    }
</style>
<?php } ?>

<?php require "header.php"; ?>
<?php require "database_connect.php"; ?>

<!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area section-padding-80">
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-6">
                    <div class="checkout_details_area mt-50 clearfix">

                        <div class="cart-page-heading mb-30">
                            <h5>Cart</h5>
                        </div>

                        <?php 

                        $totalCost = 0;

                        //$cart = $_SESSION['cart'];
                            if(isset($_SESSION['cart'])) {

                                echo '<table class="table table-hover">
                                          <thead>
                                            <tr>
                                              <th scope="col">Product</th>
                                              <th scope="col">Price</th>
                                              <th scope="col">Quantity**</th>
                                            </tr>
                                          </thead>
                                          <tbody>';

                                $cart = $_SESSION['cart'];

                                foreach ($cart as $key => $value){
                                    //echo $key . " -> " . $value . "<br>";
                                    $productID = $key;
                                    echo "<tr>";
                                    echo '<td><a href="' . 'view.php?category_id=' . $value['categoryID'] . '&product_id=' . $key . '"</a>'. $value['title'] . '</td>';
                                    echo '<td>'. $value['price'] . '</td>';
                                    //echo '<td> <input type="number" min=0 name="quantity" value="'. $value['quantity'] . '"> </td>';

                                    $quantity = $value['quantity'];
                                    echo "<td>";
                                    echo '<select name="quantity">';
                                    /*
                                    echo '<option value="1" if($quantity == "1"){ echo " selected=\"selected\" "; } else { echo " "; } >1</option>';
                                    echo '<option value="2" if($quantity == "2"){ echo " selected=\"selected\" "; } else { echo " "; } >2</option>';
                                    echo '<option value="3" if($quantity == "3"){ echo " selected=\"selected\" "; } else { echo " "; } >3</option>';
                                    echo '<option value="4" if($quantity == "4"){ echo " selected=\"selected\" "; } else { echo " "; } >4</option>';
                                    echo '<option value="5" if($quantity == "5"){ echo " selected=\"selected\" "; } else { echo " "; } >5</option>';
                                    echo '<option value="6" if($quantity == "6"){ echo " selected=\"selected\" "; } else { echo " "; } >6</option>';
                                    echo '<option value="7" ';

                                    if($quantity == "7"){ 
                                        echo 'selected="selected" '; 
                                    } 

                                    echo '>7</option>';
                                    echo '<option value="8" if($quantity == "8"){ echo " selected=\"selected\" "; } else { echo " "; } >8</option>';
                                    echo '<option value="9" if($quantity == "9"){ echo " selected=\"selected\" "; } else { echo " "; } >9</option>';
                                    echo '<option value="10" if($quantity == "10"){ echo " selected=\"selected\" "; } else { echo " "; } >10</option>';
                                    */
                                    //-----------------------------------------------
                                    echo '<option value="1" ';

                                    if($quantity == "1"){ 
                                        echo 'selected="selected" '; 
                                    } 

                                    echo '>1</option>';

                                    //-----------------------------------------------
                                    echo '<option value="2" ';

                                    if($quantity == "2"){ 
                                        echo 'selected="selected" '; 
                                    } 

                                    echo '>2</option>';

                                    //-----------------------------------------------
                                    echo '<option value="3" ';

                                    if($quantity == "3"){ 
                                        echo 'selected="selected" '; 
                                    } 

                                    echo '>3</option>';

                                    //-----------------------------------------------
                                    echo '<option value="4" ';

                                    if($quantity == "4"){ 
                                        echo 'selected="selected" '; 
                                    } 

                                    echo '>4</option>';

                                    //-----------------------------------------------
                                    echo '<option value="5" ';

                                    if($quantity == "5"){ 
                                        echo 'selected="selected" '; 
                                    } 

                                    echo '>5</option>';

                                    //-----------------------------------------------
                                    echo '<option value="6" ';

                                    if($quantity == "6"){ 
                                        echo 'selected="selected" '; 
                                    } 

                                    echo '>6</option>';

                                    //-----------------------------------------------
                                    echo '<option value="7" ';

                                    if($quantity == "7"){ 
                                        echo 'selected="selected" '; 
                                    } 

                                    echo '>7</option>';

                                    //-----------------------------------------------
                                    echo '<option value="8" ';

                                    if($quantity == "8"){ 
                                        echo 'selected="selected" '; 
                                    } 

                                    echo '>8</option>';

                                    //-----------------------------------------------
                                    echo '<option value="9" ';

                                    if($quantity == "9"){ 
                                        echo 'selected="selected" '; 
                                    } 

                                    echo '>9</option>';

                                    //-----------------------------------------------
                                    echo '<option value="10" ';

                                    if($quantity == "10"){ 
                                        echo 'selected="selected" '; 
                                    } 

                                    echo '>10</option>';



                                    echo '</select>';
                                    echo "</td>";
                                    echo "<td><input class='btn btn-primary' type='button' name='update' value='Update'></td>";
                                    echo "</tr>";

                                    $costOfProduct = floatval($value['price']) * floatval($value['quantity']);

                                    $totalCost += $costOfProduct;
                                }

                                echo "</tbody>
                                </table>";


                            } else {
                                //No product in cart

                            }

                            $discount = 0;

                            //This is used to check if the user is logged in or not.
                            if (isset($_SESSION['user'])) {
                                //Yeah logged in :)

                                $user = $_SESSION['user'];
                                $sql = "SELECT * FROM user WHERE email = '" . $user . "'";

                                //echo $sql;

                                $result = mysqli_query($connection, $sql);

                                $sum = 0;
                                    // output data of each row
                                while($row = mysqli_fetch_assoc($result)) 
                                {
                                    $sum = floatval($row["sum"]);
                                }

                                $onePercent = $sum / 100;
                                $fifteenPercent = 15 * ($totalCost / 100);
                                if ($onePercent < $fifteenPercent) {
                                    $discount = $onePercent;
                                } else {
                                    $discount = $fifteenPercent;
                                }

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
                            <li><span>Subtotal</span> <span>$<?php echo $totalCost; ?></span></li>
                            <li><span>Discount *</span> <span>$<?php echo $discount; ?></span></li>
                            <!-- <li><span>Shipping</span> <span>$0</span></li> -->
                            <li><span>Total</span> <span>$<?php echo $finalTotal; ?></span></li>
                        </ul>

                        <p> * This depends on the past orders. Login or register to get the benifits. </p>
                        <p> ** Orders are limited to 10 </p>

                        <a href="checkout.php" class="btn essence-btn">Place Order</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->

<?php require "footer.php"; ?>