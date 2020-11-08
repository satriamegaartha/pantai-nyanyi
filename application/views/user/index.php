<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Dashboard</h3>
            </div>


        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <!-- <h2>Plain Page</h2> -->
                        <a type="button" class="btn btn-info btn-sm text-white" data-toggle="modal" data-target="#chartModal">
                            Tampilkan Chart
                        </a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <h4 class="text-info"><b> <?= (isset($periode)) ? $periode : '' ?></b> <?= (isset($nama_provinsi)) ? '(' . $nama_provinsi . ')' : '(Seluruh Provinsi)' ?> </h4>
                        <p class="text-info"><b> <?= (isset($subtitle)) ? $subtitle : '' ?></b></p>
                        <div id="chartPengunjung"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->


<!-- Modal -->
<div class="modal fade" id="chartModal" tabindex="-1" aria-labelledby="chartModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="chartModalLabel">Choose Chart Period</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('user/index/') ?>
                <div class="form-group row">
                    <label for="periode" class="col-sm-4 col-form-label">Periode</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="" name="periode">

                            <option value="Harian" <?= ("Harian" == set_value('periode')) ? 'selected="selected"' : '' ?>> Harian </option>
                            <option value="Bulanan" <?= ("Bulanan" == set_value('periode')) ? 'selected="selected"' : '' ?>> Bulanan </option>
                            <option value="Tahunan" <?= ("Tahunan" == set_value('periode')) ? 'selected="selected"' : '' ?>> Tahunan </option>

                        </select>
                        <?= form_error('periode', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="provinsi" class="col-sm-4 col-form-label">Provinsi</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="" name="provinsi">
                            <option value="All" <?= ('All' == set_value('provinsi')) ? 'selected="selected"' : '' ?>> Seluruh Provinsi </option>
                            <?php foreach ($provinsi as $p) : ?>
                                <option value="<?= $p['id'] ?>" <?= ($p['id'] == set_value('provinsi')) ? 'selected="selected"' : '' ?>> <?= $p['nama_provinsi'] ?> </option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('provinsi', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tanggal_awal" class="col-sm-4 col-form-label">Tanggal Awal</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" id="tanggal_awal" name="tanggal_awal" value="<?= set_value('tanggal_awal') ?>">
                        <?= form_error('tanggal_awal', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tanggal_akhir" class="col-sm-4 col-form-label">Tanggal Akhir</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir" value="<?= set_value('tanggal_akhir') ?>">
                        <?= form_error('tanggal_akhir', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>