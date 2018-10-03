<?php
       $this->load->view('header_v');

?>
 <?php echo $this->session->flashdata('messageregist');?>
<center>
   <section id="content" class="shortcode-item">
       <div class="container">
           <div class="row"><br>
           <div class="col-md-4"></div>
           
           <?php if($this->session->userdata('p')){
                  ?>
               <div class="col-xs-12 col-sm-5">
              
                 <h2>Masuk atau Daftar</h2>
                   <div class="accordion">
                     <div class="panel-group" id="accordion1">
                         <div class="panel panel-default">
                           <div class="panel-heading">
                             <h3 class="panel-title">
                               <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne1">
                                 Masuk

                                 <i class="fa fa-angle-right pull-right"></i>
                               </a>

                             </h3>
                           </div>

                             <div id="collapseOne1" class="panel-collapse collapse in">
                               <div class="panel-body">
                                 <div class="media accordion-inner">
                                   <section class="pricing-page">
                                     <div class="container">
                                         <div class="pricing-area text-center">
                                           <div class="row">
                                               <div class="col-sm-4 plan price-one wow fadeInDown">
                                                 <ul>
                                                   <li class="heading-one">
                                                     <h1><i class="fa fa-user" aria-hidden="true"></i></h1>
                                                   </li><br><?php echo $this->session->flashdata('sukses');?>
                                                   <form action="<?php echo site_url()?>/Login/validasi2" method="POST" class="form-signin">
                                                       <table class="table-padding">
                                                           <tr>
                                                               <td width="2%"></td>
                                                               <td width="45%"><input type="text" placeholder="Username" name="username"  class="form-control"></td>
                                                               <td width="2%"></td>
                                                           </tr>
                                                           <tr>
                                                               <td width="2%"></td>
                                                               <td width="45%"><input type="Password" placeholder="Password"   name="password" class="form-control"></td>
                                                               <td width="2%"></td>
                                                           </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td><a href="<?php echo site_url()?>/Lupa_password" class="btn btn-lupa">Lupa Password</a></td> 
                                                                <td></td>
                                                            </tr>
                                         
                                                       </table><br>
                                                       <li class="plan-action">
                                                         <input type="submit" value="Masuk" href="" class="btn btn-primary">
                                                       </li>
                                                           </form>

                                                 </ul>
                                               </div>
                                           </div>
                                         </div>
                                       </div>
                                   </section>
                                 </div>
                               </div>
                             </div>
                          </div> <!--  PANEL DEFAULT -->

       <?php }
       else {  ?>
           <div class="col-xs-12 col-sm-5">
               
               <h2>Masuk atau Daftar</h2>
                 <div class="accordion">
                    <div class="panel-group" id="accordion1">
                       <div class="panel panel-default">
                           <div class="panel-heading ">
                              <h3 class="panel-title">
                                 <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne1">
                                   Masuk
                                   <i class="fa fa-angle-right pull-right"></i>
                                 </a>
                               </h3>
                           </div>
                           <div id="collapseOne1" class="panel-collapse collapse in">
                             <div class="panel-body">
                               <div class="media accordion-inner">
                                 <section class="pricing-page">
                                   <div class="container">
                                     <div class="pricing-area text-center">
                                       <div class="row">
                                         <div class="col-sm-4 plan price-one wow fadeInDown">
                       <ul>
                                             <li class="heading-one">
                                               <h1><i class="fa fa-user" aria-hidden="true"></i>
                                               </h1>

                                             </li><br>

                              <!-- if else kalo session ada -->

<?php if(! empty($this->session->userdata('p'))){ ?>

                               <form action="<?php echo site_url()?>/Login/validasi2" method="POST" class="form-signin">
                                   <table class="table-padding">
                                       <tr>
                                           <td width="2%"></td>
                                           <td width="45%"><input type="text" placeholder="Username" name="username"  class="form-control"></td>
                                               <td width="2%"></td>
                                       </tr>
                                       <tr>
                                           <td width="2%"></td>
                                           <td width="45%"><input type="Password" placeholder="Password"   name="password" class="form-control"></td>
                                           <td width="2%"></td>
                                       </tr>
                                   </table> <br>
                                       <li class="plan-action">
                                           <input type="submit" value="Masuk" class="btn btn-primary">
                                       </li>
                                 </form>

<?php }else{
                             ?>
                              <!-- end if else kalo session ada -->


                             <!-- if else kalo ga ada session --><?php echo $this->session->flashdata('sukses');?>
                             <form action="<?php echo site_url()?>/Login/validasi" method="POST" class="form-signin">
                               <table class="table-padding">
                                   <tr>
                                       <td width="2%"></td>
                                       <td width="45%"><input type="text" placeholder="Username" name="username"  class="form-control"></td>
                                       <td width="2%"></td>
                                   </tr>
                                   <tr>
                                       <td width="2%"></td>
                                       <td width="45%"><input type="Password" placeholder="Password"   name="password"class="form-control"></td>
                                       <td width="2%"></td>
                                   </tr>
                                   <tr>
                                      <td></td>
                                       <td><a href="<?php echo site_url()?>/Lupa_password" class="btn btn-lupa">Lupa Password</a>
                                       </td> 
                                   </tr>
                             </table> <br>
                             <li class="plan-action">
                                 <input type="submit" value="Masuk" href="" class="btn btn-primary">

                             </li>
                             
                             
                             </form>

                         <?php }
                         ?>

                         <!-- end if ga ada session-->
                     </ul>
                                         </div> <!-- COL SM-4-->
                                       </div> <!-- ROW-->
                                     </div> <!-- pricing-->
                                   </div>  <!-- container-->
                                 </section>
                               </div> <!-- media-->
                             </div>
                           </div>
                         </div> <!--75 Panel default-->

               <?php
                 }
                 ?>

                         <div class="panel panel-default">
                           <div class="panel-heading  active ">
                             <h3 class="panel-title">
                               <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo1">
                                 Daftar
                                 <i class="fa fa-angle-right pull-right"></i>
                               </a>
                             </h3>
                           </div>
                           <div id="collapseTwo1" class="panel-collapse collapse">
                             <div class="panel-body">
                                <section class="pricing-page">
                                   <div class="container">
                                     <div class="pricing-area text-center">
                                       <div class="row">
                                         <div class="col-sm-4 plan price-one wow fadeInDown">
                                           <ul>
                                             <li class="heading-one">
                                               <h1><i class="fa fa-user" aria-hidden="true"></i></h1>
                                             </li><br>
                                               
                                              
                                             <form action="<?php echo site_url(); ?>/Register/insert_user" method="POST" class="form-signin">
                                               <table class="table-padding ">
                                               <tr>
                                                   <td width="5%" class="kirri">Nama</td>
                                                   <td width="65%"><input type="text"  value="<?php if(!empty($this->session->userdata('r_nama'))){ echo $this->session->userdata('r_nama'); }else echo "";?>" name="nama" placeholder="Nama" class="form-control"></td><td width="5%"></td>
                                               </tr>
                                               <tr>
                                                   <td ></td>
                                                   <td > <?php echo $this->session->flashdata('message1');?></td>
                                               </tr>
                                               <tr>
                                                   <td  class="kirri">Username</td>
                                                   <td ><input type="text"  value="<?php if(!empty($this->session->userdata('r_username'))){ echo $this->session->userdata('r_nama'); }else echo "";?>" name="username"  placeholder="Min 5 Characters" class="form-control"></td>
                                               </tr>
                                               <tr>
                                                   <td ></td>
                                                   <td > <?php echo $this->session->flashdata('message2');?></td>
                                               </tr>
                                               <tr>
                                                   <td  class="kirri">Email</td>
                                                   <td ><input type="email"  value="<?php if(!empty($this->session->userdata('r_email'))){ echo $this->session->userdata('r_email'); }else echo "";?>" name="email"  placeholder="Use '@' and '.' " class="form-control"></td>
                                               </tr>
                                               <tr>
                                                 <td  class="kirri">Password</td>
                                                 <td ><input type="Password" value="<?php if(!empty($this->session->userdata('r_password'))){ echo $this->session->userdata('r_password'); }else echo "";?>" name="password"  placeholder="Min 5 | Max 15 Characters" class="form-control"></td>
                                               </tr>
                                               <tr>
                                                 <td ></td>
                                                 <td > <?php echo $this->session->flashdata('message3');?></td>
                                               </tr>
                                               <tr>
                                                 <td  class="kirri">No.Telp</td>
                                                 <td ><input type="text" value="<?php if(!empty($this->session->userdata('r_telepon'))){ echo $this->session->userdata('r_telepon'); }else echo "";?>" name="telepon" placeholder="Max 12 Number" class="form-control">
                                                 </td>
                                               </tr>
                                                <tr>
                                                   <td ></td>
                                                   <td > <?php echo $this->session->flashdata('message4');?></td>
                                               </tr>
                                               <tr>
                                                 <td  class="kirri">Status</td>
                                                 <td >
                                                   <select   name="status" class="form-control"  >
                                                     <option <?php if(!empty($this->session->userdata('r_status'))) { if( $this->session->userdata('r_status')=='Pelajar/Mahasiswa') {echo "selected"; } else echo "" ;}else echo "";?> >Pelajar/Mahasiswa</option>
                                                    <option <?php if(!empty($this->session->userdata('r_status'))) { if( $this->session->userdata('r_status')=='Lembaga/Instansi') {echo "selected"; } else echo "" ;}else echo "";?> class="black">Lembaga/Instansi</option>
                                                     <option <?php if(!empty($this->session->userdata('r_status'))) { if( $this->session->userdata('r_status')=='Umum') {echo "selected"; } else echo "" ;}else echo "";?> class="black">Umum</option>
                                                     <option <?php if(!empty($this->session->userdata('r_status'))) { if( $this->session->userdata('r_status')=='Lainnya') {echo "selected"; } else echo "" ;}else echo "";?> class="black">Lainnya</option>
                                                   </select>
                                                 </td>
                                               </tr>
                                               <tr>
                                                 <td  class="kirri">Instansi</td>
                                                 <td ><input type="text" value="<?php if(!empty($this->session->userdata('r_instansi'))){ echo $this->session->userdata('r_instansi'); } else echo "";?>" name="instansi" placeholder="Nama Instansi" class="form-control"> </td>
                                               </tr>
                                               <tr>
                                                 <td ></td>
                                                 <td > <?php echo $this->session->flashdata('message5');?></td>
                                               </tr>
                                               <tr>
                                                 <td  class="kirri">Alamat</td>
                                                 <td ><textarea  type="text" name="alamat" placeholder="Min 5 Characters" class="form-control"><?php if(!empty($this->session->userdata('r_alamat'))){ echo $this->session->userdata('r_alamat'); }else echo "";?></textarea></td>
                                               </tr>
                                               <tr>
                                                 <td ></td>
                                                 <td > <?php echo $this->session->flashdata('message6');?></td>
                                               </tr>
                                                <tr>
                                                    <td></td>
                                                     <td>  <?php echo $img;d  ?>
                                                </tr>
                                               
                                                <tr>
                                                    <th for="captcha" class="kirri">Captcha</th>
                                            
                                                    <td>
                                                        <input type="text" class="form-control" name="captcha" maxlength="50" size="108px" required/>
                                                        <input type="hidden" class="form-control" name="isicaptcha" value="<?php echo $random;?>"></td>
                                                </tr>
                                                  
                                          </table><br>
                                             <li class="plan-action">
                                               <input type="submit" value="Daftar" class="btn btn-primary ">
                                             </li>
                                       </form>
                                             
                                             
                                     </ul>
                                 </div> <!--col -sm-->
                             </div> <!--row-->
                         </div> <!--pricing-->
                     </div> <!--container-->
             </section> <!--pricing page-->
           </div> <!--panel-->
         </div> <!--collapse-->
       </div>

                           </div><!--/#accordion1-->
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>
    </section>
</center>
<br>
 <?php
       $this->load->view('footer_v');
?>

                <?php
        $this->load->view('LoadJS');

   ?>
    <script src="<?php echo base_url();?>assets/js/jquery.js"></script>
      <script type="text/javascript">
  
           $(document).on("click", '.tombol', function(e){
  alert("Registrasi anda salah!");
       });
          </script>