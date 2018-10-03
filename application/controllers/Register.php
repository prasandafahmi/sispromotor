<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public $table_sumber;
	public function __construct(){
    parent::__construct();
    $this->load->model('Crud_m');
    $this->load->model('Login_model');
    $this->table_sumber = 'user';
	}

	public function index() {
     $teks="abcdefghijklmnopqrstuvwxyz0123456789";
     $random=substr(str_shuffle($teks),0,5);
     $this->load->helper('captcha');
     $vals = array('word'  => $random,
                   'img_path'  => './assets/img/captcha/',
                   'img_url'   => base_url().'/assets/img/captcha/',
                    //'font_path'   => './path/to/fonts/texb.ttf',
                   'img_width' => 150,
                   'img_height' => 30,
                   'expiration' => 7200
                    );
    $cap = create_captcha($vals); 
    $data=array( 'img'=>$cap['image'],
                 'random'=>$random,
                 'aktif1'=>'',
                 'aktif2'=>'',
                 'aktif3'=>'',
                 'aktif4'=>'',
                 'aktif5'=>'active',
                 'aktif6'=>'',
                 'aktif7'=>''
				);
        if($this->session->userdata('username')){
            redirect('Akun');
        }else{
             $this->load->view('Registrasi_v',$data);
        }
     
    }
  public function insert_user(){
      
        $captcha_input = $this->input->post('captcha');
        $mycaptcha = $this->input->post('isicaptcha');
        if($mycaptcha == $captcha_input){
         $this->form_validation->set_rules('nama', 'nama', 'required|min_length[2]');
         $valid1 = $this->form_validation->run();
         $pesan1 = validation_errors();
         $this->form_validation->reset_validation();

      	 $this->form_validation->set_rules('username', 'Username',
         'required|min_length[5]|max_length[15]|is_unique[user.username]',
        
        array(  'required'      => 'You have not provided %s.',
                'is_unique'     => 'This %s already exists.'));
				 
                $valid2 = $this->form_validation->run();
			    $pesan2 = validation_errors();
				$this->form_validation->reset_validation();
            
                $this->form_validation->set_rules('password', 'password','required|min_length[5]|max_length[15]');
                $valid3 = $this->form_validation->run();
                $pesan3 = validation_errors();
                $this->form_validation->reset_validation();

				 $this->form_validation->set_rules('telepon', 'telepon', 'required|min_length[11]|max_length[13]|integer');
				 $valid4 =  $this->form_validation->run();
				 $pesan4 = validation_errors();
				 $this->form_validation->reset_validation();

				 $this->form_validation->set_rules('instansi', 'instansi', 'required|min_length[2]');
				 $valid5 =  $this->form_validation->run();
				 $pesan5 = validation_errors();
				 $this->form_validation->reset_validation();

                $this->form_validation->set_rules('alamat', 'alamat', 'required|min_length[5]');
                $valid6 =  $this->form_validation->run();
                $pesan6 = validation_errors();
                $this->form_validation->reset_validation();

                  $this->form_validation->set_rules(
                        'email', 'Email',
                        'required|min_length[5]|max_length[50]|is_unique[user.email]',
                        array(
                                'required'      => 'You have not provided %s.',
                                'is_unique'     => 'This %s already exists.'
                        )
                );
                
                $valid7 =  $this->form_validation->run();
        $pesan7 = validation_errors();
         $this->form_validation->reset_validation();
            
         if($valid1 == false or $valid2 == false or $valid3 == false or $valid4 == false or $valid5 == false or $valid6 == false or $valid7== false){
         if ($valid1 == false){
            echo $this->session->set_flashdata('message1', "<div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><h4><i class='icon_error-triangle_alt'></i>Perhatian !!</h4>
               Mohon Masukkan Nama Anda</div>");
            }
         if($valid2 == false){
            echo $this->session->set_flashdata('message2', "<div class='alert alert-danger alert-dismissible'>
           <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><h4><i class='icon_error-triangle_alt'></i> Perhatian !!</h4>
           ".$pesan2."</div>");
             }
             if($valid3 == false){
                  echo $this->session->set_flashdata('message3', "<div class='alert alert-danger alert-dismissible'>
           <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><h4><i class='icon_error-triangle_alt'></i> Perhatian !!</h4>
           ".$pesan3."
           </div>");
             }
             if($valid4 == false){
                  echo $this->session->set_flashdata('message4', "<div class='alert alert-danger alert-dismissible'>
           <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><h4><i class='icon_error-triangle_alt'></i>Perhatian !!</h4>
           ".$pesan4."
           </div>");
             }

              if($valid5 == false){
                  echo $this->session->set_flashdata('message5', "<div class='alert alert-danger alert-dismissible'>
           <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><h4><i class='icon_error-triangle_alt'></i> Perhatian!!</h4>
           ".$pesan5."
           </div>");
             }
              if($valid6 == false){
                  echo $this->session->set_flashdata('message6', "<div class='alert alert-danger alert-dismissible'>
           <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><h4><i class='icon_error-triangle_alt'></i> Perhatian !!</h4>
           ".$pesan6."
           </div>");
             }
             
             if($valid7 == false){
                  echo $this->session->set_flashdata('message7', "<div class='alert alert-danger alert-dismissible'>
           <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><h4><i class='icon_error-triangle_alt'></i> Perhatian !!</h4>
           ".$pesan7."
           </div>");
             }
                 $this->session->set_userdata('r_username', $this->input->post('username'));
                 $this->session->set_userdata('r_nama', $this->input->post('nama')) ;
				 $this->session->set_userdata('r_email', $this->input->post('email'));
				 $this->session->set_userdata('r_password',$this->input->post('password'));
				 $this->session->set_userdata('r_telepon',  $this->input->post('telepon'));
				 $this->session->set_userdata('r_status', $this->input->post('status'));
				 $this->session->set_userdata('r_instansi', $this->input->post('instansi'));
				 $this->session->set_userdata('r_alamat', $this->input->post('alamat'));
            	
        $teks="abcdefghijklmnopqrstuvwxyz0123456789";
     $random=substr(str_shuffle($teks),0,5);
     $this->load->helper('captcha');
     $vals = array('word'  => $random,
                   'img_path'  => './assets/img/captcha/',
                   'img_url'   => base_url().'/assets/img/captcha/',
                    //'font_path'   => './path/to/fonts/texb.ttf',
                   'img_width' => 150,
                   'img_height' => 30,
                   'expiration' => 7200
                    );
    $cap = create_captcha($vals); 
    $data=array( 'img'=>$cap['image'],
                 'random'=>$random,	 
                'aktif1'  =>'',
                'aktif2'  =>'',
                'aktif3'  =>'',
                'aktif4'  =>'',
                'aktif5'  =>'active',
                'aktif6'  =>'',
                'aktif7'=>''
				);
        echo $this->session->set_flashdata('messageregist', "<div class='alert alert-danger alert-dismissible'>
           <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><h4><i class='icon_error-triangle_alt'></i><center> Warning !!</center></h4>
           ".'<center>Data yang anda masukkan salah ! silahkan lakukan pendaftaran akun kembali !</center>'."
           </div>");
		    $this->load->view('Registrasi_v',$data);
         }

        else{
		    $data = array(
				
				'username'  => $this->input->post('username'),
                'nama'      => $this->input->post('nama'),
				'email'     => $this->input->post('email'),
				'password'  => md5($this->input->post('password')),
				'telepon'   => $this->input->post('telepon'),
				'status'    => $this->input->post('status'),
				'instansi'  => $this->input->post('instansi'),
				'alamat'    => $this->input->post('alamat'));
        
        $this->Crud_m->input_data($this->table_sumber,$data);
        $cek=$this->Login_model->ambil_data('user', $data);

    if($cek->num_rows() == 1) { // Berfungsi untuk mengecek kebenaran data Login yang diinput (1 = true)
		  $row=$cek->row();
          $this->session->set_userdata('id', $row->id);
          $this->session->set_userdata('username',$row->username);
          $this->session->set_userdata('nama',$row->nama);
          $this->session->set_userdata('password', $row->password);
          $this->session->set_userdata('status', $row->status);
          $this->session->set_userdata('instansi', $row->instansi);
          $this->session->set_userdata('telepon', $row->telepon);
          $this->session->set_userdata('alamat', $row->alamat);
          $this->session->set_userdata('email', $row->email);
	     
        
				 $this->session->set_userdata('r_username', '');
                 $this->session->set_userdata('r_nama', '');
				 $this->session->set_userdata('r_email', '');
				 $this->session->set_userdata('r_password', '');
				 $this->session->set_userdata('r_telepon', '');
				 $this->session->set_userdata('r_status', '');
				 $this->session->set_userdata('r_instansi', '');
				 $this->session->set_userdata('r_alamat','');
            	
          
                        // mengirimkan email  

  require_once(APPPATH.'third_party/PHPMailer-master/PHPMailerAutoload.php');
        $mail = new PHPMailer();
        $mail->IsSMTP(); // we are going to use SMTP
        $mail->SMTPAuth   = true; // enabled SMTP authentication
        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
        $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
        $mail->Port       = 465;                   // SMTP port to connect to GMail
        $mail->Username   = "sispromotor@gmail.com";  // user email address
        $mail->Password   = "jasa1234";            // password in GMail
        $mail->SetFrom('sispromotor@gmail.com', 'Mail');  //Who is sending 
        $mail->isHTML(true);
        $mail->Subject    = "SISPROMOTOR|DAFTAR AKUN";
        $mail->Body      = '
            <html>
            <head>
                <title>PUSLIT BIOLOGI | SISPROMOTOR - LIPI</title>
            </head>
            <body>
            <h3> Daftar Akun SISPROMOTOR-LIPI </h3>
            <p>Terimakasih telah melakukan pendaftaran akun pada website SISPROMOTOR -LIPI, silahkan kunjungi website untuk melakukan pemesanan jasa</p>
            <p>Hormat Kami</p>
            <p>Bidang Mikrobiologi
            <br>Pusat Penelitian Biologi-LIPI</p>
            </body>
            </html>
        ';
        $destino =  $this->session->userdata('email'); // Who is addressed the email to
        $mail->AddAddress($destino, "Receiver");
        $mail->Send();
                //
       redirect('Akun');
    }
    else{ // Jika data yang diinput tidak valid maka akan dialihkan ke view Login gagal  
      echo "<script>alert('Gagal Login: Cek username, password!');history.go(-1);</script>";
		}
}
    }else{
            echo $this->session->set_flashdata('messageregist', "<div class='alert alert-danger alert-dismissible'>
           <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><h4><i class='icon_error-triangle_alt'></i><center> Warning !!</center></h4>
           ".'<center>Data yang anda masukkan salah ! silahkan lakukan pendaftaran akun kembali !</center>'."
           </div>");
        
				 $this->session->set_userdata('r_username', $this->input->post('username'));
                 $this->session->set_userdata('r_nama', $this->input->post('nama'));
				 $this->session->set_userdata('r_email', $this->input->post('email'));
				 $this->session->set_userdata('r_password', $this->input->post('password'));
				 $this->session->set_userdata('r_telepon', $this->input->post('telepon'));
				 $this->session->set_userdata('r_status', $this->input->post('status'));
				 $this->session->set_userdata('r_instansi', $this->input->post('instansi'));
				 $this->session->set_userdata('r_alamat', $this->input->post('alamat'));

            
        redirect('Register');
     }
}
    }