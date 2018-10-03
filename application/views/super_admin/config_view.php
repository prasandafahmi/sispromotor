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
	                <h4><i class="fa fa-file"></i> Konfigurasi</h4>
					<div class="panel-body">
					<div class="table-responsive">
                      <div class="content-panel">
                          <table>
                             <?php 
                                foreach($menunya->result() as $permenu){
                             ?>
                              <tr>
                                  <th >Header</th>
                                  <td width="60%"><?php echo $permenu->header; ?></td>
                                  <td ><a href="<?php echo site_url(); ?>/super_admin/Konfigurasi/update/<?php echo $permenu->id_tampilan;?>">Ubah</a></td>
                              </tr>
                              <br>
                              <tr>
                                  <th>Footer</th>
                                  <td width="60%"> <?php echo $permenu->footer; ?> </td>
                                  <td><a href="<?php echo site_url(); ?>/super_admin/Konfigurasi/footer">Ubah</a></td>
                              </tr>
                             <?php 
   }
    ?>
                          </table>
						</div><!-- /content-panel -->
                        </div>
                        </div>
					</div><!-- /col-md-12 -->
				</div><!--row-->
			</div>
		</div>
	</div>
	<!--mulai modal-->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
				<div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 </div>
                    <div class="modal-body">konfigurasi telah diperbaharui</div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-default" type="button"> OK</button>
                        </div>
            </div>
        </div>
    </div>
<?php $this->load->view("layout/footer.php")?>
</body>
</html>
