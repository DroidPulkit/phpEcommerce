<!--Changing the Header of the page -->
<?php $PageTitle = "Amazing Mart - Shop"; ?>

<?php require "header.php"; ?>
<?php require "database_connect.php" ?>
<?php 

$sql = "SELECT COUNT(id) AS 'COUNT' FROM `product` WHERE `category_id` = 2";
$result = mysqli_query($connection, $sql);

$noOfClothes = 0;

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $noOfClothes = $row["COUNT"];
    }
} else {
    $noOfClothes = 0;
}

$sqlForProducts = "SELECT * FROM `product` WHERE `category_id` = 2";
$resultForProducts = mysqli_query($connection, $sqlForProducts);

?>

    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Shoes</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Shop Grid Area Start ##### -->
    <section class="shop_grid_area section-padding-80">
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-8 col-lg-9">
                    <div class="shop_grid_product_area">
                        <div class="row">
                            <div class="col-12">
                                <div class="product-topbar d-flex align-items-center justify-content-between">
                                    <!-- Total Products -->
                                    <div class="total-products">
                                        <p><span><?php echo $noOfClothes; ?></span> products found</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <?php 

                                if (mysqli_num_rows($resultForProducts) > 0) {
                                    while ($row = mysqli_fetch_assoc($resultForProducts)) {
                                        $data1 = '<div class="col-12 col-sm-6 col-lg-4"><div class="single-product-wrapper"><!-- Product Image --><div class="product-img"><img src="img/products/shoes/';
                                        $pictures = $row['picture'];
                                        $picture = explode(", ", $pictures);
                                        $data2 = $picture[0];
                                        $product_id = $row["id"];
                                        $data3 = '.jpg" alt=""></div><!-- Product Description --><div class="product-description"><a href="view.php?category_id=2&product_id=' . $product_id . '"><h6>';
                                        $data4 = $row["name"];
                                        $data5 = '</h6></a><p class="product-price">';
                                        $data6 = '$'. $row["price"];
                                        $data7 = '</p></div></div></div>';
                                        echo $data1 . $data2 . $data3 . $data4 . $data5 . $data6 . $data7;
                                    }
                                }

                            ?>
                            <?php 
                            //Single product commenting out
                            /*
                            <!-- Single Product -->
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="single-product-wrapper">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        <img src="img/product-img/product-1.jpg" alt="">
                                    </div>

                                    <!-- Product Description -->
                                    <div class="product-description">
                                        <a href="single-product-details.html">
                                            <h6>Knot Front Mini Dress</h6>
                                        </a>
                                        <p class="product-price">$55.00</p>

                                        <!-- Hover Content -->
                                        <div class="hover-content">
                                            <!-- Add to Cart -->
                                            <div class="add-to-cart-btn">
                                                <a href="#" class="btn essence-btn">Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Product Ends-->
                            */ ?>
                            

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Shop Grid Area End ##### -->
<?php require "footer.php"; ?>