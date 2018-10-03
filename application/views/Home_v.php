
<?php $this->load->view('header_v');?>

        <!-- Header Area End -->

        <!-- Product Catagories Area Start -->
        <div class="products-catagories-area clearfix">
            <div class="amado-pro-catagory clearfix" style="margin-top: 100px;margin-left: 50px;">



                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix" style="width: 250px; height: 250px;">
                    <a href="<?php echo site_url('pesan/jasalab'); ?>">
                        <img src="<?php echo base_url('assets/admin/produk/IMG1488965386.jpg'); ?>" alt="" >
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <h4>Jasa Lab</h4>
                        </div>
                    </a>
                </div>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix" style="width: 250px; height: 250px;">
                    <a href="<?php echo site_url('pesan/jasaalat'); ?>">
                        <img src="<?php echo base_url('assets/admin/produk/IMG1489021990.jpg'); ?>" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <h4>Jasa Alat Lab</h4>
                        </div>
                    </a>
                </div>

                <div class="single-products-catagory clearfix" style="width: 250px; height: 250px;">
                    <a href="<?php echo site_url('pesan/jasapustaka'); ?>">
                        <img src="<?php echo base_url('assets/admin/produk/IMG1488965467.jpg'); ?>" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <h4>Jasa Pustaka</h4>
                        </div>
                    </a>
                </div>

              
               
            </div>
        </div>
        <!-- Product Catagories Area End -->
    </div>
    <!-- ##### Main Content Wrapper End ##### -->

    <!-- ##### Newsletter Area Start ##### -->
   
    <!-- ##### Newsletter Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    
    <?php $this->load->view('footer_v');?>