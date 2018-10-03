<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
    
    public function __construct() {
    parent::__construct();
			$this->load->model('Crud_m');
            $this->table_sumber = 'beranda';
	}

    public function index() {
	$data = array ('aktif1'=>"active",
			'aktif2'=>"",
			'aktif3'=>"",
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
           $data['foto'] = $this->Crud_m->selectSemua('beranda')->result();
  $this->load->view('Home_v', $data);
    }else{
   $data['foto'] = $this->Crud_m->selectSemua('beranda')->result();
  $this->load->view('Home_v', $data);
    }
	}

	public function error(){
			$data = array ('aktif1'=>"active",
			'aktif2'=>"",
			'aktif3'=>"",
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
  $data['foto'] = $this->Crud_m->selectSemua('beranda')->result();
    $this->load->view('error_v',$data);
    }else{

	$data['foto'] = $this->Crud_m->selectSemua('beranda')->result();
		$this->load->view('error_v',$data);
	}    
}
}