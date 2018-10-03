<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Akun extends CI_Controller {
    function __construct() {
		parent::__construct();
		 //$this->load->model('Model'); // Berfungsi untuk memanggil Login_model
		$this->load->model('crud_m');
		$this->load->library('Form_validation');
		$this->load->helper(array('url','form'));
	}
    
    function index() {
		
		$data = array ('aktif1'=>"",
			           'aktif2'=>"",
			           'aktif3'=>"",
			           'aktif4'=>"",
			           'aktif5'=>"",
			           'aktif6'=>"active",
                       'aktif7'=>"");
		$where = array('id'=>$this->session->userdata('id'));
		$data['user'] = $this->crud_m->selectX('user',$where);
		$this->load->view('Akun_v', $data);
         $this->session->set_userdata('u_username', '');
            $this->session->set_userdata('u_nama', '');
            $this->session->set_userdata('u_status', '');
            $this->session->set_userdata('u_instansi', '');
            $this->session->set_userdata('u_telepon', '');
            $this->session->set_userdata('u_email', '');
            $this->session->set_userdata('u_alamat', '');
            $this->session->set_userdata('u_password', '');
		}
    
    function updatedata($id) { // update akun 
        if($this->session->userdata('username')){
            $username=$this->input->post('username');
            $where=array('id'=>$id);
            $select=$this->crud_m->selectX('user', $where)->row();
            $usernamelama=$select->username;
            
        if($username==$usernamelama){
            $this->form_validation->set_rules('nama', 'Name', 'required|min_length[2]|alpha_spaces');
            $valid1 =  $this->form_validation->run();
            $pesan1 = validation_errors();
            $this->form_validation->reset_validation();
        
        if ($valid1 == false){
            echo $this->session->set_flashdata('message1', "<div class='alert alert-danger alert-dismissible'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
            <h4><i class='icon_error-triangle_alt'></i> Perhatian !!</h4>Harap Masukkan Nama</div>");
            
	        $this->session->set_userdata('u_username', $this->input->post('username'));
            $this->session->set_userdata('u_nama', $this->input->post('nama'));
            $this->session->set_userdata('u_status', $this->input->post('status'));
            $this->session->set_userdata('u_instansi', $this->input->post('instansi'));
            $this->session->set_userdata('u_telepon', $this->input->post('telepon'));
            $this->session->set_userdata('u_email', $this->input->post('email'));
            $this->session->set_userdata('u_alamat', $this->input->post('alamat'));
            }
        else{
          
		    $data = array (
            'nama'     => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'email'    => $this->input->post('email'),
            'telepon'  => $this->input->post('telepon'),
            'status'   => $this->input->post('status'),
            'instansi' => $this->input->post('instansi'),
            'alamat'   => $this->input->post('alamat'));
             $where=array('id'=>$id);
 		$this->crud_m->update_data('user', $data, $where);
  echo $this->session->set_flashdata('message2',"");
            $this->session->set_userdata('username', '');
            $this->session->set_userdata('nama', '');
            $this->session->set_userdata('status', '');
            $this->session->set_userdata('instansi', '');
            $this->session->set_userdata('telepon', '');
            $this->session->set_userdata('email', '');
            $this->session->set_userdata('alamat', '');
            $where=array('id'=>$this->session->userdata('id'));
            $cek=$this->crud_m->selectX('user', $where);
            $row=$cek->row();
            
            $this->session->set_userdata('username', $row->username);
            $this->session->set_userdata('nama',$row->nama);
            $this->session->set_userdata('id', $row->id);
            $this->session->set_userdata('status', $row->status);
            $this->session->set_userdata('instansi', $row->instansi);
            $this->session->set_userdata('telepon', $row->telepon);
            $this->session->set_userdata('email', $row->email);
            $this->session->set_userdata('alamat', $row->alamat);
            }
        }
        else{
                 $where=array('username'=>$this->input->post('username'));
                 $u=$this->crud_m->selectX('user', $where);
        if($u->num_rows()==1){
            echo $this->session->set_flashdata('message2', "<div class='alert alert-danger alert-dismissible'>
           <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><h4><i class='icon_error-triangle_alt'></i> Perhatian !!</h4>
           Username sudah digunakan, harap ganti username anda</div>");
	            
            $this->session->set_userdata('u_username', $this->input->post('username'));
            $this->session->set_userdata('u_nama', $this->input->post('nama'));
            $this->session->set_userdata('u_status', $this->input->post('status'));
            $this->session->set_userdata('u_instansi', $this->input->post('instansi'));
            $this->session->set_userdata('u_telepon', $this->input->post('telepon'));
            $this->session->set_userdata('u_email', $this->input->post('email'));
            $this->session->set_userdata('u_alamat', $this->input->post('alamat'));
            }
        else{
	       $this->form_validation->set_rules('nama', 'Name', 'required|min_length[2]|alpha_spaces');
           $valid1 =  $this->form_validation->run();
           $pesan1 = validation_errors();
           $this->form_validation->reset_validation();
        if ($valid1 == false){
            echo $this->session->set_flashdata('message1', "<div class='alert alert-danger alert-dismissible'>
           <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><h4><i class='icon_error-triangle_alt'></i> Perhatian !!</h4>
           Mohon masukkan Nama Anda</div>");

            $this->session->set_userdata('u_username', $this->input->post('username'));
            $this->session->set_userdata('u_nama', $this->input->post('nama'));
            $this->session->set_userdata('u_status', $this->input->post('status'));
            $this->session->set_userdata('u_instansi', $this->input->post('instansi'));
            $this->session->set_userdata('u_telepon', $this->input->post('telepon'));
            $this->session->set_userdata('u_email', $this->input->post('email'));
            $this->session->set_userdata('u_alamat', $this->input->post('alamat'));
            }
        else{
            echo $this->session->set_flashdata('message2',"");
            $data=array('nama'=>$this->input->post('nama'),
            'username' => $this->input->post('username'),
            'email'    => $this->input->post('email'),
            'telepon'  => $this->input->post('telepon'),
            'status'   => $this->input->post('status'),
            'instansi' => $this->input->post('instansi'),
            'alamat'   => $this->input->post('alamat'));

            $where=array('id'=>$id);
            $data['user']=$this->crud_m->update_data('user',$ $where);
            
            $this->session->set_userdata('u_username', '');
            $this->session->set_userdata('u_nama', '');
            $this->session->set_userdata('u_status', '');
            $this->session->set_userdata('u_instansi', '');
            $this->session->set_userdata('u_telepon', '');
            $this->session->set_userdata('u_email', '');
            $this->session->set_userdata('u_alamat', '');

            $where=array('id'=>$this->session->userdata('id'));
            $cek=$this->crud_m->selectX('user', $where);
            $row=$cek->row();

            $this->session->set_userdata('nama',$row->nama);
            $this->session->set_userdata('id', $row->id);
            $this->session->set_userdata('status', $row->status);
            $this->session->set_userdata('instansi', $row->instansi);
            $this->session->set_userdata('telepon', $row->telepon);
            $this->session->set_userdata('email', $row->email);
            $this->session->set_userdata('alamat', $row->alamat);
        } 
    }
}
            redirect('Akun');
         }
        else
            { $this->load->view('eror_v');
            }
    }
    
    public function edit_password() {
        if($this->session->userdata('username')){
             $data=array('aktif1'=>"",
			             'aktif2'=>"",
			             'aktif3'=>"",
			             'aktif4'=>"",
			             'aktif5'=>"",
			             'aktif6'=>"active",
                         'aktif7'=>"");
		      $this->load->view('update_password_v',$data);}
        else{
            $this->load->view('eror_v');}
    }
    public function update_password($id) {
    if( $this->session->userdata('username')){ 
        $where=array('id'=>$id);      
        $pwd=$this->crud_m->selectX('user', $where)->row();
        if($pwd->password==md5($this->input->post('password'))){
             $this->form_validation->set_rules('pwdbaru', 'password','required|min_length[5]|max_length[15]'); $valid3 =  $this->form_validation->run();
             $this->form_validation->set_rules('pwdbaru2', 'Password Confirmation', 'required|matches[pwdbaru]');
             $valid4 =  $this->form_validation->run();
             $pesan4 = validation_errors();
            
            $this->form_validation->reset_validation();
            if($valid4== false){
                 echo $this->session->set_flashdata('message4', "<div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><h4><i class='icon_error-triangle_alt'></i> Warning !!</h4>
                ".$pesan4."</div>");
                
                redirect('/Akun/edit_password');
                }
            else{
                 $data=array('password'=>md5($this->input->post('pwdbaru')));       
                 $this->crud_m->update_data('user', $data, $where);
                 redirect('Akun');
                }   
            }
        else{
            echo $this->session->set_flashdata('message4', "<div class='alert alert-danger alert-dismissible'>
           <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><h4><i class='icon_error-triangle_alt'></i> Warning !!</h4>Past password not valid, please try again!
           </div>");
            redirect('/Akun/edit_password');
            }
        }
        else{
            $this->load->view('eror_v');
	       }   
    }

    
    public function doforget(){  
        $this->load->helper('url');
        $email= $this->input->post('email');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email','email');

        if ($this->form_validation->run() == FALSE){
        $data=array('aktif1'=>"",
                    'aktif2'=>"",
                    'aktif3'=>"",
                    'aktif4'=>"",
                    'aktif5'=>"",
                    'aktif6'=>"active",
                    'aktif7'=>"");
        $this->load->view('forgot_password_v',$data);}
        else{
            $data=array('aktif1'=>"",
                        'aktif2'=>"",
                        'aktif3'=>"",
                        'aktif4'=>"",
                        'aktif5'=>"",
                        'aktif6'=>"active",
                        'aktif7'=>"");
            $q = $this->db->query("select * from user where email='" .$email . "'");
        if ($q->num_rows > 0) {
            $r = $q->result();
            $user=$r[0];
    
            $this->load->helper('string');
            $password= random_string('alnum',6);
            $this->db->where('id', $user->$id);
            $this->db->update('user',array('password'=>$password,'pass_encryption'=>MD5($password)));
            $this->load->library('email');
            $this->email->from('contact@example.com', 'sampletest');
            $this->email->to($user->email); 
            $this->email->subject('Password reset');
            $this->email->message('You have requested the new password, Here is you new password:'. $password); 
            $this->email->send();
            $this->session->set_flashdata('message','Password has been reset and has been sent to email'); 
    
            redirect('akun/display_doforget');}
            }
        }
    
	public function riwayat() {
	$data = array ('aktif1'=>"",
			       'aktif2'=>"",
			       'aktif3'=>"",
			       'aktif4'=>"",
			       'aktif5'=>"",
			       'aktif6'=>"active",
                   'aktif7'=>"");
  	$id=$this->session->userdata('id');
    $where=array('id'=>$id);
    $data['detail']=$this->crud_m->join4_where('detail', 'order','user','produk', 'order.id','detail.id_order=order.id_order','user.id=order.id','produk.id=detail.id',$id);
	$this->load->view('riwayat_v', $data);
	}
    
    
	public function status() {
	$data = array ('aktif1'=>"",
			       'aktif2'=>"",
			       'aktif3'=>"",
			       'aktif4'=>"",
			       'aktif5'=>"",
			       'aktif6'=>"active",
                   'aktif7'=>"");
    $id=$this->session->userdata('id');
    $where=array('id'=>$id);
    $data['order']= $this->crud_m->stat_belum($this->session->userdata('id'));
	$this->load->view('Status_v', $data);
	}


}