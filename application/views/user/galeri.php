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
                    <div class="x_title">
                        <div class="col">
                            <a href=" <?= base_url('user/galeriadd/') ?>" class="btn btn-sm btn-primary">Tambah Data</a>
                        </div>
                    </div>
                    <div class="x_content">
                        <table class="table table-hover" id="datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($galeri as $g) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $g['nama']; ?></td>
                                        <td>
                                            <img src="<?= base_url('assets/img/galeri/thumbnail/') . $g['image'] ?>" class="img-thumbnail" width="200px">
                                        </td>
                                        <td>
                                            <a href=" <?= base_url('user/galeridetail/') . $g['id'] ?>" class="btn btn-sm btn-info">Detail</a>
                                            <a href=" <?= base_url('user/galeriedit/') . $g['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                            <a href="<?= base_url('user/galeridelete/') . $g['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Data akan dihapus?')">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->