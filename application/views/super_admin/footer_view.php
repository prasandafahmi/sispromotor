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
                             <h4 class="modal-title">Footer</h4>
                    </div>
                                          <div class="panel-body">
                                              <div class="table-responsive">
                                                    <div class="content-panel">
                                                        <?php $permenu = $menunya->result();  ?>
												<form action="<?php echo site_url("/super_admin/Konfigurasi/update_footer/".$permenu[0]->id_tampilan); ?>" method="post" enctype="multipart/form-data">
                                                     <?php
      $permenu = $menunya->result();    
      //print_r($menuT);    
      //echo $menuT[0]->id;  //karena hasilnya adalah array dan cuma 1 --> bisa juga di foreach  
    ?>
                                                      <input type="hidden"  placeholder="Jenis" value="<?php echo $permenu[0]->id_tampilan?>" name="id_tampilan">
                                                    <div class="form-group">
                                                      <label for="exampleInputdeskripsi1">Footer</label>
                                                       <textarea class="ckeditor" id="ckeditor" name="footer"><?php echo $permenu[0]->footer?></textarea>
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