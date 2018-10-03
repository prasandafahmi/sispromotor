 <?php $this->load->view('Header_v');?><br>
<div class="shop_sidebar_area">

            <!-- ##### Single Widget ##### -->
            <div class="widget catagory mb-50">
                <!-- Widget Title -->
                <h6 class="widget-title mb-30">Kategori</h6>

                <!--  Catagories  -->
                <div class="catagories-menu">
                    <ul>
                        <li href="<?php echo site_url('Pesan');?>" >Semua Jasa</a></li>
                        <li><a href="<?php echo site_url('Pesan/jasalab');?>">Jasa Lab</a></li>
                        <li><a href="<?php echo site_url('Pesan/jasaalat');?>" >Jasa Alat Lab</a></li>
                        <li><a href="<?php echo site_url('Pesan/jasapustaka');?>" >Jasa Pustaka</a></li>
                    </ul>
                </div>
            </div>

            <!-- ##### Single Widget ##### -->
          

            <!-- ##### Single Widget ##### -->
          

            <!-- ##### Single Widget ##### -->
           
        </div>

        <div class="amado_product_area section-padding-100">
            <div class="container-fluid">



                <div class="row">
                   <?php foreach($produk->result() as $p){?>

                    <!-- Single Product Area -->
                    <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="<?php echo base_url();?>assets/admin/assets/admin/produk/<?php echo $p->foto ?>" alt="">
                                <!-- Hover Thumb -->

                            </div>

                            <!-- Product Description -->
                            <div class="product-description d-flex align-items-center justify-content-between">
                                <!-- Product Meta Data -->
                                <div class="product-meta-data">
                                    <div class="line"></div>

                                    <p class="product-price" data-toggle="tooltip" data-placement="left"><?php echo substr($p->deskripsi,0,100)?>...</p>
                                    <a class="preview" href="<?php echo site_url('Pesan/detail/');?><?php echo $p->id ?>">Lihat Selengkapnya &nbsp;<i class="fa fa-arrow-right"></i> </a>
                                   <a href="<?php echo site_url('Pesan/detail/');?><?php echo $p->id ?>"><?php echo $p->jenis ?></a>
                                </div>
                                <!-- Ratings & Cart -->
                               
                            </div>
                        </div>
                    </div>
                  <?php } ?>

                    <!-- Single Product Area -->
                   

                    <!-- Single Product Area -->
                   

                    <!-- Single Product Area -->
                  

                    <!-- Single Product Area -->


                    <!-- Single Product Area -->
                   </div>

              
            </div>
        </div>
    </div>

<?php $this->load->view('footer_v'); ?>