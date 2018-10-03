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
	                  	<h4><i class="fa fa-file"></i>	Tutorial</h4>
                    <div class="panel-body">
					<div class="table-responsive">
                      <div class="content-panel">
                          <form action="<?php echo site_url("super_admin/Tutorial/aksi_update"); ?>" method="post" enctype="multipart/form-data">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <hr>
                              <thead>  
                              <tr>
                                  <th> Id</th>
                                  <th>Deskripsi</th>
                                  <th>Tutorial non video</th>
                                  <th>Tutorial Video</th>
                              </tr>
                              </thead>
                              <tbody>
                            <?php
                            $i=1;
		                    foreach($menunya->result() as $permenu){?>
                                <tr>
                                  <td><?php echo $i ?></td>
                                  <td><?php echo $permenu->deskripsi ?></td>
                                  <td><?php echo $permenu->upload_tutorial ?></td>
                                  <td><?php echo $permenu->upload_video ?></td>
                                  
                                  <td><a href="<?php echo site_url('super_admin/Tutorial/update/'.$permenu->id_tutorial)?>">Ubah</a></td>
					       </tr>
                                   <?php $i++;
		                  }
		                  ?>
                            </tbody>
                          </table>
                          </form>
						</div><!-- /content-panel -->
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
