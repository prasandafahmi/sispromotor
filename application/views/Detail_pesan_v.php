<?php  $this->load->view('Header_v'); ?>
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
                                      <th width="5%"> Tanggal Akhir Pembayaran</th>
                                      <th width="5%"> Jumlah</th>
                                      <th width="7%"> Status Pesanan</th>
                                      <th width="5%"> Harga </th>
                                      <th width="5%"> Total Pembayaran</th>
                                    </tr>
                                </thead>

                                <?php $i=1; foreach($detail->result() as $d){?>
                                <tbody>
                                    <tr>
                                      <td > <?php echo $i; ?></td>
                                      <td > <?php echo $d->kode_order; ?></td>
                                      <td > <?php echo $d->jenis; ?></td>
                                      <td > <?php echo $d->date; ?></td>
                                      <td ><?php echo $d->tanggal_berakhir; ?></td>
                                      <th > <?php echo $d->jumlah; ?></th>
                                      <?php if($d->status_pelaksana=="" && $d->sp=="Tidak Valid"){ ?>
                                      <td ><font size="2,5pt" color="red"><b>Tidak Valid</b></font></td> 
                                      <?php }else if($d->status_pelaksana=="" && $d->sp=="Valid"){ ?>
                                      <td ><font size="2,5pt" color="orange"><b>Sedang diproses</b></font></td> 
                                      <?php }else{ ?>
                                      <td ><?php echo $d->status_pelaksana; ?></td>
                                    <?php }?>
                                      <td > Rp.<?php echo number_format($d->harga,0,",",".") ?>,-</td>
                                      <td > Rp.<?php echo number_format( $d->jumlah*$d->harga,0,",",".") ?>,-</td>
                                    </tr>
                                </tbody>
                             <?php $i++;} ?>
                            </table>
                               <li>Waktu akhir pembayaran anda adalah <?php echo $d->tanggal_berakhir; ?>, Silahkan lakukan pembayaran pada jam kerja Senin - Jum'at ( 08:00 - 16:00) sebelum Tanggal berakhir pembayaran anda  </li>  <center><br><a href="<?php echo site_url('Pesan/Pembayaran');?>"><i class="fa fa-arrow-left"></i>  Kembali</a>
            </center> 
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
</div>
<?php $this->load->view('Footer_v'); ?>
<?php $this->load->view('LoadJS'); ?>