<?php $this->load->view('Header_v'); ?><br>
        <div class="amado_product_area section-padding-100">
            <div class="container-fluid">
<link href="<?php echo base_url('assets/css/datepicker.css');?>" rel="stylesheet">
  <center><h1>FORMULIR PEMESANAN JASA</h1></center>
<div>

    <?php $p=$produk->result();?>
    
    <form action="<?php echo site_url()?>/Pemesanan/konfirmasi/<?php echo $p[0]->id;?>" method="POST">
    
        <table class="table-padding tengah">
            <?php
                foreach($produk->result() as $p){
              ?><br>
            <input class="form-control" name="spek" value="<?php echo $p->jenis ?>" type="hidden">
            <input class="form-control" name="harga" value="<?php echo $p->harga ?>" type="hidden">
            <input class="form-control" name="kat" value="<?php echo $p->kategori ?>" type="hidden">
            <tr >
                <td width="10%"></td>
                <td width="20%">Kategori Pesanan</td>
                <td width="5%">:</td>
                <td width="40%"><?php echo $p->kategori ?></td>
            </tr>
             <tr>
                <td></td>
                <td>Jenis Pesanan</td>
                <td>:</td>
                <td><?php echo $p->jenis ?></td>

            </tr>
            <tr>
                <td></td>
                <td>Tanggal Pesanan</td>
                <td>:</td>
                <td><?php echo date("Y-m-d");?></td>
            </tr>
                <tr>
                <td></td>
                <td>Tanggal Penggunaan* (Pilih Tanggal)</td>
                <td>:</td>
                <td><input type="text" name="tanggal" placeholder="yyyy-mm-dd" class="tanggal" id="tanggal"  required/></td>
            </tr>
            <tr>
                <td></td>
                <td>Syarat Pesanan*</td>
                <td>:</td>
                <td><?php echo $p->syarat ?></td>
            </tr>
            <tr>
                <td></td>
                <td>Harga* </td>
                <td>:</td>
                 <td>Rp.<?php echo number_format($p->harga,0,",",".") ?> <br></td>
            </tr>

            <?php if($p->jenis=='MALDI TOF' or $p->jenis=='Jasa Identifikasi Molekuler') {
                ?>  
            <tr>
                <td></td>
                <td>Nama Sampel*</td>
                <td>:</td>
                <td><input class="form-control" name="nama_sample" type="text"></td>

            </tr>
            <tr>
                <td></td>
                <td>Jenis Sampel*</td>
                <td>:</td>
                <td>
                <select class="form-control" name="jenis_sample">
               
                    <option>Bakteri (Gram +)</option>
                    <option>Bakteri (Gram -)</option>
                    <option>Khamir</option>
                    <option>Arkea</option>
                    <option>Kapang</option>
                    <option>Bakteriofag</option>
                    <option >Mikroalga</option> 
		    <option >Lainnya</option> 
                </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>Kondisi Sampel*</td>
                <td>:</td>
                <td><input class="form-control" name="kondisi" type="text"></td>
            </tr>
            <tr>
                <td></td>
                <td>Umur Sampel*</td>
                <td>:</td>
                <td><input class="form-control" name="umur" type="text"></td>
            </tr>
                    
               
            <?php } else if ($p->jenis=='HPLC kualitatif' or $p->jenis=='HPLC kuantitatif') {
                
                    ?>
            <tr>
                <td></td>
                <td>Nama Sampel*</td>
                <td>:</td>
                <td><input class="form-control" name="nama_sample" type="text"></td>
            </tr>
            <tr>
                <td></td>
                <td>Jenis Sampel*</td>
                <td>:</td>
                <td><select class="form-control" name="jenis_sample">
                        <option>5C18-MS_II</option>
                         <option>VP-ODS</option>
                    </select></td>
            </tr>
            <tr>
                <td></td>
                <td>Laju Alir</td>
                <td>:</td>
                <td><input class="form-control" name="laju" type="text"></td>
            </tr>
            <tr>
                <td></td>
                <td>Suhu Kapiler</td>
                <td>:</td>
                <td><input class="form-control" name="suhukapiler" type="text"></td>
            </tr>
            <tr>
                <td></td>
                <td>Pelarut/Fase Gerak</td>
                <td>:</td>
                <td><input class="form-control" name="fasegerak" type="text"></td>
            </tr>
            <tr>
                <td></td>
                <td>RT</td>
                <td>:</td>
                <td><input class="form-control" name="rt" type="text"></td>
            </tr>
                
            <?php } else if ($p->jenis=='GC MS' or $p->jenis=='GC FID' ) {
                
                    ?>
            <tr>
                <td></td>
                <td>Nama Sampel*</td>
                <td>:</td>
                <td><input class="form-control" name="nama_sample" type="text"></td>
            </tr>

            <tr>
                <td></td>
                <td>Jenis Sampel*</td>
                <td>:</td>
                <td><select class="form-control" name="jenis_sample">
                         <option>FAME - WAX(Restex)</option>
                         <option>Stabil - WAX(Restex)</option>
                         <option>Rtx - 5MS(Restex)</option>
                         <option>Rxi-1MS(Restex)</option>
                    </select></td>
            </tr>
            <tr>
                <td></td>
                <td>Suhu Injektor</td>
                <td>:</td>
                <td><input class="form-control" name="suhuinjector" type="text"></td>
            </tr>
            <tr>
                <td></td>
                <td>Suhu MS</td>
                <td>:</td>
                <td><input class="form-control" name="suhums" type="text"></td>
            </tr>
            <tr>
                <td></td>
                <td>Suhu FID</td>
                <td>:</td>
                <td><input class="form-control" name="suhufid" type="text"></td>
            </tr>
            <tr>
                    <td></td>
                    <td>Pelarut</td>
                    <td>:</td>
                    <td><input class="form-control" name="pelarut" type="text"></td>
            </tr>
            <tr>
                <td></td>
                <td>RT</td>
                <td>:</td>
                <td><input class="form-control" name="rt" type="text"></td>
            </tr>
                
                <?php } else if ($p->jenis=='SEM Benchtop') {
                
                    ?>
            <tr>
                <td></td>
                <td>Nama Sampel*</td>
                <td>:</td>
                <td><input class="form-control" name="nama_sample" type="text"></td>
            </tr>
            <tr>
                <td></td>
                <td>Coating</td>
                <td>:</td>
                <td><input class="form-control" name="coating" type="text"></td>
            </tr>
            <tr>
                <td></td>
                <td>Jenis Sampel*</td>
                <td>:</td>
                <td>
                <select  class="form-control" name="jenis_sample">
                    <option>Bakteri (Gram +)</option>
                    <option>Bakteri (Gram -)</option>
                    <option>Khamir</option>
                    <option>Arkea</option>
                    <option>Kapang</option>
                    <option>Bakteriofag</option>
                    <option>Mikroalga</option> 
                        
                </select>
                </td>
            </tr>

                <?php } else if ($p->jenis=='Mikroskop flouresent') {
                
                    ?>
            <tr>
                    <td></td>
                    <td>Nama Sampel*</td>
                    <td>:</td>
                    <td><input class="form-control" name="nama_sample" type="text"></td>
            </tr>

            <tr>
                <td></td>
                <td>Jenis Sampel*</td>
                <td>:</td>
                <td>
                 <select  class="form-control" name="jenis_sample">
                    <option >Bakteri (Gram +)</option>
                    <option>Bakteri (Gram +)</option>
                    <option>Bakteri (Gram -)</option>
                    <option>Khamir</option>
                    <option>Arkea</option>
                    <option>Kapang</option>
                    <option>Bakteriofag</option>
                    <option>Mikroalga</option> 
                        
                </select>
                </td>
            </tr>
                <?php } else if ($p->jenis=='Varioskan dengan Plate' or $p->jenis=='Varioskan tanpa Plate') {?>
            <tr>
                <td></td>
                <td>Nama Sampel*</td>
                <td>:</td>
                <td><input class="form-control" name="nama_sample" type="text"></td>
            </tr>
            <tr>
                <td></td>
                <td>Jenis Sampel*</td>
                <td>:</td>
                <td>
                <select  class="form-control" name="jenis_sample">
                        <option>Photometric</option> 
                        <option>Fluorometric</option> 
                        <option>TRF</option> 

                </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>Aturan Lain</td>
                <td>:</td>
                <td><input class="form-control" name="aturan" type="text"></td>
            </tr>
            <tr>
                <td></td>
                <td>Suhu Inkubasi</td>
                <td>:</td>
                <td><input class="form-control" name="suhuinkubasi" type="text"></td>
            </tr>
            <tr>
                <td></td>
                <td>Shaking Speed</td>
                <td>:</td>
                <td><input class="form-control" name="shaking" type="text"></td>
            </tr>
                <?php } else if ($p->jenis=='Sentrifuge' ) {
                
                    ?>
            <tr>
                <td></td>
                <td>Nama Sampel*</td>
                <td>:</td>
                <td><input class="form-control" name="nama_sample" type="text"></td>
            </tr>
            <tr>
                <td></td>
                <td>Kecepatan</td>
                <td>:</td>
                <td><input class="form-control" name="Kecepatan" type="text"></td>
            </tr>
            <tr>
                <td></td>
                <td>Suhu</td>
                <td>:</td>
                <td><input class="form-control" name="Suhu" type="text"></td>
            </tr>
             <tr>
                <td></td>
                <td>Pilih Metode Pengiriman / Alamat</td>
                <td>:</td>
                <td><br><input type="radio" name="rad" id="rad1" value="Ambil di tempat" class="rad"/>Ambil ditempat  &nbsp;&nbsp;           <input type="radio" name="rad" id="rad2" value="JNE" class="rad"/>&nbsp;JNE &nbsp;&nbsp;
                        <input type="radio" name="rad" id="rad3" value="Pos Indonesia" class="rad"/>Pos Indonesia<br>
			         <!-- form yang mau ditampilkan-->
			       <div id="form1" style="display:none">
                            <input type="text" class="form-control" value="Gedung Inacc - LIPI, Jl Raya Jakarta-Bogor, 16911" readonly>
			        </div>
                    <div id="form2" style="display:none">
                                Alamat kirim: <font color="red" size="1pt"> *masukan alamat lengkap</font><textarea  name="alamat" type="text" class="form-control" ></textarea>
			         </div>
			     </td>
            </tr>
                <?php } else if ($p->jenis=='Freeze Drying' ) {
                    ?>
            <tr>
                <td></td>
                <td>Nama Sampel*</td>
                <td>:</td>
                <td><input class="form-control" name="nama_sample" type="text"></td>
            </tr>
            <tr>
                <td></td>
                <td>Jenis Sampel*</td>
                <td>:</td>
                <td><input class="form-control" name="jenis_sample" type="text"></td>
            </tr>
            <tr>
                <td></td>
                <td>Jumlah Sampel (mL)</td>
                <td>:</td>
                <td><input class="form-control" name="jumlah_sample" type="text"></td>
            </tr>
            <tr>
                <td></td>
                <td>Keterangan</td>
                <td>:</td>
                <td><input class="form-control" name="keterangan" type="text"></td>
            </tr>
           <?php } else if ($p->jenis=='Jasa L-Drying' or $p->kategori=='Pustaka' ) {
                    ?>
            <tr>
                <td></td>
                <td>Pilih Metode Pengiriman / Alamat</td>
                <td>:</td>
                <td><br><input type="radio" name="rad" id="rad1" value="Ambil di tempat" class="rad"/>Ambil ditempat  &nbsp;&nbsp;           <input type="radio" name="rad" id="rad2" value="JNE" class="rad"/>&nbsp;JNE &nbsp;&nbsp;
                        <input type="radio" name="rad" id="rad3" value="Pos Indonesia" class="rad"/>Pos Indonesia<br>
			         <!-- form yang mau ditampilkan-->
			       <div id="form1" style="display:none">
                            <input type="text" class="form-control" value="Gedung Inacc - LIPI, Jl Raya Jakarta-Bogor, 16911" readonly>
			        </div>
                    <div id="form2" style="display:none">
                                Alamat kirim: <font color="red" size="1pt"> *masukan alamat lengkap</font><textarea  name="alamat" type="text" class="form-control" ></textarea>
			         </div>
			     </td>
            </tr>

            <?php } ?>
            <tr>
                <td></td>
                <td>Permintaan Tambahan</td>
                <td>:</td>
                <td ><textarea name="req" class="form-control"></textarea></td>
            </tr>
            
        
        </table>
		
        <center>*) Wajib diisi<br>
              <a href="<?php echo site_url('Pesan')?>"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Kembali</a>
            <button type="submit" class="btn btn-prime"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;Proses</button>
        </center>
          
   
        <?php } ?><br>
    </form><br>
 
</div>
</div>
</div>
</div>
<script type="text/javascript">
            $(document).ready(function () {
                $('.tanggal').datepicker({
                    format: "yyyy-mm-dd"
                });
            });
</script>

        
		<!-- tambahkan jquery-->
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
		<script type="text/javascript">
			$(function(){
				$(":radio.rad").click(function(){
					$("#form1, #form2").hide()
					if($(this).val() == "Ambil di tempat"){
						$("#form1").show();
					}else{
						$("#form2").show();
					}
				});
			});
		</script>
            
<?php $this->load->view('Footer_v');?>

 <?php $this->load->view('LoadJS'); ?>