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
                             <h4 class="modal-title">Tutorial</h4>
                        <br>
                        <br>
                    </div>
        <?php
      $menu = $menuX->result();    
      //print_r($menuT);    
      //echo $menuT[0]->id;  //karena hasilnya adalah array dan cuma 1 --> bisa juga di foreach  
    ?>
                                          <div class="panel-body">
                                              <div class="table-responsive">
                                               <div class="content-panel">
												<form action="<?php echo site_url("super_admin/Tutorial/aksi_update"); ?>" method="post" enctype="multipart/form-data">
                                                 <input type="hidden"  placeholder="Deskripsi" value="<?php echo $menu[0]->id_tutorial?>" name="id">
                                                  <div class="form-group">
                                                      <label for="exampleInputjenis1">Deskripsi</label>
                                                      <input type="jenis"  placeholder="Deskripsi" value="<?php echo $menu[0]->deskripsi?>" name="f1" readonly>
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="exampleInputFile">Tutorial</label>
                                                      <?php echo $menu[0]->upload_tutorial?>
                                                        <input type="file" value="<?php echo $menu[0]->upload_tutorial ?>" name="file1">
                                                  </div>
                                                    <div class="form-group">
                                                      <label for="exampleInputFile">Video</label>
                                                        <?php echo $menu[0]->upload_video?>
                                                  </div>
                                                  <div class="form-group">
                                                      <input type="file" value="<?php echo $menu[0]->upload_video ?>" name="file2">
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