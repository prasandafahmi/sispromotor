
 <?php 
   
     
     foreach($order->result()as $p){
         //status order
         if($p->status_all == "sudah"){
            
              date_default_timezone_set('Asia/Jakarta');
                                                                         
                     $now = strtotime((date("Y-m-d H:i:s")));
                                                                      
                                        $t= strtotime($p->tanggal_berakhir)-$now;
                                       $s=floor($t / (60 * 60 * 24)); 
                                       if($s<0){ if($p->status == ""){
                                          
                                           $where = array('id_order'=>$p->id_order);
       
            $data = array(
			  "status"=>'tidak valid'
			);
$this->load->model('Crud_m');
			$this->Crud_m->update_data('pembayaran',$data,$where); 
                                        
                                       }
                                          
                                               }                       
         }                           
                                      
    }

    $this->load->view('Header_v');
    $this->load->view('side_v'); ?>


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
                                      <th width="5%"> Tanggal Akhir Pembayaran</th>
                                      <th width="5%"> Keterangan Pesanan</th>
                                      <th width="5%"> Metode Pembayaran</th>
                                    </tr>
                                </thead>
                               <?php $i=1; foreach($order->result() as $d){
                                 if($d->status!="tidak valid"){?>
                                <tbody>
                                    <tr>
  <td > <?php echo $i; ?></td>
                    <td > <?php echo $d->kode_order; ?></td>
                    <td ><?php echo $d->date; ?></td>
                    <td ><?php echo $d->tanggal_berakhir; ?></td>
                     <td ><a href="<?php echo site_url('Pesan/detailpesan/');?><?php echo $d->id_order;?>">Lihat Keterangan</a></td>
            
                        <?php if($d->metode_pembayaran==""){ ?>
                    <td ><a href="<?php echo site_url('Pesan/metode/');?><?php echo $d->id_order;?>">&nbsp;Pilih Metode</a></td>       
                        <?php } else if($d->metode_pembayaran!="" && $d->sp=="Tidak Valid"){echo '  <td ><font color="red"> <b>Tidak Valid</b></font></td>';}
                                               else{ echo '  <td ><font color="orange"> <b>Sedang Proses</b></font></td>';} ?>
                                    </tr>
                                </tbody>
                            <?php $i++;}  }?>
                            </table>
                                <li>NB : Waktu Akhir Pembayaran 3 Hari, Silahkan Periksa <a href="<?php echo site_url('Pesan/pembayaran')?>">Status Pembayaran</a> Anda setelah 3 Hari Waktu Pembayaran, Pesanan anda akan dibatalkan jika pesanan tidak dibayarkan sebelum waktu berakhir di jam kerja Senin - Jumat ( 08:00 - 16:00 )</li><hr><br>
                        </div>
                    </div>
                        </div>
                    </div>
                               
                               
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

<script type='text/javascript'>

(function()
{
  if( window.localStorage )
  {
    if( !localStorage.getItem( 'firstLoad' ) )
    {
      localStorage[ 'firstLoad' ] = true;
      window.location.reload();
    }  
    else
      localStorage.removeItem( 'firstLoad' );
  }
})();

</script>