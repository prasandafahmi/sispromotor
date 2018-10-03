<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Akun extends CI_Controller {
    function __construct() {
		parent::__construct();
		 //$this->load->model('Model'); // Berfungsi untuk memanggil Login_model
		$this->load->model('Crud_m');
		$this->load->library('Form_validation');
		$this->load->helper(array('url','form'));
	}
    
    function index() {
        if(($this->session->userdata('username'))){
		$data = array ('aktif1'=>"",
			           'aktif2'=>"",
			           'aktif3'=>"",
			           'aktif4'=>"",
			           'aktif5'=>"",
			           'aktif6'=>"active",
                       'aktif7'=>"");
             
		$where = array('id'=>$this->session->userdata('id'));
		$data['user'] = $this->Crud_m->selectX('user',$where);

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

        $this->load->view('Akun_v', $data);
     
            $this->session->set_userdata('u_username', '');
            $this->session->set_userdata('u_nama', '');
            $this->session->set_userdata('u_status', '');
            $this->session->set_userdata('u_instansi', '');
            $this->session->set_userdata('u_telepon', '');
            $this->session->set_userdata('u_email', '');
            $this->session->set_userdata('u_alamat', '');
            $this->session->set_userdata('u_password', '');
               }else{
			redirect("Login");
		}
    }
    
    function updatedata($id) { // update akun 
        if($this->session->userdata('username')){
            $username=$this->input->post('username');
            $where=array('id'=>$id);
            $select=$this->Crud_m->selectX('user', $where)->result();
            $usernamelama=$select[0]->username;
            
        if($this->input->post('username')==$usernamelama){
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
            echo $this->session->set_flashdata('message2',"");
		    $data = array (
            'nama'     => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'email'    => $this->input->post('email'),
            'telepon'  => $this->input->post('telepon'),
            'status'   => $this->input->post('status'),
            'instansi' => $this->input->post('instansi'),
            'alamat'   => $this->input->post('alamat'));
            $data['user']=$this->Crud_m->update_data('user', $data, $where);
            
            
            $this->session->set_userdata('u_username', '');
            $this->session->set_userdata('u_nama', '');
            $this->session->set_userdata('u_status', '');
            $this->session->set_userdata('u_instansi', '');
            $this->session->set_userdata('u_telepon', '');
            $this->session->set_userdata('u_email', '');
            $this->session->set_userdata('u_alamat', '');
            $this->session->set_userdata('u_password', '');
            
            $where=array('id'=>$this->session->userdata('id'));
            $cek=$this->Crud_m->selectX('user', $where);
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
                 $u=$this->Crud_m->selectX('user', $where);
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
            $data['user']=$this->Crud_m->update_data('user',$data, $where);
            
            $this->session->set_userdata('u_username', '');
            $this->session->set_userdata('u_nama', '');
            $this->session->set_userdata('u_status', '');
            $this->session->set_userdata('u_instansi', '');
            $this->session->set_userdata('u_telepon', '');
            $this->session->set_userdata('u_email', '');
            $this->session->set_userdata('u_alamat', '');

            $where=array('id'=>$this->session->userdata('id'));
            $cek=$this->Crud_m->selectX('user', $where);
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
            { $this->load->view('Eror_v');
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
		      $this->load->view('Update_password_v',$data);}
        else{
            redirect('Akun');}
    }
    public function update_password($id) {
    if( $this->session->userdata('username')){ 
        $where=array('id'=>$id);      
        $pwd=$this->Crud_m->selectX('user', $where)->row();
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
                 $this->Crud_m->update_data('user', $data, $where);
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
            $this->load->view('Eror_v');
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
        $this->load->view('Forgot_password_v',$data);}
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
    if(($this->session->userdata('username'))){
	$data = array ('aktif1'=>"",
			       'aktif2'=>"",
			       'aktif3'=>"",
			       'aktif4'=>"",
			       'aktif5'=>"",
			       'aktif6'=>"active",
                   'aktif7'=>"");
  	$id=$this->session->userdata('id');
    $where=array('id'=>$id);
    $data['detail']=$this->Crud_m->Riwayat($id);

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
	$this->load->view('Riwayat_v', $data);
         }else{
			redirect("Login");
		}
	}
    
    
	public function status() {
    if( ($this->session->userdata('username'))){
	$data = array ('aktif1'=>"",
			       'aktif2'=>"",
			       'aktif3'=>"",
			       'aktif4'=>"",
			       'aktif5'=>"",
			       'aktif6'=>"active",
                   'aktif7'=>"");
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
         }else{
			redirect("Login");
		}
	}


}