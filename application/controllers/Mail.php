<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mail extends CI_Controller {


	public function index(){
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
        // $destino =  $this->session->userdata('email'); // Who is addressed the email to
        $mail->AddAddress('fahmiprasanda@gmail.com', "Receiver");
        $mail->Send();
        
        if ($mail->send()) {
        	echo "SUkses";
        }else{
        	echo "gagal";
        }
	}
}