 <?php  
 defined('BASEPATH') OR exit('No direct script access allowed');  
   
 class Lupa_password extends CI_Controller {  
    
     public function __construct() {
	parent::__construct();
	
	$this->load->model('Login_m');
	 
	}
   
     public function index()  
     {  
         $data = array ('aktif1'=>"",
			           'aktif2'=>"",
			           'aktif3'=>"",
			           'aktif4'=>"",
			           'aktif5'=>"",
			           'aktif6'=>"",
                       'aktif7'=>""); 
         
         $this->form_validation->set_rules('email', 'Email', 'required|valid_email');   
         
         if($this->form_validation->run() == FALSE) {  
             $data['title'] = 'Halaman Reset Password ';  
             $this->load->view('V_lupa_password',$data);  
         }else{  
             $email = $this->input->post('email');   
             $clean = $this->security->xss_clean($email);  
             $userInfo = $this->Login_m->getUserInfoByEmail($clean);  
               
             if(!$userInfo){  
               $this->session->set_flashdata('sukses', 'Mohon maaf alamat email yang anda masukkan salah,<br>Silahkan masukkan kembali alamat email anda!');  
               redirect('Lupa_password/Terimakasih');   
             }    
               
             //build token   
                       
             $token = $this->Login_m->insertToken($userInfo->id);              
             $qstring = $this->base64url_encode($token);           
              $url = site_url() . '/Lupa_password/reset_password/token/' . $qstring;  
             $link = '<a href="' . $url . '">' . $url . '</a>';   
               
             $message = '';             
             $message .= 'Anda mendapatkan pesan ini karena ingin melakukan pembuatan password baru, dengan fitur "lupa Password" pada akun SISPROMOTOR-LIPI<br>';  
             $message .= 'Mohon Klik Disini! ' . $link;     
            // mengirimkan email  

require_once(APPPATH.'third_party/PHPMailer-master/PHPMailerAutoload.php');
        $mail = new PHPMailer();
        $mail->IsSMTP(); // we are going to use SMTP
        $mail->SMTPAuth   = true; // enabled SMTP authentication
        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
        $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
        $mail->Port       = 465;                   // SMTP port to connect to GMail
        $mail->Username   = "sispromotor@gmail.com";  // user email address
        $mail->Password   = "Jasa1234";            // password in GMail
        $mail->SetFrom('sispromotor@gmail.com', 'Mail');  //Who is sending 
        $mail->isHTML(true);
        $mail->Subject    = "SISPROMOTOR|LUPA PASSWORD";
        $mail->Body      = '
            <html>
            <head>
                <title>PUSLIT BIOLOGI | SISPROMOTOR - LIPI</title>
            </head>
            <body>
            <h3>Buat Ulang Password Akun SISPROMOTOR-LIPI </h3>
            <p>'.$message.'</p>
            <p>Hormat Kami</p>
            <p>Bidang Mikrobiologi
            <br>Pusat Penelitian Biologi-LIPI</p>
            </body>
            </html>
        ';
        $destino = $email; // Who is addressed the email to
        $mail->AddAddress($destino, "Receiver");
        $mail->Send();
                //
           
             $this->session->set_flashdata('sukses', 'silahkan periksa email anda!');  
               redirect('Lupa_password/Terimakasih');   
         }  
         
     }  
   
     public function reset_password()  
         
     {  
         
       $token = $this->base64url_decode($this->uri->segment(4));           
       $cleanToken = $this->security->xss_clean($token);  
         
       $user_info = $this->Login_m->isTokenValid($cleanToken); //either false or array();          
         
       if(!$user_info){  
         $this->session->set_flashdata('sukses', 'Token tidak valid atau kadaluarsa');  
         redirect(site_url('Login'),'refresh');   
       }    
   
       $data = array(  
         'title'=> '',  
         'nama'=> $user_info->nama,   
         'email'=>$user_info->email,   
         'token'=>$this->base64url_encode($token),
         'aktif1'=>"",
			           'aktif2'=>"",
			           'aktif3'=>"",
			           'aktif4'=>"",
			           'aktif5'=>"",
			           'aktif6'=>"",
                       'aktif7'=>""
       );  
         
       $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');  
       $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');         
         
       if ($this->form_validation->run() == FALSE) { 
           
         $this->load->view('V_reset_password', $data);  
       }else{  
                           
         $post = $this->input->post(NULL, TRUE);          
         $cleanPost = $this->security->xss_clean($post);          
         $hashed = md5($cleanPost['password']);          
         $cleanPost['password'] = $hashed;  
         $cleanPost['id'] = $user_info->id;  
         unset($cleanPost['passconf']);          
         if(!$this->login_m->updatePassword($cleanPost)){  
           $this->session->set_flashdata('sukses', 'Update password gagal.');  
         }else{  
           $this->session->set_flashdata('sukses', 'Password anda telah
             diperbaharui. Silakan login.');  
         }  
         redirect(site_url('Login'),'refresh');         
       }  
     }  
       
   public function base64url_encode($data) {   
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');   
   }   
   
   public function base64url_decode($data) {   
    return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));   
   }    
    public function Terimakasih() {
	$data = array ('aktif1'=>"",
			'aktif2'=>"",
			'aktif3'=>"",
			'aktif4'=>"",
			'aktif5'=>"",
			'aktif6'=>"",
            'aktif7'=>""
			);
	$this->load->view('Terimakasih_v', $data);
	}
 }  
