
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
                                <h2>Pemberitahuan</h2>
                            </div>
                            
                              <?php $i=1; foreach($order->result() as $d) { ?>

                             <?php 
                                 if($d->status!="tidak valid"){?>
                                  
                             <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                      <th width="2%"> No.</th>
                                      <th width="5%"> Nomor Pesanan</th>
                                      <th width="5%"> Keterangan</th>
                                    </tr>
                                </thead>
                      
                                <tbody>
                                    <tr>
  					<td > <?php echo $i++; ?></td>
                    <td > <?php echo $d->kode_order; ?></td>
                    <td > Di Setujui</td>

                                    </tr>
                                </tbody>
                            <?php }  ?>
                            </table>
                        </div>
                    </div>
                <?php } ?>
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