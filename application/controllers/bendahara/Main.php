<?php if (!defined('BASEPATH')) exit('No dirrect script access allowed');
class Main extends CI_Controller {
   
        public $table_sumber;
		public function __construct(){
			parent::__construct();
			$this->load->model('super_admin/Crud_m');
		}      
	public function index(){
		// Berfungsi untuk mengecek apakah ada session user yang login
		if ($this->session->userdata('u')) {
            $footer=$this->Crud_m->selectX('tampilan', 'id_tampilan=1')->row();
            $header=$this->Crud_m->selectX('tampilan', 'id_tampilan=1')->row();
            $video=$this->Crud_m->selectX('tutorial', 'id_tutorial=3')->row();
			$data = array('title' => 'Selamat datang',
                          'aktif1'=>'active-menu',
                          'aktif2'=>'',
                          'aktif21'=>'',
                          'aktif3'=>'',
                         'footer'=>$footer->footer,
                         'upload_video'=>$video->upload_video,
                         'header'=>$header->header);
            
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
            
//        print_r($data); die();
		// Jika ada session user yang login maka akan dialihkan ke halaman beranda
         $data['ben_averif']=$this->Crud_m->verifikasi_where()->num_rows();
        $data['ben_verif']=$this->Crud_m->verifikasi()->num_rows();
            
		$this->load->view('bendahara/index3_view', $data);
		}
		else{
			// jika tidak ada maka akan dikembalikan ke halaman login
			redirect('admin/Login');
		}
	}
    
}
