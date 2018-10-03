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
            $video=$this->Crud_m->selectX('tutorial', 'id_tutorial=1')->row();
           $data = array( 'aktif1'=>'',
                          'aktif2'=>'active-menu',
                          'aktif21'=>'',
                          'aktif3'=>'',
                          'aktif4'=>'',
                          'aktif5'=>'',
                          'aktif6'=>'active-menu',
                          'aktif61'=>'',
                          'aktif7'=>'',
                          'aktif8'=>'',
                          'aktif81'=>'',
                          'aktif9'=>'',
                          'aktif11'=>'',
                          'aktif10'=>'',
                         'footer'=>$footer->footer,
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
            
			$this->load->view('super_admin/tutorial_view', $data);
		}
        public function update($id_tutorial){
            $footer=$this->Crud_m->selectX('tampilan', 'id_tampilan=1')->row();
            $header=$this->Crud_m->selectX('tampilan', 'id_tampilan=1')->row();
            $video=$this->Crud_m->selectX('tutorial', 'id_tutorial=1')->row();
            $where = array('id_tutorial'=>$id_tutorial);
             $data = array( 'aktif1'=>'',
                          'aktif2'=>'active-menu',
                          'aktif21'=>'',
                          'aktif3'=>'',
                          'aktif4'=>'',
                          'aktif5'=>'',
                          'aktif6'=>'active-menu',
                          'aktif61'=>'',
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
            
            $this->load->view('super_admin/ututorial_v',$data);
        }
        
        public function upload_file($file,$name){
		//print_r($file);die();
        if ($file['size']>0) {
//			$file_name = 'file_'.time(); // untuk merubah nama file
			$config['upload_path'] = './assets/admin/video';
            $config['allowed_types'] = 'mp4|avi|mov|jpg|png|jpeg|JPG|pdf|';
            $config['max_size'] = '900000'; //mb
            $config['max_width'] = '6024';
            $config['max_height'] = '5024';
//	        $config['file_name'] = $file_name;// untuk merubah nama file
	        $this->upload->initialize($config);
         	if ($this->upload->do_upload($name))
            {
            	$img = $this->upload->data();
            	return $img['file_name'];
            }else{
            	 $error = array('error' => $this->upload->display_errors());
							print_r($error);
            }
            
         }else{
			 return "";
		 }
					
    }
	public function aksi_update(){
			 $file1 =  $this->upload_file($_FILES['file1'],'file1');
            $file2 =  $this->upload_file($_FILES['file2'],'file2');
			 $data = array(
                 "deskripsi"=>$this->input->post('f1'),
                  "upload_tutorial"=>$file1,
 			    "upload_video"=>$file2
                );
                $where = array('id_tutorial'=>$this->input->post('id'));
                $this->Crud_m->update_data($this->table_sumber,$data,$where);
                 redirect('super_admin/Tutorial');
            }
        
    
        
}
?>