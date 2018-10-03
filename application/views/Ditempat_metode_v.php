<?php $this->load->view('Header_v'); ?> <br>

<?php $this->load->view('side_v'); ?>
                <div class="amado_product_area section-padding-100">
            <div class="container-fluid">
                <div class="row">
    <div class="col-md-11" style="margin-top:7%;margin-left:6%;">
<div class="panelbayar">
   
    <?php $d=$detail->result();?>
    <form action="<?php echo site_url('Pesan/cekbuktilangsung/');?><?php echo $d[0]->id_order;?>" method="post" enctype="multipart/form-data">
     <ul class="nav nav-pills nav-justified"><br>
        <li class="active" ><a href="<?php echo site_url('Pesan/pembayaran/');?><?php echo $d[0]->id_order;?>"><i class="fa fa-group"></i><br>Bayar di Tempat</a></li>&nbsp;&nbsp;&nbsp;
        <li ><a href="<?php echo site_url('Pesan/metode/');?><?php echo $d[0]->id_order;?>"><i class="fa fa-money"></i><br>Transfer Bank</a></li>
    </ul><hr>
        <table class=" table-padding">
          <?php $total=0;$harga2; foreach($detail->result() as $d){
        $harga2=$d->harga*$d->jumlah;
        $total+=$harga2;
        } 
         $d=$detail->result();?>
            <div class="col-sm-12">
                Silahkan melakukan pembayaran di Tata Usaha Penghubung Bidang Mikrobiologi di Gedung InaCC Pusat Penelitian Biologi-LIPI, dengan memberikan Nomor Order Anda, dan lakukan pembayaran sesuai Total Biaya yang ditagihkan. Khusus untuk internal Pusat Penelitian Biologi-LIPI dan mitra kerjasama silahkan kontak kami untuk mengajukan kerjasama, jika telah tercapai kesepakatan kerjasama, upload surat permohonan/ keterangan kesepakatan disini
                <br>
            </div>
<center>
    <p><tr><td colspan="4">&nbsp;</td></tr>
        <tr>
            <td width="250"></td>
            <td >Nomor Pesanan</td>
            <td >:</td>
            <td ><?php echo $d[0]->kode_order; ?></td>    
        </tr>

        <tr>
            <td></td>
            <td>Total Biaya</td>
            <td >:</td>
            <td >Rp.<?php  echo number_format( $total,0,",",".")  ?></td> 
        </tr>
         <tr>
            <td></td>
            <td >Metode</td>
            <td>:</td><input type="hidden" name="id" value="<?php echo $d[0]->id_order;?>">
            <td ><input name="metode" class="form-control"  value="Bayar di Tempat" readonly> </td>
        </tr>
        <tr>
            <td></td>
            <td >Bukti Pembayaran</td>
            <td >:</td>
            <td  ><input type="file" name="bukti" required></td>
        </tr>   
    </p>

</center>
 <?php   ?>
    </table><br>
         <ul><br>
           <center><a href="<?php echo site_url('Pesan/Pembayaran');?>">Kembali</a>
                <button type="submit" class="btn btn-prime">Simpan</button>
            </center>     
         </ul>
    <center><hr>
       <p>&nbsp;&nbsp;&nbsp;&nbsp;NB : Waktu Pembayaran Anda 2 Hari, Silahkan Periksa <a href="<?php echo site_url()?>/Pesan/pembayaran">Status Pembayaran</a> Anda setelah 2 Hari Pembayaran</p><hr>
    </center> 
      
    </form>
</div>
    </div>
</div>
</div>
</div>
</div>

<?php $this->load->view('Footer_v'); ?>
<?php $this->load->view('LoadJS'); ?>