<?php
	class Pemesanan extends CI_Controller{
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
                          'aktif8'=>'active-menu',
                          'aktif81'=>'',
                          'aktif9'=>'',
                          'aktif11'=>'',
                          'aktif10'=>'',
                         'footer'=>$footer->footer,
                         'upload_video'=>$video->upload_video,
                         'header'=>$header->header);
           $data['menunya'] = $this->Crud_m->join_where_pesan('order','user','order.status_pemesanan','order.status_all','order.id=user.id','sukses','');
             
             $data['super_keluhan'] = $this->Crud_m->join3('keluhan','user','survei','user.id=keluhan.id','survei.id_survei=keluhan.id_survei')->num_rows();
             $data['super_laporan'] = $this->Crud_m->join5('detail','order','produk', 'user', 'pembayaran', 'detail.id_order=order.id_order','produk.id=detail.id', 'user.id=order.id', 'pembayaran.id_order=order.id_order')->num_rows();
             $data['super_apesan'] = $this->Crud_m->join_where('order', 'user','order.status_all', 'order.id=user.id', 'sudah')->num_rows();
             $data['super_jasapus'] = $this->Crud_m->selectPustaka()->num_rows();
             $data['super_alatlab'] = $this->Crud_m->selectJasaAlat()->num_rows();
           $data['super_jasalab'] = $this->Crud_m->selectJasaLab()->num_rows();
            $data['super_pesan'] = $this->Crud_m->join_where_pesan('order','user','order.status_pemesanan','order.status_all','order.id=user.id','sukses','')->num_rows();
             $data['super_user'] = $this->Crud_m->selectSemua($this->table_sumber)->num_rows(); 
            
			$this->load->view('super_admin/pemesanan_view', $data);
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
                          'aktif8'=>'active-menu',
                          'aktif81'=>'',
                          'aktif9'=>'',
                          'aktif11'=>'',
                          'id'=>$id,
                          'aktif10'=>'',
                         'footer'=>$footer->footer,
                         'upload_video'=>$video->upload_video,
                         'header'=>$header->header);
             $data['menunya'] = $this->Crud_m->join('detail', 'produk', 'detail.id=produk.id');
             $data['produk'] = $this->Crud_m->selectProduk1($id);
             //print_r($data['produk']);die();
             
              $data['super_keluhan'] = $this->Crud_m->join3('keluhan','user','survei','user.id=keluhan.id','survei.id_survei=keluhan.id_survei')->num_rows();
             $data['super_laporan'] = $this->Crud_m->join5('detail','order','produk', 'user', 'pembayaran', 'detail.id_order=order.id_order','produk.id=detail.id', 'user.id=order.id', 'pembayaran.id_order=order.id_order')->num_rows();
             $data['super_apesan'] = $this->Crud_m->join_where('order', 'user','order.status_all', 'order.id=user.id', 'sudah')->num_rows();
             $data['super_jasapus'] = $this->Crud_m->selectPustaka()->num_rows();
             $data['super_alatlab'] = $this->Crud_m->selectJasaAlat()->num_rows();
           $data['super_jasalab'] = $this->Crud_m->selectJasaLab()->num_rows();
            $data['super_pesan'] = $this->Crud_m->join_where_pesan('order','user','order.status_pemesanan','order.status_all','order.id=user.id','sukses','')->num_rows();
              $data['super_user'] = $this->Crud_m->selectSemua($this->table_sumber)->num_rows(); 
             
			$this->load->view('super_admin/detail_view', $data);
         }
       
         public function validasi(){
             $id=$this->input->post("id_detail");
             if($this->input->post('status')=="Tidak Setuju"){
                 $data=array('status_persetujuan'=>'Tidak Setuju',
                             'status_pelaksana'=>'gagal',
                             'status_akhir'=>'gagal',
                            'alasan'=>$this->input->post("alasan"));
             }else{
                  $data=array('status_persetujuan'=>$this->input->post('status'));
             }
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
                         if($this->input->post('status')=="Setuju"){
                              $data=array('status_all'=>'sudah');
                            
                         // mengirimkan email ke customer
                             $dmn=array('id_order'=>$id_order);
 $pay=$this->Crud_m->selectX('pembayaran', $dmn);
                $p=$pay->result();
                $tempo=$p[0]->tanggal_berakhir;
               

                          $user_id=$this->db->query("select * from `order` join `user` on `user`.id=`order`.id join detail on `detail`.id_order=`order`.id_order join produk on produk.id=detail.id where `order`.id_order=$id_order");
                          $u=$user_id->result();
                          $email=$u[0]->email;
                          $nama=$u[0]->nama;
                          $kode_order=$u[0]->kode_order;
                          $jenis=$u[0]->jenis;
                          $kategori=$u[0]->kategori;
                          $harga=$u[0]->harga;
                          $username=$u[0]->username;
 
 // mengirimkan email  
        require_once(APPPATH.'third_party/PHPMailer-master/PHPMailerAutoload.php');
        $mail = new PHPMailer();
        $destino =$email; //email tujuan
        $mail->AddAddress($destino, "Receiver");
        $mail->IsSMTP(); // we are going to use SMTP
        $mail->SMTPAuth   = true; // enabled SMTP authentication
        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
        $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
        $mail->Port       = 465;                   // SMTP port to connect to GMail
        $mail->Username   = "sispromotor@gmail.com";  // user email address
        $mail->Password   = "jasa1234";            // password in GMail
        $mail->SetFrom('sispromotor@gmail.com', 'SISPROMOTOR');  //email pengirim
        $mail->isHTML(true);
                               
        $msg    .='<p> Silahkan lengkapi proses pembayaran pesanan anda sebelum tanggal '.$tanggal_berakhir.'</p>';
        $msg    .='<p>Kode Order :'.$kode_order.'</p>';
        $msg     .='<br>Nama Sample/Kategori : '.$jenis.'/'.$kategori.' - '.$harga.' IDR';
        $msg    .='<p>Silahkan login sebagai '.$username.' di <a href="http://sispromotor.biologi.lipi.go.id/sispromotor/index.php/Login">SISPROMOTOR</a> untuk melihat detail pesanan anda</p>';
        $msg    .='<p> <p>Hormat Kami</p>
            <p>Bidang Mikrobiologi
            <br>Pusat Penelitian Biologi-LIPI</p></p>';
         $mail->Subject    = "SISPROMOTOR - Pemesanan Jasa";
        $mail->Body      = '
            <html>
            <head>
                <title>PEMBERITAHUAN</title>
            </head>
            <body>
                <h3>Kepada Yth <br> '.$nama.'</h3>
                '.$msg.'
            </body>
            </html>
        ';
        $mail->Send();
                //
                         }else{
                              $data=array('status_all'=>'gagal');
                             
                                         // mengirimkan email ke customer
                             $dmn=array('id_order'=>$id_order);
 $pay=$this->Crud_m->selectX('pembayaran', $dmn);
                $p=$pay->result();
                $tempo=$p[0]->tanggal_berakhir;
               

                          $user_id=$this->db->query("select * from `order` join `user` on `user`.id=`order`.id join detail on `detail`.id_order=`order`.id_order join produk on produk.id=detail.id where `order`.id_order=$id_order");
                          $u=$user_id->result();
                          $email=$u[0]->email;
                          $nama=$u[0]->nama;
                          $kode_order=$u[0]->kode_order;
                          $username=$u[0]->username;
                          $jenis=$u[0]->jenis;
                          $kategori=$u[0]->kategori;
                          $alasan=$u[0]->alasan;
 
 // mengirimkan email  
        require_once(APPPATH.'third_party/PHPMailer-master/PHPMailerAutoload.php');
        $mail = new PHPMailer();
        $destino =$email; //email tujuan
        $mail->AddAddress($destino, "Receiver");
        $mail->IsSMTP(); // we are going to use SMTP
        $mail->SMTPAuth   = true; // enabled SMTP authentication
        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
        $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
        $mail->Port       = 465;                   // SMTP port to connect to GMail
        $mail->Username   = "sispromotor@gmail.com";  // user email address
        $mail->Password   = "jasa1234";            // password in GMail
        $mail->SetFrom('sispromotor@gmail.com', 'SISPROMOTOR');  //email pengirim
        $mail->isHTML(true);
                               
        $msg    .='<p> Maaf pesanan jasa anda tidak disetujui</p>';
        $msg    .='<p>Kode Order :'.$kode_order.'</p>';
         $msg     .='<br>Nama Sample/Kategori : '.$jenis.'/'.$kategori.' - '.$alasan;
        $msg    .='<p>Untuk informasi lebih lanjut silahkan hubungi Email Email inacc@mail.lipi.go.id atau Telepon +62-21-8761356. Untuk detail pesanan silahkan login sebagai '.$username.' di <a href="http://sispromotor.biologi.lipi.go.id/sispromotor/index.php/Login">SISPROMOTOR</a> untuk melihat detail pesanan anda</p>';
        $msg    .='<p> <p>Hormat Kami</p>
            <p>Bidang Mikrobiologi
            <br>Pusat Penelitian Biologi-LIPI</p></p>';
         $mail->Subject    = "SISPROMOTOR - Pemesanan Jasa";
        $mail->Body      = '
            <html>
            <head>
                <title>PEMBERITAHUAN</title>
            </head>
            <body>
                <h3>Kepada Yth <br> '.$nama.'</h3>
                '.$msg.'
            </body>
            </html>
        ';
        $mail->Send();
                //
                         }
                         
                 $where=array('id_order'=>$id_order);
                 $this->Crud_m->update_data('order', $data, $where);
                     }else{
                         $now = strtotime(date("Y-m-d H:i:s"));
                    $data=array( "tanggal_berakhir"=> date('Y-m-d 16:00:00', strtotime('+3 day', $now)),
                               'status'=>'proses');
                         $where=array('id_order'=>$id_order);
                    $this->Crud_m->update_data('pembayaran', $data, $where);
                         if($this->input->post('status')=="Setuju"){
                              $data=array('status_all'=>'sudah');
                             
                                       // mengirimkan email ke customer
                             $dmn=array('id_order'=>$id_order);
 $pay=$this->Crud_m->selectX('pembayaran', $dmn);
                $p=$pay->result();
                $tempo=$p[0]->tanggal_berakhir;
               

                          $user_id=$this->db->query("select * from `order` join `user` on `user`.id=`order`.id join detail on `detail`.id_order=`order`.id_order join produk on produk.id=detail.id where `order`.id_order=$id_order");
                          $u=$user_id->result();
                          $email=$u[0]->email;
                          $nama=$u[0]->nama;
                          $kode_order=$u[0]->kode_order;
                          $kategori=$u[0]->kategori;
                          $jenis=$u[0]->jenis;
                          $harga=$u[0]->harga;
                          $username=$u[0]->username;
 
 // mengirimkan email  
        require_once(APPPATH.'third_party/PHPMailer-master/PHPMailerAutoload.php');
        $mail = new PHPMailer();
        $destino =$email; //email tujuan
        $mail->AddAddress($destino, "Receiver");
        $mail->IsSMTP(); // we are going to use SMTP
        $mail->SMTPAuth   = true; // enabled SMTP authentication
        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
        $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
        $mail->Port       = 465;                   // SMTP port to connect to GMail
        $mail->Username   = "sispromotor@gmail.com";  // user email address
        $mail->Password   = "jasa1234";            // password in GMail
        $mail->SetFrom('sispromotor@gmail.com', 'SISPROMOTOR');  //email pengirim
        $mail->isHTML(true);
                               
        $msg    .='<p> Silahkan lengkapi proses pembayaran pesanan anda sebelum tanggal '.$tanggal_berakhir.'</p>';
        $msg    .='<p>Kode Order :'.$kode_order.'</p>';
        $msg     .='<br>Nama Sample/Kategori : '.$jenis.'/'.$kategori.' - '.$harga.' IDR';
        $msg    .='<p>Silahkan login sebagai '.$username.' di <a href="http://sispromotor.biologi.lipi.go.id/sispromotor/index.php/Login">SISPROMOTOR</a> untuk melihat detail pesanan anda</p>';
        $msg    .='<p>Hormat Kami</p>
            <p>Bidang Mikrobiologi
            <br>Pusat Penelitian Biologi-LIPI</p>';
        $mail->Subject    = "SISPROMOTOR - Pemesanan Jasa";
        $mail->Body      = '
            <html>
            <head>
                <title>PEMBERITAHUAN</title>
            </head>
            <body>
                <h3>Kepada Yth <br> '.$nama.'</h3>
                '.$msg.'
            </body>
            </html>
        ';
        $mail->Send();
                //
                         }else{
                              $data=array('status_all'=>'gagal');
                             
                                                         // mengirimkan email ke customer
                             $dmn=array('id_order'=>$id_order);
 $pay=$this->Crud_m->selectX('pembayaran', $dmn);
                $p=$pay->result();
                $tempo=$p[0]->tanggal_berakhir;
               

                          $user_id=$this->db->query("select * from `order` join `user` on `user`.id=`order`.id join detail on `detail`.id_order=`order`.id_order join produk on produk.id=detail.id where `order`.id_order=$id_order");
                          $u=$user_id->result();
                          $email=$u[0]->email;
                          $nama=$u[0]->nama;
                          $kode_order=$u[0]->kode_order;
                          $alasan=$u[0]->alasan;
                          $username=$u[0]->username;
                          $jenis=$u[0]->jenis;
                          $kategori=$u[0]->kategori;
 
 // mengirimkan email  
        require_once(APPPATH.'third_party/PHPMailer-master/PHPMailerAutoload.php');
        $mail = new PHPMailer();
        $destino =$email; //email tujuan
        $mail->AddAddress($destino, "Receiver");
        $mail->IsSMTP(); // we are going to use SMTP
        $mail->SMTPAuth   = true; // enabled SMTP authentication
        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
        $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
        $mail->Port       = 465;                   // SMTP port to connect to GMail
        $mail->Username   = "sispromotor@gmail.com";  // user email address
        $mail->Password   = "jasa1234";            // password in GMail
        $mail->SetFrom('sispromotor@gmail.com', 'SISPROMOTOR');  //email pengirim
        $mail->isHTML(true);
                               
        $msg    .='<p> Maaf pesanan jasa anda tidak disetujui </p>';
        $msg    .='<p>Kode Order :'.$kode_order.'</p>';
        $msg     .='<br>Nama Sample/Kategori : '.$jenis.'/'.$kategori.' - '.$alasan;
        $msg    .='<p>Untuk informasi lebih lanjut silahkan hubungi Email Email inacc@mail.lipi.go.id atau Telepon +62-21-8761356. Untuk detail pesanan silahkan login sebagai '.$username.' di <a href="http://sispromotor.biologi.lipi.go.id/sispromotor/index.php/Login">SISPROMOTOR</a> untuk melihat detail pesanan anda</p>';
        $msg    .='<p>Hormat Kami</p>
            <p>Bidang Mikrobiologi
            <br>Pusat Penelitian Biologi-LIPI</p>';
         $mail->Subject    = "SISPROMOTOR - Pemesanan Jasa";
        $mail->Body      = '
            <html>
            <head>
                <title>PEMBERITAHUAN</title>
            </head>
            <body>
                <h3>Kepada Yth <br> '.$nama.'</h3>
                '.$msg.'
            </body>
            </html>
        ';
        $mail->Send();
                //
                         }
                         $where=array('id_order'=>$id_order);
                         $this->Crud_m->update_data('order',$data,$where);
                     
                        
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
                              // mengirimkan email ke customer
 $pay=$this->Crud_m->selectX('pembayaran', $where);
                $p=$pay->result();
                $tempo=$p[0]->tanggal_berakhir;
               

                          $user_id=$this->db->query("select * from `order` join `user` on `user`.id=`order`.id join detail on `detail`.id_order=`order`.id_order join produk on produk.id=detail.id where `order`.id_order=$id_order");
                          $u=$user_id->result();
                          $email=$u[0]->email;
                          $nama=$u[0]->nama;
                          $kode_order=$u[0]->kode_order;
                          $username=$u[0]->username;
                        $g=0;
                     foreach($user_id->result() as $u){
                         if($u->status_persetujuan=="Tidak Setuju"){
                             $g++;
                         }
                     }
                     
 // mengirimkan email  
        require_once(APPPATH.'third_party/PHPMailer-master/PHPMailerAutoload.php');
        $mail = new PHPMailer();
        $destino =$email; //email tujuan
        $mail->AddAddress($destino, "Receiver");
        $mail->IsSMTP(); // we are going to use SMTP
        $mail->SMTPAuth   = true; // enabled SMTP authentication
        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
        $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
        $mail->Port       = 465;                   // SMTP port to connect to GMail
        $mail->Username   = "sispromotor@gmail.com";  // user email address
        $mail->Password   = "jasa1234";            // password in GMail
        $mail->SetFrom('sispromotor@gmail.com', 'SISPROMOTOR');  //email pengirim
        $mail->isHTML(true);
        
        if($g==$user_id->num_rows()){
             $msg    .='<p> Mohon maaf pemesanan anda tidak disetujui. Berikut detail pesanan anda</p>';
        $msg    .='<p>Kode Order :'.$kode_order;
            foreach($user_id->result() as $u){
        $msg     .='<br>Nama Sample/Kategori : '.$u->jenis.'/'.$u->kategori.' - '.$u->alasan;
            }
        $msg    .='</p><p>Untuk informasi lebih lanjut silahkan hubungi Email Email inacc@mail.lipi.go.id atau Telepon +62-21-8761356. Untuk detail pesanan silahkan login sebagai '.$username.' di <a href="http://sispromotor.biologi.lipi.go.id/sispromotor/index.php/Login">SISPROMOTOR</a> untuk melihat detail pesanan anda</p>';
        $msg    .='<p>Hormat Kami</p>
            <p>Bidang Mikrobiologi
            <br>Pusat Penelitian Biologi-LIPI</p>';
        $mail->subject = "SISPROMOTOR - Pemesanan Jasa";
        $mail->Body      = '
            <html>
            <head>
                <title>PEMBERITAHUAN</title>
            </head>
            <body>
                <h3>Kepada Yth <br> '.$nama.'</h3>
                '.$msg.'
            </body>
            </html>
        ';
            
        }else{
            
        $msg    .='<p> Silahkan lengkapi proses pembayaran pesanan anda sebelum tanggal '.$tanggal_berakhir.'</p>';
        $msg    .='<p>Kode Order :'.$kode_order.'</p>';
        $total=0;
        foreach($user_id->result() as $u){
        $msg .='<br>Nama Sample/Kategori : '.$u->jenis.'/'.$u->kategori.' - '.$u->harga;
            $total+=$u->harga;
     }
            $msg .='<br><strong> Total Pembayaran : '.$total.' IDR</strong>';
        $msg .='<p>Silahkan login sebagai '.$username.' di <a href="http://sispromotor.biologi.lipi.go.id/sispromotor/index.php/Login">SISPROMOTOR</a> untuk melihat detail pesanan anda</p>';
        $msg    .='<p>Hormat Kami</p>
            <p>Bidang Mikrobiologi
            <br>Pusat Penelitian Biologi-LIPI</p>';
        $mail->Subject    = "SISPROMOTOR - Pemesanan Jasa";
        $mail->Body      = '
            <html>
            <head>
                <title>PEMBERITAHUAN</title>
            </head>
            <body>
                <h3>Kepada Yth <br> '.$nama.'</h3>
                '.$msg.'
            </body>
            </html>
        ';
        }
        $mail->Send();
                //
                 }
             }
            redirect('super_admin/Pemesanan');
        }
	
	}

?>