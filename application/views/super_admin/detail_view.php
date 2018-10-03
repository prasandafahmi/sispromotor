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
					<div class="col-md-12">
                        <div class="panel-body">
                             <h4 class="modal-title">Detail Pesanan </h4>
                            <br>
                            <div class="table-responsive">
                                          
          <?php if(!empty($id)) { ?>
			<table class="table table-striped table-advance table-hover">
            <?php foreach($produk->result() as $p){
?>
            <form action="<?php echo site_url(); ?>/super_admin/Pemesanan/validasi/" method="post"> 
              <input type="hidden" id="id" name="id_detail" class="form-control huruf-hitam" value="<?php echo $p->id_detail;?>" autofocus required/>  
              <tr>   
       <?php if($p->kategori==""){echo ""; }else{?>  <th>Jenis</th><?php }?>
                   <?php if($p->jenis==""){echo ""; }else{?>  <th>Spesifikasi</th><?php }?>
                   <?php if($p->nama_sample==""){echo ""; }else{?>  <th>Nama sample</th><?php }?>
                   <?php if($p->jenis_sample==""){echo ""; }else{?>  <th>Jenis sample</th><?php }?>
                   <?php if($p->lamda_emission==""){echo ""; }else{?>  <th>Lamda emission</th><?php }?>
                   <?php if($p->lamda==""){echo ""; }else{?>  <th>Lamda</th><?php }?>
                   <?php if($p->request==""){echo ""; }else{?>  <th>Request</th><?php }?>
                   <?php if($p->lamda_excitation==""){echo ""; }else{?>  <th> Lamda Excitation</th><?php }?>
                   <?php if($p->excitation_bandwith==""){echo ""; }else{?>  <th>Excitation Bandwith</th><?php }?>
                   <?php if($p->trf_delaytime==""){echo ""; }else{?>  <th>tTrf Delaytime</th><?php }?>
                   <?php if($p->trf_integrationtime==""){echo ""; }else{?>  <th>Trf Integrationtime</th><?php }?>
                   <?php if($p->coating==""){echo ""; }else{?>  <th>Coating</th><?php }?>
                   <?php if($p->predenaturasi==""){echo ""; }else{?>  <th>Predenaturasi</th><?php }?>
                   <?php if($p->denaturasi==""){echo ""; }else{?>  <th>Denaturasi</th><?php }?>
                   <?php if($p->annealing==""){echo ""; }else{?>  <th>Annealing</th><?php }?>
                   <?php if($p->extention==""){echo ""; }else{?>  <th>Extention</th><?php }?>
                   <?php if($p->cycle==""){echo ""; }else{?>  <th>Cycle</th><?php }?>
                   <?php if($p->keterangan_tambahan==""){echo ""; }else{?>  <th>Keterangan Tambahan</th><?php }?>
                   <?php if($p->kondisi_sample==""){echo ""; }else{?>  <th>Kondisi Sample</th><?php }?>
                   <?php if($p->umur_sample==""){echo ""; }else{?>  <th>Umur Sample</th><?php }?>
                   <?php if($p->laju_alir==""){echo ""; }else{?>  <th>Laju Alir</th><?php }?>
                   <?php if($p->fase_gerak==""){echo ""; }else{?>  <th>Fase Gerak</th><?php }?>
                   <?php if($p->suhu_kolom==""){echo ""; }else{?>  <th>Suhu Kolom</th><?php }?>
                   <?php if($p->panjang_gelombang==""){echo ""; }else{?>  <th>Panjang Gelombang</th><?php }?>
                   <?php if($p->jenis_kapiler==""){echo ""; }else{?>  <th>Jenis Kapiler</th><?php }?>
                   <?php if($p->detektor==""){echo ""; }else{?>  <th>Detektor</th><?php }?>
                   <?php if($p->suhu_kapiler==""){echo ""; }else{?>  <th>Suhu Kapiler</th><?php }?>
                   <?php if($p->suhu_fid==""){echo ""; }else{?>  <th>Suhu Fid</th><?php }?>
                   <?php if($p->suhu_injektor==""){echo ""; }else{?>  <th>Suhu Injektor</th><?php }?>
                   <?php if($p->jumlah_sample==""){echo ""; }else{?>  <th>Jumlah Sample</th><?php }?>
                   <?php if($p->keterangan==""){echo ""; }else{?>  <th>Keterangan</th><?php }?>
                   <?php if($p->suhu==""){echo ""; }else{?>  <th>Suhu</th><?php }?>
                   <?php if($p->waktu_persample==""){echo ""; }else{?>  <th>Waktu Persample</th><?php }?>
                   <?php if($p->kecepatan==""){echo ""; }else{?>  <th>Kecepatan</th><?php }?>
                   <?php if($p->RT==""){echo ""; }else{?>  <th>RT</th><?php }?>
                   <?php if($p->suhums==""){echo ""; }else{?>  <th>Suhums</th><?php }?>
                   <?php if($p->shaking==""){echo ""; }else{?>  <th>Shaking</th><?php }?>
                   <?php if($p->suhu_inkubasi==""){echo ""; }else{?>  <th>Suhu Inkubasi</th><?php }?>
                   <?php if($p->pelarut==""){echo ""; }else{?>  <th>Pelarut</th><?php }?>
                   <?php if($p->aturan_lain==""){echo ""; }else{?>  <th>Aturan lain</th><?php }?>
                   <?php if($p->pelaksana==""){echo ""; }else{?>  <th>Pelaksana</th><?php }?>
                   <?php if($p->tgl_penggunaan==""){echo ""; }else{?>  <th>Tanggal digunakan</th><?php }?>
                    <?php if($p->alamat_kirim==""){echo ""; }else{?>  <th>Alamat Kirim</th><?php }?>
                    <?php if($p->jasa==""){echo ""; }else{?>  <th>Jasa</th><?php }?>
                  <?php if($p->alasan==""){echo ""; }else{?>  <th>Alasan</th><?php }?>
                   <th>Status</th>
        </tr>
        <tr> 
         <?php if($p->kategori==""){echo ""; }else{?>  <td><?php echo $p->kategori; ?></td><?php }?>
          <?php if($p->jenis==""){echo ""; }else{?>  <td><?php echo $p->jenis; ?></td><?php }?>
          <?php if($p->nama_sample==""){echo ""; }else{?>  <td><?php echo $p->nama_sample; ?></td><?php }?>
          <?php if($p->jenis_sample==""){echo ""; }else{?>  <td><?php echo $p->jenis_sample; ?></td><?php }?>
          <?php if($p->lamda_emission==""){echo ""; }else{?>  <td><?php echo $p->lamda_emission; ?></td><?php }?>
          <?php if($p->lamda==""){echo ""; }else{?>  <td><?php echo $p->lamda; ?></td><?php }?>
          <?php if($p->request==""){echo ""; }else{?>  <td><?php echo $p->request; ?></td><?php }?> 
          <?php if($p->lamda_excitation==""){echo ""; }else{?>  <td><?php echo $p->lamda_excitation; ?></td><?php }?>
          <?php if($p->excitation_bandwith==""){echo ""; }else{?>  <td><?php echo $p->excitation_bandwith; ?></td><?php }?>
          <?php if($p->trf_delaytime==""){echo ""; }else{?>  <td><?php echo $p->trf_delaytime; ?></td><?php }?>
          <?php if($p->trf_integrationtime==""){echo ""; }else{?>  <td><?php echo $p->trf_integrationtime; ?></td><?php }?>
          <?php if($p->coating==""){echo ""; }else{?>  <td><?php echo $p->coating; ?></td><?php }?>
          <?php if($p->predenaturasi==""){echo ""; }else{?>  <td><?php echo $p->predenaturasi; ?></td><?php }?>
          <?php if($p->denaturasi==""){echo ""; }else{?>  <td><?php echo $p->denaturasi; ?></td><?php }?>
          <?php if($p->annealing==""){echo ""; }else{?>  <td><?php echo $p->annealing; ?></td><?php }?>
          <?php if($p->extention==""){echo ""; }else{?>  <td><?php echo $p->extention; ?></td><?php }?>
          <?php if($p->cycle==""){echo ""; }else{?>  <td><?php echo $p->cycle; ?></td><?php }?>
          <?php if($p->keterangan_tambahan==""){echo ""; }else{?>  <td><?php echo $p->keterangan_tambahan; ?></td><?php }?>
          <?php if($p->kondisi_sample==""){echo ""; }else{?>  <td><?php echo $p->kondisi_sample; ?></td><?php }?>
          <?php if($p->umur_sample==""){echo ""; }else{?>  <td><?php echo $p->umur_sample; ?></td><?php }?>
          <?php if($p->laju_alir==""){echo ""; }else{?>  <td><?php echo $p->laju_alir; ?></td><?php }?>
          <?php if($p->fase_gerak==""){echo ""; }else{?>  <td><?php echo $p->fase_gerak; ?></td><?php }?>
          <?php if($p->suhu_kolom==""){echo ""; }else{?>  <td><?php echo $p->suhu_kolom; ?></td><?php }?>
          <?php if($p->panjang_gelombang==""){echo ""; }else{?>  <td><?php echo $p->panjang_gelombang; ?></td><?php }?>
          <?php if($p->jenis_kapiler==""){echo ""; }else{?>  <td><?php echo $p->jenis_kapiler; ?></td><?php }?>
          <?php if($p->detektor==""){echo ""; }else{?>  <td><?php echo $p->detektor; ?></td><?php }?>
          <?php if($p->suhu_kapiler==""){echo ""; }else{?>  <td><?php echo $p->suhu_kapiler; ?></td><?php }?>
          <?php if($p->suhu_fid==""){echo ""; }else{?>  <td><?php echo $p->suhu_fid; ?></td><?php }?>
          <?php if($p->suhu_injektor==""){echo ""; }else{?>  <td><?php echo $p->suhu_injektor; ?></td><?php }?>
          <?php if($p->jumlah_sample==""){echo ""; }else{?>  <td><?php echo $p->jumlah_sample; ?></td><?php }?>
          <?php if($p->keterangan==""){echo ""; }else{?>  <td><?php echo $p->keterangan; ?></td><?php }?>
          <?php if($p->suhu==""){echo ""; }else{?>  <td><?php echo $p->suhu; ?></td><?php }?>
          <?php if($p->waktu_persample==""){echo ""; }else{?>  <td><?php echo $p->waktu_persample; ?></td><?php }?>
          <?php if($p->kecepatan==""){echo ""; }else{?>  <td><?php echo $p->kecepatan; ?></td><?php }?>
          <?php if($p->RT==""){echo ""; }else{?>  <td><?php echo $p->RT; ?></td><?php }?>
          <?php if($p->suhums==""){echo ""; }else{?>  <td><?php echo $p->suhums; ?></td><?php }?>
          <?php if($p->shaking==""){echo ""; }else{?>  <td><?php echo $p->shaking; ?></td><?php }?>
          <?php if($p->suhu_inkubasi==""){echo ""; }else{?>  <td><?php echo $p->suhu_inkubasi; ?></td><?php }?>
          <?php if($p->pelarut==""){echo ""; }else{?>  <td><?php echo $p->pelarut; ?></td><?php }?>
          <?php if($p->aturan_lain==""){echo ""; }else{?>  <td><?php echo $p->aturan_lain; ?></td><?php }?>
          <?php if($p->pelaksana==""){echo ""; }else{?>  <td><?php echo $p->pelaksana; ?></td><?php }?>
          <?php if($p->tgl_penggunaan==""){echo ""; }else{?>  <td><?php echo $p->tgl_penggunaan; ?></td><?php }?>
         <?php if($p->alamat_kirim==""){echo ""; }else{?>  <td><?php echo $p->alamat_kirim; ?></td><?php }?>
             <?php if($p->jasa==""){echo ""; }else{?>  <td><?php echo $p->jasa; ?></td><?php }?>
            <?php if($p->alasan==""){echo ""; }else{?>  <td><?php echo $p->alasan; ?></td><?php }?>
            <td>
                <?php if(! empty($p->status_persetujuan)){?>
                <select name="status" disabled>  
                            <option <?php  if( $p->status_persetujuan=='Tidak setuju') {echo "selected"; }else{echo ""; } ?> >Tidak Setuju</option>
							<option <?php if( $p->status_persetujuan=='Setuju') {echo "selected"; }else{echo ""; } ?>> Setuju</option>
							
						</select>
                <?php }else{?>
						<select name="status"  >          
							<option value="Setuju" <?php if($p->status_persetujuan=='Setuju') {echo "selected"; }else{echo ""; } ?>> Setuju</option>
                            <option  onClick="myFunction(<?php echo $p->id_detail;?>)">Tidak Setuju</option>
						</select>
                <?php }?>
                    </td>
        </tr> 
                      <tr>
                         <?php if(! empty($p->status_persetujuan)){?>
                         <td colspan="3"> <a href="<?php echo site_url();?>/super_admin/Pemesanan">Kembali</a>
                         </td>
                         <?php }else{?>
                         <td colspan="3">  <button>Kirim</button>
                         <?php }?>
                     </tr>
               </form> 
      <?php
}
      
}?>
              
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

