<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Data fasilitas</h3>
            </div>


        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="col-md-8">

                            <?php echo form_open_multipart('user/fasilitasedit/' . $fasilitas['id']) ?>

                            <input type="hidden" class="form-control" id="id" name="id" value="<?= $fasilitas['id'] ?>">

                            <div class="form-group row">
                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $fasilitas['nama'] ?>">
                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="jenis_fasilitas" class="col-sm-2 col-form-label">Jenis Fasilitas</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="" name="jenis_fasilitas">
                                        <?php foreach ($jenis_fasilitas as $p) : ?>
                                            <option value="<?= $p['id'] ?>" <?= ($p['id'] == $fasilitas['jenis_fasilitas_id']) ? 'selected="selected"' : '' ?>> <?= $p['nama_fasilitas'] ?> </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('jenis_fasilitas', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="latitude" class="col-sm-2 col-form-label">Latitude</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="latitude" name="latitude" value="<?= $fasilitas['latitude'] ?>">
                                    <?= form_error('latitude', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="longitude" class="col-sm-2 col-form-label">Longitude</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="longitude" name="longitude" value="<?= $fasilitas['longitude'] ?>">
                                    <?= form_error('longitude', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->