<?php

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Login_m');
		$this->load->model('Crud_m');
		$this->session->userdata('p');
          $this->table_sumber = 'user';
	}

	public function index() {
         $teks="abcdefghijklmnopqrstuvwxyz0123456789";
                        $random=substr(str_shuffle($teks),0,5);
                        $this->load->helper('captcha');
                        
                        $vals = array(
                        'word'  => $random,
                        'img_path'  => './assets/img/captcha/',
                        'img_url'   =>base_url().'/assets/img/captcha/',
                        //'font_path'   => './path/to/fonts/texb.ttf',
                        'img_width' => 150,
                        'img_height' => 30,
                        'expiration' => 7200
                        );

                        $cap = create_captcha($vals);
            
		$data = array (
            'img'=>$cap['image'],
            'random'=>$random,
            'aktif1'=>"",
			'aktif2'=>"",
			'aktif3'=>"",
			'aktif4'=>"",
			'aktif5'=>"active",
			'aktif6'=>"",
             'aktif7'=>"",
      		
      		'nama' 		=> "",
      		'username'  => "",
      		'email' 	=> "",
      		'password' 	=> "",
      		'telepon' 	=> "",
      		'status' 	=> "",
      		'instansi' 	=> "",
      		'alamat' 	=> ""
			);
		$this->load->view('Login_v',$data);
        
	}
    public function pesanreset() {
	$data = array ('aktif1'=>"active",
			'aktif2'=>"",
			'aktif3'=>"",
			'aktif4'=>"",
			'aktif5'=>"",
			'aktif6'=>"",
             'aktif7'=>""

			);
	$this->load->view('Terimakasih_v', $data);
	}
    
	function validasi() {


		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$data = array(
			'username' => $username,
			'password' =>md5($password)
			);

		// Berfungsi untuk memanggil fungsi ambil_data pada class login_model
		$cek=$this->Crud_m->selectX('user', $data);
		if($cek->num_rows() == 1) { // Berfungsi untuk mengecek kebenaran data login yang diinput (1 = true)
		$row=$cek->row();
			// Berfungsi untuk menyimpan user data
			$this->session->set_userdata('username',$username);
            $this->session->set_userdata('id', $row->id);
            $this->session->set_userdata('nama', $row->nama_user);
            $this->session->set_userdata('password', $password);
            $this->session->set_userdata('status', $row->status);
            $this->session->set_userdata('instansi', $row->instansi);
            $this->session->set_userdata('telepon', $row->telepon);

            $this->session->set_userdata('alamat', $row->alamat);
            $this->session->set_userdata('email', $row->email);

			redirect('akun');
		}else{ // Jika data yang diinput tidak valid maka akan dialihkan ke view login gagal
		echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
		}
		}

		function validasi2() {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$this->session->userdata('p');
			$data = array(
				'username' => $username,
				'password' =>md5($password)
				);

			// Berfungsi untuk memanggil fungsi ambil_data pada class login_model
			$cek=$this->Crud_m->selectX('user', $data);
			if($cek->num_rows() == 1) { // Berfungsi untuk mengecek kebenaran data login yang diinput (1 = true)
			$row=$cek->row();
				// Berfungsi untuk menyimpan user data
				$this->session->set_userdata('username',$username);
	            $this->session->set_userdata('id', $row->id);
	            $this->session->set_userdata('nama', $row->nama_user);
	            $this->session->set_userdata('password', $password);
	            $this->session->set_userdata('status', $row->status);
	            $this->session->set_userdata('instansi', $row->instansi);
	            $this->session->set_userdata('telepon', $row->telepon);
	            $this->session->set_userdata('alamat', $row->alamat);
	            $this->session->set_userdata('email', $row->email);

				redirect('Pemesanan/show_keranjang');
			}else{ // Jika data yang diinput tidak valid maka akan dialihkan ke view login gagal
			echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
			}
			}   

	// Berfungsi untuk menghapus session atau logout
	function logout() {
		session_destroy();
		redirect('Login');
		}
}

?>

