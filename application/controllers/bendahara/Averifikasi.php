<?php
	class Averifikasi extends CI_Controller{
        //properti
        public $table_sumber;
		public function __construct(){
			parent::__construct();
			$this->load->model('super_admin/Crud_m');
            $this->table_sumber = 'pembayaran'; //nama tabel database
            $this->load->helper('download');
		}      
		public function index(){
            $footer=$this->Crud_m->selectX('tampilan', 'id_tampilan=1')->row();
            $header=$this->Crud_m->selectX('tampilan', 'id_tampilan=1')->row();
            $video=$this->Crud_m->selectX('tutorial', 'id_tutorial=3')->row();
             $data=array('aktif1'=>'',
                          'aktif2'=>'',
                          'aktif21'=>'active-menu',
                          'aktif3'=>'',
                         'footer'=>$footer->footer,
                         'upload_video'=>$video->upload_video,
                         'header'=>$header->header);
             $where = array('status'=>'proses');
            
           $data['menunya']=$this->Crud_m->verifikasi_where();
            
           $data['ben_averif']=$this->Crud_m->verifikasi_where()->num_rows();
             $data['ben_verif']=$this->Crud_m->verifikasi()->num_rows();
            
           $this->load->view('bendahara/arsip_verifikasi_v', $data);
		}
        public function detail($id){
            $footer=$this->Crud_m->selectX('tampilan', 'id_tampilan=1')->row();
            $header=$this->Crud_m->selectX('tampilan', 'id_tampilan=1')->row();
            $video=$this->Crud_m->selectX('tutorial', 'id_tutorial=3')->row();
         if ($this->session->userdata('u')) {
             $data=array('aktif1'=>'',
                          'aktif2'=>'',
                          'aktif21'=>'active-menu',
                          'aktif3'=>'',
                         'footer'=>$footer->footer,
                         'upload_video'=>$video->upload_video,
                         'header'=>$header->header);
               $data['menunya']=$this->Crud_m->detailbayar($id);
             
              $data['ben_averif']=$this->Crud_m->verifikasi_where()->num_rows();
             $data['ben_verif']=$this->Crud_m->verifikasi()->num_rows();
             
               $this->load->view('bendahara/detail_arsip', $data);
         }else{
             redirect("admin/Login");
         }
        }
        
         public function update_bayar($id){
            $data=array(status=>$this->input->post('status'));
               $data['menunya']=$this->Crud_m->update_data('pembayaran', $data, 'id_bayar='.$id);
               redirect('bendahara/Verifikasi');
       
        }
        public function download_bukti($id){
        $where = array('id_order'=>$id);
        $fileinfo = $this->Crud_m->selectX('pembayaran', $where)->result();
        $file = 'assets/admin/bukti/'.$fileinfo[0]->bukti_transfer;
        force_download($file, NULL);
    }
	}

?>