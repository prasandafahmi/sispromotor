<?php $this->load->view('Header_v'); ?>
        <div class="amado_product_area section-padding-100">
            <div class="container-fluid">
    <section id="contact-page">
      <div class="container">
        <center> 
          <h1>&nbsp;PUSAT PENELITIAN BIOLOGI - LIPI<br><b>HASIL/RESULT PEMESANAN</b><br></h1>
        </center><hr><br><br>
          <center>
<!--              foreach($d->result() as $permenu)-->
         
          
         <?php $d=$detail->row();?>
              <div class="col-sm-6 col-xs-12">
          <a href="<?php echo base_url()?>/assets/admin/hasil/<?php echo $d->result; ?>" target="_blank"><font size="25pt" color="orange"><i class="fa fa-download"></i> </font><br><h2>UNDUH HASIL</h2></a> 
              </div>
              <div class="col-sm-6 col-xs-12">
                  <?php if(($d->upload)!=""){?>
               <a href="<?php echo base_url()?>/assets/admin/bidang/<?php echo $d->upload; ?>" target="_blank"><font size="25pt" color="orange"><i class="fa fa-download"></i> </font><br><h2>UNDUH SURAT BIDANG</h2></a> 
                  <?php }else{echo "<font color='red'><strong>Surat Bidang Belum Tersedia</strong></font>";}?>
              </div>
              <div class="col-xs-12" style="margin-top:5%;">
               <a href="<?php echo site_url()?>/Akun/riwayat" class="btn btn-prime"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Kembali ke Riwayat Pesanan</a>
              </div>
        </center>
      </div><!--/.container-->
    </section><!--/#contact-page--><br><br><br><br><br><br>
  </div>
</div>
</div>
<?php $this->load->view('Footer_v');?>
<?php $this->load->view('LoadJS');?>