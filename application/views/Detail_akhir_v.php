<?php  $this->load->view('Header_v'); ?>

<?php $this->load->view('side_v'); ?>

        <div class="amado_product_area section-padding-100">
            <div class="container-fluid">
        <div class="row">
    <div class="col-md-11">
<div class="panell ">
  <div class="panel-bodyt"><?php $i=1; foreach($detail->result() as $d){?>
        <form action="<?php echo site_url()?>/Pesan/cekkirim/<?php echo $d->kode_order;;?>" method="post" enctype="multipart/form-data">
            
                  <h1><i class="fa fa-laptop" aria-hidden="true"></i> Status Pesanan </h1>
                  <table class="table-responsive table table-pading  ">
                    
                    <tr><td width="10%"></td>
                        <td width="2%"></td>
                        <td width="10%">Nomor Pesanan</td>
                        <td width="5%">:</td>
                        <td width="30%"><?php echo $d->kode_order; ?></td> 
                         <td width="30%"></td>
                    </tr>
                    <tr><td width="10%"></td>
                        <td width="2%"></td>
                        <td width="10%">Nama Pesanan</td>
                        <td width="5%">:</td>
                        <td width="30%"><?php echo $d->jenis; ?></td>  
                        <td width="30%"></td>
                    </tr>
                    <tr><td width="10%"></td>
                        <td width="2%"></td>
                        <td width="10%">Status Pesanan</td>
                        <td width="5%">:</td>
                            <?php if($d->status_pelaksana=="" and $d->status=="Valid"){?>
                            <td><font color="orange"><b>Sedang diproses</b></font></td> 
                            <?php }else if ($d->status_pelaksana=="" and $d->status==""){ ?>
                            <td ><font color="orange"><b>Sedang diproses</b></font></td> 
                            <?php }else if ($d->status_pelaksana=="gagal"){ ?>
                            <td ><font color="red"><b>Tidak berhasil</b></font></td> 
                            <?php }else if ($d->status=="Tidak Valid"){ ?>
                            <td ><font color="red"><b>Tidak berhasil</b></font></td> 
                            <?php }else { ?>
                            <td ><font color="green"><b>Berhasil</b></font></td> 
                         <?php }?>
                         <td width="30%"></td>
                    </tr>
                    <tr><td width="10%"></td>
                        <td width="2%"></td>
                        <td width="10%">Biaya Pengiriman</td>
                        <td width="5%">:</td>
                            <?php if($d->status_pelaksana=="sukses"){ ?>
                            <td ><a href="<?php echo base_url()?>assets/admin/hasil/<?php echo $d->result; ?>" class="fa fa-download">&nbsp;<b>Download Hasil</b></a></td>       
                            <?php } else if($d->status_pelaksana=="gagal" or $d->status=="Tidak Valid"){ ?>
                            <td ><a href="<?php echo site_url()?>/Pesan/Detailgagal/<?php echo $d->id_order;?>" class="btn btn-primari">&nbsp;Lihat keterangan</a></td> 
                            <?php } else 
                            { echo '<td><font color="red"><b>Belum Tersedia</b></font></td>';} ?>   
                         <td width="30%"></td>
                    <tr> 
                    <tr><td width="10%"></td>
                        <td></td>
                        <td>Nama Bank/Keterangan</td>
                        <td>:</td>
                        <td  ><select name="bank" class="form-control"  >
                                    <option >BNI</option>
                                    <option>BRI</option>
                                    <option>BTN</option>
                                    <option>Mandiri</option>
                                    <option>Lainnya</option>
                            </select>
                        </td>
                         <td width="30%"></td>
                    </tr>
                    <tr><td width="10%"></td>
                        <td></td>
                        <td >Bukti Pembayaran</td>
                        <td >:</td>
                        <td  ><input type="file" name="bukti" required></td>
                         <td width="30%"></td>
                    </tr>  
                      
                     <?php $i++;} ?>
                        
                  </table><ul><br>
                            <center><a href="<?php echo site_url()?>/Pesan/Selesai" class="btn btn-prime">Kembali</a>
                            <button type="submit" class="btn btn-prime">Simpan</button>
                           </center>     
                        </ul><hr>
           
      </form>
    </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<?php $this->load->view('Footer_v'); ?>
<?php $this->load->view('LoadJS'); ?>