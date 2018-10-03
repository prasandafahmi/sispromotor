<?php
       $this->load->view('Header_v');
 ?>

        <div class="amado_product_area section-padding-100">
            <div class="container-fluid">

<section id="contact-page">

        <div class="container">
            <center>
                <h1>&nbsp;PUSAT PENELITIAN BIOLOGI - LIPI<br><b>FORMULIR</b><br> KUESIONER KEPUASAN PELANGGAN </h1>
            </center><hr>
            <form action="<?php echo site_url('Kepuasan');?>" onSubmit="return validasi_input(this)" method="POST">

                
 <table class="table-padding">

            <p><br><b>Beri nilai pendapat anda dengan memberi tanda di bawah yang anda pilih, data anda akan otomatis terunduh jika selesai melakukan pengisian form kepuasan pelanggan</b></p>

           <p> <input type="hidden" name="id_detail" value="<?php echo $id_detail;?>"> 
               <input type="hidden" name="id" value="<?php echo $id_order;?>"> 
               <b> 1. Bagaimana pemahaman Saudara tentang kemudahan prosedur pelayanan di unit ini.</b> <br>&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="s1" value=1 > 1. Tidak Mudah<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="s1" value=2> 2. Kurang Mudah<br>&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="s1" value=3> 3. Mudah<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="s1" value=4 > 4. Sangat Mudah<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>

                <b>2. Bagaimana pendapat Saudara tentang kesesuaian persyaratan pelanggan dengan jenis pelayanannya </b><br>&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="s2" value=1> 1. Tidak Sesuai&nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="s2" value=2> 2. Kurang Sesuai &nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="s2" value=3> 3. Sesuai&nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="s2" value=4> 4. Sangat Sesuai&nbsp;<br>

                <b>3. Bagaimana pendapat Saudara tentang kejelasan dan kepastian petugas melayani.</b> <br>&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="s3" value=1> 1. Tidak Jelas&nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="s3" value=2> 2. Kurang Jelas &nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="s3" value=3> 3. Jelas&nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="s3" value=4> 4. Sangat Jelas&nbsp;<br>

                <b>4. Bagaimana pendapat Saudara tentang kemampuan petugas dalam memberikan pelayanan.</b><br>&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="s4" value=1> 1. Tidak Mampu&nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="s4" value=2> 2. Kurang Mampu&nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="s4" value=3> 3. Mampu&nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="s4" value=4> 4. Sangat Mampu&nbsp;<br>

                <b>5. Bagaimana pendapat Saudara tentang kecepatan pelayanan di unit ini.</b><br>&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="s5" value=1> 1. Tidak Cepat&nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="s5" value=2> 2. Kurang Cepat&nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="s5" value=3> 3. Cepat&nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="s5" value=4> 4. Sangat Cepat&nbsp;<br>

                <b>6. Bagaimana pendapat Saudara tentang kesopanan dan keramahan petugas dalam memberikan pelayanan.</b><br>&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="s6" value=1> 1. Tidak Sopan dan ramah&nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="s6" value=2> 2. Kurang Sopan dan ramah&nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="s6" value=3> 3. Sopan dan ramah&nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="s6" value=4> 4. Sangat Sopan dan ramah&nbsp;<br>

                <b>7. Bagaimana pendapat Saudara tentang kewajaran biaya untuk mendapatkan pelayanan.</b><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="s7" value=1> 1. Tidak wajar&nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="s7" value=2> 2. Kurang wajar&nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="s7" value=3> 3. Wajar&nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="s7" value=4> 4. Sangat wajar&nbsp;<br>

                <b>8. Bagaimana pendapat Saudara tentang kesesuaian antara biaya yang dibayarkan dengan biaya yang telah ditetapkan .</b><br>&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="s8" value=1> 1. Selalu tidak sesuai&nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="s8" value=2> 2. Kadang - kadang sesuai&nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="s8" value=3> 3. Banyak sesuainya&nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="s8" value=4> 4. Selalu sesuai&nbsp;<br>

                <b>9. Bagaimana pendapat Saudara tentang ketetapan pelaksanaan terhadap jadwal waktu pelayanan .</b><br>&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="s9" value=1> 1. Selalu tidak tepat&nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="s9" value=2> 2. Kadang - kadang tepat&nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="s9" value=3> 3. Banyak tepatnya&nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="s9" value=4> 4. Selalu tepat&nbsp;<br>

                <b>10. Bagaimana pendapat Saudara tentang kenyamanan dilingkungan unit pelayanan.</b><br>&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="s10" value=1> 1. Tidak nyaman&nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="s10" value=2> 2. Kurang nyaman&nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="s10" value=3> 3. Nyaman &nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="s10" value=4> 4. Sangat nyaman&nbsp;<br>
            </p>
        </table> <br><hr>
                <tr>
                    <td>Saran/Komentar :</td> <br>
                    <td ><textarea  name="saran" type="text" class="form-control"></textarea></td>
                    <td></td>
                </tr>
                 <tr>
                    <td></td> <br>
                    <td></td>
                    <td><?php echo $this->session->flashdata('message3');?></td>
                </tr>
                 <a href="<?php echo site_url('Pesan/selesai');?>" class="btn btn-prime kirii"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Kembali</a>
                 <button class="btn btn-prime">Simpan &nbsp;<i class="fa fa-floppy-o" aria-hidden="true"></i></button>
            </form>
       
        </div><!--/.container-->
