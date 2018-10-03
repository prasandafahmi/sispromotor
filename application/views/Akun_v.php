 <?php $this->load->view('Header_v');?><br>

<?php $this->load->view('side_v'); ?>

        <div class="amado_product_area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                <div class="col-12 col-lg-8">
                        <div class="checkout_details_area mt-0 clearfix">
<?php  $u = $user->result(); ?>
                            <div class="cart-title">
                                <h2>Informasi Akun</h2>
                            </div>
                            <form action="<?php echo site_url('Akun/updatedata/');?><?php cetak($this->session->userdata('id')) ;?>" method="post">
                                <div class="row"><?php $u=$user->result();?>
                                    <tr>
                                      <td colspan="2"></td>
                                         <td> <?php echo $this->session->flashdata('message2');?></td>
                                    </tr>
                                    <div class="col-md-6 mb-3">
                                        <tr>
                                            <td>
                                                Username : 
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="username" name="username" value="<?php if(($this->session->userdata('u_username'))){cetak($this->session->userdata('u_username')) ;}else{cetak($u[0]->username); } ?>" placeholder="Username" required>
                                            </td>
                                        </tr>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                      <tr>
                                            <td>
                                                Nama : 
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="nama"  name="nama" value="<?php if(($this->session->userdata('u_nama'))){cetak($this->session->userdata('u_nama')) ;}else{ cetak($u[0]->nama) ;} ?>" placeholder="Nama" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> <?php echo $this->session->flashdata('message1');?></td> 
                                        </tr>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <tr>
                                            <td>
                                                Email : 
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="email" id="email" value="<?php if(($this->session->userdata('u_email'))){cetak($this->session->userdata('u_email')) ;}else{ cetak($u[0]->email) ;} ?>" placeholder="Email" required>
                                            </td>
                                        </tr>
                                    </div>
                                    <div class="col-12 mb-3">
                                         <tr>
                                            <td>
                                                Password : 
                                            </td>
                                            <td>
                                               <a href="<?php echo site_url('Akun/edit_password');?>"><span class="icon_pencil-edit"></span> &nbsp;Ubah Password</a>
                                            </td>
                                        </tr>
                                        <tr>
                                             <td> <?php echo $this->session->flashdata('message3');?></td>
                                        </tr>
                                    </div>
                                     <div class="col-12 mb-3">
                                         <tr>
                                            <td>
                                                No.Telp : 
                                            </td>
                                            <td>
                                                <input type="text" name="telepon" onkeyup="validAngka(this)" class="form-control" id="telepon" value="<?php if(($this->session->userdata('u_telepon'))){cetak($this->session->userdata('u_telepon')) ;}else{ cetak($u[0]->telepon) ;} ?>" placeholder="First Name" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> <?php echo $this->session->flashdata('message4');?></td>
                                        </tr>
                                    </div>
                                    <div class="col-12 mb-3">
                                         <tr>
                                            <td>
                                                Status : 
                                            </td>
                                            <td>
                                       <select name="status" class="w-100">
                                    <option <?php if(($this->session->userdata('u_status'))){ if($this->session->userdata('u_status')=="Pelajar/Mahasiswa"){ echo "selected"; }
                                            else{echo ""; }} else {if( $u[0]->status=='Pelajar/Mahasiswa') {echo "selected"; }}?>>Pelajar/Mahasiswa</option>
                                    <option <?php if(($this->session->userdata('u_status'))){ if($this->session->userdata('u_status')=="Lembaga/Instansi"){echo "selected";}
                                            else{echo ""; }}else{if($u[0]->status=='Lembaga/Instansi') {echo "selected"; } }?>>Lembaga/Instansi</option>
                                    <option <?php if(($this->session->userdata('u_status'))){ if($this->session->userdata('u_status')=="Lainnya"){echo "selected";}
                                            else{echo ""; } } else {if( $u[0]->status=='Lainnya') {echo "selected"; } }?>>Lainnya</option>
                                    <option <?php if(($this->session->userdata('u_status'))){ if($this->session->userdata('u_status')=="Umum"){ echo "selected"; }
                                            else{echo ""; } } else {if( $u[0]->status=='Umum') {echo "selected"; }}?>>Umum</option>
                                </select>                                 
                                            </td>
                                        </tr>
                                    </div>
                                    <div class="col-12 mb-3">
                                         <tr>
                                            <td>
                                                Nama Instansi : 
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="instansi" value="<?php if(($this->session->userdata('u_instansi'))){cetak( $this->session->userdata('u_instansi'));}else{ cetak($u[0]->instansi) ;} ?>" name="instansi" placeholder="instansi" required>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td > <?php echo $this->session->flashdata('message5');?></td>
                                        </tr>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <tr>
                                            <td>
                                                Alamat : 
                                            </td>
                                            <td>
                                                <textarea name="alamat" class="form-control w-100" id="alamat" cols="30" rows="10" placeholder="Leave a comment about your order" required=""><?php if(($this->session->userdata('u_alamat'))){cetak($this->session->userdata('u_alamat')) ;}else{ cetak($u[0]->alamat) ;} ?></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><?php echo $this->session->flashdata('message6');?></td>
                                        </tr>
                                    </div>
                                    <input type="submit" class="btn amado-btn w-100" type="submit" value="Update">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                                <!-- Ratings & Cart -->
                               
                            </div>
                        </div>
                    </div>


                   </div>

              
            </div>
        </div>
    </div>
    <script language='javascript'>
function validAngka(a)
{
    if(!/^[0-9.]+$/.test(a.value))
    {
    a.value = a.value.substring(0,a.value.length-1000);
    }
}
</script>

<?php $this->load->view('footer_v'); ?>
<?php $this->load->view('LoadJS');?>