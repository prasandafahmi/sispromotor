<?php
	class Aresult extends CI_Controller{
        //properti
        public $table_sumber;
		public function __construct(){
			parent::__construct();
			$this->load->model('super_admin/Crud_m');
            $this->table_sumber = 'order'; //nama tabel database
            $this->load->helper('download');
		}      
        
		public function index(){
             $footer=$this->Crud_m->selectX('tampilan', 'id_tampilan=1')->row();
            $header=$this->Crud_m->selectX('tampilan', 'id_tampilan=1')->row();
            $video=$this->Crud_m->selectX('tutorial', 'id_tutorial=2')->row();
           $data = array( 'aktif1'=>'',
                          'aktif2'=>'',
                          'aktif21'=>'',
                          'aktif3'=>'',
                          'aktif4'=>'',
                          'aktif5'=>'active-menu',
                         'footer'=>$footer->footer,
                         'upload_video'=>$video->upload_video,
                         'header'=>$header->header);
            $where = array('status_akhir'=>'Selesai');
           $data['menunya'] = $this->Crud_m->result_AdministrasiJ_riwayat();
           $data['admin_rhasil'] = $this->Crud_m->result_AdministrasiJ_riwayat()->num_rows();
            $data['admin_pesan'] = $this->Crud_m->selectmenu()->num_rows();
              $data['admin_arsip'] = $this->Crud_m->join_where('order', 'user', 'order.status_pemesanan','order.id=user.id','sukses')->num_rows();
             $data['admin_hasil'] = $this->Crud_m->result_AdministrasiJ()->num_rows();
			$this->load->view('administrasi/result3_view', $data);
		}
        
		 public function detail2($id){
              $footer=$this->Crud_m->selectX('tampilan', 'id_tampilan=1')->row();
            $header=$this->Crud_m->selectX('tampilan', 'id_tampilan=1')->row();
            $video=$this->Crud_m->selectX('tutorial', 'id_tutorial=2')->row();
            $data = array( 'aktif1'=>'',
                          'aktif2'=>'',
                          'aktif21'=>'',
                          'id'=>$id,
                          'aktif3'=>'',
                          'aktif4'=>'',
                          'aktif5'=>'active-menu',
                         'footer'=>$footer->footer,
                         'upload_video'=>$video->upload_video,
                         'header'=>$header->header);
             
           $data['menunya'] = $this->Crud_m->join('order', 'user', 'order.id=user.id');
             
              $data['admin_rhasil'] = $this->Crud_m->result_AdministrasiJ_riwayat()->num_rows();
             $data['produk'] = $this->Crud_m->selectProduk($id);
               $data['admin_pesan'] = $this->Crud_m->selectmenu()->num_rows();
              $data['admin_arsip'] = $this->Crud_m->join_where('order', 'user', 'order.status_pemesanan','order.id=user.id','sukses')->num_rows();
             $data['admin_hasil'] = $this->Crud_m->result_AdministrasiJ()->num_rows();
			$this->load->view('administrasi/detail3_view', $data);
         }
        
       
        
         public function download_hasil($id){
        $where = array('result'=>$id);
        $fileinfo = $this->Crud_m->selectX('detail', $where)->result();
        $file = 'assets/admin/hasil/'.$fileinfo[0]->result;
        force_download($file, NULL);
    }
        
    }
?>