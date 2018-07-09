<?php $PageTitle = "Amazing Mart - Shop"; ?>

<?php require "header.php"; ?>
<?php require "database_connect.php"; ?>
<?php 

$category_id = isset($_GET["category_id"]) ? $_GET["category_id"] : '';
$product_id = isset($_GET["product_id"]) ? $_GET["product_id"] : '';
if($category_id == '' || $product_id == ''){
    header('Location: index.php');
}

$sql_category = "SELECT name FROM category WHERE id = " . $category_id;

$result_category = mysqli_query($connection, $sql_category);

$category_name = '';

if (mysqli_num_rows($result_category) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result_category)) {
        $category_name = $row["name"];
    }
} else {
    $category_name = '';
}

$categoryForPics = "";

if ($category_name == "clothing") {
    $categoryForPics = "clothes";
}

if ($category_name == "Shoes") {
    $categoryForPics = "shoes";
}

if ($category_name == "accessories") {
    $categoryForPics = "accessories";
}

$sql_product = "SELECT * FROM product WHERE id = " . $product_id;

//echo $sql_product;

$result_product = mysqli_query($connection, $sql_product);

$product_name = '';
$product_price= '';
$product_desc = '';
$product_picture = '';

if (mysqli_num_rows($result_product) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result_product)) {
        $product_name = $row["name"];
        $product_price = $row["price"];
        $product_desc = $row["description"];
        $product_picture = $row["picture"];
    }
} else {
    $product_name = '';
    $product_price = '';
    $product_desc = '';
    $product_picture = '';
}

$product_pics = explode(", ", $product_picture);

//Add to cart function, this ensures that the cart is updated

if(isset($_GET['action']) && $_GET['action']=="addtocart"){ 
    $id=intval($_GET['id']); 
      
    if(isset($_SESSION['cart'][$id])){ 
        $_SESSION['cart'][$id]['quantity']++; 
        echo "<script type='text/javascript'>alert('Product added to cart.');</script>";

    }else{ 
        $sql_s = "SELECT * FROM product WHERE id={$id}"; 
        $query_s = mysqli_query($connection, $sql_s); 
        if(mysqli_num_rows($query_s)!=0){ 
            $row_s = mysqli_fetch_array($query_s); 
              
            $_SESSION['cart'][$row_s['id']]=array( 
                    "quantity" => 1, 
                    "price" => $row_s['price'],
                    "title" => $row_s['name'],
                    "categoryID" => $row_s['category_id']
                );
            echo "<script type='text/javascript'>alert('Product added to cart.');</script>";
        }else{ 
              
            $message="This product id it's invalid!"; 
              
        } 
          
    }

    // $quantity = $_SESSION['cart'][$product_id]['quantity'];
    // echo $quantity; 
      
}

?>


    <!-- ##### Single Product Details Area Start ##### -->
    <section class="single_product_details_area d-flex align-items-center">

        <!-- Single Product Thumb -->
        <div class="single_product_thumb clearfix">
            <div class="product_thumbnail_slides owl-carousel">
                <img src="img/products/<?php echo $categoryForPics ?>/<?php echo $product_pics[0]; ?>.jpg" alt="">
                <img src="img/products/<?php echo $categoryForPics ?>/<?php echo $product_pics[1]; ?>.jpg" alt="">
            </div>
        </div>

        <!-- Single Product Description -->
        <div class="single_product_desc clearfix">
            <span><?php echo $category_name; ?></span>
            <a href="#">
                <h2><?php echo $product_name; ?></h2>
            </a>
            <p class="product-price">$<?php echo $product_price; ?></p>
            <p class="product-desc">
                <ul>
                    <?php echo $product_desc; ?>
                </ul>
            </p>

            <!-- Form -->
            <form class="cart-form clearfix" method="post">
                <!-- Cart-->
                <div class="cart-fav-box d-flex align-items-center">
                    <!-- Cart -->
                    <?php $url = "view.php?category_id=" . $category_id . "&product_id=" . $product_id . "&action=addtocart&id=" . $product_id; ?>
                    <a href="<?php echo $url; ?>"><button type="button" name="addtocart" value="5" class="btn essence-btn">Add to cart</button></a>
                </div>
            </form>
        </div>
    </section>
    <!-- ##### Single Product Details Area End ##### -->

<?php require "footer.php"; ?>