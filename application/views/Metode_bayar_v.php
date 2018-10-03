<?php $this->load->view('Header_v'); ?> <br>

<?php $this->load->view('side_v'); ?>

                <div class="amado_product_area section-padding-100">
            <div class="container-fluid">
                <div class="row">
    <div class="col-md-11" style="margin-top:7%;margin-left:6%;">
<div class="panelbayar">
   
    <?php $d=$detail->result();?>
    <form action="<?php echo site_url('Pesan/cekbukti/');?><?php echo $d[0]->id_order;?>" method="post" enctype="multipart/form-data">
     <ul class="nav nav-pills nav-justified"><br>
        <li ><a href="<?php echo site_url('Pesan/detailditempat/');?><?php echo $d[0]->id_order;?>"><i class="fa fa-group"></i><br>Bayar di Tempat</a></li>&nbsp; &nbsp;&nbsp;
        <li class="active"><a href="<?php echo site_url('Pesan/metode/');?><?php echo $d[0]->id_order;?>"><i class="fa fa-money"></i><br>Transfer Bank</a></li>
    </ul><hr>
        <div class="col-sm-12">
            Khusus untuk internal Pusat Penelitian Biologi-LIPI dan mitra kerjasama silahkan kontak kami untuk mengajukan kerjasama, jika telah tercapai kesepakatan kerjasama, upload surat permohonan/ keterangan kesepakatan disini
            <br>
        </div>
    <table class=" table-padding">
        <tr style="border:1px solid #000;background:#77ccff;">
                <th colspan="4" style="padding-left:2.5%;">Informasi Pembayaran</th>
            </tr>
            <tr style="border:1px solid #000;">
                <td></td>
                <td >Metode Pembayaran</td>
                <td >:</td>
                <td >Bank Tranfer</td>
            </tr>
            <tr style="border:1px solid #000;">
                 <td></td>
                <td>Bank</td>
                <td>:</td>
                <td>BRI</td>
            </tr>
            <tr style="border:1px solid #000;">
                 <td></td>
                <td>Atas Nama</td>
                <td>:</td>
                <td>Nur Halimah Sadiah</td>
            </tr>
            <tr style="border:1px solid #000;">
                 <td></td>
                <td>No Rekening</td>
                <td>:</td>
                <td>1798 01-000942 50-1</td>
            </tr>
        <tr>
            <td colspan="4">&nbsp;</td>
        </tr>
         <?php $total=0;$harga2; foreach($detail->result() as $d){
        $harga2=$d->harga*$d->jumlah;
        $total+=$harga2;
        } 
         $d=$detail->result();?>
        <tr>
            <td width="2%"></td>
            <td width="30%">Nomor Pesanan</td>
            <td width="5%">:</td>
            <td width="40%"><?php echo $d[0]->kode_order; ?></td>    
        </tr>
        <tr>
            <td></td>
            <td >Total Biaya</td>
            <td >:</td>
            <td >Rp. <?php echo number_format($total,0,",",".")?></td> 
        </tr>
        <tr>
            <td></td>
            <td >Pilih Metode</td>
            <td>:</td>
            <td ><select name="metode" class="form-control"  >
                        <option > Transfer</option>
                        <option > M-Banking</option>
                        <option > Lainnya</option>
                        
                 </select>
            </td>
        </tr>
        <tr>
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
        </tr>
        <tr>
            <td></td>
            <td >Bukti Pembayaran</td>
            <td >:</td>
            <td  ><input type="file" name="bukti" required></td>
        </tr>   
        <?php  ?>
        </table>
        <ul><br>
           <center><a href="<?php echo site_url('Pesan/Pembayaran')?>">Kembali</a>
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

<?php $this->load->view('Footer_v'); ?>
<?php $this->load->view('LoadJS'); ?>