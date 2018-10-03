<?php
	class Verifikasi extends CI_Controller{
        //properti
        public $table_sumber;
		public function __construct(){
			parent::__construct();
			$this->load->model('super_admin/Crud_m');
            $this->table_sumber = 'pembayaran'; //nama tabel database
            $this->load->helper('download');
		}      
		public function index(){
            $footer=$this->Crud_m->selectX('tampilan', 'id_tampilan=1')->row();
            $header=$this->Crud_m->selectX('tampilan', 'id_tampilan=1')->row();
            $video=$this->Crud_m->selectX('tutorial', 'id_tutorial=3')->row();
             $data=array('aktif1'=>'',
                          'aktif2'=>'active-menu',
                          'aktif21'=>'',
                          'aktif3'=>'',
                         'footer'=>$footer->footer,
                         'upload_video'=>$video->upload_video,
                         'header'=>$header->header);
             $where = array('status'=>'proses');
           $data['menunya']=$this->Crud_m->verifikasi();
          
             $data['ben_averif']=$this->Crud_m->verifikasi_where()->num_rows();
             $data['ben_verif']=$this->Crud_m->verifikasi()->num_rows();
            
           $this->load->view('bendahara/verifikasi_view', $data);
		}
        public function detail($id){
            $footer=$this->Crud_m->selectX('tampilan', 'id_tampilan=1')->row();
            $header=$this->Crud_m->selectX('tampilan', 'id_tampilan=1')->row();
            $video=$this->Crud_m->selectX('tutorial', 'id_tutorial=3')->row();
         if ($this->session->userdata('u')) {
             $data=array('aktif1'=>'',
                          'aktif2'=>'active-menu',
                          'aktif21'=>'',
                          'aktif3'=>'',
                         'footer'=>$footer->footer,
                         'upload_video'=>$video->upload_video,
                         'header'=>$header->header);
               $data['menunya']=$this->Crud_m->detailbayar($id);
             
              $data['ben_averif']=$this->Crud_m->verifikasi_where()->num_rows();
             $data['ben_verif']=$this->Crud_m->verifikasi()->num_rows();
             
               $this->load->view('bendahara/detail_view', $data);
         }else{
             redirect("admin/Login");
         }
        }
        
         public function update_bayar($id){
            $data=array('status'=>$this->input->post('status'));
               $this->Crud_m->update_data('pembayaran', $data, 'id_bayar='.$id);
             if($this->input->post("status")=="Valid"){
                
                 $temp=$this->db->query("select * from pembayaran join `order` on `order`.id_order=pembayaran.id_order join user on `order`.id=user.id where pembayaran.id_bayar=".$id)->row();
             $email=$temp->email;
             $kode_order=$temp->kode_order;
             $username=$temp->username;
             $nama=$temp->nama;
             $id=$temp->id_order;
              if($_POST['bayar_or_no']=="Gratis"){
                     $this->free($id);
                 }
             require_once(APPPATH.'third_party/PHPMailer-master/PHPMailerAutoload.php');
        $mail = new PHPMailer();
             
        $mail->AddAddress($email, "Receiver");
        $mail->IsSMTP(); // we are going to use SMTP
        $mail->SMTPAuth   = true; // enabled SMTP authentication
        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
        $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
        $mail->Port       = 465;                   // SMTP port to connect to GMail
        $mail->Username   = "sispromotor@gmail.com";  // user email address
        $mail->Password   = "jasa1234";            // password in GMail
        $mail->SetFrom('sispromotor@gmail.com', 'SISPROMOTOR');  //Who is sending 
        $mail->isHTML(true);
        $mail->Subject    = "SISPROMOTOR - Pemesanan Jasa";
        
        $x=$this->db->query("select * from `order` join detail on detail.id_order = `order`.id_order join produk on produk.id=detail.id where detail.id_order=".$id);
        $dll=0;$pus=0;
        foreach($x->result() as $y){
            if($y->kategori=="Pustaka"){
                $pus++;
            }else{
                $dll++;
            }
        }
        if($pus>0 && $dll>0){
             $mail->Body      = '
            <html>
            <head>
                <title>PEMESANAN JASA PUSLIT BIOLOGI - LIPI</title>
            </head>
            <body>
            <p>Kepada Yth <br> '.$nama.'<br>, Terimakasih telah melakukan pembayaran pada Kode Order : '.$kode_order.'. Pembayaran telah diverifikasi. Silahkan melakukan pengiriman sample dengan login sebagai '.$username.' di <a href="http://sispromotor.biologi.lipi.go.id/sispromotor/index.php/login">SISPROMOTOR</a> untuk melihat detail pesanan anda.</p><br>
            </body>
              <p>Hormat Kami</p>
            <p>Bidang Mikrobiologi
            <br>Pusat Penelitian Biologi-LIPI</p>
            
            </html>
        ';
            
        }else if($pus>0){
            $mail->Body      = '
            <html>
            <head>
                <title>PEMESANAN JASA PUSLIT BIOLOGI - LIPI</title>
            </head>
            <body>
            <p>Kepada Yth <br> '.$nama.'<br>, Terimakasih telah melakukan pembayaran pada Kode Order : '.$kode_order.'. Pembayaran telah diverifikasi. Silahkan melakukan pengiriman sample dengan login sebagai '.$username.' di <a href="http://sispromotor.biologi.lipi.go.id/sispromotor/index.php/login">SISPROMOTOR</a> untuk melihat detail pesanan anda.</p><br>
            </body>
              <p>Hormat Kami</p>
            <p>Bidang Mikrobiologi
            <br>Pusat Penelitian Biologi-LIPI</p>
            
            </html>
        ';
            
        }else if($dll>0){
            $mail->Body      = '
            <html>
            <head>
                <title>PEMESANAN JASA PUSLIT BIOLOGI - LIPI</title>
            </head>
            <body>
            <p>Kepada Yth <br> '.$nama.'<br>, Terimakasih telah melakukan pembayaran pada Kode Order : '.$kode_order.'. Pembayaran telah diverifikasi. Silahkan melakukan pengiriman sample dengan login sebagai '.$username.' di <a href="http://sispromotor.biologi.lipi.go.id/sispromotor/index.php/login">SISPROMOTOR</a> untuk menginputkan No. Resi Pengiriman Sample anda.</p><br>
             </body>
             <p>Hormat Kami</p>
            <p>Bidang Mikrobiologi
            <br>Pusat Penelitian Biologi-LIPI</p>
           
            </html>
        ';
        }
        
       
        $mail->Send();
                //
                  
             }else{
                     $temp=$this->db->query("select * from pembayaran join `order` on `order`.id_order=pembayaran.id_order join user on `order`.id=user.id where pembayaran.id_bayar=".$id)->row();
             $email=$temp->email;
             $kode_order=$temp->kode_order;
             $username=$temp->username;
             $nama=$temp->nama;
             
             require_once(APPPATH.'third_party/PHPMailer-master/PHPMailerAutoload.php');
        $mail = new PHPMailer();
             
        $mail->AddAddress($email, "Receiver");
        $mail->IsSMTP(); // we are going to use SMTP
        $mail->SMTPAuth   = true; // enabled SMTP authentication
        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
        $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
        $mail->Port       = 465;                   // SMTP port to connect to GMail
        $mail->Username   = "sispromotor@gmail.com";  // user email address
        $mail->Password   = "jasa1234";            // password in GMail
        $mail->SetFrom('sispromotor@gmail.com', 'SISPROMOTOR');  //Who is sending 
        $mail->isHTML(true);
        $mail->Subject    = "SISPROMOTOR - Pemesanan Jasa";
        $mail->Body      = '
            <html>
            <head>
                <title>PEMESANAN JASA PUSLIT BIOLOGI - LIPI</title>
            </head>
            <body>
            <p>Kepada Yth <br> '.$nama.'<br>, data bukti pembayaran anda tidak valid. Untuk informasi lebih lanjut silahkan hubungi Email inacc@mail.lipi.go.id atau Telepon +62-21-8761356 untuk melakukan konfirmasi jika anda mengulangi proses pembayaran pesanan anda. Silahkan login sebagai '.$username.' di <a href="http://sispromotor.biologi.lipi.go.id/sispromotor/index.php/login">SISPROMOTOR</a> untuk melihat detail pesanan anda.</p><br>
            </body>
              <p>Hormat Kami</p>
            <p>Bidang Mikrobiologi
            <br>Pusat Penelitian Biologi-LIPI</p>
            
            </html>
        ';
       
        $mail->Send();
                //
             }
            
         redirect('bendahara/Verifikasi');
       
        }
        
       
        public function download_bukti($id){
        $where = array('id_order'=>$id);
        $fileinfo = $this->Crud_m->selectX('pembayaran', $where)->result();
        $file = 'assets/admin/bukti/'.$fileinfo[0]->bukti_transfer;
        force_download($file, NULL);
    }
        
       public function free($id){
             $where=array('id_order'=>$id);
            $data2=array('status'=>'Valid');
            $this->Crud_m->update_data('pembayaran',$data2, $where);
             $dataku=array('harga'=>'0');
            $this->Crud_m->update_data('detail',$dataku, $where);
            $row=$this->Crud_m->selectX('pembayaran',$where)->row();
            
       }
	}

?>