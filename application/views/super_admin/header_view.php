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
                             <h4 class="modal-title">Header</h4>
                    </div>
                                          <div class="panel-body">
                                              <div class="table-responsive">
                                                    <div class="content-panel">
                                                        <?php $permenu = $menunya->result();  ?>
												<form action="<?php echo site_url("/super_admin/Konfigurasi/aksi_update/".$permenu[0]->id_tampilan); ?>" method="post" enctype="multipart/form-data">
                                                     <?php
      $permenu = $menunya->result();     
    ?>
                                                      <input type="hidden"  placeholder="Jenis" value="<?php echo $permenu[0]->id_tampilan?>" name="id_tampilan">
                                                    <div class="form-group">
                                                      <label for="exampleInputFile">Foto</label>
                                                      <img src="<?php echo base_url()?>assets/admin/header/<?php echo $permenu[0]->header?>" width="200px">
                                                  </div>
                                                     <div class="form-group">
                                                      
                                                      <input type="file" value="<?php echo $permenu[0]->header ?>" name="f2">
                                                  </div>
												  <button type="submit" class="btn btn-primary">Simpan</button>
												</form>
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