 <?php $this->load->view('Header_v'); ?>
    


     <div class="products-catagories-area clearfix" style="margin-top: 10px;">
            <div class="amado-pro-catagory clearfix">

                  <div class="gmap-area">
            <div class="container">
                <div class="row" style="margin-left: 350px;">
                	<h5>Halaman Yang Anda Cari Tidak Tersedia</h5>
                </div>
                 <div class="row" style="margin-left: 300px;">
                	<h5>Hubungi Kontak Di Bawah Jika Membutuhkan Bantuan</h5>
                </div>
            </div>
    </div>

    <section id="contact-page">
        <div class="container">
            <div>
                <p><center>
                 <i class="fa fa-map-marker" aria-hidden="true"></i> Alamat: Jl.Raya Jakarta-Bogor Km.46,Cibinong 16911 |
                 <i class="fa fa-phone" aria-hidden="true"></i> Telp: +62-21-8761356 | Fax: +62-21-8761357 | Mobile Phone: +6282110000796 ; +6285810000796 </span></p>
                 <i class="fa fa-envelope" aria-hidden="true"></i> Email: inacc@mail.lipi.go.id
                </center></p>
                <div><br>
                    <form action="<?php echo site_url()?>/Tentang/konfirmasi/" method="post">
                        <div>
                            <div class="form-group">
                                <label>Saran/Keluhan *</label>
                                <textarea  type="text" name="keluhan" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-primary" >Kirim Pesan</button>
                            </div>
                        </div>    
                    </form>
                </div><!--/.row-->
            </div>
        </div><!--/.container-->
    </section>

                <!-- Single Catagory -->
               
            </div>
        </div>
        <!-- Product Catagories Area End -->
    </div>
    <!-- ##### Main Content Wrapper End ##### -->

    <!-- ##### Newsletter Area Start ##### -->
   
    <!-- ##### Newsletter Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <div style="margin-top: 20px;">   
<?php $this->load->view('Footer_v'); ?>
</div>