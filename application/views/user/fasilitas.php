<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Data Fasilitas</h3>
            </div>


        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <div class="row">
                            <div class="col-md-6">
                                <?php echo form_open_multipart('user/fasilitas/') ?>
                                <div class="form-group">
                                    <div class="col-sm-9">
                                        <select class="form-control" id="" name="jenis_fasilitas">
                                            <?php foreach ($jenis_fasilitas as $p) : ?>
                                                <option value="<?= $p['id'] ?>" <?= ($p['id'] == set_value('jenis_fasilitas')) ? 'selected="selected"' : '' ?>> <?= $p['nama_fasilitas'] ?> </option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?= form_error('jenis_fasilitas', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info">Filter</button>
                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="x_content">

                        <div id="map" style="width:100%;height:480px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->


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
        center: new google.maps.LatLng(-8.6338405, 115.0977358),
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