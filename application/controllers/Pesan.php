<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan extends CI_Controller {
    
    public function __construct() {
	parent::__construct();
	$this->load->model('Crud_m');
    require_once(APPPATH.'third_party/PHPMailer-master/PHPMailerAutoload.php');
	}
    
    public function index() {
	$data = array ('aktif1'=>"",
			'aktif2'=>"",
			'aktif3'=>"active",
			'aktif4'=>"",
			'aktif5'=>"",
			'aktif6'=>"",
            'aktif7'=>""
			);
        if ( $id=$this->session->userdata('id')) {
             $where=array('id'       =>$id,
                    'status_all'=>'sudah');
        
        $ccc = $this->db->query("SELECT *, pembayaran.status as sp FROM `detail` join `order` on `order`.id_order=detail.id_order join user on user.id=order.id join pembayaran on `order`.id_order=pembayaran.id_order join produk on produk.id=detail.id where `order`.id=$id and status_persetujuan='Setuju' and status_all='Sudah' and pembayaran.status <> 'valid' group by detail.id_order order by tanggal_berakhir desc ");
        if($ccc->num_rows() >= 0){
                $data['kode'] = $ccc->result();
                //return $data['kode'];
            }else{
                return false;
            }

        $data['produk'] = $this->Crud_m->selectSemua('produk');

        $this->load->view('Pes_semua_v', $data);
        }else{
                    $data['produk'] = $this->Crud_m->selectSemua('produk');

        $this->load->view('Pes_semua_v', $data);
        }
	}
    
    public function jasaLab() {
	$data = array ( 'aktif1'=>"",
					'aktif2'=>"",
					'aktif3'=>"active",
					'aktif4'=>"",
					'aktif5'=>"",
					'aktif6'=>"",
				    'aktif7'=>"");
	if ($id=$this->session->userdata('id')) {
         $where=array('id'       =>$id,
                'status_all'=>'sudah');
    
    $ccc = $this->db->query("SELECT *, pembayaran.status as sp FROM `detail` join `order` on `order`.id_order=detail.id_order join user on user.id=order.id join pembayaran on `order`.id_order=pembayaran.id_order join produk on produk.id=detail.id where `order`.id=$id and status_persetujuan='Setuju' and status_all='Sudah' and pembayaran.status <> 'valid' group by detail.id_order order by tanggal_berakhir desc ");
    if($ccc->num_rows() >= 0){
            $data['kode'] = $ccc->result();
            //return $data['kode'];
        }else{
            return false;
        }
        $data['produk'] = $this->Crud_m->selectJasaLab('produk');
    $this->load->view('Jasa_lab_v', $data); 
    }else{
        $data['produk'] = $this->Crud_m->selectJasaLab('produk');
    $this->load->view('Jasa_lab_v', $data);
    }
        }
   
    
    public function jasaalat() {
	$data = array ( 'aktif1'=>"",
					'aktif2'=>"",
					'aktif3'=>"active",
					'aktif4'=>"",
					'aktif5'=>"",
					'aktif6'=>"",
				    'aktif7'=>""
				);
    if ( $id=$this->session->userdata('id')) {
         $where=array('id'       =>$id,
                'status_all'=>'sudah');
    
    $ccc =$this->db->query("SELECT *, pembayaran.status as sp FROM `detail` join `order` on `order`.id_order=detail.id_order join user on user.id=order.id join pembayaran on `order`.id_order=pembayaran.id_order join produk on produk.id=detail.id where `order`.id=$id and status_persetujuan='Setuju' and status_all='Sudah' and pembayaran.status <> 'valid' group by detail.id_order order by tanggal_berakhir desc ");
    if($ccc->num_rows() >= 0){
            $data['kode'] = $ccc->result();
            //return $data['kode'];
        }else{
            return false;
        }
    $data['produk'] = $this->Crud_m->selectJasaAlat('produk');
    $this->load->view('Jasa_alat_v', $data);
    }else{
         $data['produk'] = $this->Crud_m->selectJasaAlat('produk');
    $this->load->view('Jasa_alat_v', $data);
    }
        
    }
    
    public function jasapustaka() {
	$data = array ( 'aktif1'=>"",
					'aktif2'=>"",
					'aktif3'=>"active",
					'aktif4'=>"",
					'aktif5'=>"",
					'aktif6'=>"",
				    'aktif7'=>""
				);
    if ($id=$this->session->userdata('id')) {
         $where=array('id'       =>$id,
                'status_all'=>'sudah');
    
    $ccc = $this->db->query("SELECT *, pembayaran.status as sp FROM `detail` join `order` on `order`.id_order=detail.id_order join user on user.id=order.id join pembayaran on `order`.id_order=pembayaran.id_order join produk on produk.id=detail.id where `order`.id=$id and status_persetujuan='Setuju' and status_all='Sudah' and pembayaran.status <> 'valid' group by detail.id_order order by tanggal_berakhir desc ");
    if($ccc->num_rows() >= 0){
            $data['kode'] = $ccc->result();
            //return $data['kode'];
        }else{
            return false;
        }
    $data['produk'] = $this->Crud_m->selectPustaka('produk');
    $this->load->view('Jasa_pustaka_v', $data);
    }else{
         $data['produk'] = $this->Crud_m->selectPustaka('produk');
    $this->load->view('Jasa_pustaka_v', $data);
    }
         
   }
    
    public function detail($id) {
	$dimana = array ('id'=>$id);
	$data  = array ('aktif1'=>"",
	 			   'aktif2'=>"",
	 			   'aktif3'=>"active",
	 			   'aktif4'=>"",
	 			   'aktif5'=>"",
	 			   'aktif6'=>"",
                   'aktif7'=>"");
	
if ( $id=$this->session->userdata('id')) {
     $where=array('id'       =>$id,
                'status_all'=>'sudah');
    
    $ccc = $this->db->query("SELECT *, pembayaran.status as sp FROM `detail` join `order` on `order`.id_order=detail.id_order join user on user.id=order.id join pembayaran on `order`.id_order=pembayaran.id_order join produk on produk.id=detail.id where `order`.id=$id and status_persetujuan='Setuju' and status_all='Sudah' and pembayaran.status <> 'valid' group by detail.id_order order by tanggal_berakhir desc ");
    if($ccc->num_rows() >= 0){
            $data['kode'] = $ccc->result();
            //return $data['kode'];
        }else{
            return false;
        }

        //sekarang
    
        $data['produk'] = $this->Crud_m->selectX('produk', $dimana);
    $this->load->view('Detail_produk_v', $data);
}else{
     $data['produk'] = $this->Crud_m->selectX('produk', $dimana);
    $this->load->view('Detail_produk_v', $data);
}
    
   
	}
    public function ditempat($id) {
	$where = array ('id'=>$id);
    $data= array( 'id'       =>$id,
        'metode_pembayaran'=> $this->input->post('metode'));
    
    $this->Crud_m->update_data('pembayaran', $data, $where);
        $data  = array ('aktif1'=>"",
	 			   'aktif2'=>"",
	 			   'aktif3'=>"active",
	 			   'aktif4'=>"",
	 			   'aktif5'=>"",
	 			   'aktif6'=>"",
                   'aktif7'=>"",
                   );
    $data['order']= $this->Crud_m->selectbayar($id);
	$this->load->view('Pembayaran_v', $data);
	}
    
    
    public function pesan($id) {
        if($this->session->userdata('username') && $id_session=$this->session->userdata('id')){

              $data = array(
              'id' => $id
         );
            $cek=$this->Crud_m->selectX('produk', $data);
            $row=$cek->row();        
            $data=array('aktif1'=>"",
                        'aktif2'=>"",
                        'aktif3'=>"",
                        'aktif4'=>"",
                        'aktif5'=>"",
                        'aktif6'=>"active",
                        'aktif7'=>"");


             $dimana=array('id'       =>$id_session,
                    'status_all'=>'sudah');
        
        $ccc = $this->db->query("SELECT *, pembayaran.status as sp FROM `detail` join `order` on `order`.id_order=detail.id_order join user on user.id=order.id join pembayaran on `order`.id_order=pembayaran.id_order join produk on produk.id=detail.id where `order`.id=$id_session and status_persetujuan='Setuju' and status_all='Sudah' and pembayaran.status <> 'valid' group by detail.id_order order by tanggal_berakhir desc ");
        if($ccc->num_rows() >= 0){
                $data['kode'] = $ccc->result();
                //return $data['kode'];
            }else{
                return false;
            }


            // $id = $this->session->userdata('p');
            $where = array('id' => $id);
            $data['produk']=$this->Crud_m->selectX('produk', $where);


            // $this->session->set_userdata('p', $produk->jenis);
            $this->session->set_userdata('p', $id);
            $this->load->view('Pesan_v',$data);

        }else{

            $this->session->set_userdata('p', $id);
            redirect('Login');
        }
    }
    
    
	public function cekbuktilangsung($id) {

        

            $image_name = "DT".time();
			$config['upload_path']   = './assets/admin/bukti';
			$config['allowed_types'] = 'pdf|jpg|jpeg|png';
			$config['max_size']      = '2000000';
			$config['max_width']     = '5024';
			$config['max_height']    = '5024';
			$config['file_name']     = $image_name;

		$this->upload->initialize($config);
			if($_FILES['bukti']['name']){
			if($this->upload->do_upload('bukti')){
				$form= $this->upload->data();
                $f=$form['file_name'];
                $where=array('id_order'=>$id);
                date_default_timezone_set('Asia/Jakarta');

            $data = array(
                'bukti_transfer'   =>$f,
                'status'           =>'proses',
                'metode_pembayaran'=> $this->input->post('metode'),
                'tanggal' 		   => date('Y-m-d H:i:s'));
               
                $this->Crud_m->update_data('pembayaran', $data, $where);
                $kode=$this->Crud_m->selectX('order', $where);
                $k=$kode->result();
                $kode_order=$k[0]->kode_order;
                
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
        $mail->Subject    = "KONFIRMASI PEMBAYARAN";
        $mail->Body      = '
            <html>
            <head>
                <title>PEMBAYARAN PEMESANAN JASA PUSLIT BIOLOGI - LIPI</title>
            </head>
            <body>
           <p>Kepada Yth <br> bendahara, Kode Order : '.$kode_order.' telah melakukan pembayaran. Silahkan login sebagai bendahara di <a href="http://sispromotor.biologi.lipi.go.id/sispromotor/admin/login">SISPROMOTOR</a> untuk melakukan verifikasi pembayaran</p><br>
            <p>Terimakasih</p>
            </body>
            </html>
        ';
        $destino = "supersispromotor@gmail.com"; // Who is addressed the email to
        $mail->AddAddress($destino, "Receiver");
        $mail->AddCC("supersispromotor@gmail.com", "Receiver");
        $mail->Send();
                //
        
            $this->session->set_userdata('id_order','');
            $this->cart->destroy();
       	    $this->session->set_userdata('p','');
                	
                redirect("Pesan/Pembayaran");
	       }else{
               $this->session->set_flashdata('message_bukti', "<div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <h4><i class='icon_error-triangle_alt'></i> Peringatan!</h4>
    		      File yang anda masukkan salah, pastikan file anda berekstensi <strong>.pdf/.jpg/.jpeg/.png</strong> dan ukuran file tidak lebih dari <strong>2000kb / 2MB</strong>
                </div>"); 
                $data = array ('aktif1'=>"",
				               'aktif2'=>"",
				               'aktif3'=>"",
				               'aktif4'=>"",
				               'aktif5'=>"active",
				               'aktif6'=>"",
                               'aktif7'=>""
			                     );
                $data['detail']=$this->Crud_m->joinn_where($id);
	            $this->load->view('Metode_bayar_v', $data);
                 }
	   }else{
                $this->session->set_flashdata('message_bukti', "<div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <h4><i class='icon_error-triangle_alt'></i> Peringatan!</h4>
    		    File yang anda masukkan salah, pastikan file anda berekstensi <strong>.pdf/.jpg/.jpeg/.png</strong> dan ukuran file tidak lebih dari <strong>2000kb / 2MB</strong>
                </div>"); 
               $data = array ('aktif1'=>"",
				              'aktif2'=>"",
				              'aktif3'=>"",
				              'aktif4'=>"",
				              'aktif5'=>"active",
				              'aktif6'=>"",
                              'aktif7'=>"");
               $data['detail']=$this->Crud_m->joinn_where($id);
	           $this->load->view('Ditempat_metode_v', $data);
            }
    }
     public function cekkirim($id) {
            $image_name = "TF".time();
			$config['upload_path']   = './assets/admin/bukti';
			$config['allowed_types'] = 'pdf|jpg|jpeg|png';
			$config['max_size']      = '2000000';
			$config['max_width']     = '5024';
			$config['max_height']    = '5024';
			$config['file_name']     = $image_name;

		$this->upload->initialize($config);
			if($_FILES['bukti']['name']){
			if($this->upload->do_upload('bukti')){
				$form= $this->upload->data();
                $f=$form['file_name'];
                $where=array('id_order'=>$id);
            

            $data = array(
                'bukti_bayar'   =>$f);
                $this->Crud_m->update_data('pembayaran', $data, $where);
                $kode=$this->Crud_m->selectX('order', $where);
                $k=$kode->result();
                $kode_order=$k[0]->kode_order;
                
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
        $mail->Subject    = "KONFIRMASI PEMBAYARAN EKSPEDISI";
        $mail->Body      = '
            <html>
            <head>
                <title>PEMBAYARAN BIAYA PENGIRIMAN PUSLIT BIOLOGI - LIPI</title>
            </head>
            <body>
           <p>Kepada Yth <br> admin, Saya telah melakukan pembayaran biaya pengiriman pada website SISPROMOTOR - LIPI.</p><br>
            <p>Hormat Saya</p>
            <p>Pelanggan</p>
            </body>
            </html>
        ';
        $destino = "supersispromotor@gmail.com"; // Who is addressed the email to
        $mail->AddAddress($destino, "Receiver");
        $mail->Send();
        $email=$this->session->userdata("email");
        $nama = $this->session->userdata("nama");
        require_once(APPPATH.'third_party/PHPMailer-master/PHPMailerAutoload.php');
        $mail = new PHPMailer();
        $destino=$email; // Who is addressed the email to
        $mail->AddAddress($destino, "Receiver");
        $mail->IsSMTP(); // we are going to use SMTP
        $mail->SMTPAuth   = true; // enabled SMTP authentication
        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
        $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
        $mail->Port       = 465;                   // SMTP port to connect to GMail
        $mail->Username   = "sispromotor@gmail.com";  // user email address
        $mail->Password   = "Jasa1234";            // password in GMail
        $mail->SetFrom('sispromotor@gmail.com', 'Mail');  //Who is sending 
        $mail->isHTML(true);
        $mail->Subject    = "KONFIRMASI PEMBAYARAN EKSPEDISI";
        $mail->Body      = '
            <html>
            <head>
                <title>PEMESANAN JASA PUSLIT BIOLOGI - LIPI</title>
            </head>
            <body>
            <p>Kepada Yth <br> '.$nama.', Terimakasih telah melakukan pembayaran biaya pengiriman pada website kami SISPROMOTOR - LIPI.Hasil akan di kirimkan selama 2 hari di jam kerja.Senin-Jumat, 08:00-16:00 </p><br>
            <p>Hormat Kami</p>
            <p>Bidang Mikrobiologi
            <br>Pusat Penelitian Biologi-LIPI</p>
            </body>
            </html>';
        $mail->Send();
                //
                //
        
            $this->session->set_userdata('id_order','');
            $this->cart->destroy();
       	    $this->session->set_userdata('p','');
                	
                redirect("Akun/riwayat");
	       }else{
               $this->session->set_flashdata('message_bukti', "<div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <h4><i class='icon_error-triangle_alt'></i> Peringatan!</h4>
    		      File yang anda masukkan salah, pastikan file anda berekstensi <strong>.pdf/.jpg/.jpeg/.png</strong> dan ukuran file tidak lebih dari <strong>2000kb / 2MB</strong>
                </div>"); 
                $data = array ('aktif1'=>"",
				               'aktif2'=>"",
				               'aktif3'=>"",
				               'aktif4'=>"",
				               'aktif5'=>"active",
				               'aktif6'=>"",
                               'aktif7'=>""
			                     );
                $data['detail']=$this->Crud_m->joinn_where($id);
	            $this->load->view('Pesan/Detail_akhir', $data);
                 }
	   }else{
                $this->session->set_flashdata('message_bukti', "<div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <h4><i class='icon_error-triangle_alt'></i> Peringatan!</h4>
    		    File yang anda masukkan salah, pastikan file anda berekstensi <strong>.pdf/.jpg/.jpeg/.png</strong> dan ukuran file tidak lebih dari <strong>2000kb / 2MB</strong>
                </div>"); 
               $data = array ('aktif1'=>"",
				              'aktif2'=>"",
				              'aktif3'=>"",
				              'aktif4'=>"",
				              'aktif5'=>"active",
				              'aktif6'=>"",
                              'aktif7'=>"");
               $data['detail']=$this->Crud_m->joinn_where($id);
	           $this->load->view('Pesan/Detail_akhir', $data);
            }
    }
    public function cekbukti($id) {
            $image_name = "TF".time();
			$config['upload_path']   = './assets/admin/bukti';
			$config['allowed_types'] = 'pdf|jpg|jpeg|png';
			$config['max_size']      = '2000000';
			$config['max_width']     = '5024';
			$config['max_height']    = '5024';
			$config['file_name']     = $image_name;

		$this->upload->initialize($config);
			if($_FILES['bukti']['name']){
			if($this->upload->do_upload('bukti')){
				$form= $this->upload->data();
                $f=$form['file_name'];
                $where=array('id_order'=>$id);
                date_default_timezone_set('Asia/Jakarta');

            $data = array(
                'bukti_transfer'   =>$f,
                'status'           =>'proses',
                'nama_bank'        => $this->input->post('bank'),
                'metode_pembayaran'=> $this->input->post('metode'),
                'tanggal' 		   => date('Y-m-d H:i:s'));
               
                $this->Crud_m->update_data('pembayaran', $data, $where);
                $kode=$this->Crud_m->selectX('order', $where);
                $k=$kode->result();
                $kode_order=$k[0]->kode_order;
                
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
        $mail->Subject    = "KONFIRMASI PEMBAYARAN";
        $mail->Body      = '
            <html>
            <head>
                <title>PEMBAYARAN PEMESANAN JASA PUSLIT BIOLOGI - LIPI</title>
            </head>
            <body>
            <p>Kepada Yth <br> bendahara, Kode Order : '.$kode_order.' telah melakukan pembayaran. Silahkan login sebagai bendahara di <a href="http://sispromotor.biologi.lipi.go.id/sispromotor/admin/login">SISPROMOTOR</a> untuk melakukan verifikasi pembayaran</p><br>
            <p>Terimakasih</p>
            </body>
            </html>
        ';
        $destino = "supersispromotor@gmail.com"; // Who is addressed the email to
        $mail->AddAddress($destino, "Receiver");
        $mail->AddCC("supersispromotor@gmail.com", "Receiver");
        $mail->Send();
                //
        
            $this->session->set_userdata('id_order','');
            $this->cart->destroy();
       	    $this->session->set_userdata('p','');
                	
                redirect("Pesan/Pembayaran");
	       }else{
               $this->session->set_flashdata('message_bukti', "<div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <h4><i class='icon_error-triangle_alt'></i> Peringatan!</h4>
    		      File yang anda masukkan salah, pastikan file anda berekstensi <strong>.pdf/.jpg/.jpeg/.png</strong> dan ukuran file tidak lebih dari <strong>2000kb / 2MB</strong>
                </div>"); 
                $data = array ('aktif1'=>"",
				               'aktif2'=>"",
				               'aktif3'=>"",
				               'aktif4'=>"",
				               'aktif5'=>"active",
				               'aktif6'=>"",
                               'aktif7'=>""
			                     );
                $data['detail']=$this->Crud_m->joinn_where($id);
	            $this->load->view('Metode_bayar_v', $data);
                 }
	   }else{
                $this->session->set_flashdata('message_bukti', "<div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <h4><i class='icon_error-triangle_alt'></i> Peringatan!</h4>
    		    File yang anda masukkan salah, pastikan file anda berekstensi <strong>.pdf/.jpg/.jpeg/.png</strong> dan ukuran file tidak lebih dari <strong>2000kb / 2MB</strong>
                </div>"); 
               $data = array ('aktif1'=>"",
				              'aktif2'=>"",
				              'aktif3'=>"",
				              'aktif4'=>"",
				              'aktif5'=>"active",
				              'aktif6'=>"",
                              'aktif7'=>"");
               $data['detail']=$this->Crud_m->joinn_where($id);
	           $this->load->view('Metode_bayar_v', $data);
            }
    }
    
	public function pembayaran() {
	
	$data = array ('aktif1'=>"",
				   'aktif2'=>"",
				   'aktif3'=>"",
				   'aktif4'=>"",
				   'aktif5'=>"",
				   'aktif6'=>"active",
                   'aktif7'=>"");
     $id=$this->session->userdata('id');
    $where=array('id'       =>$id,
                'status_all'=>'sudah');
    
    $ccc =$this->db->query("SELECT *, pembayaran.status as sp FROM `detail` join `order` on `order`.id_order=detail.id_order join user on user.id=order.id join pembayaran on `order`.id_order=pembayaran.id_order join produk on produk.id=detail.id where `order`.id=$id and status_persetujuan='Setuju' and status_all='Sudah' and pembayaran.status <> 'valid' group by detail.id_order order by tanggal_berakhir desc ");
    if($ccc->num_rows() >= 0){
            $data['kode'] = $ccc->result();
            //return $data['kode'];
        }else{
            return false;
        }

    $data['order']= $this->db->query("SELECT *, pembayaran.status as sp FROM `detail` join `order` on `order`.id_order=detail.id_order join user on user.id=order.id join pembayaran on `order`.id_order=pembayaran.id_order join produk on produk.id=detail.id where `order`.id=$id and status_persetujuan='Setuju' and status_all='Sudah' and pembayaran.status <> 'valid' group by detail.id_order order by tanggal_berakhir desc ");
	$this->load->view('Pembayaran_v', $data);
   // }
        
	}

    public function pemberitahuan(){
        $data = array ('aktif1'=>"",
                   'aktif2'=>"",
                   'aktif3'=>"",
                   'aktif4'=>"",
                   'aktif5'=>"",
                   'aktif6'=>"active",
                   'aktif7'=>"");
    $id=$this->session->userdata('id');
    $dimana =array('id' => $id );
    $where=array('id'       =>$id,
                'status_all'=>'Sudah');
    
    
    $ccc = $this->db->query("SELECT *, pembayaran.status as sp FROM `detail` join `order` on `order`.id_order=detail.id_order join user on user.id=order.id join pembayaran on `order`.id_order=pembayaran.id_order join produk on produk.id=detail.id where `order`.id=$id and status_persetujuan='Setuju' and status_all='Sudah' and pembayaran.status <>'valid' group by detail.id_order order by tanggal_berakhir desc ");
    if($ccc->num_rows() >= 0){
            
            $data['kode'] = $ccc->result();
            //return $data['kode'];
            
        }else{
            return false;
        }

    $data['order']= $this->db->query("SELECT *, pembayaran.status as sp FROM `detail` join `order` on `order`.id_order=detail.id_order join user on user.id=order.id join pembayaran on `order`.id_order=pembayaran.id_order join produk on produk.id=detail.id where `order`.id=$id and status_persetujuan='Setuju' and status_all='Sudah' and pembayaran.status <> 'valid' group by detail.id_order order by tanggal_berakhir desc ");
    $this->load->view('pemberitahuan_v', $data);
    }
    
    function update_metode(){
        $data=array('metode_pembayaran'=>$this->input->post('metode'),
                   'tanggal' 		   => date('Y-m-d H:i:s'));
        $where=array('id_order'=>$this->input->post('id'));
        $this->Crud_m->update_data('pembayaran', $data, $where);
        redirect('Pesan/pembayaran');
    }
    public function metode($id) {
	$data = array ('aktif1'=>"",
				   'aktif2'=>"",
				   'aktif3'=>"",
				   'aktif4'=>"",
				   'aktif5'=>"active",
				   'aktif6'=>"",
                    'aktif7'=>""
			);

        if ($id_session=$this->session->userdata('id')) {
         $where=array('id'       =>$id_session,
                'status_all'=>'sudah');
    
    $ccc = $this->db->query("SELECT *, pembayaran.status as sp FROM `detail` join `order` on `order`.id_order=detail.id_order join user on user.id=order.id join pembayaran on `order`.id_order=pembayaran.id_order join produk on produk.id=detail.id where `order`.id=$id_session and status_persetujuan='Setuju' and status_all='Sudah' and pembayaran.status <> 'valid' group by detail.id_order order by tanggal_berakhir desc ");
    if($ccc->num_rows() >= 0){
            $data['kode'] = $ccc->result();
            //return $data['kode'];
        }else{
            return false;
        }
    $data['detail']=$this->Crud_m->joinn_where($id);
    $this->load->view('Metode_bayar_v', $data);
    }else{
    $data['detail']=$this->Crud_m->joinn_where($id);
    $this->load->view('Metode_bayar_v', $data);
    }
}
    public function detailditempat($id) {
	$data = array ('aktif1'=>"",
				   'aktif2'=>"",
				   'aktif3'=>"",
				   'aktif4'=>"",
				   'aktif5'=>"active",
				   'aktif6'=>"",
                    'aktif7'=>""
			);
            if ($id_session=$this->session->userdata('id')) {
         $where=array('id'       =>$id_session,
                'status_all'=>'sudah');
    
    $ccc = $this->db->query("SELECT *, pembayaran.status as sp FROM `detail` join `order` on `order`.id_order=detail.id_order join user on user.id=order.id join pembayaran on `order`.id_order=pembayaran.id_order join produk on produk.id=detail.id where `order`.id=$id_session and status_persetujuan='Setuju' and status_all='Sudah' and pembayaran.status <> 'valid' group by detail.id_order order by tanggal_berakhir desc ");
    if($ccc->num_rows() >= 0){
            $data['kode'] = $ccc->result();
            //return $data['kode'];
        }else{
            return false;
        }
    $data['detail']=$this->Crud_m->joinn_where($id);
    $this->load->view('Ditempat_metode_v', $data);
    }else{
    $data['detail']=$this->Crud_m->joinn_where($id);
    $this->load->view('Ditempat_metode_v', $data);
    }
}
    
    public function Detailpesan($id) {
	$data = array ('aktif1'=>"",
			       'aktif2'=>"",
			       'aktif3'=>"",
			       'aktif4'=>"",
			       'aktif5'=>"",
			       'aktif6'=>"active",
                   'aktif7'=>"",
                   'metode'=> $this->input->post('metode_pembayaran'));
    if ($id_session=$this->session->userdata('id')) {
         $where=array('id'       =>$id_session,
                'status_all'=>'sudah');
    
    $ccc = $this->db->query("SELECT *, pembayaran.status as sp FROM `detail` join `order` on `order`.id_order=detail.id_order join user on user.id=order.id join pembayaran on `order`.id_order=pembayaran.id_order join produk on produk.id=detail.id where `order`.id=$id_session and status_persetujuan='Setuju' and status_all='Sudah' and pembayaran.status <> 'valid' group by detail.id_order order by tanggal_berakhir desc ");
    if($ccc->num_rows() >= 0){
            $data['kode'] = $ccc->result();
            //return $data['kode'];
        }else{
            return false;
        }
    $where=array('id'=>$id);
    $data['detail'] =$this->Crud_m->joindetail($id);
	$this->load->view('Detail_pesan_v', $data);
   } else{
     $where=array('id'=>$id);
    $data['detail'] =$this->Crud_m->joindetail($id);
    $this->load->view('Detail_pesan_v', $data);
    }
	}
    public function Detailgagal($id) {
	$data = array ('aktif1'=>"",
			       'aktif2'=>"",
			       'aktif3'=>"",
			       'aktif4'=>"",
			       'aktif5'=>"",
			       'aktif6'=>"active",
                   'aktif7'=>"");
  
    $where=array('id'=>$id);
    $data['detail'] =$this->Crud_m->joindetail($id);
	$this->load->view('Detail_gagal_v', $data);
	}
    public function Detailakhir($id) {
	$data = array ('aktif1'=>"",
			       'aktif2'=>"",
			       'aktif3'=>"",
			       'aktif4'=>"",
			       'aktif5'=>"",
			       'aktif6'=>"active",
                   'aktif7'=>"");
  

     if ( $id=$this->session->userdata('id')) {
             $where=array('id'       =>$id,
                    'status_all'=>'sudah');
        
        $ccc = $this->db->query("SELECT *, pembayaran.status as sp FROM `detail` join `order` on `order`.id_order=detail.id_order join user on user.id=order.id join pembayaran on `order`.id_order=pembayaran.id_order join produk on produk.id=detail.id where `order`.id=$id and status_persetujuan='Setuju' and status_all='Sudah' and pembayaran.status <> 'valid' group by detail.id_order order by tanggal_berakhir desc ");
        if($ccc->num_rows() >= 0){
                $data['kode'] = $ccc->result();
                //return $data['kode'];
            }else{
                return false;
            }  
    $where=array('id'=>$id);
    $data['detail'] =$this->Crud_m->joindetail($id);
	$this->load->view('Detail_akhir_v', $data);
	}else{
    $where=array('id'=>$id);
    $data['detail'] =$this->Crud_m->joindetail($id);
    $this->load->view('Detail_akhir_v', $data);
    }
    }
    public function Pelaksanaan() {
	$data = array ('aktif1'=>"",
			       'aktif2'=>"",
			       'aktif3'=>"",
			       'aktif4'=>"",
			       'aktif5'=>"",
			       'aktif6'=>"active",
                   'aktif7'=>"");
	 $id=$this->session->userdata('id');
     $where=array('id'=>$id);
     $where=array('id'=>$id,
                  'status'=>'Valid');
         $id=$this->session->userdata('id');
    $where=array('id'       =>$id,
                'status_all'=>'sudah');
    
    $ccc = $this->db->query("SELECT *, pembayaran.status as sp FROM `detail` join `order` on `order`.id_order=detail.id_order join user on user.id=order.id join pembayaran on `order`.id_order=pembayaran.id_order join produk on produk.id=detail.id where `order`.id=$id and status_persetujuan='Setuju' and status_all='Sudah' and pembayaran.status <> 'valid' group by detail.id_order order by tanggal_berakhir desc ");
    if($ccc->num_rows() >= 0){
            $data['kode'] = $ccc->result();
            //return $data['kode'];
        }else{
            return false;
        }

     $data['order']= $this->Crud_m->pelaksanaan($id);
	 $this->load->view('Pelaksanaan_v', $data);
	}
    public function Detailpelaksana($id) {
	$data = array ('aktif1'=>"",
			       'aktif2'=>"",
			       'aktif3'=>"",
			       'aktif4'=>"",
			       'aktif5'=>"",
			       'aktif6'=>"active",
                   'aktif7'=>"");
        if ($id_session=$this->session->userdata('id')) {
         $where=array('id'       =>$id_session,
                'status_all'=>'sudah');
    
    $ccc = $this->db->query("SELECT *, pembayaran.status as sp FROM `detail` join `order` on `order`.id_order=detail.id_order join user on user.id=order.id join pembayaran on `order`.id_order=pembayaran.id_order join produk on produk.id=detail.id where `order`.id=$id_session and status_persetujuan='Setuju' and status_all='Sudah' and pembayaran.status <> 'valid' group by detail.id_order order by tanggal_berakhir desc ");
    if($ccc->num_rows() >= 0){
            $data['kode'] = $ccc->result();
            //return $data['kode'];
        }else{
            return false;
        }

    $where=array('id'=>$id);
    $data['detail']=$this->Crud_m->joindetail($id);
	$this->load->view('Detail_pelaksana_v', $data);
	}else{
        $where=array('id'=>$id);
    $data['detail']=$this->Crud_m->joindetail($id);
    $this->load->view('Detail_pelaksana_v', $data);
    }
}
    public function Detailselesai($id) {
	$data = array ('aktif1'=>"",
			       'aktif2'=>"",
			       'aktif3'=>"",
			       'aktif4'=>"",
			       'aktif5'=>"",
			       'aktif6'=>"active",
                   'aktif7'=>"");

     if ($id_session=$this->session->userdata('id')) {
         $where=array('id'       =>$id_session,
                'status_all'=>'sudah');
    
    $ccc = $this->db->query("SELECT *, pembayaran.status as sp FROM `detail` join `order` on `order`.id_order=detail.id_order join user on user.id=order.id join pembayaran on `order`.id_order=pembayaran.id_order join produk on produk.id=detail.id where `order`.id=$id_session and status_persetujuan='Setuju' and status_all='Sudah' and pembayaran.status <> 'valid' group by detail.id_order order by tanggal_berakhir desc ");
    if($ccc->num_rows() >= 0){
            $data['kode'] = $ccc->result();
            //return $data['kode'];
        }else{
            return false;
        }

    $where=array('id'=>$id);
    $data['detail']=$this->Crud_m->joindetail($id);
	$this->load->view('Detail_selesai_v', $data);
	}else{
    $where=array('id'=>$id);
    $data['detail']=$this->Crud_m->joindetail($id);
    $this->load->view('Detail_selesai_v', $data);
    }
    }
    public function tracking($id) {
	$data = array ('aktif1'=>"",
			'aktif2'=>"",
			'aktif3'=>"",
			'aktif4'=>"",
			'aktif5'=>"active",
			'aktif6'=>"",
             'aktif7'=>""

			);
	  if ($id_session=$this->session->userdata('id')) {
         $where=array('id'       =>$id_session,
                'status_all'=>'sudah');
    
    $ccc = $this->db->query("SELECT *, pembayaran.status as sp FROM `detail` join `order` on `order`.id_order=detail.id_order join user on user.id=order.id join pembayaran on `order`.id_order=pembayaran.id_order join produk on produk.id=detail.id where `order`.id=$id_session and status_persetujuan='Setuju' and status_all='Sudah' and pembayaran.status <> 'valid' group by detail.id_order order by tanggal_berakhir desc ");
    if($ccc->num_rows() >= 0){
            $data['kode'] = $ccc->result();
            //return $data['kode'];
        }else{
            return false;
        }
     $data['order']= $this->Crud_m->selecttrack($id);
	 $this->load->view('Inputtracking_v', $data);
	}else{
$data['order']= $this->Crud_m->selecttrack($id);
     $this->load->view('Inputtracking_v', $data);
    }
}
    public function Result($id) {
        $data['detail']=$this->Crud_m->joinn_where($id);
        $where = array('id_detail'=>$id);
        $fileinfo = $this->Crud_m->selectX('detail', $where)->result();
        $file = 'assets/admin/hasil/'.$fileinfo[0]->result;
        force_download($file, NULL);
	}
	public function inputtracking() {
	$data = array ('aktif1'=>"",
			       'aktif2'=>"",
			       'aktif3'=>"",
			       'aktif4'=>"",
			       'aktif5'=>"active",
			       'aktif6'=>"",
                   'aktif7'=>"");
    $track = array(
                'id_order'        => $this->input->post('id'),
                'no_resi'         => $this->input->post('resi'),
                'atas_nama'       => $this->input->post('atas_nama'),
                'ekspedisi'       => $this->input->post('ekspedisi') );   
    
    $id=$this->session->userdata('id');
    $where=array('id_order' => $this->input->post('id'));
    $data['order']= $this->Crud_m->selecttrack($id);   
    $this->Crud_m->update_data("pengiriman", $track, $where);
    
    $temp=$this->db->query("select * from `order` join detail on `order`.id_order=detail.id_order join produk on produk.id=detail.id where detail.id_order=".$this->input->post('id'));
    
    $t=$temp->row();
    $kode_order=$t->kode_order;
    $alat=0;
    $lab=0;
    $pus=0;
    foreach($temp->result() as $t){
        $n=$this->db->query("select * from detail join produk on produk.id=detail.id where detail.id_detail=".$t->id_detail)->row();
        if($n->kategori == "Jasa Alat"){
            $alat++;
        }
        if($n->kategori == "Jasa Lab"){
            $lab++;
        }
        if($n->kategori == "Pustaka"){
            $pus++;
        }
    }
        
        if($alat>0){
            //email ke admin
        $mail = new PHPMailer();
        $destino="supersispromotor@gmail.com"; // Who is addressed the email to
        $mail->AddAddress($destino, "Receiver");
        $mail->AddCC('supersispromotor@gmail.com', 'Receiver');
        $mail->AddCC('supersispromotor@gmail.com', 'Receiver');
        $mail->AddCC('supersispromotor@gmail.com', 'Receiver');
        $mail->AddCC('supersispromotor@gmail.com', 'Receiver');

        $mail->IsSMTP(); // we are going to use SMTP
        $mail->SMTPAuth   = true; // enabled SMTP authentication
        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
        $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
        $mail->Port       = 465;                   // SMTP port to connect to GMail
        $mail->Username   = "sispromotor@gmail.com";  // user email address
        $mail->Password   = "jasa1234";            // password in GMail
        $mail->SetFrom('sispromotor@gmail.com', 'SISPROMOTOR');  //Who is sending 
        $mail->isHTML(true);
        $mail->Subject    = "SISPROMOTOR - Pemesanan Jasa";
        $mail->Body      = '
            <html>
            <head>
                <title>PEMBERITAHUAN</title>
            </head>
            <body>
            <p>Kepada Yth <br> Pelaksana Jasa Alat, Terdapat pesanan jasa baru. Silahkan login sebagai pelaksana di <a href="http://sispromotor.biologi.lipi.go.id/sispromotor/admin/login"> SISPROMOTOR </a> untuk memeriksa pesanan. </p><br>
            <p>Terimakasih</p>
            
            </body>
            </html>
        ';
       
        $mail->Send();
                //
        }
        
          if($lab>0){
            //email ke admin
        $mail = new PHPMailer();
             $destino="supersispromotor@gmail.com"; // Who is addressed the email to
        $mail->AddAddress($destino, "Receiver");
        $mail->AddCC('supersispromotor@gmail.com', 'Receiver');
        $mail->AddCC('supersispromotor@gmail.com', 'Receiver');
        $mail->AddCC('supersispromotor@gmail.com', 'Receiver');
        $mail->AddCC('supersispromotor@gmail.com', 'Receiver');
        $mail->AddCC('supersispromotor@gmail.com', 'Receiver');
        $mail->AddCC('supersispromotor@gmail.com', 'Receiver');
        $mail->AddCC('supersispromotor@gmail.com', 'Receiver');
        $mail->AddCC('supersispromotor@gmail.com', 'Receiver');
        $mail->AddCC('supersispromotor@gmail.com', 'Receiver');
        $mail->AddCC('supersispromotor@gmail.com', 'Receiver');
        $mail->AddCC('supersispromotor@gmail.com', 'Receiver');
        $mail->IsSMTP(); // we are going to use SMTP
        $mail->SMTPAuth   = true; // enabled SMTP authentication
        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
        $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
        $mail->Port       = 465;                   // SMTP port to connect to GMail
        $mail->Username   = "sispromotor@gmail.com";  // user email address
        $mail->Password   = "jasa1234";            // password in GMail
        $mail->SetFrom('sispromotor@gmail.com', 'SISPROMOTOR');  //Who is sending 
        $mail->isHTML(true);
        $mail->Subject    = "SISPROMOTOR - Pemesanan Jasa";
        $mail->Body      = '
            <html>
            <head>
                <title>PEMBERITAHUAN</title>
            </head>
            <body>
            <p>Kepada Yth <br> Pelaksana Jasa Lab, Terdapat pesanan jasa baru. Silahkan login sebagai pelaksana di <a href="http://sispromotor.biologi.lipi.go.id/sispromotor/admin/login"> SISPROMOTOR </a> untuk memeriksa pesanan. </p><br>
            <p>Terimakasih</p>
            
            </body>
            </html>
        ';
       
        $mail->Send();
                //
        }
        
        if($pus>0){
            //email ke admin
        $mail = new PHPMailer();
             $destino="supersispromotor@gmail.com"; // Who is addressed the email to
        $mail->AddAddress($destino, "Receiver");
        $mail->AddCC('supersispromotor@gmail', 'Receiver');
        $mail->AddCC('supersispromotor@gmail', 'Receiver');
        $mail->IsSMTP(); // we are going to use SMTP
        $mail->SMTPAuth   = true; // enabled SMTP authentication
        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
        $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
        $mail->Port       = 465;                   // SMTP port to connect to GMail
        $mail->Username   = "sispromotor@gmail.com";  // user email address
        $mail->Password   = "jasa1234";            // password in GMail
        $mail->SetFrom('sispromotor@gmail.com', 'SISPROMOTOR');  //Who is sending 
        $mail->isHTML(true);
        $mail->Subject    = "SISPROMOTOR - Pemesanan Jasa";
        $mail->Body      = '
            <html>
            <head>
                <title>PEMBERITAHUAN</title>
            </head>
            <body>
            <p>Kepada Yth <br> Pelaksana Pustaka, Terdapat pesanan jasa baru. Silahkan login sebagai pelaksana di <a href="http://sispromotor.biologi.lipi.go.id/sispromotors/admin/login"> SISPROMOTOR </a> untuk memeriksa pesanan. </p><br>
            <p>Terimakasih</p>
            
            </body>
            </html>
        ';
       
        $mail->Send();
                //
        }
     
    redirect('Pesan/Pelaksanaan');
	}
    public function Selesai() {
	$data = array ('aktif1'=>"",
			'aktif2'=>"",
			'aktif3'=>"",
			'aktif4'=>"",
			'aktif5'=>"",
			'aktif6'=>"active",
            'aktif7'=>""
			);
	$id=$this->session->userdata('id');
    $data['detail']= $this->Crud_m->selesai($id);
         $id=$this->session->userdata('id');
    $where=array('id'       =>$id,
                'status_all'=>'sudah');
    
    $ccc = $this->db->query("SELECT *, pembayaran.status as sp FROM `detail` join `order` on `order`.id_order=detail.id_order join user on user.id=order.id join pembayaran on `order`.id_order=pembayaran.id_order join produk on produk.id=detail.id where `order`.id=$id and status_persetujuan='Setuju' and status_all='Sudah' and pembayaran.status <> 'valid' group by detail.id_order order by tanggal_berakhir desc ");
    if($ccc->num_rows() >= 0){
            $data['kode'] = $ccc->result();
            //return $data['kode'];
        }else{
            return false;
        }
	$this->load->view('Selesai_v', $data);
	}
    public function Status() {
	$data = array ('aktif1'=>"",
			'aktif2'=>"",
			'aktif3'=>"",
			'aktif4'=>"",
			'aktif5'=>"",
			'aktif6'=>"active",
            'aktif7'=>""
			);
    $id=$this->session->userdata('id');
    $where=array('id'=>$id);
    $data['order']= $this->Crud_m->stat_belum($this->session->userdata('id'));

     $id=$this->session->userdata('id');
    $where=array('id'       =>$id,
                'status_all'=>'sudah');
    
    $ccc = $this->db->query("SELECT *, pembayaran.status as sp FROM `detail` join `order` on `order`.id_order=detail.id_order join user on user.id=order.id join pembayaran on `order`.id_order=pembayaran.id_order join produk on produk.id=detail.id where `order`.id=$id and status_persetujuan='Setuju' and status_all='Sudah' and pembayaran.status <> 'valid' group by detail.id_order order by tanggal_berakhir desc ");
    if($ccc->num_rows() >= 0){
            $data['kode'] = $ccc->result();
            //return $data['kode'];
        }else{
            return false;
        }
    
	$this->load->view('Status_v', $data);
	}
    
    public function Kepuasan() {
    $data = array ('aktif1'=>"",
            'aktif2'=>"",
            'aktif3'=>"",
            'aktif4'=>"",
            'aktif5'=>"",
            'aktif6'=>"",
            'aktif7'=>""

            );
    redirect('Kepuasan');}
    

}
