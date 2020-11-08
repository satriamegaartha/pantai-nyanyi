<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Data Galeri</h3>
            </div>


        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="col-md-10">

                            <?php echo form_open_multipart('user/galeriedit/' . $galeri['id']) ?>

                            <input type="hidden" class="form-control" id="id" name="id" value="<?= $galeri['id'] ?>">
                            <input type="hidden" class="form-control" id="old_image" name="old_image" value="<?= $galeri['image'] ?>">

                            <div class="form-group row">
                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $galeri['nama'] ?>" readonly>
                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="deskripsi_galeri" class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="row ml-3">
                                    <textarea rows="10" class="col-sm-10 form-control" id="deskripsi_galeri" name="" readonly><?= $galeri['deskripsi'] ?></textarea>
                                    <?= form_error('deskripsi_galeri', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-2">Gambar</div>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img src="<?= base_url('assets/img/galeri/') . $galeri['image'] ?>" class="img-thumbnail">
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="form-group row justify-content-end">
                                <div class="col-sm-10">
                                    <a href=" <?= base_url('user/galeriedit/') . $galeri['id'] ?>" class="btn btn-warning">Edit</a>
                                    <a href="<?= base_url('user/galeridelete/') . $galeri['id'] ?>" class="btn btn-danger" onclick="return confirm('Data akan dihapus?')">Delete</a>
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