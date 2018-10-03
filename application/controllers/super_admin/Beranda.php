<?php
	class Beranda extends CI_Controller{
        //properti
        public $table_sumber;
		public function __construct(){
			parent::__construct();
			$this->load->model('super_admin/Crud_m');
            $this->table_sumber = 'beranda'; //nama tabel
		}      
		public function index(){
            $footer=$this->Crud_m->selectX('tampilan', 'id_tampilan=1')->row();
            $header=$this->Crud_m->selectX('tampilan', 'id_tampilan=1')->row();
            $video=$this->Crud_m->selectX('tutorial', 'id_tutorial=1')->row();
           $data = array( 'aktif1'=>'',
                          'aktif2'=>'active-menu',
                          'aktif21'=>'',
                          'aktif3'=>'',
                          'aktif4'=>'',
                          'aktif5'=>'',
                          'aktif6'=>'',
                          'aktif61'=>'active-menu',
                          'aktif7'=>'',
                          'aktif8'=>'',
                          'aktif81'=>'',
                          'aktif9'=>'',
                          'aktif11'=>'',
                          'aktif10'=>'',
                         'footer'=>$footer->footer,
                         'upload_video'=>$video->upload_video,
                         'header'=>$header->header);
           $data['menunya'] = $this->Crud_m->selectSemua($this->table_sumber);
            
             $data['super_keluhan'] = $this->Crud_m->join3('keluhan','user','survei','user.id=keluhan.id','survei.id_survei=keluhan.id_survei')->num_rows();
             $data['super_laporan'] = $this->Crud_m->join5('detail','order','produk', 'user', 'pembayaran', 'detail.id_order=order.id_order','produk.id=detail.id', 'user.id=order.id', 'pembayaran.id_order=order.id_order')->num_rows();
             $data['super_apesan'] = $this->Crud_m->join_where('order', 'user','order.status_all', 'order.id=user.id', 'sudah')->num_rows();
             $data['super_jasapus'] = $this->Crud_m->selectPustaka()->num_rows();
             $data['super_alatlab'] = $this->Crud_m->selectJasaAlat()->num_rows();
           $data['super_jasalab'] = $this->Crud_m->selectJasaLab()->num_rows();
            $data['super_pesan'] = $this->Crud_m->join_where_pesan('order','user','order.status_pemesanan','order.status_all','order.id=user.id','sukses','')->num_rows();
             $data['super_user'] = $this->Crud_m->selectSemua($this->table_sumber)->num_rows(); 
            
			$this->load->view('super_admin/beranda_view', $data);
		}
        public function update($id_beranda){
            $footer=$this->Crud_m->selectX('tampilan', 'id_tampilan=1')->row();
            $header=$this->Crud_m->selectX('tampilan', 'id_tampilan=1')->row();
            $video=$this->Crud_m->selectX('tutorial', 'id_tutorial=1')->row();
            $where = array('id_beranda'=>$id_beranda);
            $data = array( 'aktif1'=>'',
                          'aktif2'=>'active-menu',
                          'aktif21'=>'',
                          'aktif3'=>'',
                          'aktif4'=>'',
                          'aktif5'=>'',
                          'aktif6'=>'',
                          'aktif61'=>'active-menu',
                          'aktif7'=>'',
                          'aktif8'=>'',
                          'aktif81'=>'',
                          'aktif9'=>'',
                          'aktif11'=>'',
                          'aktif10'=>'',
                         'footer'=>$footer->footer,
                         'upload_video'=>$video->upload_video,
                         'header'=>$header->header);
            $data['menuX'] = $this->Crud_m->selectX($this->table_sumber,$where);
            
             $data['super_keluhan'] = $this->Crud_m->join3('keluhan','user','survei','user.id=keluhan.id','survei.id_survei=keluhan.id_survei')->num_rows();
             $data['super_laporan'] = $this->Crud_m->join5('detail','order','produk', 'user', 'pembayaran', 'detail.id_order=order.id_order','produk.id=detail.id', 'user.id=order.id', 'pembayaran.id_order=order.id_order')->num_rows();
             $data['super_apesan'] = $this->Crud_m->join_where('order', 'user','order.status_all', 'order.id=user.id', 'sudah')->num_rows();
             $data['super_jasapus'] = $this->Crud_m->selectPustaka()->num_rows();
             $data['super_alatlab'] = $this->Crud_m->selectJasaAlat()->num_rows();
           $data['super_jasalab'] = $this->Crud_m->selectJasaLab()->num_rows();
            $data['super_pesan'] = $this->Crud_m->join_where_pesan('order','user','order.status_pemesanan','order.status_all','order.id=user.id','sukses','')->num_rows();
             $data['super_user'] = $this->Crud_m->selectSemua($this->table_sumber)->num_rows(); 
            
            $this->load->view('super_admin/uberanda_view',$data);
        }
        public function aksi_update(){
           $image_name = "IMG".time();
			$config['upload_path']   = './assets/images';
			$config['allowed_types'] = 'jpeg|jpg|png';
			$config['max_size']      = '5048';
			$config['max_width']      = '5024';
			$config['max_height']      = '5024';
			$config['file_name']     = $image_name;

		$this->upload->initialize($config);
			if($_FILES['f2']['name']){
			if($this->upload->do_upload('f2')){
				$gbr= $this->upload->data();
					
			$data = array(
			"foto"=>$gbr['file_name']
		);
 $where = array('id_beranda'=>$this->input->post('id_beranda'));
 $this->Crud_m->update_data($this->table_sumber,$data,$where);
 redirect('super_admin/Beranda');
	 }
	}else{	
			$data = array();
 $where = array('id_beranda'=>$this->input->post('id_beranda'));
 $this->Crud_m->update_data($this->table_sumber,$data,$where);
 redirect('super_admin/Beranda');
            
        }

    }
	}

?>