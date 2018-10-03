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
<!--                        <a type="button" href="<?php echo site_url('super_admin/Laporan/pdf');?>"><i class="fa fa-download"></i> Lihat PDF</a><br>-->
                        <a type="button" href="<?php echo site_url('super_admin/Laporan/downloadexcell');?>"><i class="fa fa-download"></i> Unduh Excell</a>
                        <br>
                          <div class="box-body table-responsive">
                          <table id="myTable" class="table table-bordered table-striped" border="1">
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Nama</th>
                                  <th>Tanggal order</th>
                                  <th>Jenis</th>
                                  <th>Spesifikasi</th>
                                  <th>Request</th>
                                  <th>Status Persetujuan</th>
                                  <th>Tanggal Pembayaran</th>
								  <th>Status Validasi</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php
                            $i=1;
		                    foreach($menunya->result() as $permenu){
                                echo "<tr>
                                  <td>$i</td>
                                  <td>$permenu->nama</td>
                                  <td>$permenu->date</td>
                                  <td>$permenu->kategori</td>
                                  <td>$permenu->jenis</td>
                                  <td>$permenu->request</td>
                                  <td>$permenu->status_persetujuan</td>
                                  <td>$permenu->tanggal</td>
                                  <td>$permenu->status</td>
					       </tr>";
                                    $i++;
		                  }
		                  ?>
                            </tbody>
                          </table>
                              </div>
                        </div>
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
