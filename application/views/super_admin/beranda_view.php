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
                    <h4><i class="fa fa-database"></i>	Beranda</h4>
	                <hr>
                    <div class="panel-body">
					<div class="table-responsive">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Foto</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php
                            $i=1;
		                    foreach($menunya->result() as $permenu){
                                echo "<tr>
                                  <td>$i</td>
								                  <td><img src='".base_url()."assets/images/slider/".$permenu->foto."' width='200px'></td>
                                  <td><a href='".site_url('super_admin/Beranda/update/'.$permenu->id_beranda)."'>Ubah</a></td>
					       </tr>";
                                    $i++;
		                  }
		                  ?>
                            </tbody>
                          </table>
						</div><!-- /content-panel -->
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
