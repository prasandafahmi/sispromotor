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
                        <h4><i class="fa fa-shopping-cart"></i>	Pemesanan</h4>
                    <div class="panel panel-default">
					<div class="panel-body">
					<div class="table-responsive">
                      <div class="content-panel">
                          <table id="myTable" class="table table-striped table-advance table-hover">
	                  	  	  
                              <br>
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Tanggal</th>
                                  <th>Nama</th>
                                  <th>kode order</th>
                                  <th>&nbsp;</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php
                          $i=1;
		                    foreach($menunya->result() as $permenu){
                                echo "<tr>
                                  <td>".$i."</td>
                                  <td>".$permenu->date."</td>
								  <td>".$permenu->nama."</td>
								  <td>".$permenu->kode_order."</td>
                                   <td>
                                      <a href='".site_url() ."/administrasi/Apemesanan2/detail/".$permenu->id_order."'  class='btn btn-success btn-xs'><i class='fa fa-eye'></i> Detail</a>
                                  </td>
					       </tr>";
                                $i++;
                                    }
		                  ?>
                            </tbody>
                          </table>
						</div>
                        </div>
                        </div>
                        </div>
                        
					</div>
			</div>
                </div>
		</div>
        </div>
<?php $this->load->view("layout/footer.php")?>
</body>
</html>
