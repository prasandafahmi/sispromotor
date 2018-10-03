<?php
       $this->load->view('Header_v');

?>

 
           <?php if($this->session->userdata('p')){
                  ?>
                  <?php echo $this->session->flashdata('sukses');?>
        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="checkout_details_area mt-50 clearfix">
          
                            <div class="cart-title">
                                <h2>Masuk</h2>
                            </div>
                            <br>
                            <form action="<?php echo site_url('Login/validasi2');?>" method="POST">
                                <div class="row">
                                    
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" value="">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="Password" class="form-control" id="password"  name="password" placeholder="Masukkan Password" value="">
                                    </div>
                                    <div class="col-12">
                                        <div class="custom-control custom-checkbox d-block mb-2">
                                          <tr>
                                            <td>
                                              <a href="<?php echo site_url('Lupa_password');?>">Lupa Password</a>  
                                            </td>
                                            ||
                                            <td>
                                               <a href="<?php echo site_url('register');?>">Belum Daftar ?</a>
                                            </td>
                                          </tr>
                                        </div>
                                </div>
                                 <div class="cart-btn" style="width: 100%;">
                                <input type="submit"  class="btn amado-btn w-100" value="Masuk">
                            </div>
                            </form>
                        </div>
                    </div>
                   

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

       <?php }
       else {  ?>

<?php if(($this->session->userdata('p'))){ ?>

 <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="checkout_details_area mt-50 clearfix">
          
                            <div class="cart-title">
                                <h2>Masuk</h2>
                            </div>
                            <br>
                            <form action="<?php echo site_url('Login/validasi2');?>" method="POST">
                                <div class="row">
                                    
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" value="">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="Password" class="form-control" id="password" name="password" placeholder="Masukkan Password" value="">
                                    </div>
                                    <div class="col-12">
                                        <div class="custom-control custom-checkbox d-block mb-2">
                                          <tr>
                                            <td>
                                              <a href="<?php echo site_url('Lupa_password');?>">Lupa Password</a>  
                                            </td>
                                            ||
                                            <td>
                                               <a href="<?php echo site_url('register');?>">Belum Daftar ?</a>
                                            </td>
                                          </tr>
                                        </div>
                                </div>
                                 <div class="cart-btn" style="width: 100%;">
                                <input type="submit" class="btn amado-btn w-100" value="Masuk">
                            </div>
                            </form>
                        </div>
                    </div>
                   

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }else{
                             ?>

                              <!-- if else kalo ga ada session --><?php echo $this->session->flashdata('sukses');?>
         <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="checkout_details_area mt-50 clearfix">
          
                            <div class="cart-title">
                                <h2>Masuk</h2>
                            </div>
                            <br>
                            <form action="<?php echo site_url('Login/validasi');?>" method="POST">
                                <div class="row">
                                    
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" value="">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="Password" class="form-control" id="password" name="password" placeholder="Masukkan Password" value="">
                                    </div>
                                    <div class="col-12">
                                        <div class="custom-control custom-checkbox d-block mb-2">
                                          <tr>
                                            <td>
                                              <a href="<?php echo site_url('Lupa_password');?>">Lupa Password</a>  
                                            </td>
                                            ||
                                            <td>
                                               <a href="<?php echo site_url('register');?>">Belum Daftar ?</a>
                                            </td>
                                          </tr>
                                        </div>
                                </div>
                                 <div class="cart-btn" style="width: 100%;">
                                <input type="submit" class="btn amado-btn w-100" value="Masuk">
                            </div>
                            </form>
                        </div>
                    </div>
                   

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                         <?php }
                         ?>

                         <!-- end if ga ada session-->
                   
               <?php
                 }
                 ?>
    <!-- ##### Main Content Wrapper End ##### -->

    <!-- ##### Newsletter Area Start ##### -->
  

    <?php $this->load->view('footer_v');?>
                    <?php $this->load->view('LoadJS'); ?>
            <script src="<?php echo base_url('assets/js/jquery.js');?>"></script>
      <script type="text/javascript">
  
           $(document).on("click", '.tombol', function(e){
  alert("Registrasi anda salah!");
       });
          </script>