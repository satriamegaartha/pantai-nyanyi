<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Data Sejarah</h3>
            </div>


        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="m-0 font-weight-bold text-info"><?= $sejarah['judul']; ?></h5>
                            </div>
                            <div class="col-md-6">
                                <a class="btn btn-warning btn-sm float-right" href="<?= base_url('user/sejarahedit/') . $sejarah['id'] ?>">Edit Data Sejarah</a>
                            </div>
                        </div>
                        <h6 class="mt-2 mb-0"><span class="far fa-calendar-alt mr-2"></span><?= date('d F Y', strtotime($sejarah['date'])) ?><span class="fa fa-user mr-2 ml-4"></span><?= $sejarah['nama']; ?></h6>
                    </div>
                    <div class="x_content">
                        <div class="row justify-content-center mb-3">
                            <div class="col-md-4">
                                <img src="<?= base_url('assets/img/galeri/thumbnail/') . $sejarah['image'] ?>" class="img-thumbnail">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="text-justify">
                                    <?= $sejarah['deskripsi']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->