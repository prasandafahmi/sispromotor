<?php
   if($this->session->userdata('s')=='Super admin'){
      //  echo session->userdata('l');
    ?>
    <nav class="navbar-default navbar-side" role="navigation">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
        </div>
        <ul class="nav navbar-right top-nav">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $this->session->userdata('n')?><b class="caret"></b></a>
				<ul class="dropdown-menu">
				<li>
					<a href="<?php echo site_url('admin/login/logout');?>"> Log Out</a>
				</li>
				</ul>
				</li>
			</ul>
        </nav>
        
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
					<li>
                        <a class="<?php echo $aktif1;?>"href="<?php echo site_url ('admin/Main');?>"><i class="fa fa-dashboard "></i>Dashboard</a>
                    </li>
                    <li>
                        <a class="<?php echo $aktif2;?>" href="#"><i class="fa fa-edit "></i>Website<span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a class="<?php echo $aktif21;?>" href="<?php echo site_url ('super_admin/Konfigurasi');?>">Konfigurasi</a>
                            </li>
                            <li>
                                <a class="<?php echo $aktif3;?>"href="<?php echo site_url ('super_admin/Jasaalat');?>">Jasa alat lab (<?php echo $super_alatlab;?>)</a>
                            </li>
                             <li>
                                <a class="<?php echo $aktif4;?>" href="<?php echo site_url ('super_admin/Jasalab');?>">Jasa lab (<?php echo $super_jasalab;?>)</a>
                            </li>
                             <li>
                                <a class="<?php echo $aktif5;?>" href="<?php echo site_url ('super_admin/Jasapus');?>">Jasa pustaka (<?php echo $super_jasapus;?>)</a>
                            </li>
                             <li>
                                <a class="<?php echo $aktif6;?>" href="<?php echo site_url ('super_admin/Tutorial');?>">Tutorial</a>
                            </li>
                            <li>
                                <a class="<?php echo $aktif61;?>" href="<?php echo site_url ('super_admin/Beranda');?>">Beranda</a>
                            </li>
                          </ul>
                    </li>
                    <li>
                        <a class="<?php echo $aktif7;?>" href="<?php echo site_url ('super_admin/Pengguna');?>"><i class="fa fa-user "></i>Pengguna (<?php echo $super_user;?>)</a>
                    </li>
					<li>
                        <a class="<?php echo $aktif8;?>" href="#"><i class="fa fa-shopping-cart"></i>Pemesanan<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level"> 
                            <li>
                                <a class="<?php echo $aktif8;?>"href="<?php echo site_url ('super_admin/Pemesanan');?>">Pemesanan  (<?php echo $super_pesan;?>)</a>
                            </li>
                            <li>
                                <a class="<?php echo $aktif81;?>"href="<?php echo site_url ('super_admin/Apemesanan');?>">Arsip Pemesanan   (<?php echo $super_apesan;?>)</a>
                            </li>
						</ul>
                    </li>
                    <li>
                        <a class="<?php echo $aktif9;?>" href="<?php echo site_url ('super_admin/Laporan');?>"><i class="fa fa-bar-chart "></i>Laporan (<?php echo $super_laporan;?>)</a>
                    </li>
                    <li>
                        <a class="<?php echo $aktif11;?>" href="<?php echo site_url ('super_admin/Keluhan');?>"><i class="fa fa-file-text"></i>Keluhan (<?php echo $super_keluhan;?>)</a>
                    </li>
                    <li>
                        <a class="<?php echo $aktif10;?>" href="<?php echo site_url ('super_admin/Tutor');?>"><i class="fa fa-file"></i>Tutorial</a>
                    </li>
  
                </ul>
			</div>
        </nav>

                  <?php
   }
    else if($this->session->userdata('s')=='Administrasi jasa'){
      //  echo session->userdata('l');
    ?>

<nav class="navbar-default navbar-side" role="navigation">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
        </div>
        <ul class="nav navbar-right top-nav">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $this->session->userdata('n')?><b class="caret"></b></a>
				<ul class="dropdown-menu">
				<li>
					<a href="<?php echo site_url('admin/Login/Logout');?>"> Log Out</a>
				</li>
				</ul>
				</li>
			</ul>
        </nav>
        
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
					<li>
                        <a class="<?php echo $aktif1;?>"href="<?php echo site_url ('administrasi/Main');?>"><i class="fa fa-dashboard "></i>Dashboard</a>
                    </li>
                    <li>
                        <a class="<?php echo $aktif2;?>" href="#"><i class="fa fa-shopping-cart"></i>Pemesanan<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level"> 
                            <li>
                                <a class="<?php echo $aktif2;?>" href="<?php echo site_url ('administrasi/Pemesanan2');?>">Pemesanan (<?php echo $admin_pesan;?>)</a>
                            </li>
                            <li>
                                <a class="<?php echo $aktif21;?>" href="<?php echo site_url ('administrasi/Apemesanan2');?>">Arsip Pemesanan (<?php echo $admin_arsip;?>)</a>
                            </li>
                    </ul>
                    </li>
                    <li>
                        <a class="<?php echo $aktif3;?>" href="<?php echo site_url ('administrasi/Result');?>"><i class="fa fa-check "></i>Hasil (<?php echo $admin_hasil;?>)</a>
                    </li>
                     <li>
                        <a class="<?php echo $aktif5;?>" href="<?php echo site_url ('administrasi/Aresult');?>"><i class="fa fa-check "></i>Riwayat Hasil (<?php echo $admin_rhasil;?>)</a>
                    </li>
                    <li>
                        <a class="<?php echo $aktif4;?>"href="<?php echo site_url ('administrasi/Tutorial');?>"><i class="fa fa-file"></i>Tutorial</a>
                    </li>
              </ul>
			</div>
        </nav>
                    <?php
   }
    else if($this->session->userdata('s')=='Bendahara'){
      //  echo session->userdata('l');
    ?>

<nav class="navbar-default navbar-side" role="navigation">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
        </div>
        <ul class="nav navbar-right top-nav">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $this->session->userdata('n')?><b class="caret"></b></a>
				<ul class="dropdown-menu">
				<li>
					<a href="<?php echo site_url('admin/Login/Logout');?>"> Log Out</a>
				</li>
				</ul>
				</li>
			</ul>
        </nav>
        
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				    <li>
                        <a class="<?php echo $aktif1;?>"href="<?php echo site_url ('bendahara/Main');?>"><i class="fa fa-dashboard "></i>Dashboard</a>
                    </li>
					<li>
                        <a class="<?php echo $aktif2;?>" href="#"><i class="fa fa-check "></i>Verifikasi<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level"> 
                            <li>
                                <a class="<?php echo $aktif2;?>"href="<?php echo site_url ('bendahara/Verifikasi');?>">Verifikasi (<?php echo $ben_verif;?>)</a>
                            </li>
                            <li>
                                <a class="<?php echo $aktif21;?>"href="<?php echo site_url ('bendahara/Averifikasi');?>">Arsip Verifikasi (<?php echo $ben_averif;?>)</a>
                            </li>
                    </ul>
                    </li>
                    <li>
                        <a class="<?php echo $aktif3;?>"href="<?php echo site_url ('bendahara/Tutorial');?>"><i class="fa fa-file"></i>Tutorial</a>
                    </li>
              </ul>
			</div>
        </nav>
                    <?php 
?>
<?php
   }
    else if($this->session->userdata('s')=='Pelaksana'){
      //  echo session->userdata('l');
    ?>

<nav class="navbar-default navbar-side" role="navigation">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
        </div>
        <ul class="nav navbar-right top-nav">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $this->session->userdata('n')?><b class="caret"></b></a>
				<ul class="dropdown-menu">
				<li>
					<a href="<?php echo site_url('admin/Login/Logout');?>"> Log Out</a>
				</li>
				</ul>
				</li>
			</ul>
        </nav>
        
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				    <li>
                        <a class="<?php echo $aktif1;?>"href="<?php echo site_url ('pelaksana/Main');?>"><i class="fa fa-dashboard "></i>Dashboard</a>
                    </li>
					<li>
                        <a class="<?php echo $aktif2;?>" href="#"><i class="fa fa-edit"></i>Pemesanan<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level"> 
                            <li>
                                <a class="<?php echo $aktif2;?>"href="<?php echo site_url ('pelaksana/Result');?>">Pemesanan (<?php echo $pel_pesan;?>)</a>
                            </li>
                            <li>
                                <a class="<?php echo $aktif21;?>"href="<?php echo site_url ('pelaksana/Aresult');?>">Arsip Pemesanan  (<?php echo $pel_apesan;?>)</a>
                            </li>
						</ul>
                    </li>
                    <li>
                        <a class="<?php echo $aktif3;?>"href="<?php echo site_url ('pelaksana/Tutorial');?>"><i class="fa fa-file"></i>Tutorial</a>
                    </li>
              </ul>
			</div>
        </nav>
                    <?php }
?>