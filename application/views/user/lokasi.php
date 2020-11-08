<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Data Lokasi</h3>
            </div>


        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="m-0 font-weight-bold text-info"><?= 'Desa ' . $lokasi['desa'] . ', Kecamatan ' . $lokasi['kecamatan'] ?></h6>
                                <h6 class="m-0 font-weight-bold text-info"><?= 'Kabupaten ' .  $lokasi['kabupaten'] . ', Provinsi ' . $lokasi['provinsi'] ?></h6>
                            </div>
                            <div class="col-md-6">
                                <a class="btn btn-warning btn-sm float-right" href="<?php echo base_url('user/lokasiedit/') . $lokasi['id'] ?>">Edit Data lokasi</a>
                            </div>
                        </div>
                        <h6 class="mt-2 mb-0"><span class="far fa-calendar-alt mr-2"></span><?= date('d F Y', strtotime($lokasi['date'])) ?><span class="fa fa-user mr-2 ml-4"></span><?= $lokasi['nama']; ?></h6>
                    </div>
                    <div class="x_content">
                        <div id="googleMap" style="width:100%;height:380px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->








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