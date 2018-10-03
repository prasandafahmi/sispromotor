<!DOCTYPE html>
<html>
<?php $this->load->view("layout/header.php")?>
<body>
    <?php $this->load->view("layout/bar.php")?>
	<div id="wrapper">
    <?php $this->load->view("layout/wrapper.php")?>
		<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel-body">
                          <h4 class="modal-title">Daftar Verifikasi</h4>
                    <div class="table-responsive">
                        <table class="table bayar no-bordered huruf-hitam"><?php $m=$menunya->result();?>
                            <form action="<?php echo site_url(); ?>/bendahara/Verifikasi/update_bayar/<?php echo $m[0]->id_bayar;?>" method="post">
                                <br>
                                 <tr>
                                    <th>Kode order</th>
                                    <th>Jenis</th>
                                    <th>Spesifikasi</th>
                                    <th>Harga</th>
                                  </tr> 
                                    <?php
                                    $i=1;
                                    $total_jmlh=0; $total_harga=0; $harga=0;$qty=0;$tot_qty=0;$tot_harga=0;
                                    foreach($menunya->result() as $permenu){
                                        $price=$permenu->harga*$permenu->jumlah;
                                        $total_harga+=($permenu->harga*$permenu->jumlah);?>
                                          <tr> 
                                            <td><?php echo $permenu->kode_order; ?></td>
                                            <td><?php echo $permenu->kategori; ?></td>
                                            <td><?php echo $permenu->jenis; ?></td>
                                            <td>Rp. <?php echo $harga=$permenu->harga*$permenu->jumlah; ?></td>
                                          </tr>
                                                <?php $tot_qty+=$qty;$tot_harga+=$price;}?>
                                          <tr>
                                            <td colspan="3" >Total</td>
                                            <td>Rp. <?php echo $tot_harga; ?></td>
                                          </tr>
                                            <td>
                                                <?php if(! empty($permenu->bukti_transfer)){?><a href="<?php echo site_url()?>/bendahara/Verifikasi/download_bukti/<?php echo $permenu->id_order; ?>"class="btn btn-primary btn-sm tebal"><span class="icon_download "></span> Download Bukti Pembayaran</a><?php }else { echo "Bukti pembayaran belum tersedia"; }?>
                                            </td>
                                                <tr>
                                                    <td> Status Validasi</td>
                                                    <td>
                                                        <?php if(($permenu->ps)=="proses"){?>
                                                        <select name="status" required >  
                                                            <option value="">- Pilih Status -</option>
                                                            <option <?php if( $permenu->ps=='Valid') {echo "selected"; } ?>> Valid</option>
							                                 <option <?php  if( $permenu->ps=='Tidak Valid') {echo "selected"; } ?>> Tidak Valid</option>
						                                </select>  
                                                        
                                                        <?php }else{?>
                                                        <select   disabled required>  
                                                            <option <?php if( $permenu->ps=='Valid') {echo "selected"; } ?>> Valid</option>
							                                 <option <?php  if( $permenu->ps=='Tidak Valid') {echo "selected"; } ?>> Tidak Valid</option>
						                                </select>   
                                                        <?php }?>
                                                    </td>
                                               </tr>
                                                <tr>
                                                    <td>Status Pembayaran</td>
                                                    <td>
                                                    <select name="bayar_or_no" required >  
                                                            <option value="">- Pilih Status -</option>
                                                            <option <?php if( $this->session->userdata('bayarorno')=='Bayar') {echo "selected"; } ?>> Bayar</option>
							                                 <option <?php if( $this->session->userdata('bayarorno')=='Gratis')  {echo "selected"; } ?>> Gratis</option>
						                                </select>  
                                                    </td>
                                               </tr>
                                               <tr>
                                                <?php if(($permenu->ps)=="proses" and ($permenu->tanggal)!="0000-00-00"){?>
                                                   <td colspan="3">  
                                                       <input type="submit" value="Kirim">
                                                   </td>
                                                   <?php }else{?>
                                                   <td colspan="3"> 
                                                       <a href="<?php echo site_url();?>/bendahara/Verifikasi">Kembali</a>
                                                   </td>
                         
                                                   <?php }?>
                                               </tr>
                            </form>
                         </table>
                    </div>
                 </div>
                </div>
               </div>
            </div>
            </div>
        </div>
<?php $this->load->view("layout/footer.php")?>
</body>
</html>