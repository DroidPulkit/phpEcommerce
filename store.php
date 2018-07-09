<!--Changing the Header of the page -->
<?php $PageTitle = "Amazing Mart - Store"; ?>

<?php require "header.php"; ?>
<?php require "database_connect.php"; ?>

<?php 

$sql = "SELECT * FROM store";

$result = mysqli_query($connection, $sql);

$data[] = array();

$markers = "";

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $data[] = array('id'=> $row['id'], 'name'=> $row['name'], 'address'=> $row['address'], 'lat'=> $row['lat'], 'lng'=> $row['lng']);

        $markers = json_encode($data);
    }
    
}

//echo $markers;


if(isset($_POST['apply'])){
    $cart = $_SESSION['cart'];
    foreach ($cart as $key => $value){
        //echo $key . " -> " . $value . "<br>";
        $productID = $key;

        $quantity = $value['quantity'];

        $sql = "INSERT INTO orders_products (order_id, product_id, quantity) VALUES ( 1, " . $productID . ", " . $quantity . ")";

        if(mysqli_query($connection, $sql)){
            //User registered
            echo ("<SCRIPT LANGUAGE='JavaScript'>window.alert('Succesfully Ordered'); window.location.href='index.php';</SCRIPT>");
            unset($_SESSION['cart']);
        } else {
            //Error
            echo mysqli_error($connection);
        }
    }
    
}


?>

<!-- ##### Single Product Details Area Start ##### -->
    <section class="single_product_details_area d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="storeMap" style="width:1000px;height:450px; margin-left:15%; margin-bottom:10%;"></div>
                </div>

                <div class="col-md-12">
                    <form method="post">
                        <h1> Select a store </h1>
                        <select class="w-100" id="country">
                            <option value="Store 1">Amazing Store 1</option>
                            <option value="Store 2">Amazing Store 2</option>
                            <option value="Store 3">Amazing Store 3</option>
                            <option value="Store 4">Amazing Store 4</option>
                            <option value="Store 5">Amazing Store 5</option>
                        </select>
                        <br>
                        <button name="button" type="button" class="btn essence-btn" data-toggle="modal" data-target="#myModal">Select</button>

                    </form>
                </div>
            </div>
        </div>
        
    </section>


    <div id="myModal" class="modal">
          <div class="modal-dialog">
            <div class="modal-content">
              <form action="store.php" method="post">
                <div class="modal-header">
                  <h4 class="modal-title">Payment details</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <div class="display-td">
                    <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                  </div></br>
                  <label style="font-size:20px">Full name (as on card)</label>
                  <input required type="text" name="cardName" class="form-control">
                  <label style="font-size:20px">Card Number*</label>
                  <input required type="number" min=0 name="cardNumber" class="form-control">
                  <div class="row">
                    <div class="col-sm-6 form-group">
                      <label style="font-size:20px">Expiry* (MM/YY)</label>
                    </div>
                    </div>
                    <div class="row">
                  <div class="form-group">
                      <select required name="expiryMonth" class="form-control" required>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <select required name="expiryYear" class="form-control" required>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                      </select>
                    </div>

                  </div>
                  <label style="font-size:20px">Security Code*</label>
                  <input required type="number" name="expiry" min="100" max="999" class="form-control" placeholder="CVC"></br>
                  <div class="modal-footer">
                    <button type="submit" name="apply" class="btn btn-primary" style="width:500px">Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>


    <script>
      var labels = ["1", "2", "3", "4", "5", " "];
       var labelIndex = 0;

      
        <?php echo "var markers= " . $markers; ?>
      

      function initmapsetup() {
        var latlng = new google.maps.LatLng( 43.70011, -79.4163); // default location
        var myOptions = {
          zoom: 10,
          center: latlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          mapTypeControl: true
        };

        var map = new google.maps.Map(document.getElementById('storeMap'),myOptions);
        var infowindow = new google.maps.InfoWindow(), marker, lat, lng;
        var json=markers;

        for( var i in json ){
          id =(json[i].id);
          lat = (json[i].lat);
          console.log(lat);
          lng = (json[i].lng);
          name = (json[i].name);
          address = (json[i].address);

          marker = new google.maps.Marker({
            position: new google.maps.LatLng(lat,lng),
            label: {text:labels[labelIndex++ % labels.length], color: "white", fontWeight: "bold", fontSize: "16px"},
            id:id,
            name:name,
            address:address,
            map: map
          });

          var myPin2 = new google.maps.MarkerImage('img/core-img/pinstore.png');
          if(marker.id == 6){
           marker.setIcon(myPin2);
          }
          google.maps.event.addListener( marker, 'click', function(e){
            infowindow.setContent(this.name + "<br/>"+this.address );
            infowindow.open( map, this );
          }.bind( marker ) );
        }

        if (navigator.geolocation) {
          console.log('Geolocation is supported!');
          navigator.geolocation.getCurrentPosition(function(position){
                json['5'].lat = position.coords.latitude;
                json['5'].lng = position.coords.longitude;

          console.log(json);


          });
                // infoWindow.setPosition(currentLocation);
        }
        else {
          console.log('Geolocation is not supported for this Browser/OS.');
        }
        console.log(json);
      }
    </script>



    <?php

    function customPageFooter(){?>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZgMoAWs12puxRwY8embBTiK-V6dg_5Rw&libraries=places&callback=initmapsetup"
        async defer></script>

    <?php } ?>


<?php require "footer.php"; ?>