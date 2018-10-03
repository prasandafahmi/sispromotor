<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller {
	function __construct() {
		parent::__construct();
		 $this->load->model('admin/Login_m'); // Berfungsi untuk memanggil Login_m
	}

	// Berfungsi untuk menampilkan halaman login
	function index() {
		$data=array('title'=>'Login',
		'isi' =>'Login');
		$this->load->view('admin/login_view',$data);
		}

	// Berfungsi untuk melakukan validasi login
	function validasi() {
		$username = $this->input->post('f1');
		$password = $this->input->post('f2');
		$role = $this->input->post('f3');
		$data = array(
			
			'username' => $username,
			'password' =>md5($password),
            'role' => $role
			);

		// Berfungsi untuk memanggil fungsi ambil_data pada class login_model
		$cek=$this->Login_m->ambil_data('admin', $data);
		if($cek->num_rows() == 1) { // Berfungsi untuk mengecek kebenaran data login yang diinput (1 = true)
		$row=$cek->row();
        $this->session->set_userdata('u',$username);
        $this->session->set_userdata('p',$password);
        $this->session->set_userdata('s',$role);
        $this->session->set_userdata('n',$row->nama);
        $this->session->set_userdata('e', $row->email);
        $this->session->set_userdata('i', $row->id_admin);
          redirect('admin/Main');
		}else{ // Jika data yang diinput tidak valid maka akan dialihkan ke view login gagal
		echo "<script>alert('Gagal login: Silahkan cek username, password atau status anda!');history.go(-1);</script>";
		}
		}
	// Berfungsi untuk menghapus session atau logout
	function logout() {
		session_destroy();
		redirect('admin/Login');
		}
}