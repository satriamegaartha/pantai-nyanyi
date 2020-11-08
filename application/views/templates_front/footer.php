 
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    
                    <p>Copyright &copy; 2020 All right reserved</p>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?= base_url('assets_front/'); ?>assets/js/jquery.min.js"></script>
    <script src="<?= base_url('assets_front/'); ?>bootstrap/js/bootstrap.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.0.4/js/bootstrap-scrollspy.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?= base_url('assets_front/'); ?>assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="http://masonry.desandro.com/masonry.pkgd.js"></script>
    <script src="<?= base_url('assets_front/'); ?>assets/js/masonry.js"></script>
    <script src="<?= base_url('assets_front/'); ?>assets/js/pushy.min.js"></script>
    <script src="<?= base_url('assets_front/'); ?>assets/js/jquery.magnific-popup.min.js"></script>
    <script src="<?= base_url('assets_front/'); ?>assets/js/wow.min.js"></script>
    <script src="<?= base_url('assets_front/'); ?>assets/js/scripts.js"></script>
    <script src="<?= base_url('assets_front/'); ?>assets/js/odometer.js"></script>
</body>

</html>

<script>
    (function(i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function() {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-34344036-1', 'auto');
    ga('send', 'pageview');
</script>





<!-- Menyisipkan library Google Maps -->
<script src="http://maps.googleapis.com/maps/api/js"></script>

<script>
    // fungsi initialize untuk mempersiapkan peta
    function initialize() {
        var propertiPeta = {
            // center: new google.maps.LatLng(-8.491532, 115.274563),
            center: new google.maps.LatLng(<?= floatval($lokasi['latitude']) ?>, <?= floatval($lokasi['longitude']) ?>),
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
    }

    // event jendela di-load  
    google.maps.event.addDomListener(window, 'load', initialize);
</script>


<script src="http://maps.googleapis.com/maps/api/js"></script>
<script type="text/javascript">
    // var locations = [
    //     ['Bondi Beach', -33.890542, 151.274856, 4],
    //     ['Coogee Beach', -33.923036, 151.259052, 5],
    //     ['Cronulla Beach', -34.028249, 151.157507, 3],
    //     ['Manly Beach', -33.80010128657071, 151.28747820854187, 2],
    //     ['Maroubra Beach', -33.950198, 151.259302, 1]
    // ];

    var locations = <?php echo $locations ?>;

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 15,
        center: new google.maps.LatLng(-8.6316298, 115.095988),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });
    // var map = new google.maps.Map(document.getElementById('map'), {
    //     zoom: 10,
    //     center: new google.maps.LatLng(-33.92, 151.25),
    //     mapTypeId: google.maps.MapTypeId.ROADMAP
    // });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            map: map
        });

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infowindow.setContent(locations[i][0]);
                infowindow.open(map, marker);
            }
        })(marker, i));
    }
</script>