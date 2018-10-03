<?php
	class Result extends CI_Controller{
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
                          'aktif2'=>'active-menu',
                          'aktif21'=>'',
                          'aktif3'=>'',
                         'footer'=>$footer->footer,
                         'upload_video'=>$video->upload_video,
                         'header'=>$header->header);
//           $data['menunya'] = $this->Crud_m->pembayaran();
            $data['menunya'] = $this->db->query("SELECT * FROM `order` join user on user.id=`order`.id join pengiriman on pengiriman.id_order=`order`.id_order join pembayaran on pembayaran.id_order=`order`.id_order JOIN detail on detail.id_order=`order`.`id_order` join produk on produk.id=detail.id where (produk.kategori!='Pustaka' and status_all2='' and pembayaran.status='Valid' and pengiriman.no_resi!='') or (produk.kategori='Pustaka' and status_all2='' and pembayaran.status='Valid') GROUP by `order`.`kode_order` order by `order`.id_order desc ");
           
             $data['pel_apesan'] = $this->db->query("SELECT * FROM `order` join user on user.id=order.id join pengiriman on pengiriman.id_order=order.id_order where status_all2!=''")->num_rows();
             $data['pel_pesan'] = $this->db->query("SELECT * FROM `order` join user on user.id=`order`.id join pengiriman on pengiriman.id_order=`order`.id_order join pembayaran on pembayaran.id_order=`order`.id_order JOIN detail on detail.id_order=`order`.`id_order` join produk on produk.id=detail.id where (produk.kategori!='Pustaka' and status_all2='' and pembayaran.status='Valid' and pengiriman.no_resi!='') or (produk.kategori='Pustaka' and status_all2='' and pembayaran.status='Valid') GROUP by `order`.`kode_order` order by `order`.id_order desc ")->num_rows();
            
			$this->load->view('pelaksana/result_view', $data);
		}
		 public function detail($id){
             $footer=$this->Crud_m->selectX('tampilan', 'id_tampilan=1')->row();
            $header=$this->Crud_m->selectX('tampilan', 'id_tampilan=1')->row();
            $video=$this->Crud_m->selectX('tutorial', 'id_tutorial=4')->row();
            $data = array( 'aktif1'=>'',
                          'aktif2'=>'active-menu',
                          'aktif21'=>'',
                          'id'=>$id,
                          'aktif3'=>'',
                         'footer'=>$footer->footer,
                         'upload_video'=>$video->upload_video,
                         'header'=>$header->header);
           $data['menunya'] = $this->Crud_m->join3_where('order', 'user', 'detail','status_persetujuan', 'order.id=user.id','detail.id_order=order.id_order','Setuju');
             $data['produk'] = $this->Crud_m->selectProduk($id);
             
              $data['pel_apesan'] = $this->db->query("SELECT * FROM `order` join user on user.id=order.id join pengiriman on pengiriman.id_order=order.id_order where status_all2!=''")->num_rows();
             $data['pel_pesan'] = $this->db->query("SELECT * FROM `order` join user on user.id=`order`.id join pengiriman on pengiriman.id_order=`order`.id_order join pembayaran on pembayaran.id_order=`order`.id_order JOIN detail on detail.id_order=`order`.`id_order` join produk on produk.id=detail.id where (produk.kategori!='Pustaka' and status_all2='' and pembayaran.status='Valid' and pengiriman.no_resi!='') or (produk.kategori='Pustaka' and status_all2='' and pembayaran.status='Valid') GROUP by `order`.`kode_order` order by `order`.id_order desc ")->num_rows();
             
			$this->load->view('pelaksana/detail_view', $data);
         }
        
        function update_data(){
            $image_name = "HSL".time();
			$config['upload_path']   = './assets/admin/hasil';
			$config['allowed_types'] = 'pdf|doc|docx';
			$config['max_size']      = '500000';
			$config['max_width']      = '5024';
			$config['max_height']      = '5024';
			$config['file_name']     = $image_name;

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
                  $temp=$this->db->query("select * From `order` join user on `order`.id=user.id where `order`.id_order=".$id_order)->row();
                     $username= $temp->username;
                     $nama= $temp->nama;
                     $email= $temp->email;
                     $kode_order= $temp->kode_order;
                      // mengirimkan email  
        require_once(APPPATH.'third_party/PHPMailer-master/PHPMailerAutoload.php');
        $mail = new PHPMailer();
        $destino = $email; //email tujuan
        $mail->AddAddress($destino, "Receiver");
        $mail->IsSMTP(); // we are going to use SMTP
        $mail->SMTPAuth   = true; // enabled SMTP authentication
        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
        $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
        $mail->Port       = 465;                   // SMTP port to connect to GMail
        $mail->Username   = "sispromotor@gmail.com";  // user email address
        $mail->Password   = "jasa1234";            // password in GMail
        $mail->SetFrom('sispromotor@gmail.com', 'Mail');  //email pengirim
        $mail->isHTML(true);
        $mail->Subject    = "SISPROMOTOR - Pemesanan Jasa";
        $mail->Body      = '
            <html>
            <head>
                <title>Pemberitahuan</title>
            </head>
            <body>
                <p>Kepada Yth <br>'.$nama.'</p>
                <p>Hasil pemesanan jasa Kode Order : '.$kode_order.' telah tersedia di web SISPROMOTOR. Silahkan login sebagai '.$username.' di <a href="http://sispromotor.biologi.lipi.go.id/sispromotor/index.php/login" >SISPROMOTOR</a> untuk melihat detail pesanan anda</p><br>
            <p></p>
            <p></p>
            </body>
            <p>Hormat Kami</p>
            <p>Bidang Mikrobiologi
            <br>Pusat Penelitian Biologi-LIPI</p>
            </html>
        ';
        $mail->Send();
                 
                  $mail = new PHPMailer();
        $destino = "inacc@mail.lipi.go.id"; //email tujuan
        $mail->AddAddress($destino, "Receiver");
        $mail->IsSMTP(); // we are going to use SMTP
        $mail->SMTPAuth   = true; // enabled SMTP authentication
        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
        $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
        $mail->Port       = 465;                   // SMTP port to connect to GMail
        $mail->Username   = "sispromotor@gmail.com";  // user email address
        $mail->Password   = "jasa1234";            // password in GMail
        $mail->SetFrom('sispromotor@gmail.com', 'Mail');  //email pengirim
        $mail->isHTML(true);
        $mail->Subject    = "SISPROMOTOR - Pemesanan Jasa";
        $mail->Body      = '
            <html>
            <head>
                <title>Pemberitahuan</title>
            </head>
            <body>
                <p>Kepada Yth <br> Admin</p>
                <p>Hasil pemesanan jasa Kode Order : '.$kode_order.' telah tersedia di web SISPROMOTOR. Silahkan login sebagai admin di <a href="http://sispromotor.biologi.lipi.go.id/sispromotor/index.php/admin/login" >SISPROMOTOR</a> untuk melengkapi surat bidang</p><br>
            <p></p>
            <p></p>
            </body>
            <p>Hormat Kami</p>
            <p>Bidang Mikrobiologi
            <br>Pusat Penelitian Biologi-LIPI</p>
            </html>
        ';
        $mail->Send();
                //
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
                     $temp=$this->db->query("select * From `order` join user on `order`.id=user.id where `order`.id_order=".$id_order)->row();
                     $username= $temp->username;
                     $nama= $temp->nama;
                     $email= $temp->email;
                     $kode_order= $temp->kode_order;
                      // mengirimkan email  
        require_once(APPPATH.'third_party/PHPMailer-master/PHPMailerAutoload.php');
        $mail = new PHPMailer();
        $destino = $email; //email tujuan
        $mail->AddAddress($destino, "Receiver");
        $mail->IsSMTP(); // we are going to use SMTP
        $mail->SMTPAuth   = true; // enabled SMTP authentication
        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
        $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
        $mail->Port       = 465;                   // SMTP port to connect to GMail
        $mail->Username   = "sispromotor@gmail.com";  // user email address
        $mail->Password   = "jasa1234";            // password in GMail
        $mail->SetFrom('sispromotor@gmail.com', 'Mail');  //email pengirim
        $mail->isHTML(true);
        $mail->Subject    = "SISPROMOTOR - Pemesanan Jasa";
        $mail->Body      = '
            <html>
            <head>
                <title>Pemberitahuan</title>
            </head>
            <body>
                <p>Kepada Yth <br> '.$nama.'</p>
                <p>Hasil pemesanan jasa Kode Order : '.$kode_order.' telah tersedia di web SISPROMOTOR. Silahkan login sebagai '.$username.' di <a href="http://sispromotor.biologi.lipi.go.id/sispromotor/index.php/login" >SISPROMOTOR</a> untuk melihat detail pesanan anda</p><br>
            <p></p>
            <p></p>
            </body>
            <p>Hormat Kami</p>
            <p>Bidang Mikrobiologi
            <br>Pusat Penelitian Biologi-LIPI</p>
            </html>
        ';
        $mail->Send();
                //
        
                 $mail = new PHPMailer();
        $destino = "inacc@mail.lipi.go.id"; //email tujuan
        $mail->AddAddress($destino, "Receiver");
        $mail->IsSMTP(); // we are going to use SMTP
        $mail->SMTPAuth   = true; // enabled SMTP authentication
        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
        $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
        $mail->Port       = 465;                   // SMTP port to connect to GMail
        $mail->Username   = "sispromotor@gmail.com";  // user email address
        $mail->Password   = "jasa1234";            // password in GMail
        $mail->SetFrom('sispromotor@gmail.com', 'Mail');  //email pengirim
        $mail->isHTML(true);
        $mail->Subject    = "SISPROMOTOR - Pemesanan Jasa";
        $mail->Body      = '
            <html>
            <head>
                <title>Pemberitahuan</title>
            </head>
            <body>
                <p>Kepada Yth <br> Admin</p>
                <p>Hasil pemesanan jasa Kode Order : '.$kode_order.' telah tersedia di web SISPROMOTOR. Silahkan login sebagai admin di <a href="http://sispromotor.biologi.lipi.go.id/sispromotor/index.php/admin/login" >SISPROMOTOR</a> untuk melengkapi surat bidang</p><br>
            <p></p>
            <p></p>
            </body>
            <p>Hormat Kami</p>
            <p>Bidang Mikrobiologi
            <br>Pusat Penelitian Biologi-LIPI</p>
            </html>
        ';
        $mail->Send();
                //
                 }
             }
               
            redirect('pelaksana/Result');
        }
            }
        }
	}

?>