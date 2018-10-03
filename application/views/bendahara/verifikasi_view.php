<!DOCTYPE html>
<html>
<?php $this->load->view("layout/header.php")?>
<body>
    <?php $this->load->view("layout/bar.php")?>
	<div id="wrapper">
    <?php $this->load->view("layout/wrapper.php")?>
		<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
				<div class="col-md-12">
                <h4><i class="fa fa-check-square-o"></i> Verifikasi</h4>
					<div class="panel-body">
					<div class="table-responsive">
                      <div class="content-panel">
                          <table id="myTable" class="table table-striped table-advance table-hover">
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th>Kode Order</th>
                                  <th>Atas Nama</th>
                                  <th>Status</th>
                                  <th>Instansi</th>
                                  <th>telepon</th>
                                  <th>Metode Pembayaran</th>
                                  <th>Tanggal bayar</th>
								  <th>Tanggal jatuh tempo</th>
								  <th>&nbsp;</th>
                              </tr>
                              </thead>
                              <tbody>
                                 <?php 
                                    foreach($menunya->result()as $p){  
                                        if($p->status_all == "sudah"){
                                            if($p->status !=""){
                                            date_default_timezone_set('Asia/Jakarta');
                                                                         
                                            $now = strtotime((date("Y-m-d H:i:d")));
                                                                      
                                        $t= strtotime($p->tanggal_berakhir)-$now;
                                       $s=floor($t / (60 * 60 * 24)); 
                                       if($s<0){ if($p->status != "valid"){
                                            if($p->bukti_transfer==""){
                                                $where = array('id_order'=>$p->id_order);
                                                
                                                $data = array(
                                                    "status"=>'Tidak Valid',
			                                     );
                                                $this->load->model('super_admin/Crud_m');
			                                    $this->Crud_m->update_data('pembayaran',$data,$where); 
                                                $data = array(
                                                    "status_all2"=>'gagal'
                                                );
                                                $this->Crud_m->update_data('order',$data,$where);
                                            }
                                       }  
                                       }
                                       }
                                      
                                    }
                                    }
                            foreach($menunya->result() as $permenu){?>
                              <tr>
                                 
                                  <td ><?php echo $permenu->kode_order; ?></td>
                                  <td ><?php echo $permenu->nama; ?></td>
                                  <td ><?php echo $permenu->status; ?></td>
                                  <td ><?php echo $permenu->instansi; ?></td>
                                  <td ><?php echo $permenu->telepon; ?></td>
                                  <td><?php echo $permenu->metode_pembayaran; ?></td>
                                  <td><?php echo $permenu->tanggal; ?></td>
                                  <td><?php echo $permenu->tanggal_berakhir; ?></td>
                                  <td>
                                    <a type="button" class="btn btn-primary" href="<?php echo site_url();?>/bendahara/Verifikasi/detail/<?php echo $permenu->id_order;?>" > 
                                  Detail
                                   </a>
                                  </td>
                                 
                              </tr>
                                  <?php
                                                }?>
                              </tbody>
                          </table>
						</div>
                        </div>
                        </div>
					</div><!-- /col-md-12 -->
				</div>
			</div>
		</div>
	</div>
<?php $this->load->view("layout/footer.php")?>
</body>
</html>