</section><!--/#contact-page-->

</div>
</div>
</div>
<?php
       $this->load->view('Footer_v');
?>

                <?php
        $this->load->view('LoadJS');

   ?>
    <script language="JavaScript">

   function validasi_input(form){
  function check_radio(radio)
  {
// memeriksa apakah radio button sudah ada yang dipilih
    for (i = 0; i < radio.length; i++)
    {
      if (radio[i].checked === true)
      {
        return radio[i].value;
      }
    }
   return false;
   }

   var radio_val = check_radio(form.s1);
   if (radio_val === false)
    {
      alert("Anda belum melengkapi form kepuasan pelanggan 1!");
      return false;
    }
    else  
        var radio_val = check_radio(form.s2);
        if (radio_val === false)
    {
      alert("Anda belum melengkapi form kepuasan pelanggan 2!");
      return false;
    }
    else  
        var radio_val = check_radio(form.s3);
        if (radio_val === false)
    {
      alert("Anda belum melengkapi form kepuasan pelanggan 3!");
      return false;
    }
    else  
        var radio_val = check_radio(form.s4);
        if (radio_val === false)
    {
      alert("Anda belum melengkapi form kepuasan pelanggan 4!");
      return false;
    }
    else  
        var radio_val = check_radio(form.s5);
        if (radio_val === false)
    {
      alert("Anda belum melengkapi form kepuasan pelanggan 5!");
      return false;
    }
    else  
        var radio_val = check_radio(form.s6);
        if (radio_val === false)
    {
      alert("Anda belum melengkapi form kepuasan pelanggan 6!");
      return false;
    }
    else  
        var radio_val = check_radio(form.s7);
        if (radio_val === false)
    {
      alert("Anda belum melengkapi form kepuasan pelanggan 7!");
      return false;
    }
    else  
        var radio_val = check_radio(form.s8);
        if (radio_val === false)
    {
      alert("Anda belum melengkapi form kepuasan pelanggan 8!");
      return false;
    }
    else  
        var radio_val = check_radio(form.s9);
        if (radio_val === false)
    {
      alert("Anda belum melengkapi form kepuasan pelanggan 9!");
      return false;
    }

    else  
        var radio_val = check_radio(form.s10);
        if (radio_val === false)
    {
      alert("Anda belum melengkapi form kepuasan pelanggan 10!");
      return false;
    }
        alert("Data pesanan anda telah tersimpan. Terimakasih");
   return (true);
       
      
}
</script>