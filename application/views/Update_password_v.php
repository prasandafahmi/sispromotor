<?php  $this->load->view('Header_v'); ?> <br>


        <div class="amado_product_area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                <div class="col-12 col-lg-8">
                        <div class="checkout_details_area mt-0 clearfix">

                            <div class="cart-title">
                                <h2>Informasi Akun</h2>
                            </div>
                            <form action="<?php echo site_url('Akun/update_password/');?><?php echo $this->session->userdata('id');?>" method="POST">
                                <div class="row">
                                    <tr>
                                      <td colspan="2"></td>
                                         <td><?php echo $this->session->flashdata('message4');?></td>
                                    </tr>
                                    <div class="col-12 mb-3">
                                        <tr>
                                            <td>
                                                Password Lama
                                            </td>
                                            <td>
                                                <input type="password" class="form-control" id="password" name="password" value="" placeholder="Masukkan Password Lama" required>
                                            </td>
                                        </tr>
                                    </div>
                                    <div class="col-12 mb-3">
                                      <tr>
                                            <td>
                                                Password Baru
                                            </td>
                                            <td>
                                                <input type="password" class="form-control" id="pwdbaru"  name="pwdbaru" value="" placeholder="Masukkan Password Baru" required>
                                            </td>
                                        </tr>
                                       
                                    </div>
                                    <div class="col-12 mb-3">
                                        <tr>
                                            <td>
                                                Konfirmasi Password Baru
                                            </td>
                                            <td>
                                                <input type="password" class="form-control" name="pwdbaru2" id="pwdbaru2" value="" placeholder="Konfirmasi Password Baru" required>
                                            </td>
                                        </tr>
                                    </div>
                                    <input type="submit" class="btn amado-btn w-100" type="submit" value="Update">
                                    
                                    <center><br><a href="<?php echo site_url('Akun');?>"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a>
                                    
                                     </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                                <!-- Ratings & Cart -->
                               
                            </div>
                        </div>
                    </div>

<?php $this->load->view('Footer_v'); ?>
<?php $this->load->view('LoadJS'); ?>