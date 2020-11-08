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
                                <?php echo form_open_multipart('user/fasilitasdata/') ?>
                                <div class="form-group">
                                    <div class="col-sm-9">
                                        <select class="form-control" id="" name="jenis_fasilitas">
                                            <option value="All" <?= ('All' == set_value('jenis_fasilitas')) ? 'selected="selected"' : '' ?>> Seluruh Fasilitas </option>
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
                            <div class="col-md-6">
                                <a href=" <?= base_url('user/fasilitasadd/') ?>" class="btn btn-sm btn-primary float-right" style="margin-top: 10px;">Tambah Data</a>
                            </div>


                        </div>
                    </div>

                </div>
                <div class="x_content">
                    <table class="table table-hover" id="datatable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jenis</th>
                                <th scope="col">Latitude</th>
                                <th scope="col">Longitude</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($fasilitas as $p) : ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $p['nama']; ?></td>
                                    <td><?= $p['nama_fasilitas']; ?></td>
                                    <td><?= $p['latitude']; ?></td>
                                    <td><?= $p['longitude']; ?></td>
                                    <td>
                                        <a href=" <?= base_url('user/fasilitasedit/') . $p['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="<?= base_url('user/fasilitasdelete/') . $p['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Data akan dihapus?')">Delete</a>
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