<!-- Modal -->
                             
                              <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog dialog-news">
                                      <div class="modal-content">
                                          <div class="modal-header text-center tebal">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title huruf-hitam"><b>Alasan Penolakan Pesanan</b></h4>
                                          </div>
                                          <div class="modal-body">

                                              <table class="no-border text-center huruf-hitam" style="margin-left:10%;">
                                                  <form id="form-staff" class="form-control">
                                                  <input type="hidden" id="id" name="id_detail" class="form-control huruf-hitam" autofocus required/>
                                                      <input type="hidden" id="status" name="status" value="Tidak Setuju" class="form-control huruf-hitam" autofocus required/>
                                                        <tr class="huruf-hitam">
                                                      <th class="huruf-hitam">Alasan</th>
                                                      <td width="5%" class="huruf-hitam"> : </td>
                                                      <td><textarea  id="alasan" name="alasan" cols="50" rows="10" class="form-control huruf-hitam" autofocus required></textarea></td>
                                                      <tr style="margin-top:5%">
                                                          <td colspan="3" class="text-right"> <br>
                                                              <button type="submit" class="btn btn-sm btn-primary btn-pesan" type="button"><span class="icon_box-checked"></span> &nbsp;Simpan</button></td>
                                                      </tr>
                                                  </form>
                                              </table>

                                          </div>
                                          <div class="modal-footer">
                                              <center>&copy; 2017 | SISPROMOTOR LIPI Cibinong</center>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <!-- modal -->

  <script type="text/javascript">
         <!--
            function myFunction(id){
            
               $('#myModal #id').val(id);
               $('#myModal').modal('show');
            }
         
          $(document).ready(function(e){
                     $("#form-staff").on("submit", function(e){
                        e.preventDefault();
                        $.ajax({
                           url:'<?php echo site_url(); ?>/super_admin/Pemesanan/validasi/',
                            type:'POST',
                            data: new FormData(this),
                            contentType : false,
                            cache :false,
                            processData: false,
                            success: function(data){
                                $('#myModal').hide();
                                location.reload();
                            }
                        });
       
   });
   });
         //-->
      </script>

