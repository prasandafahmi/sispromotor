<?php

	class Laporan extends CI_Controller{     
        public $table_sumber;
		public function __construct(){
			parent::__construct();
            //load lib tcpdf
//            $this->load->library('tcpdf6213/tcpdf');
            //load lib PHPExcel
            $this->load->library('PHPExcel-1.8/Classes/PHPExcel');
			$this->load->model('super_admin/Crud_m');
            $this->table_sumber = 'detail';
		}  
		public function index(){
            $footer=$this->Crud_m->selectX('tampilan', 'id_tampilan=1')->row();
            $header=$this->Crud_m->selectX('tampilan', 'id_tampilan=1')->row();
            $video=$this->Crud_m->selectX('tutorial', 'id_tutorial=1')->row();
           $data = array( 'aktif1'=>'',
                          'aktif2'=>'',
                          'aktif21'=>'',
                          'aktif3'=>'',
                          'aktif4'=>'',
                          'aktif5'=>'',
                          'aktif6'=>'',
                          'aktif61'=>'',
                          'aktif7'=>'',
                          'aktif8'=>'',
                          'aktif81'=>'',
                          'aktif9'=>'active-menu',
                          'aktif11'=>'',
                          'aktif10'=>'',
                         'footer'=>$footer->footer,
                         'upload_video'=>$video->upload_video,
                         'header'=>$header->header);
            $data['menunya'] = $this->Crud_m->join5('detail','order','produk', 'user', 'pembayaran', 'detail.id_order=order.id_order','produk.id=detail.id', 'user.id=order.id', 'pembayaran.id_order=order.id_order');
           
             $data['super_keluhan'] = $this->Crud_m->join3('keluhan','user','survei','user.id=keluhan.id','survei.id_survei=keluhan.id_survei')->num_rows();
             $data['super_laporan'] = $this->Crud_m->join5('detail','order','produk', 'user', 'pembayaran', 'detail.id_order=order.id_order','produk.id=detail.id', 'user.id=order.id', 'pembayaran.id_order=order.id_order')->num_rows();
             $data['super_apesan'] = $this->Crud_m->join_where('order', 'user','order.status_all', 'order.id=user.id', 'sudah')->num_rows();
             $data['super_jasapus'] = $this->Crud_m->selectPustaka()->num_rows();
             $data['super_alatlab'] = $this->Crud_m->selectJasaAlat()->num_rows();
           $data['super_jasalab'] = $this->Crud_m->selectJasaLab()->num_rows();
            $data['super_pesan'] = $this->Crud_m->join_where_pesan('order','user','order.status_pemesanan','order.status_all','order.id=user.id','sukses','')->num_rows();
             $data['super_user'] = $this->Crud_m->selectSemua($this->table_sumber)->num_rows(); 
            
			$this->load->view('super_admin/laporan_view', $data);
		}
        
//        function pdf(){
//			$data['laporan'] = $this->Crud_m->join5('detail','order','produk', 'user', 'pembayaran', 'detail.id_order=order.id_order','produk.id=detail.id', 'user.id=order.id', 'pembayaran.id_order=order.id_order');
//            $this->load->view('super_admin/pdf_view', $data);
//        }
        
        function downloadexcell(){
			$data['laporan'] = $this->Crud_m->join5('detail','order','produk', 'user', 'pembayaran', 'detail.id_order=order.id_order','produk.id=detail.id', 'user.id=order.id', 'pembayaran.id_order=order.id_order');
            $this->load->view('super_admin/excel_view', $data);
           
        }
	}

?>