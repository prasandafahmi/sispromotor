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
	                   <h4><i class="fa fa-check"></i>	Hasil</h4>
					 <div class="panel panel-default">
					<div class="panel-body">
					<div class="table-responsive">
                      <div class="content-panel">
							<table  id="example" class="table table-striped table-advance table-hover">
                             
                                <thead>
                              
                                  <th>No</th>
                                  <th>Nama</th>
                                  <th>Tanggal</th>
                                  <th>Kode order</th>
                                    <th>&nbsp;</th>
                             </thead>
                                <tbody>
                                <?php
                            $i=1;
		                    foreach($menunya->result() as $permenu){?>
                                <tr>
                                  <td><?php echo $i;?></td>
								  <td><?php echo $permenu->nama;?></td>
                                  <td><?php echo $permenu->date;?></td>
                                  <td><?php echo $permenu->kode_order;?></td>
                                   <td>
                                      <a href="<?php echo site_url();?>/administrasi/Result/detail2/<?php echo $permenu->id_order;?>"  class="btn btn-success btn-xs"><i class="fa fa-eye"></i> Detail</a>
                                  </td>
					       </tr><?php
                                    $i++;}
		                  ?>
                                    </tbody>
                          </table>
						</div><!-- /content-panel -->
                        </div>
                        </div>
					</div><!-- /col-md-12 -->
					</div>
                    <br><br><br><br>
			</div>
		</div>
	</div>
    </div>
<?php $this->load->view("layout/footer.php")?>
</body>
</html>
