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
                                        <th width="5%"> Nama Pesanan</th>
                                        <th width="5%"> Tanggal Pemesanan</th>
                                        <th width="5%"> Jumlah</th>
                                        <th width="7%"> Request Tambahan</th>
                                        <th width="5%"> Harga </th>
                                        <th width="5%"> Total Pembayaran</th>
                                    </tr>
                                </thead>
                                    <?php $i=1; foreach($detail->result() as $d){?>
                                <tbody>
                                    <tr>
                                        <td> <?php echo $i; ?></td>
                                        <td> <?php echo $d->kode_order; ?>
                                            <?php if($d->kategori=="Pustaka"){
                                        $temp=$this->db->query("select * from pengiriman join `order` on `order`.id_order=pengiriman.id_order where `pengiriman`.`id_order`=".$d->id_order)->row();
                                        
                                        echo "<br>Resi :".$temp->no_resi."<br> Ekspedisi :".$temp->ekspedisi."<br> Atas Nama:".$temp->atas_nama;}?>
                                        </td>
                                        <td> <?php echo $d->jenis; ?></td>
                                        <td><?php echo $d->date; ?></td>
                                        <th> <?php echo $d->jumlah; ?></th>
                                        <td> <?php echo $d->request; ?></td>
                                        <td>Rp. <?php echo number_format($d->harga,0,",",".") ?></td>
                                        <td>Rp. <?php echo number_format($d->jumlah*$d->harga,0,",",".") ?></td>
                                    </tr>
                                </tbody>
                             <?php $i++;}  ?>
                            </table>
                               <center><br><a href="<?php echo site_url('Pesan/Selesai');?>"><i class="fa fa-arrow-left"></i>  Kembali</a>
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
<?php $this->load->view('Footer_v'); ?>
<?php $this->load->view('LoadJS'); ?>