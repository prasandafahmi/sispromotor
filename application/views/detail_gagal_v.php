<?php  $this->load->view('Header_v'); ?> <br>
<div class="row" style="width:100%">
    <div class="col-md-1">
<div class="btn-group-vertical " role="group" >
    <a href="<?php echo site_url()?>/Akun" class=" btn btn-primaryy" ><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Akun Saya</a>
    <a   class="btn btn-primaryy" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><i class="fa fa-laptop" aria-hidden="true"></i>&nbsp;Status Pesanan</a>
        <ul id="collapseTwo" class="panel-collapse collapse" style="list-style:none">
            <li><a href="<?php echo site_url()?>/Akun/status" class=" " >Persetujuan</a></li>
            <li><a href="<?php echo site_url()?>/Pesan/Pembayaran" class=" " >Pembayaran</a></li>
            <li><a href="<?php echo site_url()?>/Pesan/Pelaksanaan" class="" >Pelaksanaan</a></li>
            <li><a href="<?php echo site_url()?>/Pesan/Selesai" class="" >Hasil</a></li>
        </ul>
    
    <a href="<?php echo site_url()?>/Akun/riwayat" class=" btn btn-primaryy"><i class="fa fa-list" aria-hidden="true"></i>&nbsp;Riwayat Pesanan</a>  
</div>
    </div>
    <div class="col-md-11" style="margin-top:7%;margin-left:-6%;">
<div class="panell "><br><br>
  <div class="panel-bodyt">
        <form >
            
                  <h1><i class="fa fa-laptop" aria-hidden="true"></i> Status Pesanan </h1>
                  <table class="table-responsive table table-pading  ">
                       <tr>
                            <th width="2%"> No.</th>
                            <th width="5%"> Nomor Pesanan</th>
                            <th width="5%"> Nama Pesanan</th>
                            <th width="5%"> Tanggal Pemesanan</th>
                            <th width="5%"> Status Persetujuan </th>
                            <th width="5%"> Status Pembayaran</th>
                            <th width="5%"> Keterangan</th>
                           
                       </tr>
                        <?php $i=1; foreach($detail->result() as $d){?>
                      <tr>
                            <td > <?php echo $i; ?></td>
                            <td > <?php echo $d->kode_order; ?></td>
                            <td > <?php echo $d->jenis; ?></td>
                            <td > <?php echo $d->date; ?></td> 
                            <td > <?php echo $d->status_persetujuan; if($d->status_persetujuan=="Tidak Setuju"){echo " <br> ".$d->alasan;}?></td>
                            <?php if($d->status==""){ ?>
                            <td > - </td>
                            <?php }else{ ?>
                            <td ><?php echo $d->status; ?></td>
                          <?php }?>
                            <td > <?php echo $d->respon?></td>
                            
                      </tr>
                     <?php $i++;} ?>
                        
                  </table><hr>
            <p>Waktu akhir pembayaran anda adalah <?php echo $d->tanggal_berakhir; ?>, Silahkan lakukan pembayaran pada jam kerja Senin - Jum'at ( 08:00 - 16:00) sebelum Tanggal berakhir pembayaran anda </p>
            <center><br><a href="<?php echo site_url()?>/Akun/riwayat" class="btn-primary"><i class="fa fa-arrow-left"></i>  Kembali</a>
            </center> 
      </form>
    </div>
</div>
    </div>
</div>

<br><br><br><br><br><br><br>
<?php $this->load->view('Footer_v'); ?>
<?php $this->load->view('LoadJS'); ?>