<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {

	public function __construct() {
	parent::__construct();
	$this->load->model('Crud_m');
	$this->load->model('Login_model');
	 
	}

	public function index() {
		 if(($this->session->userdata('username'))){
			 $data = array ('aktif1'=>"",
		 			        'aktif2'=>"",
		 			        'aktif3'=>"",
		 			        'aktif4'=>"",
		 			        'aktif5'=>"",
		 			        'aktif6'=>"active",
                            'aktif7'=>"");
			$id = $this->session->userdata('p');
			$where= array('id'=>$id);
			$data['produk'] = $this->Crud_m->selectX('produk',$where);
		 	$this->load->view('Pesan_v', $data);
		}else{
			redirect("Login");
		}

	}

    public function konfirmasi($id){
		
		$data = array(
			'id'        => $id,
			'name'      => $this->input->post('spek'),
			'price'     => $this->input->post('harga'),
			'qty'       => 1,
            'options'   => $this->input->post('req'),
            'kategori'  => $this->input->post('kat')
		);		
        $this->cart->insert($data);
         if(($this->session->userdata('id_order'))==""){
         	 date_default_timezone_set('Asia/Jakarta');
		     
            $order = array(
			'date' 	=> date('Y-m-d'),
			'id' 	=> $this->session->userdata('id')
		);		
 
		$ord_id = $this->Crud_m->insert_order($order);
             $data=array('id_order'=>$ord_id);
		$this->Crud_m->input_data('pembayaran', $data);
		$this->Crud_m->input_data('pengiriman', $data);
		$kode = $ord_id."/JASA/".date('m/Y');
        $data = array('kode_order'=>$kode);
        $where = array('id_order'=>$ord_id);
        $this->Crud_m->update_data("order", $data, $where);
		
				$order_detail = array(
					'id_order' 		=> $ord_id,
					'id' 	        => $id,
                    'harga'         => $this->input->post('harga'),
                    'request' 		=> $this->input->post('req'),
					'nama_sample' 	=> $this->input->post('nama_sample'),
             		'kondisi_sample'=> $this->input->post('kondisi'),
             		'umur_sample' 	=> $this->input->post('umur'),
             		'laju_alir' 	=> $this->input->post('laju'),
             		'suhu_kapiler'  => $this->input->post('suhukapiler'),
             		'fase_gerak' 	=> $this->input->post('fasegerak'),
             		'RT' 			=> $this->input->post('rt'),
             		'suhu_injektor' => $this->input->post('suhuinjector'),
             		'suhums' 		=> $this->input->post('suhums'),
             		'suhu_fid' 		=> $this->input->post('suhufid'),
             		'pelarut' 		=> $this->input->post('pelarut'),
             		'coating' 		=> $this->input->post('coating'),
             		'suhu_inkubasi' => $this->input->post('suhuinkubasi'),
             		'shaking' 		=> $this->input->post('shaking'),
             		'kecepatan' 	=> $this->input->post('kecepatan'),
             		'suhu' 			=> $this->input->post('suhu'),
             		'jumlah_sample' => $this->input->post('jumlah_sample'),
             		'jenis_sample'  => $this->input->post('jenis_sample'),
                    'jasa'          => $this->input->post('rad'),
                    'alamat_kirim'  => $this->input->post('alamat'),
             		'keterangan' 	=> $this->input->post('keterangan'),
                    'tgl_penggunaan'=> $this->input->post('tanggal'),
                    'aturan_lain'        => $this->input->post('aturan'));		

				$this->Crud_m->input_data("detail", $order_detail);
                $this->session->set_userdata('id_order', $ord_id);
         } else{
         	   
            $order_detail = array(
					'id_order' 		=> $this->session->userdata('id_order'),
					'id' 	        => $id,
                    'harga'         => $this->input->post('harga'),
                    'request' 		=> $this->input->post('req'),
					'nama_sample' 	=> $this->input->post('nama_sample'),
             		'kondisi_sample'=> $this->input->post('kondisi'),
             		'umur_sample' 	=> $this->input->post('umur'),
             		'laju_alir' 	=> $this->input->post('laju'),
             		'suhu_kapiler'  => $this->input->post('suhukapiler'),
             		'fase_gerak' 	=> $this->input->post('fasegerak'),
             		'RT' 			=> $this->input->post('rt'),
             		'suhu_injektor' => $this->input->post('suhuinjector'),
             		'suhums' 		=> $this->input->post('suhums'),
             		'suhu_fid' 		=> $this->input->post('suhufid'),
             		'pelarut' 		=> $this->input->post('pelarut'),
             		'coating' 		=> $this->input->post('coating'),
             		'suhu_inkubasi' => $this->input->post('suhuinkubasi'),
             		'shaking' 		=> $this->input->post('shaking'),
             		'kecepatan' 	=> $this->input->post('kecepatan'),
             		'suhu' 			=> $this->input->post('suhu'),
             		'jumlah_sample' => $this->input->post('jumlah_sample'),
             		'jenis_sample'  => $this->input->post('jenis_sample'),
             		'keterangan' 	=> $this->input->post('keterangan'),
                    'tgl_penggunaan'=> $this->input->post('tanggal'),
                    'jasa'           => $this->input->post('rad'),
                    'alamat_kirim'  => $this->input->post('alamat'),
                     'aturan_lain'  => $this->input->post('aturan')
				);		
				$this->Crud_m->input_data("detail", $order_detail);
         }
		  redirect('Pemesanan/show_keranjang');
        //$data['pesanan']=$this->crud_m->join_pesan($ord_id);
    }
    public function show_keranjang(){
        if(($this->session->userdata('username'))){
        $data=array('aktif1'=>"",
                     'aktif2'=>"",
                     'aktif3'=>"",
                     'aktif4'=>"",
                     'aktif5'=>"",
                     'aktif6'=>"",
                    'aktif7'=>"active");
            $id=$this->session->userdata('id');
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
        
         $this->load->view('Keranjang_v',$data);
             }else{
			redirect("Login");
		}
    }
    
    function batal($rowid){
        $data = array(
				'rowid'   => $rowid,
				'qty'     => 0
			);

        $this->cart->update($data);
        if($this->cart->contents()){
             $data=array('aktif1'=>"",
 		                 'aktif2'=>"",
 		                 'aktif3'=>"",
 		                 'aktif4'=>"",
 		                 'aktif5'=>"",
 		                 'aktif6'=>"active",
                         'aktif7'=>"",
                        );
        
 		$this->load->view('Keranjang_v',$data);
        }

        else{
            redirect("Pemesanan/remove");
        }
        
         
    }
    
    function remove() {
        if($this->session->userdata('id_order')){
                $id=$this->session->userdata('id_order');
                $where=array('id_order'=>$id);
                $data = array('status_persetujuan'=>'batal');

                $this->Crud_m->update_data('detail', $data, $where);
                $this->session->set_userdata('id_order','');
            }
			    $this->cart->destroy();
       		    $this->session->set_userdata('p','');
			    redirect('Pemesanan/show_keranjang');
	   }		
    
    function save(){
         
        foreach($_POST['cart'] as $id => $cart)
		{			
			$price = $cart['price'];
			$amount = $price * $cart['qty'];
			$this->Crud_m->update_cart($cart['rowid'], $cart['qty'], $price, $amount);
            $where=array('id_order'=>$this->session->userdata('id_order'),'id'=>$cart['id']);
            $order_detail = array('jumlah' 	=> $cart['qty']);	
            $this->Crud_m->update_data("detail", $order_detail, $where);
            $temp=$this->Crud_m->selectX("user", "id=".$this->session->userdata("id"))->row();
            $username=$temp->username;
            $nama=$temp->nama;
            $email=$temp->email;
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
        $mail->Password   = "jasa1234";            // password in GMail
        $mail->SetFrom('sispromotor@gmail.com', 'SISPROMOTOR');  //Who is sending 
        $mail->isHTML(true);
        $mail->Subject    = "SISPROMOTOR - Pemesanan Jasa";
        $mail->Body      = '
            <html>
            <head>
                <title>PEMESANAN JASA PUSLIT BIOLOGI - LIPI</title>
            </head>
            <body>
            <p>Kepada Yth <br> '.$nama.', Terimakasih telah melakukan pemesanan jasa di website kami SISPROMOTOR - LIPI.Pemesanan akan di proses pada tahap "Persetujuan" selama 2 hari di jam kerja.Senin-Jumat, 08:00-16:00. Silahkan login sebagai '.$username.' di <a href="http://sispromotor.biologi.lipi.go.id/sispromotor/">SISPROMOTOR</a> untuk melihat detail pesanan anda</p><br>
           
           <p>Hormat Kami</p>
            <p>Bidang Mikrobiologi
            <br>Pusat Penelitian Biologi-LIPI</p>
            </body>
            </html>
        ';
       
        $mail->Send();
                //
	
        
        //email ke admin
        $mail = new PHPMailer();
             $destino="nur_halimah21@rocketmail.com"; // Who is addressed the email to
        $mail->AddAddress($destino, "Receiver");
        $mail->AddCC('inacc@mail.lipi.go.id', 'Receiver');
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
            <p>Kepada Yth<br> Administrasi Jasa, Terdapat pesanan jasa baru. Silahkan login sebagai administrasi jasa di <a href="http://sispromotor.biologi.lipi.go.id/sispromotor/index.php/admin/login"> SISPROMOTOR </a> untuk memeriksa pesanan. </p><br>
            <p>Terimakasih</p>
            
            </body>
            </html>
        ';
       
        $mail->Send();
                //
		}
//            
//              $id=$this->session->userdata('id_order');
//                $where=array('jumlah'=>'0');
//                $data = array('status_persetujuan'=>'batal');
//
//                $this->Crud_m->update_data('detail', $data, $where);
//                $this->session->set_userdata('id_order','');
//             // mengirimkan email  
//
// 
        $where=array('jumlah'=>'0');
        $this->Crud_m->delete_data("detail",$where);
        
            $this->session->set_userdata('id_order','');
            $this->cart->destroy();
       	    $this->session->set_userdata('p','');
            redirect("Pesan/Status");
    }
}
