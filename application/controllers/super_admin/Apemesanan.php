<?php
	class Apemesanan extends CI_Controller{
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
                          'aktif81'=>'active-menu',
                          'aktif9'=>'',
                          'aktif11'=>'',
                          'aktif10'=>'',
                         'footer'=>$footer->footer,
                         'upload_video'=>$video->upload_video,
                         'header'=>$header->header);
           $data['menunya'] = $this->Crud_m->join_where('order', 'user','order.status_all', 'order.id=user.id', 'sudah');
          
             $data['super_keluhan'] = $this->Crud_m->join3('keluhan','user','survei','user.id=keluhan.id','survei.id_survei=keluhan.id_survei')->num_rows();
             $data['super_laporan'] = $this->Crud_m->join5('detail','order','produk', 'user', 'pembayaran', 'detail.id_order=order.id_order','produk.id=detail.id', 'user.id=order.id', 'pembayaran.id_order=order.id_order')->num_rows();
             $data['super_apesan'] = $this->Crud_m->join_where('order', 'user','order.status_all', 'order.id=user.id', 'sudah')->num_rows();
             $data['super_jasapus'] = $this->Crud_m->selectPustaka()->num_rows();
             $data['super_alatlab'] = $this->Crud_m->selectJasaAlat()->num_rows();
           $data['super_jasalab'] = $this->Crud_m->selectJasaLab()->num_rows();
            $data['super_pesan'] = $this->Crud_m->join_where_pesan('order','user','order.status_pemesanan','order.status_all','order.id=user.id','sukses','')->num_rows();
             $data['super_user'] = $this->Crud_m->selectSemua($this->table_sumber)->num_rows(); 
            
			$this->load->view('super_admin/arsip_pemesanan_v', $data);
		}
		 public function detail($id){
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
                          'aktif81'=>'active-menu',
                          'aktif9'=>'',
                          'aktif11'=>'',
                          'id'=>$id,
                          'aktif10'=>'',
                         'footer'=>$footer->footer,
                         'upload_video'=>$video->upload_video,
                         'header'=>$header->header);
             $data['menunya'] = $this->Crud_m->join('detail', 'produk', 'detail.id=produk.id');
             $data['produk'] = $this->Crud_m->selectProduk1($id);
             
              $data['super_keluhan'] = $this->Crud_m->join3('keluhan','user','survei','user.id=keluhan.id','survei.id_survei=keluhan.id_survei')->num_rows();
             $data['super_laporan'] = $this->Crud_m->join5('detail','order','produk', 'user', 'pembayaran', 'detail.id_order=order.id_order','produk.id=detail.id', 'user.id=order.id', 'pembayaran.id_order=order.id_order')->num_rows();
             $data['super_apesan'] = $this->Crud_m->join_where('order', 'user','order.status_all', 'order.id=user.id', 'sudah')->num_rows();
             $data['super_jasapus'] = $this->Crud_m->selectPustaka()->num_rows();
             $data['super_alatlab'] = $this->Crud_m->selectJasaAlat()->num_rows();
           $data['super_jasalab'] = $this->Crud_m->selectJasaLab()->num_rows();
            $data['super_pesan'] = $this->Crud_m->join_where_pesan('order','user','order.status_pemesanan','order.status_all','order.id=user.id','sukses','')->num_rows();
              $data['super_user'] = $this->Crud_m->selectSemua($this->table_sumber)->num_rows(); 
             
			$this->load->view('super_admin/detail_arsip', $data);
         }
        
         public function validasi($id){
            $data=array('status_persetujuan'=>$this->input->post('status'));
             $this->Crud_m->update_data('detail', $data, 'id_detail='.$id);
             $cek=$this->Crud_m->selectX('detail', 'id_detail='.$id)->row();
             $id_order=$cek->id_order;
             $byk=$this->Crud_m->selectX('detail', 'id_order='. $id_order);
             if($byk->num_rows()==1){
                 
                  date_default_timezone_set('Asia/Jakarta');
                     if(date("w")=="3" or date("w")=="4" or date("w")=="5"){
                         //rabu, kamis, jumat
                         $now = strtotime(date("Y-m-d H:i:s"));
                    $data=array( "tanggal_berakhir"=> date('Y-m-d 16:00:00', strtotime('+5 day', $now)));
                          $where=array('id_order'=>$id_order);
                    $this->Crud_m->update_data('pembayaran', $data, $where);
                          $data=array('status_all'=>'sudah');
                 $where=array('id_order'=>$id_order);
                 $this->Crud_m->update_data('order', $data, $where);
                     
                      // mengirimkan email ke customer
 $pay=$this->Crud_m->selectX('pembayaran', $where);
                $p=$pay->result();
                $tempo=$p[0]->tanggal_berakhir;
                
 $msg    = '<P> Dear Customer</p>';
        $msg    .='<p> Please complete your payment before '.$tempo.'</p>';
        $msg    .='<p>Your order ID :jghg</p>';
        $msg    .='<p><a href="'.site_url().'/login">Login & Check Order Details Online</a></p>';
        $msg    .='<p> Thank You<br />InaCC-LIPI</p>';
        $subject = "Thank you for your order @ InaCC Catalogue Online";
 $this->load->library('email');
 $this->email->from('sispromotor@gmail.com');
 $this->email->to($email);
 $this->email->subject($subject);
 $this->email->message($msg); 
 $this->email->send();
                     }else{
                         $now = strtotime(date("Y-m-d H:i:s"));
                    $data=array( "tanggal_berakhir"=> date('Y-m-d 16:00:00', strtotime('+3 day', $now)),
                               'status'=>'proses');
                         $where=array('id_order'=>$id_order);
                    $this->Crud_m->update_data('pembayaran', $data, $where);
                     
                      // mengirimkan email ke customer
 $pay=$this->Crud_m->selectX('pembayaran', $where);
                $p=$pay->result();
                $tempo=$p[0]->jatuh_tempo;
               
                         
                          $user_id=$this->Crud_m->join_where('pesanan', 'user', 'pesanan.id_user', 'pesanan.id_user=user.id_user', $this->input->post('id_pesan'));
                          $u=$user_id->result();
                          $email=$u[0]->email_user;
                          $nama=$u[0]->nama_user;
                          $kode_order=$u[0]->kode_order;
                         
 $msg    = '<P> Dear '. $nama.'</p>';
        $msg    .='<p> Please complete your payment before '.$tempo.'</p>';
        $msg    .='<p>Your order ID :'.$kode_order.'</p>';
        $msg    .='<p><a href="'.site_url().'/login">Login & Check Order Details Online</a></p>';
        $msg    .='<p> Thank You<br />InaCC-LIPI</p>';
        $subject = "Thank you for your order @ InaCC Catalogue Online";
 $this->load->library('email');
 $this->email->from('inacc@mail.lipi.go.id');
 $this->email->to($email);
 $this->email->subject($subject);
 $this->email->message($msg); 
 $this->email->send();
                     }
                
             }else{
                 $i=0; 
                 foreach($byk->result() as $b){
                     if($b->status_persetujuan!=""){
                         $i++;
                     }
                 }
                 if($i==$byk->num_rows()){
                      $now = strtotime(date("Y-m-d H:i:s"));
                    $data=array( "tanggal_berakhir"=> date('Y-m-d 16:00:00', strtotime('+3 day', $now)),
                               'status'=>'proses');
                         $where=array('id_order'=>$id_order);
                    $this->Crud_m->update_data('pembayaran', $data, $where);
                     $data=array('status_all'=>'sudah');
                 $where=array('id_order'=>$id_order);
                 $this->Crud_m->update_data('order', $data, $where);
                 }
             }
            redirect('super_admin/Pemesanan');
        }
	
	}

?>