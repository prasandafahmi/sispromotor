<?php
       $this->load->view('Header_v');

?>  
<!DOCTYPE html>   
  <html>   
  <head>   
   <meta charset="UTF-8">   
   <title>   
     <?= $title;?>  
   </title>   
 </head>   
 <body>
     
   
     <div class="container">
         <h2>Reset Password</h2> 
   <h5>Hello <span><?php echo $nama; ?></span>, Silakan isi password baru anda.</h5>   
   <?php echo form_open('Lupa_password/reset_password/token/'.$token); ?>  
    <table >
        <tr>
   <td>Password Baru:</td>   
        </tr>
        <tr>
   <td>   
     <input class="form-control" type="password" name="password" value="<?php echo set_value('password'); ?>"/>   
   </td>
        </tr>
        <tr>
   <td> <?php echo form_error('password'); ?> </td>
        </tr>
        <tr>
   <td>Konfirmasi Password:</td>
        </tr>
        <tr>
   <td>   
     <input class="form-control" type="password" name="passconf" value="<?php echo set_value('passconf'); ?>"/>   
   </td>
        </tr>
        <tr>
   <td> <?php echo form_error('passconf'); ?> </td>
        </tr>
   <tr><td>   
    <input type="submit" name="btnSubmit" value="Reset"  class="btn btn-resetpw"/>
   </td>
        </tr>
     </table>
         </div>
 </body>   
 </html>  
 <br><br><br><br><br><br><br><br><br>
<?php $this->load->view('Footer_v'); ?>
<?php $this->load->view('LoadJS'); ?>
