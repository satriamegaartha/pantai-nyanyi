

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
    
    <section id="" class=" wow fadeInUp" data-wow-delay="300ms" style="margin-top:30px; margin-bottom:30px;" >
        <div class="container">
        <p class="text-white"><i class="fas fa-fw fa-users"></i> Galeri Pantai Nyanyi</p>    
        <h2 class="">stress sama kerjaan? pusing mikirin mantan? :( <br>
            coba cuci mata dulu lihat foto-foto <br>
            cantik dari Pantai Nyanyi yuk</h2>              
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
  