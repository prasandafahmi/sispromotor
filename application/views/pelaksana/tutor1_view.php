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
                        <p>Silahkan lihat tutorial di bawah ini sebagai panduan anda</p>
                        <center>
				<video height="400" width="700" controls>
                            <source src="<?php echo base_url();?>assets/admin/video/<?php echo $upload_video?>" type="video/mp4 "/>
                            </video>
			</center>
                    </div><!-- /col-md-12 -->
					</div>
				</div>
			</div>
    </div>
<?php $this->load->view("layout/footer.php")?>
</body>
</html>
