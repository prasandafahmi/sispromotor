<?php  $this->load->view('Header_v'); ?> <br>

<?php $this->load->view('side_v'); ?>

                <div class="amado_product_area section-padding-100">
            <div class="container-fluid">
                <div class="row">
    <div class="col-md-11" style="margin-top:7%;margin-left:6%;">
<div class="panelbayar">
       <form action="<?php echo site_url('Pesan/inputtracking')?>" method="POST"><br>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;Silahkan masukkan No. Resi Pengiriman Sample anda!</p><br>
        <table class=" table-padding">
            <?php $i=1; foreach($order->result() as $d){?>
        <tr> <input type="hidden" name="id" value="<?php echo $d->id_order;?>">
            <td></td>
            <td width="30%">Nomor Pemesanan</td>
            <td width="5%">:</td>
            <td  width="40%"><?php echo $d->kode_order; ?></td> 
            <?php $i++;}  ?>
        </tr>
        <tr>
            <td></td>
            <td >No.Resi</td>
            <td >:</td>
            <td ><input  type="text" name="resi" class="form-control" id="resi"></td>
        </tr>
        <tr>
            <td></td>
            <td>Pengiriman Via</td>
            <td>:</td>
            <td >
                <select name="ekspedisi" class="form-control tracking">
                   
                    <option>Pos Indonesia</option>        
                    <option>JNE</option>                    
                    <option>Tiki</option>   
                    <option>Lainnya</option>   
                     <option>Diantar Langsung</option>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td >Atas Nama</td>
            <td>:</td>
            <td ><input type="text" name="atas_nama" class="form-control"></td>
                
        </tr>
            
        </table>
        <center>
                <a href="<?php echo site_url('Pesan/Pelaksanaan')?>"  class="btn-primm">&nbsp;&nbsp;Kembali&nbsp;&nbsp;</a>
               <button type="submit" class="btn-primary">Simpan</button>
           </center><hr>
    </form>
</div>
    </div>
</div>
</div>
</div>
</div>
<?php $this->load->view('Footer_v'); ?>
<?php $this->load->view('LoadJS'); ?>
<script type="text/javascript">
$(function() {
   
        $(this).find('.tracking').on('change', function(e) {
            // Enter pressed?
            if((this.value)=="Diantar Langsung"){
                 $('#resi').val('Diantar Langsung');
            }
        });
    });
</script>