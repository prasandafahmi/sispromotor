<?php  $this->load->view('Header_v'); ?> <br>

        <div class="amado_product_area section-padding-100">
            <div class="container-fluid">
<section>
<div>
    <center>
        <h2>FORMULIR PEMESANAN JASA</h2>
    </center><br>
    <script>
        function clear_cart() {
           var result = confirm('Apakah anda ingin menghapus pesanan anda?');
        if(result) {
              window.location = "<?php echo base_url(); ?>Pemesanan/remove/all";
            } 
        else {
            return false; // cancel button
            }
        }
    </script>
   
 <div class="container">
    <div class="row">  
    <table class="table-responsive table-padding table" ><?php $cart=$this->cart->contents(); if($this->session->userdata('id_order')){ ?>
        <?php echo form_open('Pemesanan/save'); ?>
        <tr>
            <td ></td>
            <td >No.</td>
            <td >Kategori Pesanan</td>
            <td >Jenis Pesanan</td>
            <td >Permintaan Pesanan</td>
            <td width="5%" >Jumlah</td>
            <td >Harga</td>
            <td >Total Pembayaran</td>
    
            <td></td>
        </tr>
        <?php 
        $grand_total = 0; $i = 1; $total_qty = 0;
        
        foreach ($cart as $item):

            echo form_hidden('cart['. $item['id'] .'][id]', $item['id']);
            echo form_hidden('cart['. $item['id'] .'][rowid]', $item['rowid']);
            echo form_hidden('cart['. $item['id'] .'][name]', $item['name']);
            echo form_hidden('cart['. $item['id'] .'][price]', $item['price']);
            echo form_hidden('cart['. $item['id'] .'][qty]', $item['qty']);
            echo form_hidden('cart['. $item['id'] .'][options]', $item['options']);
            echo form_hidden('cart['. $item['id'] .'][kategori]', $item['kategori']);
        ?>
        <tr>
            <td ></td>
            <td><?php echo $i++; ?></td>
            <td><?php cetak($item['kategori']) ; ?></td>
            <td><?php cetak($item['name']) ; ?></td>
            <td><?php cetak($item['options']) ; ?></td>
            <td><?php cetak($item['qty']) ; ?></td>
            <td>Rp.<?php cetak(number_format($item['price'],0,",","."))  ?></td>
            <td>Rp. <?php cetak(number_format($item['subtotal'],0,",","."))  ?></td>
            <td>
                <a type="button" href="<?php echo site_url('Pemesanan/batal/'); ?><?php cetak($item['rowid']); ?>" class="btn btn-default btn-sm btn-danger tebal"><span class="icon_close "></span> Batal</a>
               
            </td>
        </tr>
        
        <?php $total_qty += $item['qty']; $grand_total = $grand_total + $item['subtotal'];?>
        <?php endforeach; ?>

            <tr>
                <td></td>
                <td><b>Total</b></td>
                <td></td>
                <td></td>
                <td></td>
                <td><b><?php echo $total_qty; ?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td></td>
                <td><b>Rp. <?php echo number_format($grand_total,0,",",".") ?></b></td>
                <td></td>
                
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><a href="<?php echo site_url('Pesan'); ?>" type="submit" class="btn btn-primary btn-sm tebal"><i class="fa fa-shopping-cart"></i>&nbsp;Pesan Kembali</a> </td>
                <td></td>
                <td></td>
                <td></td><td></td>
    
                <td><button type="submit" class="btn btn-primary btn-sm tebal"><i class="fa fa-check"></i> &nbsp;Konfirmasi Pesanan</button></td> <td>&nbsp;</td>
                
            </tr>
            <?php echo form_close(); ?>
            <?php }else{ ?>
         <tr>
            <td ></td>
            <td >No.</td>
            <td >Kategori Pesanan</td>
            <td >Jenis Pesanan</td>
            <td >Permintaan Pesanan</td>
            <td width="5%" >Jumlah</td>
            <td >Harga</td>
            <td >Total Pembayaran</td>
            
        </tr>
        <tr><center><td colspan="10" class="text-center">Anda belum memiliki pesanan</td></center></tr>
        <tr>
        <td colspan="10"><a href="<?php echo site_url('Pesan'); ?>" type="submit" class="btn btn-primary btn-sm tebal"><i class="fa fa-arrow-left"></i>&nbsp;Kembali ke Pesanan</a></td>
        </tr>
        
        
<?php }?>
    </table>
        </div>
    </div>
</div>

</section><br><br><br><br><br><br><br><br>
</div>
</div>
</div>

<?php $this->load->view('Footer_v'); ?>
<?php $this->load->view('LoadJS'); ?>