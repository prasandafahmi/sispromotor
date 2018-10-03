<?php
	class Aresult extends CI_Controller{
        //properti
        public $table_sumber;
		public function __construct(){
			parent::__construct();
			$this->load->model('super_admin/Crud_m');
            $this->table_sumber = 'order'; //nama tabel database
		}      
		public function index(){
            $footer=$this->Crud_m->selectX('tampilan', 'id_tampilan=1')->row();
            $header=$this->Crud_m->selectX('tampilan', 'id_tampilan=1')->row();
            $video=$this->Crud_m->selectX('tutorial', 'id_tutorial=4')->row();
           $data = array( 'aktif1'=>'',
                          'aktif2'=>'',
                          'aktif21'=>'active-menu',
                          'aktif3'=>'',
                         'footer'=>$footer->footer,
                         'upload_video'=>$video->upload_video,
                         'header'=>$header->header);
//           $data['menunya'] = $this->Crud_m->pembayaran();
            $data['menunya'] = $this->db->query("SELECT * FROM `order` join user on user.id=order.id join pengiriman on pengiriman.id_order=order.id_order where status_all2!=''");
           
             $data['pel_apesan'] = $this->db->query("SELECT * FROM `order` join user on user.id=order.id join pengiriman on pengiriman.id_order=order.id_order where status_all2!=''")->num_rows();
             $data['pel_pesan'] = $this->db->query("SELECT * FROM `order` join user on user.id=`order`.id join pengiriman on pengiriman.id_order=`order`.id_order join pembayaran on pembayaran.id_order=`order`.id_order JOIN detail on detail.id_order=`order`.`id_order` join produk on produk.id=detail.id where (produk.kategori!='Pustaka' and status_all2='' and pembayaran.status='Valid' and pengiriman.no_resi!='') or (produk.kategori='Pustaka' and status_all2='' and pembayaran.status='Valid') GROUP by `order`.`kode_order` order by `order`.id_order desc ")->num_rows();
            
			$this->load->view('pelaksana/arsip_result_v', $data);
		}
		 public function detail($id){
             $footer=$this->Crud_m->selectX('tampilan', 'id_tampilan=1')->row();
            $header=$this->Crud_m->selectX('tampilan', 'id_tampilan=1')->row();
            $video=$this->Crud_m->selectX('tutorial', 'id_tutorial=4')->row();
            $data = array( 'aktif1'=>'',
                          'aktif2'=>'',
                          'aktif21'=>'active-menu',
                          'id'=>$id,
                          'aktif3'=>'',
                         'footer'=>$footer->footer,
                         'upload_video'=>$video->upload_video,
                         'header'=>$header->header);
           $data['menunya'] = $this->Crud_m->join3_where('order', 'user', 'detail','status_persetujuan', 'order.id=user.id','detail.id_order=order.id_order','Setuju');
             $data['produk'] = $this->Crud_m->selectProduk($id);
             
              $data['pel_apesan'] = $this->db->query("SELECT * FROM `order` join user on user.id=order.id join pengiriman on pengiriman.id_order=order.id_order where status_all2!=''")->num_rows();
             $data['pel_pesan'] = $this->db->query("SELECT * FROM `order` join user on user.id=`order`.id join pengiriman on pengiriman.id_order=`order`.id_order join pembayaran on pembayaran.id_order=`order`.id_order JOIN detail on detail.id_order=`order`.`id_order` join produk on produk.id=detail.id where (produk.kategori!='Pustaka' and status_all2='' and pembayaran.status='Valid' and pengiriman.no_resi!='') or (produk.kategori='Pustaka' and status_all2='' and pembayaran.status='Valid') GROUP by `order`.`kode_order` order by `order`.id_order desc ")->num_rows();
             
			$this->load->view('pelaksana/detail_arsip', $data);
         }
        
        function update_data(){
//            $image_name = "IMG".time();
			$config['upload_path']   = './assets/admin/hasil';
			$config['allowed_types'] = 'pdf|doc|docx';
			$config['max_size']      = '5048';
			$config['max_width']      = '5024';
			$config['max_height']      = '5024';
//			$config['file_name']     = $image_name;

		$this->upload->initialize($config);
			if($_FILES['result']['name']){
			if($this->upload->do_upload('result')){
                $gbr= $this->upload->data();
            $data=array('result'=>$gbr['file_name'],
                'status_pelaksana'=>'sukses');
                $id=$this->input->post('id');
            $this->Crud_m->update_data('detail', $data, 'id_detail='.$id);
            $where=array('id_detail'=>$id,
                        'status_persetujuan'=>'Setuju');    
             $cek=$this->Crud_m->selectX('detail', $where)->row();
             $id_order=$cek->id_order;
             $byk=$this->Crud_m->selectX('detail', 'id_order='. $id_order);
             if($byk->num_rows()==1){
                 $data=array('status_all2'=>'sudah');
                 $where=array('id_order'=>$id_order);
                 $this->Crud_m->update_data('order', $data, $where);
             }else{
                 $i=0; 
                 foreach($byk->result() as $b){
                     if($b->status_pelaksana!=""){
                         $i++;
                     }
                 }
                 if($i==$byk->num_rows()){
                     $data=array('status_all2'=>'sudah');
                 $where=array('id_order'=>$id_order);
                 $this->Crud_m->update_data('order', $data, $where);
                 }
             }
            redirect('pelaksana/Result');
        }
            }
        }
	}

?>