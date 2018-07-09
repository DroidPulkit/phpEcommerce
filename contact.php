<!--Changing the Header of the page -->
<?php $PageTitle = "Amazing Mart - Homepage"; ?>

<?php require "header.php"; ?>

    <div class="contact-area d-flex align-items-center">

        <div class="google-map">
            <div id="googleMap"></div>
        </div>

        <div class="contact-info">
            <h2>How to Find Us</h2>
            <p>Mauris viverra cursus ante laoreet eleifend. Donec vel fringilla ante. Aenean finibus velit id urna vehicula, nec maximus est sollicitudin.</p>

            <div class="contact-address mt-50">
                <p><span>address:</span> 10 Suffolk st Soho, London, UK</p>
                <p><span>telephone:</span> +12 34 567 890</p>
                <p><a href="mailto:contact@essence.com">contact@essence.com</a></p>
            </div>
        </div>

    </div>

    <?php

    function customPageFooter(){?>
    <!--Arbitrary HTML Tags-->
    <!-- Google Maps -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwuyLRa1uKNtbgx6xAJVmWy-zADgegA2s"></script>
    <script src="js/map-active.js"></script>

    <?php } ?>

<?php require "footer.php"; ?>