<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Data Video</h3>
            </div>


        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="col-md-10">

                            <?php echo form_open_multipart('user/videoedit/' . $video['video']) ?>

                            <input type="hidden" class="form-control" id="id" name="id" value="<?= $video['id'] ?>">
                            <div class="form-group row">
                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $video['nama'] ?>">
                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="deskripsi_video" class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <textarea rows="10" class="col-sm-10 form-control" id="deskripsi_video" name="deskripsi_video"> <?= $video['deskripsi'] ?></textarea>
                                    <?= form_error('deskripsi_video', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Video</label>
                                <?php $rest = substr($video['video'], 17, 11); ?>
                                <div class="ml-2">
                                    <iframe width="460" height="215" src="https://www.youtube.com/embed/<?= $rest; ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            </div>


                            <div class="form-group row justify-content-end">
                                <div class="col-sm-10">
                                    <a href=" <?= base_url('user/videoedit/') . $video['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="<?= base_url('user/videodelete/') . $video['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Data akan dihapus?')">Delete</a>
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