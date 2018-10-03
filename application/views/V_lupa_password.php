<?php
       $this->load->view('Header_v');
?> 
        <div class="amado_product_area section-padding-100">
            <div class="container-fluid">
   <center><h2>Lupa Password</h2>   
   <p>Untuk melakukan reset password, silakan masukkan alamat email anda. </p>   
   <?php echo form_open('Lupa_password');?>   
       <table>
       <tr>
           <td>Email:</td>
           <td><input class="form-control" type="text" name="email" value="<?php echo set_value('email');  ?>"/> </td>
           <td><input type="submit" name="btnSubmit" value="Submit"  class="btn btn-resetpw"/>   </td>
        </tr>
       <?php echo form_error('email');  ?>
       </table>
    </center>
  </div>
</div>
</div>
<?php $this->load->view('Footer_v'); ?>
<?php $this->load->view('LoadJS'); ?>
