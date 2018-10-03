<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keranjang extends CI_Controller {

	public function __construct() {
		parent::__construct();
		//$this->load->model('artikel_model'); // Berfungsi untuk me-load Artikel_model.php
	}

	public function index() {
    if(($this->session->userdata('username'))){
	$data = array ('aktif1'=>"",
			'aktif2'=>"",
			'aktif3'=>"",
			'aktif4'=>"",
			'aktif5'=>"",
			'aktif6'=>"",
            'aktif7'=>"active"
			);
	$this->load->view('Keranjang_v', $data);
        }else{
			redirect("Login");
		}
	}
//    function remove() {
//         if($this->session->userdata('id_order')){
//             $id=$this->session->userdata('id_order');
//                 $where=array('id_order'=>$id);    
//            
//             date_default_timezone_set('Asia/Jakarta');
//        $urut=$this->crud_m->selectSemua('order')->num_rows();
//                 $kode = $ord_id."/JASA/".date('m/Y');
//        $data = array('id_order'=>$kode,
//                     'tgl_pesan' => date('Y-m-d H:i:s'),
//                      'status_pemesanan'=>'CANCEL');
//        $this->crud_m->update_data('pesanan', $data, $where);
//             $data=array('status_pesanan'=>'CANCEL');
//             $this->crud_m->update_data('detail_pesanan', $data, $where);
//             $data=array('status_pembayaran'=>'CANCEL');
//             $this->crud_m->update_data('pembayaran', $data, $where);
//             $data=array('status_pengiriman'=>'CANCEL');
//             $this->crud_m->update_data('pengiriman', $data, $where);
//             $this->session->set_userdata('id_pesan','');
//            
//        }
//			$this->cart->destroy();
//            $this->session->set_userdata('id_order','');
//		    redirect('Keranjang');
//	}
//     function batal($rowid){
//        $data = array(
//				'rowid'   => $rowid,
//				'qty'     => 0
//			);
//
//        $this->cart->update($data);
//        if($this->cart->contents()){
//            redirect('Keranjang');
//        }else{
//            redirect("Keranjang/remove");
//        }
//        
//         
//    }
//    
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
             
         }
}
