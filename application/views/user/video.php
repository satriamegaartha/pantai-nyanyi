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
                    <div class="x_title">
                        <div class="col">
                            <a href=" <?= base_url('user/videoadd/') ?>" class="btn btn-sm btn-primary">Tambah Data</a>
                        </div>
                    </div>
                    <div class="x_content">
                        <table class="table table-hover" id="datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Video</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($video as $g) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $g['nama']; ?></td>

                                        <td>
                                            <?php $rest = substr($g['video'], 17, 11); ?>
                                            <iframe width="460" height="215" src="https://www.youtube.com/embed/<?= $rest; ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                                        </td>

                                        <td>
                                            <a href=" <?= base_url('user/videodetail/') . $g['id'] ?>" class="btn btn-sm btn-info">Detail</a>
                                            <a href=" <?= base_url('user/videoedit/') . $g['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                            <a href="<?= base_url('user/videodelete/') . $g['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Data akan dihapus?')">Delete</a>
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