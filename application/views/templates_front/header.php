<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Pantai Nyanyi</title>
    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('assets_front/'); ?>bootstrap/css/theme.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets_front/'); ?>style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,300,700,100' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:300,700,900,500' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/typicons/2.0.7/typicons.min.css">
    <!-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> -->
    <link href="<?= base_url('assets/') ?>vendors/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets_front/'); ?>assets/css/pushy.css">
    <link rel="stylesheet" href="<?= base_url('assets_front/'); ?>assets/css/masonry.css">
    <link rel="stylesheet" href="<?= base_url('assets_front/'); ?>assets/css/animate.css">
    <link rel="stylesheet" href="<?= base_url('assets_front/'); ?>assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url('assets_front/'); ?>assets/css/odometer-theme-default.css">



    <script>
        window.odometerOptions = {
            selector: '.odometer',
            format: '(,ddd)', // Change how digit groups are formatted, and how many digits are shown after the decimal point
            duration: 13000, // Change how long the javascript expects the CSS animation to take
            theme: 'default'
        };
    </script>
</head>

<body class="">
    <!-- Pushy Menu -->
    <nav class="pushy pushy-left">
        <ul class="list-unstyled">
            <li><a href="<?= base_url('front/index/')?>">Home</a></li>
            <li><a href="<?= base_url('front/galeri/')?>">Galeri</a></li>
            <li><a href="<?= base_url('front/lokasi/')?>">Lokasi</a></li>
            <li><a href="<?= base_url('front/fasilitas/')?>">Fasilitas</a></li>
            <li><a href="<?= base_url('front/pengunjung/')?>">Pengunjung</a></li>                        
            <li><a href="<?= base_url('auth/index/')?>">Admin Login</a></li>                        
        </ul>
    </nav>

    <!-- Site Overlay -->
    <div class="site-overlay"></div>