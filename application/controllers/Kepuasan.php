<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kepuasan extends CI_Controller {


	public function __construct(){
			parent::__construct();
            $this->load->model('Crud_m');
			$this->load->model('Survei_m');
            $this->table_sumber = 'survei';

		}

	public function index() {
    $data = array ('aktif1'=>"",
            'aktif2'=>"",
            'aktif3'=>"",
            'aktif4'=>"",
            'aktif5'=>"",
            'aktif6'=>"",
            'aktif7'=>""

            );
    $data=array ('id_order'=>$this->input->post('id'),
        's1'=> $this->input->post('s1'),
        's2'=> $this->input->post('s2'),
        's3'=> $this->input->post('s3'),
        's4'=> $this->input->post('s4'),
        's5'=> $this->input->post('s5'),
        's6'=> $this->input->post('s6'),
        's7'=> $this->input->post('s7'),
        's8'=> $this->input->post('s8'),
        's9'=> $this->input->post('s9'),
        's10'=> $this->input->post('s10'),
        'saran'=> $this->input->post('saran')
        
                );
        
        $id_order = $this->input->post('id');
        $this->Crud_m->input_data('survei',$data);
        $data = array ('aktif1'=>"",
            'aktif2'=>"",
            'aktif3'=>"",
            'aktif4'=>"",
            'aktif5'=>"",
            'aktif6'=>"",
            'aktif7'=>""

            );

     $id=$this->session->userdata('id');
    
     $where=array('id'=>$id);
     $where=array('id'=>$id,
                  'status'=>'Valid');
        
     $where_survei= array('id_order'=>$id_order);
        $dimana= array("id_detail"=>$this->input->post("id_detail"));
     $data['detail']= $this->Crud_m->selectX("detail", $dimana);
        
         $surveii = array (
            'Survei'=>"0"
            );

                 if ($id_session=$this->session->userdata('id')) {
         $where=array('id'       =>$id_session,
                'status_all'=>'sudah');
    
    $ccc = $this->db->query("SELECT *, pembayaran.status as sp FROM `detail` join `order` on `order`.id_order=detail.id_order join user on user.id=order.id join pembayaran on `order`.id_order=pembayaran.id_order join produk on produk.id=detail.id where `order`.id=$id_session and status_persetujuan='Setuju' and status_all='Sudah' and pembayaran.status <> 'valid' group by detail.id_order order by tanggal_berakhir desc ");
    if($ccc->num_rows() >= 0){
            $data['kode'] = $ccc->result();
            //return $data['kode'];
        }else{
            return false;
        }
        
        $this->Crud_m->update_data('order',$surveii,$where_survei);
        $this->load->view('Download_v',$data);
        }else{
                    $this->Crud_m->update_data('order',$surveii,$where_survei);
        $this->load->view('Download_v',$data);
        }
        
		}

	public function Selesai($id) {

        $this->load->model('Survei_m');
            
        //soal 1
        $data['s1a'] = $this->Survei_m->survei('s1',1);
        $data['s1b'] = $this->Survei_m->survei('s1',2);
        $data['s1c'] = $this->Survei_m->survei('s1',3);
        $data['s1d'] = $this->Survei_m->survei('s1',4);
            
        //soal 2
        $data['s2a'] = $this->Survei_m->survei('s2',1);
        $data['s2b'] = $this->Survei_m->survei('s2',2);
        $data['s2c'] = $this->Survei_m->survei('s2',3);
        $data['s2d'] = $this->Survei_m->survei('s2',4);
            
         //soal 3
        $data['s3a'] = $this->Survei_m->survei('s3',1);
        $data['s3b'] = $this->Survei_m->survei('s3',2);
        $data['s3c'] = $this->Survei_m->survei('s3',3);
        $data['s3d'] = $this->Survei_m->survei('s3',4);
            
         //soal 4
        $data['s4a'] = $this->Survei_m->survei('s4',1);
        $data['s4b'] = $this->Survei_m->survei('s4',2);
        $data['s4c'] = $this->Survei_m->survei('s4',3);
        $data['s4d'] = $this->Survei_m->survei('s4',4);
            
         //soal 5
        $data['s5a'] = $this->Survei_m->survei('s5',1);
        $data['s5b'] = $this->Survei_m->survei('s5',2);
        $data['s5c'] = $this->Survei_m->survei('s5',3);
        $data['s5d'] = $this->Survei_m->survei('s5',4);
            
         //soal 6
        $data['s6a'] = $this->Survei_m->survei('s6',1);
        $data['s6b'] = $this->Survei_m->survei('s6',2);
        $data['s6c'] = $this->Survei_m->survei('s6',3);
        $data['s6d'] = $this->Survei_m->survei('s6',4);
            
        //soal 7
        $data['s7a'] = $this->Survei_m->survei('s7',1);
        $data['s7b'] = $this->Survei_m->survei('s7',2);
        $data['s7c'] = $this->Survei_m->survei('s7',3);
        $data['s7d'] = $this->Survei_m->survei('s7',4);
            
         //soal 8
        $data['s8a'] = $this->Survei_m->survei('s8',1);
        $data['s8b'] = $this->Survei_m->survei('s8',2);
        $data['s8c'] = $this->Survei_m->survei('s8',3);
        $data['s8d'] = $this->Survei_m->survei('s8',4);
            
         //soal 9
        $data['s9a'] = $this->Survei_m->survei('s9',1);
        $data['s9b'] = $this->Survei_m->survei('s9',2);
        $data['s9c'] = $this->Survei_m->survei('s9',3);
        $data['s9d'] = $this->Survei_m->survei('s9',4);
            
         //soal 10
        $data['s10a'] = $this->Survei_m->survei('s10',1);
        $data['s10b'] = $this->Survei_m->survei('s10',2);
        $data['s10c'] = $this->Survei_m->survei('s10',3);
        $data['s10d'] = $this->Survei_m->survei('s10',4);
        
        $tem=$this->db->query("select * from detail where id_detail=".$id)->row();
        $ido=$tem->id_order;
        $data = array ('aktif1'=>"",
            'aktif2'=>"",
            'aktif3'=>"",
            'aktif4'=>"",
            'aktif5'=>"",
            'aktif6'=>"",
            'aktif7'=>"",
            'id_detail'=>$id,
            'id_order'=>$ido

            );

        if ($id_session=$this->session->userdata('id')) {
         $where=array('id'       =>$id_session,
                'status_all'=>'sudah');
    
    $ccc = $this->db->query("SELECT *, pembayaran.status as sp FROM `detail` join `order` on `order`.id_order=detail.id_order join user on user.id=order.id join pembayaran on `order`.id_order=pembayaran.id_order join produk on produk.id=detail.id where `order`.id=$id_session and status_persetujuan='Setuju' and status_all='Sudah' and pembayaran.status <> 'valid' group by detail.id_order order by tanggal_berakhir desc ");
    if($ccc->num_rows() >= 0){
            $data['kode'] = $ccc->result();
            //return $data['kode'];
        }else{
            return false;
        }
        // Jika ada session user yang login maka akan dialihkan ke halaman beranda
        $this->load->view('Kepuasanplg_v', $data);
    }else{
        $this->load->view('Kepuasanplg_v', $data);
    }
	}
}

