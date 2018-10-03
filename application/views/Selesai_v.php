<?php $this->load->view('Header_v'); ?> <br>
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
                                        <th width="5%"> Tanggal Pemesanan</th>
                                        <th width="5%"> Keterangan Pesanan</th>
                                        <th width="5%"> Metode Pembayaran</th>
                                    </tr>
                                </thead>
                                    <?php $i=1; foreach($detail->result() as $d){?>
                                <tbody>
                                    <tr>
                    <td > <?php echo $i; ?></td>
                    <td > <?php echo $d->kode_order; ?></td>
                    <td > <?php echo $d->date; ?></td>
                     <td ><a href="<?php echo site_url('Pesan/detailselesai/');?><?php echo $d->id_order;?>">Lihat keterangan</a></td>
                      <td> <?php if(isset($d->result) and isset($d->upload)){?>
                          <i  class="fa fa-download"><a href="<?php echo site_url('Kepuasan/selesai/');?><?php echo $d->id_detail;?>">
                              <b>Download Hasil</b></a></i>
                          <?php }else 
                                { echo '<b>Belum Tersedia<b>'; }?> 
                                
                      </td>
                                    </tr>
                                </tbody>
                             <?php $i++;}  ?>
                            </table>
                               
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