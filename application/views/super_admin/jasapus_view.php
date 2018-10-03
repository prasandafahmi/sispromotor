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
                    <h4><i class="fa fa-database"></i>	Jasa Pustaka</h4>
	                <hr>
				    <button type="submit" data-toggle="modal" href="#myModal" class="btn btn-primary">Tambah</button>
                    <div class="panel-body">
					<div class="table-responsive">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Jenis</th>
                                  <th>Foto</th>
                                  <th>Deskripsi</th>
								  <th>Harga</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php
                            $i=1;
		                    foreach($menunya->result() as $permenu){
                                echo "<tr>
                                  <td>$i</td>
                                  <td>$permenu->jenis</td>
								  <td><img src='".base_url()."assets/admin/assets/admin/produk/".$permenu->foto."' width='200px'></td>
                                  <td>$permenu->deskripsi</td>
                                  <td>Rp. $permenu->harga</td>
                                   <td><a href='".site_url('super_admin/Jasapus/update/'.$permenu->id)."'>Ubah</a></td>
                                   <td><a  href='".site_url('super_admin/Jasapus/aksi_delete/'.$permenu->id)."'onclick='if(! confirm(\"yakin akan di hapus?\"))return false;''>Hapus</a></td>
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
	<!--mulai model-->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">Jasa Pustaka</h4>
                                          </div>
                                          <div class="modal-body">
												<form action="<?php echo site_url("super_admin/Jasapus/aksi_insert"); ?>"  method="post" enctype="multipart/form-data">
                                                  <div class="form-group">
                                                      <label for="exampleInputjenis1">Jenis</label>
                                                      <input type="jenis" class="form-control" id="exampleInputjenis3" placeholder="Jenis" name="f1">
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="exampleInputFile">Foto</label>
                                                      <input type="file" id="exampleInputFile3" name="f2">
                                                  </div>
                                                   <div class="form-group">
                                                      <label for="exampleInputdeskripsi1">Deskripsi</label>
                                                      <textarea class="ckeditor" id="ckeditor" name="f3"></textarea>
                                                  </div>
												  <div class="form-group">
                                                      <label for="exampleInputharga1">Harga</label>
                                                      <input type="harga" class="form-control" id="exampleInputharga3" placeholder="Harga" name="f4">
                                                  </div>
                                                 <div class="form-group">
                                                      <label for="exampleInputsyarat1">Syarat</label>
                                                      <textarea class="ckeditor" id="ckeditor" name="syarat"></textarea>
                                                  </div>
												  <button type="submit" class="btn btn-primary">Simpan</button>
                                                    <div class="modal-footer">
                                              <center>
                                                <p>&copy; Eliza Kusmiyati | elizakusmiyati2@gmail.com | 2017</p>
                                                  </center>
                                          </div>
												</form>
											</div>
										</div>
									</div>
								</div>
<?php $this->load->view("layout/footer.php")?>
</body>
</html>
