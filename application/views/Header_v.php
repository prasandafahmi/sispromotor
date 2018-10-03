
<?php
    if($this->session->userdata('username')){
    //  echo session->userdata('l');
 ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>SISPROMOTOR | LIPI</title>

    <!-- Favicon  -->
    <link rel="icon" href="<?php echo base_url('assets/images/lipi/lipi.png');?>">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/new_assets/css/core-style.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/new_assets/style.css');?>">

</head>

<body>
    <!-- Search Wrapper Area Start -->
    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search" placeholder="Type your keyword...">
                            <button type="submit"><img src="<?php echo base_url('assets/new_assets/img/core-img/search.png');?>" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Wrapper Area End -->

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                <a href="<?php echo site_url('main/index');?>"><img src="<?php echo base_url('assets/images/lipi/logo.png');?>" width="270px" alt="logo" alt=""></a>
            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>

        <!-- Header Area Start -->
        <header class="header-area clearfix">
            <!-- Close Icon -->
            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <!-- Logo -->
            <div class="logo">
                <a href="<?php echo site_url('main/index');?>"><img src="<?php echo base_url('assets/images/lipi/logo.png');?>" width="270px" alt="logo"></a>
            </div>
            <!-- Amado Nav -->
 
            <nav class="amado-nav">
                <ul>
                    <li class="<?php echo $aktif1;?>"><a href="<?php echo site_url('Main');?>">Beranda</a></li>
                        <li class="<?php echo $aktif2;?>"><a href="<?php echo site_url('Tentang');?>">Hubungi Kami</a></li>
                        <li class="<?php echo $aktif3;?>"><a href="<?php  echo site_url('Pesan');?>">Pemesanan Jasa</a></li>
                        <li class="<?php echo $aktif4;?>"><a href="<?php echo site_url('Tutorial');?>">Cara Pemesanan</a></li>
                        <li class="<?php echo $aktif5;?>"><a href="<?php  echo site_url('Login/logout');?>">keluar</a></li>
                     <li class="<?php echo $aktif6;?>"><a href="<?php  echo site_url('Akun');?>"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Akun Saya</a></li>
                  
                     <li><a href="<?php echo site_url('Pesan/pemberitahuan');?>"><i class="fa fa-bell" aria-hidden="true"></i>&nbsp;Pemberitahuan (<?php  
                        $ckode = count($kode);
                         echo $ckode;
                        ?>)
                    </a></li>
                    
                         <li class="<?php echo $aktif7;?>"><a href="<?php echo site_url('Pemesanan/show_keranjang');?>" data-toggle="tooltip" data-placement="left" title="Keranjang Saya"><img src="<?php echo base_url('assets/new_assets/img/core-img/cart.png');?>" alt="">&nbsp;(<?php echo $this->cart->total_items();?>)</a></li>
                         
                </ul>
            </nav>
            <!-- Button Group -->
           
            <!-- Social Button -->
            <div class="social-info d-flex justify-content-between">
                <a href="https://www.instagram.com/lipiindonesia/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="https://www.facebook.com/lipiindonesia/"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="https://twitter.com/lipiindonesia"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
        </header>
        <!-- Header Area End -->

        <!-- Product Catagories Area Start -->


<?php } else { ?>

    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>SISPROMOTOR | LIPI</title>

    <!-- Favicon  -->
    <link rel="icon" href="<?php echo base_url('assets/images/lipi/lipi.png');?>">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/new_assets/css/core-style.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/new_assets/style.css');?>">

</head>

<body>
    <!-- Search Wrapper Area Start -->
    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search" placeholder="Type your keyword...">
                            <button type="submit"><img src="<?php echo base_url('assets/new_assets/img/core-img/search.png');?>" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Wrapper Area End -->

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                <a href="<?php echo site_url('main/index');?>"><img src="<?php echo base_url('assets/images/lipi/logo.png');?>" width="270px" alt="logo"></a>
            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>

        <!-- Header Area Start -->
        <header class="header-area clearfix">
            <!-- Close Icon -->
            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <!-- Logo -->
            <div class="logo">
                <a href="<?php echo site_url('main/index');?>"><img src="<?php echo base_url('assets/images/lipi/logo.png');?>" width="270px" alt="logo"></a>
            </div>
            <!-- Amado Nav -->
            <nav class="amado-nav">
                <ul>
                    <li class="<?php echo $aktif1;?>"><a href="<?php echo site_url('Main');?>">Beranda</a></li>
                        <li class="<?php echo $aktif2;?>"><a href="<?php echo site_url('Tentang');?>">Hubungi Kami</a></li>
                        <li class="<?php echo $aktif3;?>"><a href="<?php  echo site_url('Pesan');?>">Pemesanan Jasa</a></li>
                        <li class="<?php echo $aktif4;?>"><a href="<?php echo site_url('Tutorial');?>">Cara Pemesanan</a></li>
                        <li class="<?php echo $aktif5;?>"><a href="<?php  echo site_url('Login');?>">Masuk</a></li>
                </ul>
            </nav>
            <!-- Button Group -->
           
            <!-- Social Button -->
 <div class="social-info d-flex justify-content-between">
                <a href="https://www.instagram.com/lipiindonesia/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="https://www.facebook.com/lipiindonesia/"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="https://twitter.com/lipiindonesia"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>  
        </header>

        <?php } ?>