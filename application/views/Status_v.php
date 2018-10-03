 <?php $this->load->view('Header_v');?><br>

<?php $this->load->view('side_v'); ?>

        <div class="amado_product_area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                <div class="col-100 col-lg-100" style="margin-left: 10px;">
                        <div class="checkout_details_area mt-0 clearfix">

                            <div class="cart-title">
                                <h2>Status Pesanan</h2>
                            </div>
                             <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th width="2%"> No.</th>
                                        <th width="5%"> Nomor Pesanan</th>
                                        <th width="5%"> Nama Pesanan</th>
                                        <th width="5%"> Tanggal Pemesanan</th>
                                        <th width="5%"> Jumlah</th>
                                        <th width="7%"> Permintaan Tambahan</th>
                                        <th width="5%"> Harga </th>
                                        <th width="5%"> Total Pembayaran</th>
                                    </tr>
                                </thead>
                                <?php
         $i=1; foreach($order->result() as $d){?>
                                <tbody>
                                    <tr>
                                       <td> <?php echo $i++; ?></td>
            <td> <?php echo $d->kode_order; ?></td>
            <td> <?php echo $d->jenis; ?></td>
            <td><?php echo $d->date; ?></td>
            <th> <?php echo $d->jumlah; ?></th>
            <td> <?php echo $d->request; ?></td>
            <td>Rp. <?php echo number_format($d->harga,0,",",".") ?>,-</td>
            <td>Rp. <?php echo number_format($d->jumlah*$d->harga,0,",",".") ?>,-</td>
                                    </tr>
                                </tbody>
                            <?php } ?>
                            </table>
                               <li>NB : Waktu Pesetujuan 2 Hari, Silahkan Periksa <a href="<?php echo site_url('Akun/Status');?>">Status Pesanan</a> Anda setelah 2 Hari Pemesanan, Jika Pesanan anda disetujui maka cek <a href="<?php echo site_url('');?>"> Pembayaran </a>,namun jika Pesanan anda ditolak maka cek <a href="<?php site_url();?>Riwayat"> Riwayat Pesanan </a> </li>  
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
<script language='javascript'>
function validAngka(a)
{
    if(!/^[0-9.]+$/.test(a.value))
    {  a.value = a.value.substring(0,a.value.length-1000); }
}
</script>
<script language='javascript'>
function validHuruf(a)
{
    if(/^[0-9.]+$/.test(a.value))
    { a.value = a.value.substring(0,a.value.length-1000);}
}
</script>

<?php $this->load->view('footer_v'); ?>
<?php $this->load->view('LoadJS');?>