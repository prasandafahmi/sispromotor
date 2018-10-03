<?php

	class Tutorial extends CI_Controller{
        //properti
        public $table_sumber;
		
		public function __construct(){
			parent::__construct();
			$this->load->model('super_admin/Crud_m');
            $this->table_sumber = 'tutorial';
              
		}      
		public function index(){
             $footer=$this->Crud_m->selectX('tampilan', 'id_tampilan=1')->row();
            $header=$this->Crud_m->selectX('tampilan', 'id_tampilan=1')->row();
            $video=$this->Crud_m->selectX('tutorial', 'id_tutorial=2')->row();
           $data = array( 'aktif1'=>'',
                          'aktif2'=>'',
                          'aktif21'=>'',
                          'aktif3'=>'',
                          'aktif4'=>'active-menu',
                          'aktif5'=>'',
                         'footer'=>$footer->footer,
                         'upload_video'=>$video->upload_video,
                         'header'=>$header->header);
            
              $data['admin_pesan'] = $this->Crud_m->selectmenu()->num_rows();
              $data['admin_arsip'] = $this->Crud_m->join_where('order', 'user', 'order.status_pemesanan','order.id=user.id','sukses')->num_rows();
             $data['admin_hasil'] = $this->Crud_m->result_AdministrasiJ()->num_rows();
             $data['admin_rhasil'] = $this->Crud_m->result_AdministrasiJ_riwayat()->num_rows();
            
			$this->load->view('administrasi/tutor2_view', $data);
		}
		
	
	}

?>