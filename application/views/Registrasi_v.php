<?php
       $this->load->view('Header_v');

?>

        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-title">
                                <h2>Daftar Akun</h2>
                            </div>

                            <form action="<?php echo site_url('Register/insert_user'); ?>" method="POST">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="nama"  name="nama" placeholder="Masukkan Nama" required value="<?php if( ($this->session->userdata('r_nama'))){ echo $this->session->userdata('r_nama'); }else echo "";?>">
                                    </div>

                                     <div>
                                      <?php echo $this->session->flashdata('message1');?>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="username" value="<?php if(($this->session->userdata('r_username'))){ echo $this->session->userdata('r_username'); }else echo "";?>" name="username" placeholder="Masukkan Username" required>
                                    </div>
                                    <div>
                                      <?php echo $this->session->flashdata('message2');?>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="email" class="form-control" id="email" name="email" value="<?php if(($this->session->userdata('r_email'))){ echo $this->session->userdata('r_email'); }else echo "";?>" placeholder="Masukkan Email" required>
                                    </div>
                                    <div>
                                      <?php echo $this->session->flashdata('message7');?>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="password" class="form-control" value="<?php if(($this->session->userdata('r_password'))){ echo $this->session->userdata('r_password'); }else echo "";?>" id="password" name="password" placeholder="Masukkan Password" required>
                                    </div>
                                    <div>
                                      <?php echo $this->session->flashdata('message3');?>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control" value="<?php if(($this->session->userdata('r_telepon'))){ echo $this->session->userdata('r_telepon'); }else echo "";?>" id="telepon" name="telepon" placeholder="Masukkan No Telp" required>
                                    </div>
                                    <div>
                                      <?php echo $this->session->flashdata('message4');?>
                                    </div>
                                    <div class="col-12 mb-3">
                                                   <select name="status">
                                                     <option <?php if(($this->session->userdata('r_status'))) { if( $this->session->userdata('r_status')=='Pelajar/Mahasiswa') {echo "selected"; } else echo "" ;}else echo "";?> >Pelajar/Mahasiswa</option>
                                                    <option <?php if(($this->session->userdata('r_status'))) { if( $this->session->userdata('r_status')=='Lembaga/Instansi') {echo "selected"; } else echo "" ;}else echo "";?> class="black">Lembaga/Instansi</option>
                                                     <option <?php if(($this->session->userdata('r_status'))) { if( $this->session->userdata('r_status')=='Umum') {echo "selected"; } else echo "" ;}else echo "";?> class="black">Umum</option>
                                                     <option <?php if(($this->session->userdata('r_status'))) { if( $this->session->userdata('r_status')=='Lainnya') {echo "selected"; } else echo "" ;}else echo "";?> class="black">Lainnya</option>
                                                   </select>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control mb-3" id="instansi"  name="instansi" placeholder="Masukkan Instansi" value="<?php if( ($this->session->userdata('r_instansi'))){ echo $this->session->userdata('r_instansi'); } else echo "";?>">
                                    </div>
                                    <div>
                                      <?php echo $this->session->flashdata('message5');?>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <textarea name="alamat" value="<?php if( ($this->session->userdata('r_instansi'))){ echo $this->session->userdata('r_instansi'); } else echo "";?>" class="form-control w-100" id="alamat" cols="30" rows="10" placeholder="Masukkan Alamat"></textarea>
                                    </div>
                                    <div>
                                      <?php echo $this->session->flashdata('message6');?>
                                    </div>
                                    <div class="col-12 mb-3">
                                      <?php echo $img; ?>
                                    </div>
                                                <div class="col-12 mb-3">
                                                    <th for="captcha" class="kirri">Captcha</th>
                                            
                                                    <td>
                                                        <input type="text" class="form-control" name="captcha" placeholder="Masukkan Captcha" maxlength="50" size="108px" required/>
                                                        <input type="hidden" class="form-control" name="isicaptcha" value="<?php echo $random;?>"></td>
                                                </div>
                                              <div class="cart-btn" style="width: 100%;">
                                                 <input type="submit"  class="btn amado-btn w-100" value="Daftar">
                                              </div>
                                </div>
                            </form>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>

</div>
 <?php
       $this->load->view('Footer_v');
?>
</div>
                <?php
        $this->load->view('LoadJS');

   ?>