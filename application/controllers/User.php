<?php
 
class User extends CI_Controller
{
public function __construct() {
parent::__construct();
}
public function display_doforget()
 {
    $data="";
    $this->load->view('forgot_password',$data);
 }
 public function doforget()
 {
     $this->load->helper('url');
 $email= $this->input->post('email');
 $this->load->library('form_validation');
 $this->form_validation->set_rules('email','email','required|xss_clean|trim');
 if ($this->form_validation->run() == FALSE)
 {
 
 $this->load->view('forgot_password_v');
 
 }
 else
 {
 $q = $this->db->query("select * from user where email='" . $email . "'");
        if ($q->num_rows > 0) {
            $r = $q->result();
            $user=$r[0];
 $this->load->helper('string');
 $password= random_string('alnum',6);
 $this->db->where('id', $user->id);
 $this->db->update('user',array('password'=>$password,'pass_encryption'=>MD5($password)));
 $this->load->library('email');
 $this->email->from('contact@example.com', 'sampletest');
 $this->email->to($user->email); 
 $this->email->subject('Password reset');
 $this->email->message('You have requested the new password, Here is you new password:'. $password); 
 $this->email->send();
     $this->session->set_flashdata('message','Password has been reset and has been sent to email'); 
    redirect('user/display_doforget');
    }
    }
 }
}