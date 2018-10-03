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
            $video=$this->Crud_m->selectX('tutorial', 'id_tutorial=3')->row();
           $data = array( 'aktif1'=>'',
                          'aktif2'=>'',
                          'aktif21'=>'',
                          'aktif3'=>'active-menu',
                         'footer'=>$footer->footer,
                         'upload_video'=>$video->upload_video,
                         'header'=>$header->header);
            
             $data['ben_averif']=$this->Crud_m->verifikasi_where()->num_rows();
             $data['ben_verif']=$this->Crud_m->verifikasi()->num_rows();
            
			$this->load->view('bendahara/tutor3_view', $data);
		}
		
	
	}

?>