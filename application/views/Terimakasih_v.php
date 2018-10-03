<?php
       $this->load->view('Header_v');

?> 
        <div class="amado_product_area section-padding-100">
            <div class="container-fluid">     
   <center>
       <img src="<?php echo base_url();?>assets/images/lipi/logolipi.png" width="80px" alt="logo"><br>
       <h2>SISPROMOTOR - LIPI </h2>   
       <p><br>Terimakasih Anda telah melakukan reset password, <?php echo $this->session->flashdata('sukses');?>
            </p>
       <center><br><a href="<?php echo site_url('Lupa_password')?>"><i class="fa fa-arrow-left"></i>  Kembali</a>
    </center>
</center>
</div>
</div>
</div>
<?php $this->load->view('Footer_v'); ?>
<?php $this->load->view('LoadJS'); ?>
