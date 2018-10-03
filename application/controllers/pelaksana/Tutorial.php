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
            $video=$this->Crud_m->selectX('tutorial', 'id_tutorial=4')->row();
           $data = array( 'aktif1'=>'',
                          'aktif2'=>'',
                          'aktif21'=>'',
                          'aktif3'=>'active-menu',
                         'footer'=>$footer->footer,
                         'upload_video'=>$video->upload_video,
                         'header'=>$header->header);
            
             $data['pel_apesan'] = $this->db->query("SELECT * FROM `order` join user on user.id=order.id join pengiriman on pengiriman.id_order=order.id_order where status_all2!=''")->num_rows();
             $data['pel_pesan'] = $this->db->query("SELECT * FROM `order` join user on user.id=`order`.id join pengiriman on pengiriman.id_order=`order`.id_order join pembayaran on pembayaran.id_order=`order`.id_order JOIN detail on detail.id_order=`order`.`id_order` join produk on produk.id=detail.id where (produk.kategori!='Pustaka' and status_all2='' and pembayaran.status='Valid' and pengiriman.no_resi!='') or (produk.kategori='Pustaka' and status_all2='' and pembayaran.status='Valid') GROUP by `order`.`kode_order` order by `order`.id_order desc ")->num_rows();
            
			$this->load->view('pelaksana/tutor1_view', $data);
		}
		
	
	}

?>