

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
                <div class="jumbotron" style="padding-left:0;">
                    <div style="text-shadow: 1px 1px 10px #adadad;">
                        <h1 class="text-left">
                            <strong>Pantai Nyanyi</strong><br>
                            <small>Desa Nyanyi, Kediri, Tabanan</small>
                        </h1>
                    </div>
                    <div class="text-left">
                    <?php $rest = substr($video['video'], 17, 11); ?>
                    <iframe width="460" height="215" src="https://www.youtube.com/embed/<?= $rest; ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <section id="" class=" wow fadeInUp" data-wow-delay="300ms" style="margin-top:30px; margin-bottom:30px;" >
        <div class="container">
        <h2 class="">stress sama kerjaan? pusing mikirin mantan? :( <br>
            coba cuci mata dulu lihat foto-foto <br>
            cantik dari Pantai Nyanyi yuk</h2>        
        <a class="btn btn-danger btn-lg" href="<?= base_url('front/galeri/')?>">Lihat Seluruh Galeri <span><i class="fa fa-arrow-circle-o-right"></i> </span></a>
            <div class="row">
                <div class="masonry image-gallery">
                    <div class="grid-sizer"></div>
                    <div class="gutter-sizer"></div>
                        <?php foreach ($galeri as $g) : ?>
                        <div class="item">
                                <a href="<?= base_url('assets/img/galeri/') . $g['image'] ?>">
                                    <img src="<?= base_url('assets/img/galeri/thumbnail/') . $g['image'] ?>" width="100px">
                                </a>
                        </div>
                        <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    
    <section id="history" class="story wow fadeInUp" data-wow-delay="300ms">
        <!-- change the image in style.css to the class .story .container-fluid [approximately row 141] -->
        <div class="container-fluid" style="background-image:url(<?= base_url('assets_front/'); ?>images/img/IMG_9391.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 opaline" style="background-color:transparent;">
                        <div class="row">
                            <div class="col-md-11 col-md-offset-1" style="text-shadow: 1px 1px 4px #adadad;">
                                
                                <p class="text-white"><i class="fas fa-fw fa-map-marked-alt"></i> Lokasi Pantai Nyanyi</p>                         
                                <h2>Gimana? Tertarik ke pantai nyanyi?</h2>
                                <p  style="margin-bottom:40px">Lokasinya ok banget nih, karena dekat dengan pusat kota tapi suasana hening dan tenang ala pedesaan terasa banget.<br>
                                Jarak pantai Nyanyi dari Denpasar sekitar 19 km melalui jalan raya Canggu – Tanah Lot.</p>                                
                                <div id="googleMap" style="width:100%;height:330px;" ></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
    <section id="news" class="blog wow fadeInUp" data-wow-delay="300ms">
        <div class="container" >
            <div class="row">
                <div class="col-md-5">
                    <img src="<?= base_url('assets_front/images/img/') . 'qwe.jpg'?>" alt="" style="width:400px; margin-top:35px;">
                </div>
                <div class="col-md-7">
                    
                    <h4>Walaupun lokasi di pedesaan, tapi fasilitas jangan ditanya lagi.<br>
                    Lengkap, berkualitas dan aksesnya mudah. Juara punya lah.</h4>
                    
                    <a class="btn btn-primary btn-lg" href="<?= base_url('front/fasilitas/')?>">Lihat Seluruh Fasilitas <span><i class="fa fa-arrow-circle-o-right"></i> </span></a>
                    <br>
                    
                    <p><span><i class="fab fa-fw fa-get-pocket"></i></span>Villa</p>
                    <div id="map" style="width:100%;height:330px;"></div>
                </div>                
            </div>
        </div>
    </section>
 
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
                                <h5>   <?= $subtitle; ?></h5> 
                                <a class="btn btn-success" href="<?= base_url('front/pengunjung/')?>">Lihat Seluruh Data Pengunjung <span><i class="fa fa-arrow-circle-o-right"></i> </span></a>
                                <div id="chartPengunjung"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  