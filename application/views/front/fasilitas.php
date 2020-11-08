

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

    <section id="news" class="blog wow fadeInUp" data-wow-delay="300ms">
        <div class="container" >
            <div class="row">
                <div class="col-md-5">
                    <img src="<?= base_url('assets_front/images/img/') . 'qwe.jpg'?>" alt="" style="width:400px; margin-top:35px;">
                </div>
                <div class="col-md-7">
                    
                    <h4>Walaupun lokasi di pedesaan, tapi fasilitas jangan ditanya lagi.<br>
                    Lengkap, berkualitas dan aksesnya mudah. Juara punya lah.</h4>

                    <div class="row">
                        <div class="col-md-7 ">
                            <?php echo form_open_multipart('front/fasilitas/') ?>
                            <div class="form-group">
                                <div class="col-sm-9">
                                    <select class="form-control" id="" name="jenis_fasilitas">
                                        <?php foreach ($jenis_fasilitas as $p) : ?>
                                            <option value="<?= $p['id'] ?>" <?= ($p['id'] == set_value('jenis_fasilitas')) ? 'selected="selected"' : '' ?>> <?= $p['nama_fasilitas'] ?> </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('jenis_fasilitas', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Filter</button>
                            </form>                    
                        </div>
                    </div>
                    
                    <br>
                                        
                    <div id="map" style="width:100%;height:330px;"></div>
                </div>                
            </div>
        </div>
    </section>
 