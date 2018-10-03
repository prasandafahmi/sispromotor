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
                    <div class="panel-body">
					<div class="table-responsive">
                      <div class="content-panel">
                          <table id="myTable" class="table table-striped table-advance table-hover">
	                  	  	  <h4><i class="fa fa-user"></i>	Pengguna</h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th>Id</th>
                                  <th>Nama</th>
                                  <th>Username</th>
                                  <th>No. Telp</th>
                                  <th>Email</th>
								  <th>Alamat</th>
								  <th>Status</th>
                                  <th>Keterangan</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php
                            $i=1;
		                    foreach($menunya->result() as $permenu){
                                echo "<tr>
                                  <td>$i</td>
                                  <td>$permenu->nama</td>
                                  <td>$permenu->username</td>
                                  <td>$permenu->telepon</td>
                                  <td>$permenu->email</td>
                                  <td>$permenu->alamat</td>
                                  <td>$permenu->status</td>
                                  <td>$permenu->instansi</td>
					       </tr>";
                                    $i++;
		                  }
		                  ?>
                            </tbody>
                          </table>
						</div><!-- /content-panel -->
                        </div>
                        </div>
					</div>
				</div>
			</div><!-- /col-md-12 -->
		</div>
	</div>
<?php $this->load->view("layout/footer.php")?>
</body>
</html>
