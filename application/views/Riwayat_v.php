<?php $this->load->view('Header_v'); ?> <br>
<?php $this->load->view('side_v'); ?>

        <div class="amado_product_area section-padding-100">
            <div class="container-fluid">
                <div class="row">
<div class="panelriwayat">
      <h1><i class="fa fa-list" aria-hidden="true"></i> Riwayat Pesanan</h1>
      <table class="table-padding table-responsive table" id="myTable"><br>
          <thead>
           <tr>
                <th>No.</th>
                <th >Nomor Pesanan</th>
                <th>Tanggal Pesan </th>
                <th>Nama Pesanan</th>
                <th>Keterangan</th>  
                <th>Status Pesanan</th>
                <th>Status Pembayaran</th>
                <th>Status Validasi</th>
                <th>Hasil Pesanan</th>  
                <th>Surat Bidang</th>  
            </tr>
          </thead>
          <tbody>
            <?php $i=1; foreach($detail->result() as $d){ ?>
            <tr>
                <td ><?php echo $i; ?></td>
                <td ><?php echo $d->kode_order; ?></td>
                <td ><?php echo $d->date; ?></td>
                <td ><?php echo $d->jenis; ?></td>
                <?php if($d->jenis=='Jasa L-Drying' or $d->kategori=='Pustaka' or $d->jenis=='Sentrifuge') {
                ?>  <?php if($d->bukti_bayar=="") {
                ?>  <td ><a href="<?php echo site_url('Pesan/Detailakhir/');?><?php echo $d->id_order;?>" class="btn btn-primari">&nbsp;Lihat keterangan</a></td>
                 <?php } else {?>
                <td ><center>-</center></td> 
                <?php }?>
                <?php } else {?>
                <td><center>-</center></td>
                <?php }?>
                <?php if($d->status_pelaksana=="" and $d->status=="Valid"){?>
                <td><font color="orange"><b>Diterima</b></font></td> 
                <?php }else if ($d->status_pelaksana=="" and $d->status==""){ ?>
                <td ><font color="orange"><b>Sedang diproses</b></font></td> 
                <?php }else if ($d->status_pelaksana=="gagal"){ ?>
                <td ><font color="red"><b>Tidak berhasil</b></font></td> 
                <?php }else if ($d->status=="Tidak Valid"){ ?>
                <td ><font color="red"><b>Tidak berhasil</b></font></td> 
                <?php }else { ?>
                <td ><font color="green"><b>Berhasil</b></font></td> 
                <?php }?>
                <td><?php if($d->h==0){echo "Gratis";}else{echo "Bayar";}?></td>
                <td><?php echo $d->sp;?></td>
                <?php if($d->status_pelaksana=="sukses"){ ?>
                     <td ><?php if($d->Survei=="1"){?><a href="<?php echo site_url()?>/Kepuasan/selesai/<?php echo $d->id_detail;?>" class="fa fa-download">&nbsp;<b>Download Hasil</b></a>
                    <?php }else{?>
                         <a href="<?php echo base_url()?>/assets/admin/hasil/<?php echo $d->result;?>" target="_blank" class="fa fa-download">&nbsp;<b>Download Hasil</b></a>
                         <?php }?>
                    </td>       
                <?php } else if($d->status_pelaksana=="gagal" or $d->status=="Tidak Valid" or $d->status_persetujuan=="Tidak Setuju"){ ?>
                    <td ><a href="<?php echo site_url()?>/Pesan/Detailgagal/<?php echo $d->id_order;?>" class="btn btn-primari">&nbsp;Lihat keterangan</a>
                <?php } else 
                    { echo '<td><font color="red"><b>Belum Tersedia</b></font></td>';} ?>
                   </td> 
                
                   <?php if($d->status_pelaksana=="sukses"){ 
                if($d->upload!=""){?>
                     <td ><?php if($d->Survei=="1"){?><a href="<?php echo site_url()?>/Kepuasan/selesai/<?php echo $d->id_detail;?>" class="fa fa-download">&nbsp;<b>Download Surat Bidang</b></a>
                    <?php }else{?>
                         <a href="<?php echo base_url()?>/assets/admin/bidang/<?php echo $d->upload;?>" target="_blank" class="fa fa-download">&nbsp;<b>Download Surat Bidang</b></a>
                         <?php }?>
                    </td>  
                <?php }else{
                echo '<td><font color="red"><b>Belum Tersedia</b></font></td>';
                }
                 } else if($d->status_pelaksana=="gagal" or $d->status=="Tidak Valid" or $d->status_persetujuan=="Tidak Setuju"){ ?>
                    <td ><a href="<?php echo site_url()?>/Pesan/Detailgagal/<?php echo $d->id_order;?>" class="btn btn-primari">&nbsp;Lihat keterangan</a>
                <?php } else 
                    { echo '<td><font color="red"><b>Belum Tersedia</b></font></td>';} ?>
                   </td> 
                
                
            </tr>
           <?php $i++;} ?>
          </tbody>
      </table><hr><br><br>
    </div>
    </div>
                        </div>
                    </div>
                                <!-- Ratings & Cart -->
                               
                            </div>
                        </div>
                    </div>


                   </div>

              
            </div>
        </div>
    </div>
    
<?php $this->load->view('Footer_v'); ?>
<?php $this->load->view('LoadJS'); ?>