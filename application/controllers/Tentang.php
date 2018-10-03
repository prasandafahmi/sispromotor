<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Crud_m');
		//$this->load->model('artikel_model'); // Berfungsi untuk me-load Artikel_model.php
	}

	public function index() {
	
	$data = array ('aktif1'=>"",
			'aktif2'=>"active",
			'aktif3'=>"",
			'aktif4'=>"",
			'aktif5'=>"",
			'aktif6'=>"",
            'aktif7'=>""
			);
    if ($id=$this->session->userdata('id')) {
          $where=array('id'       =>$id,
                'status_all'=>'sudah');
    
    $ccc =$this->db->query("SELECT *, pembayaran.status as sp FROM `detail` join `order` on `order`.id_order=detail.id_order join user on user.id=order.id join pembayaran on `order`.id_order=pembayaran.id_order join produk on produk.id=detail.id where `order`.id=$id and status_persetujuan='Setuju' and status_all='Sudah' and pembayaran.status <> 'valid' group by detail.id_order order by tanggal_berakhir desc ");
    if($ccc->num_rows() >= 0){
            $data['kode'] = $ccc->result();
            //return $data['kode'];
            $this->load->view('Tentang_v', $data);
        }else{
            return false;
        }
    
        }else{
	       $this->load->view('Tentang_v', $data);
        }
	}
	 public function konfirmasi(){
	 if(($this->session->userdata('username'))){
     $data = array ('aktif1'=>"",
			'aktif2'=>"active",
			'aktif3'=>"",
			'aktif4'=>"",
			'aktif5'=>"",
			'aktif6'=>"",
            'aktif7'=>""

			);
     }else{
			redirect("Login");
		}
                $keluhan = array(
    				'id' 	=> $this->session->userdata('id'),
                    'keluhan'       => $this->input->post('keluhan')
                  
                );    
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
                $this->load->view('Tentang_v', $data);
                $this->Crud_m->input_data("keluhan", $keluhan);
         }
    
    

}


