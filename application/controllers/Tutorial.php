<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tutorial extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Crud_m');
        $this->table_sumber = 'tutorial';
		//$this->load->model('artikel_model'); // Berfungsi untuk me-load Artikel_model.php
	}

	public function index() {
        $video=$this->Crud_m->selectX('tutorial', 'id_tutorial=6')->row();
        $tutorial=$this->Crud_m->selectX('tutorial', 'id_tutorial=6')->row();
	$data = array ('aktif1'=>"",
			'aktif2'=>"",
			'aktif3'=>"",
			'aktif4'=>"active",
			'aktif5'=>"",
			'aktif6'=>"",
            'aktif7'=>"",
            'upload_tutorial'=>$tutorial->upload_tutorial,
            'upload_video'=>$video->upload_video);
//	$data['video'] = $this->Crud_m->selectSemua('tutorial')->result();
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
		$this->load->view('Tutorial_v', $data);
		}else{
			$this->load->view('Tutorial_v', $data);
		}
	 
	}

	public function manual() {
        $video=$this->Crud_m->selectX('tutorial', 'id_tutorial=6')->row();
        $tutorial=$this->Crud_m->selectX('tutorial', 'id_tutorial=6')->row();
	$data = array ('aktif1'=>"",
			'aktif2'=>"",
			'aktif3'=>"",
			'aktif4'=>"active",
			'aktif5'=>"",
			'aktif6'=>"",
            'aktif7'=>"",
            'upload_tutorial'=>$tutorial->upload_tutorial,
            'upload_video'=>$video->upload_video);
//	$data['foto'] = $this->Crud_m->selectSemua('tutorial')->result();
	if ($id=$this->session->userdata('id')) {
			    $where=array('id'       =>$id,
	                'status_all'=>'sudah');
	    
	    $ccc =$this->db->query("SELECT *, pembayaran.status as sp FROM `detail` join `order` on `order`.id_order=detail.id_order join user on user.id=order.id join pembayaran on `order`.id_order=pembayaran.id_order join produk on produk.id=detail.id where `order`.id=$id and status_persetujuan='Setuju' and status_all='Sudah' and pembayaran.status <> 'valid' group by detail.id_order order by tanggal_berakhir desc ");
	    if($ccc->num_rows() >= 0){
	            $data['kode'] = $ccc->result();
	            //return $data['kode'];
	        }else{
	            return false;
	        }
		$this->load->view('Manual_v', $data);
		}else{
			$this->load->view('Manual_v', $data);
		}
	
	}
}

