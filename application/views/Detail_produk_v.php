<?php $this->load->view('Header_v'); ?> <br>

        <div class="amado_product_area section-padding-100">
            <div class="container-fluid">

 <section id="content" class="shortcode-item">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-7">
                  <h2>Detail Pesanan </h2>
                    <div class="tab-wrap">
                        <div class="media">
                            <div class="parrent media-body">
                                <div class="tab-content">
                                    <div class="media"><!--sekarang-->
                                         <?php foreach($produk->result() as $p){ ?>

                                          <form method="post" action="<?php echo site_url('Pesan/pesan/');?><?php echo $p->id; ?>">
                                            <div class="media-body">
                                                <div class="pull-left">
                                                    <center><h2><b><?php echo $p->jenis ?></b> </h2>
                                                        <img class="img-responsive"  src="<?php echo base_url('assets/admin/assets/admin/produk/');?><?php echo $p->foto ?>" width="50%" >
                                                    </center>
                                                    <td><p><?php echo $p->deskripsi ?></p></td>
                                                    <td><b>Harga</b><br></td>
                                                    <td>Rp.<?php echo number_format($p->harga,0,",",".") ?>/Sampel <br></td>
                                                    <td><b>Syarat Pesanan</b><br></td>
                                                    <td><?php echo $p->syarat ?> </td>
                                                </div>
                                              </div>
                                            <center><br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                                <a href="<?php echo site_url('Pesan')?>"><i class="fa fa-arrow-left"></i>&nbsp;Kembali </a>
                                                <button type="submit" class="btn btn-primary" ><i class="fa fa-shopping-cart"></i>&nbsp;Pesan </button>
                                            </center>
                                          </form>
                                        <?php } ?>
                                    </div> <!--/.media-->    
                                </div>  <!--/.tab-content-->
                            </div> <!--/.parent media-->
                        </div> <!--/.media--> 
                    </div> <!--/.tab-wrap-->  
                </div> <!--/.col-xs-12 col-sm-7-->
                
                <div class="col-xs-12 col-sm-5"><br><br>
                    <div class="accordion">
                        <div class="panel-group" id="accordion1">
                            <div class="panel panel-default">
                                <div class="panel-heading active">
                                    <h3 class="panel-title">
                                        <div class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" >
                                        <center> <font color="white">Katalog InaCC</font></center>
                                        </div>
                                    </h3>
                                </div>
                                <div id="collapseOne1" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div class="media accordion-inner">
                                            <center>  
                                            <img src="<?php echo base_url();?>assets/images/lipi/ft.png" width="50%">
                                            <p> Pemesanan Mikroba silahkan kunjungi katalog kami di alamat berikut ini
                                            <a href="http://inacc.biologi.lipi.go.id/" target="_blank">http://inacc.biologi.lipi.go.id</a></p><hr> 
                                            </center>
                                        </div>
                                    </div>
                                </div> <!--/.collapseOne1-->
                            </div> <!--/.panel panel-default-->
                        </div> <!--/.panel-group-->
                    </div>
                </div><!--/.col-xs-12 col-sm-5-->
            </div><!--/.row-->
        </div> <!--/.container-->
</section> <br>
</div>
</div>
</div>
<?php $this->load->view('Footer_v'); ?>
<?php $this->load->view('LoadJS'); ?>