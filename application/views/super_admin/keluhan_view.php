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
	                  	  	  <h4><i class="fa fa-user"></i>Keluhan</h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Nama</th>
                                  <th>Username</th>
                                  <th>Keluhan</th>
                                  <th>Saran</th>
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
                                  <td>$permenu->keluhan</td>
                                  <td>$permenu->saran</td>
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
