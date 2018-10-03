<?php  $this->load->view('Header_v'); ?> <br>

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
                                        <th width="5%"> Tanggal</th>
                                        <th width="5%"> Keterangan Pesanan</th>
                                        <th width="5%"> Status Sample </th>
                                    </tr>
                                </thead>
                                    <?php $i=1; foreach($order->result() as $d){?>
                                <tbody>
                                    <tr>
                                    <td > <?php echo $i++; ?></td>
                <td > <?php echo $d->kode_order; ?></td>
                <td ><?php echo $d->date; ?></td>
                <td ><a href="<?php echo site_url('Pesan/detailpelaksana/');?><?php echo $d->id_order?>">Lihat Keterangan</a></td>            
                 <?php if($d->no_resi=="" && $d->kategori!="Pustaka"){?>
                    <td ><a href="<?php echo site_url('Pesan/tracking/');?><?php echo $d->id_order;?>">&nbsp;Input Tracking</a></td>       
                        <?php } else{ echo '  <td ><font color="orange"> <b>Sedang Proses</b></font></td>';} ?>
                                    </tr>
                                </tbody>
                            <?php $i++;} ?>
                            </table>
                               <li>NB : Waktu Pelaksanaan 7-14 Hari, Silahkan Periksa <a href="<?php echo site_url('Akun/Status')?>"> Status Pesanan </a>Anda</li><hr>  
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
