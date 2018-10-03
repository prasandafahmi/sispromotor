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
                <form action="<?php echo site_url(); ?>/pelaksana/Result/update_data/" method="post" enctype="multipart/form-data">
            <tr>    
                <input type="hidden" name="id" value="<?php echo $p->id_detail; ?>">
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
                     <th>Hasil</th>
                
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
          <td><input type="file" name="result" id="exampleInputFile3" required> FIle Berupa PDF</td>
                         
        </tr>
                
                      <tr>
                         <?php if(! empty($p->status_pelaksana)){?>
                         <td> <a href="<?php echo site_url();?>/pelaksana/Result">Kembali</a>
                         </td>
                         <?php }else{?>
                         <td>  <button>Kirim</button>
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