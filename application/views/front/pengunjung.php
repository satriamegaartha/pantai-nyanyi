

    <header id="home">
        <div class="container-fluid" style="background-image:url(<?= base_url('assets_front/'); ?>images/img/jumbotron.jpg);">
            <!-- change the image in style.css to the class header .container-fluid [approximately row 50] -->
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-xs-10">
                        <a href="#" class="thumbnail logo">
                            <img src="#" alt="" class="img-responsive">
                        </a>
                    </div>
                    <div class="col-md-1 col-md-offset-8 col-xs-2 text-center">
                        <div class="menu-btn"><span class="hamburger">&#9776;</span></div>
                    </div>
                </div>
                <div class="jumbotron">
                    <div style="text-shadow: 1px 1px 10px #adadad;">
                        <h1>
                            <strong>Pantai Nyanyi</strong><br>
                            <small>Desa Nyanyi, Kediri, Tabanan</small>
                        </h1>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </header>

 
    <section id="history" class="story wow fadeInUp" data-wow-delay="300ms">
        <!-- change the image in style.css to the class .story .container-fluid [approximately row 141] -->
        <div class="container-fluid" style="background-image:url(<?= base_url('assets_front/'); ?>images/img/qwer.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 opaline" style="background-color:transparent;">
                        <div class="row">
                            <div class="col-md-11 col-md-offset-1" style="text-shadow: 1px 1px 4px #adadad;">
                                
                                <p class="text-white"><i class="fas fa-fw fa-users"></i> Pengunjung Pantai Nyanyi</p>                         
                                <h2>Bali's Hidden Gem</h2>
                                <p  style="margin-bottom:40px">Pengunjung Pantai Nyanyi memang tidak seramai pantai terkenal di Bali seperti Kuta, Batu Bolong, Pandawa.<br>
                                Tetapi hal itu justru menjadi nilai tambah karena nuansanya lebih tenang, damai dan lebih privasi</p>                                
                                <a type="button" class="btn btn-info btn-sm text-white" data-toggle="modal" data-target="#chartModal">
                                    Tampilkan Chart
                                </a>
                                <h5>   <?= $subtitle; ?></h5> 
                                
                                <div id="chartPengunjung"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  




    
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
                <?php echo form_open_multipart('front/pengunjung/') ?>
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