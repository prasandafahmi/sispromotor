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
	                   <h4><i class="fa fa-check"></i>	Hasil</h4>
					<div class="panel-body">
					<div class="table-responsive">
                           <div class="content-panel">
							<table id="myTable" class="table table-striped table-advance table-hover">
                              <br>
                                <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Nama</th>
                                  <th>Tanggal</th>
                                  <th>No resi</th>
                                  <th>Detail</th>
                              </tr>
                                    </thead>
                                <tbody>
                                <?php
                            $i=1;
		                    foreach($menunya->result() as $permenu){
                                echo "<tr>
                                  <td>".$i."</td>
								  <td>".$permenu->nama."</td>
                                  <td>".$permenu->date."</td>
                                  <td>".$permenu->no_resi."</td>
                                   <td>
                                      <a href='".site_url() ."/pelaksana/Aresult/detail/".$permenu->id_order."'  class='btn btn-success btn-xs'><i class='fa fa-eye'></i> Detail</a>
                                  </td>
					       </tr>";
                                    $i++;}
		                  ?>
                                    </tbody>
                          </table>
						</div><!-- /content-panel -->
                        </div>
                        </div>
					</div><!-- /col-md-6 -->
                </div>
			</div>
		</div> 
    </div>
<!--     <script src="<?php echo base_url();?>admin/assets/js/jquery.js"></script>-->
     
<?php $this->load->view("layout/footer.php")?>
</body>
</html>
