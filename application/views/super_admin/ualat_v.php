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
                             <h4 class="modal-title">Jasa Alat Lab</h4>
                    </div>
                                          <div class="panel-body">
                                              <div class="table-responsive">
                                                    <div class="content-panel">
												<form action="<?php echo site_url("super_admin/Jasaalat/aksi_update"); ?>" method="post" enctype="multipart/form-data">
                                                     <?php
      $menu = $menuX->result();    
      //print_r($menuT);    
      //echo $menuT[0]->id;  //karena hasilnya adalah array dan cuma 1 --> bisa juga di foreach  
    ?>
                                                      <input type="hidden"  placeholder="Jenis" value="<?php echo $menu[0]->id?>" name="id">
                                                  <div class="form-group">
                                                      <label for="exampleInputjenis1">Jenis</label>
                                                      <input type="jenis"  placeholder="Jenis" value="<?php echo $menu[0]->jenis?>" name="f1">
                                                  </div>
                                                    <div class="form-group">
                                                      <label for="exampleInputFile">Foto</label>
                                                      <img src="<?php echo base_url()?>assets/admin/assets/admin/produk/<?php echo $menu[0]->foto?>" width="200px">
                                                  </div>
                                                  <div class="form-group">
                                                      
                                                      <input type="file" value="<?php echo $menu[0]->foto ?>" name="f2">
                                                  </div>
												  <div class="form-group">
                                                      <label for="exampleInputdeskripsi1">Deskripsi</label>
                                                       <textarea class="ckeditor" id="ckeditor" name="f3"><?php echo $menu[0]->deskripsi?></textarea>
                                                  </div>
												  <div class="form-group">
                                                      <label for="exampleInputsyarat1">Syarat</label>
                                                      <textarea class="ckeditor" id="ckeditor" name="f4"><?php echo $menu[0]->syarat?></textarea>
                                                  </div>
												  <div class="form-group">
                                                      <label for="exampleInputharga1">Harga</label>
                                                      <input type="harga" value="<?php echo $menu[0]->harga?>" placeholder="Harga" name="f5">
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