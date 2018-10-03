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
                             <h4 class="modal-title">Beranda</h4>
                    </div>
                                          <div class="panel-body">
                                              <div class="table-responsive">
                                                    <div class="content-panel">
												<form action="<?php echo site_url("/super_admin/Beranda/aksi_update"); ?>" method="post" enctype="multipart/form-data">
                                                     <?php
      $menu = $menuX->result();    
      //print_r($menuT);    
      //echo $menuT[0]->id;  //karena hasilnya adalah array dan cuma 1 --> bisa juga di foreach  
    ?>
                                                      <input type="hidden"  placeholder="Jenis" value="<?php echo $menu[0]->id_beranda?>" name="id_beranda">
                                                    <div class="form-group">
                                                      <label for="exampleInputFile">Foto</label>
                                                      <img src="<?php echo base_url()?>assets/images/slider/<?php echo $menu[0]->foto?>" width="200px">
                                                  </div>
                                                     <div class="form-group">
                                                      
                                                      <input type="file" value="<?php echo $menu[0]->foto ?>" name="f2">
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