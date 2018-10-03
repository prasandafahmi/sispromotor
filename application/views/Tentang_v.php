 <?php $this->load->view('Header_v'); ?>
    


     <div class="products-catagories-area clearfix" style="margin-top: 10px;">
            <div class="amado-pro-catagory clearfix">

                  <div class="gmap-area">
            <div class="container">
                <div class="row">
                     <iframe width="100%" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1982.114821885607!2d106.84947242114796!3d-6.4925808756894!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c1bb2efdddd9%3A0x51489c0cca7acc9b!2sIndonesian+Culture+Collection+(InaCC)!5e0!3m2!1sen!2sus!4v1487729158266" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
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
                    <form action="<?php echo site_url('Tentang/konfirmasi');?>" method="post">
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