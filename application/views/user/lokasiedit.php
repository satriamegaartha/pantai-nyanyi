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
                    <div class="x_content">
                        <?php echo form_open_multipart('user/lokasiedit/' . $lokasi['id']) ?>

                        <input type="hidden" class="form-control" id="id" name="id" value="<?= $lokasi['id'] ?>">

                        <div class="form-group row">
                            <label for="provinsi" class="col-sm-2 col-form-label">Provinsi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="provinsi" name="provinsi" value="<?= $lokasi['provinsi'] ?>">
                                <?= form_error('provinsi', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kabupaten" class="col-sm-2 col-form-label">Kabupaten</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="kabupaten" name="kabupaten" value="<?= $lokasi['kabupaten'] ?>">
                                <?= form_error('kabupaten', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kecamatan" class="col-sm-2 col-form-label">Kecamatan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="<?= $lokasi['kecamatan'] ?>">
                                <?= form_error('kecamatan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="desa" class="col-sm-2 col-form-label">Desa</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="desa" name="desa" value="<?= $lokasi['desa'] ?>">
                                <?= form_error('desa', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="latitude" class="col-sm-2 col-form-label">Latitude</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="latitude" name="latitude" value="<?= $lokasi['latitude'] ?>">
                                <?= form_error('latitude', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="longitude" class="col-sm-2 col-form-label">Longitude</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="longitude" name="longitude" value="<?= $lokasi['longitude'] ?>">
                                <?= form_error('longitude', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>



                        <div class="form-group row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Edit Lokasi</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->