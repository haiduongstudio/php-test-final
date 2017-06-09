<?php
require 'view/layout/header.php';
?>
    <section id="index-section">
        <div class="container">
            <?php
            require 'view/layout/sidebar.php';
            ?>
            <div class="header-left col-md-6">
                <h2>Shopping cart</h2>
                <p>120 - Nguyễn Trãi - Thanh Xuân - Hà Nội</p>
                <p>Tel: 01649732758</p>
            </div>
            <div class="col-md-9">
                <script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script>
                <div style='overflow:hidden;height:440px;width:700px;'>
                    <div id='gmap_canvas' style='height:440px;width:700px;'></div>
                    <style>#gmap_canvas img {
                            max-width: none !important;
                            background: none !important
                        }</style>
                </div>
                <script type='text/javascript'>function init_map() {
                        var myOptions = {
                            zoom: 14,
                            center: new google.maps.LatLng(21.000083, 105.816861),
                            mapTypeId: google.maps.MapTypeId.ROADMAP
                        };
                        map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
                        marker = new google.maps.Marker({
                            map: map,
                            position: new google.maps.LatLng(21.000083, 105.816861)
                        });
                        infowindow = new google.maps.InfoWindow({content: '<strong>Cửa hàng Nuce Shop</strong><br>120 Nguyễn Trãi Thanh Xuân<br>'});
                        google.maps.event.addListener(marker, 'click', function () {
                            infowindow.open(map, marker);
                        });
                        infowindow.open(map, marker);
                    }
                    google.maps.event.addDomListener(window, 'load', init_map);</script>
            </div>
        </div>
    </section>
    <!-- ---------------- END SECTION --------------------- -->
<?php
require 'view/layout/footer.php';
?>