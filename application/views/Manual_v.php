 <?php $this->load->view('Header_v');?><br>
<style type="text/css">
	.gambar{
		width: 550px;
		height: 300px;
	}
	.gambar img{
		width: 550px;
		height: 300px;
	}
</style>
 <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="cart-title mt-50">
                            <h2>Cara Pemesanan</h2>
                        </div>

                        <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th><a href="<?php echo site_url('Tutorial');?>"><i class="fa fa-video-camera"></i> Video</a></th>
                                        <th><a href="<?php echo site_url('Tutorial/manual');?>"><i class="fa fa-book"></i> Panduan</a></th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                   
                                    <tr>
                                        <td>
                                           
                <center>
                	<div class="gambar"> 
        <img src="<?php echo base_url();?>assets/admin/video/<?php echo $upload_tutorial?>">
        </div>
    </center>
         
           
  <br>

<script>
    $(document).ready(function(){
        $('iframe.wrap').mediaWrapper();
        $('iframe.wrapAspect').mediaWrapper({
            intrinsic : false,
            baseWidth : 16,
            baseHeight :9
            
        });
    });
</script>
                                        </td>
                                        
                                      
                                       
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>

<?php $this->load->view('footer_v'); ?>