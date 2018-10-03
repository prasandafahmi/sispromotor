<?php
	class Pemesanan2 extends CI_Controller{
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
            $video=$this->Crud_m->selectX('tutorial', 'id_tutorial=2')->row();
           $data = array( 'aktif1'=>'',
                          'aktif2'=>'active-menu',
                          'aktif21'=>'',
                          'aktif3'=>'',
                          'aktif4'=>'',
                          'aktif5'=>'',
                         'footer'=>$footer->footer,
                         'upload_video'=>$video->upload_video,
                         'header'=>$header->header);
           
           $data['menunya'] = $this->Crud_m->selectmenu();
            
             $data['admin_rhasil'] = $this->Crud_m->result_AdministrasiJ_riwayat()->num_rows();
             $data['admin_pesan'] = $this->Crud_m->selectmenu()->num_rows();
              $data['admin_arsip'] = $this->Crud_m->join_where('order', 'user', 'order.status_pemesanan','order.id=user.id','sukses')->num_rows();
             $data['admin_hasil'] = $this->Crud_m->result_AdministrasiJ()->num_rows();
			$this->load->view('administrasi/pemesanan2_view', $data);
		}
        
        public function validasi(){
            $datadetail = array(
			"pelaksana"=>$this->input->post('f1'));
           
            $byk=$this->Crud_m->selectX('detail', 'id_order='. $this->input->post('id_order'));
             if($byk->num_rows()==1){
                 $data=array('status_pemesanan'=>'sukses');
                 $where=array('id_order'=>$this->input->post('id_order'));
                 $this->Crud_m->update_data('order', $data, $where);
                 $this->Crud_m->update_data('detail',$datadetail,'id_detail='.$this->input->post('id_detail'));
                 // mengirimkan email  
        require_once(APPPATH.'third_party/PHPMailer-master/PHPMailerAutoload.php');
        $mail = new PHPMailer();
        $destino = "inacc@mail.lipi.go.id"; //email tujuan
        $mail->AddAddress($destino, "Receiver");
        // $destino1 = "inacc@mail.lipi.go.id"; //email tujuan
        // $mail->AddCC($destino1, 'Receiver');
        // $destino3 = "trilisty01@gmail.com"; //email tujuan
        // $mail->AddCC($destino3, "Receiver");
        // $destino4 = "nsuharna@yahoo.com";
        // $mail->AddCC($destino4, "Receiver");
        $mail->IsSMTP(); // we are going to use SMTP
        $mail->SMTPAuth   = true; // enabled SMTP authentication
        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
        $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
        $mail->Port       = 465;                   // SMTP port to connect to GMail
        $mail->Username   = "sispromotor@gmail.com";  // user email address
        $mail->Password   = "jasa1234";            // password in GMail
        $mail->SetFrom('sispromotor@gmail.com', 'SISPROMOTOR');  //email pengirim
        $mail->isHTML(true);
        $mail->Subject    = "SISPROMOTOR";
        $mail->Body      = '
            <html>
            <head>
                <title>PEMESANAN JASA PUSLIT BIOLOGI - LIPI</title>
            </head>
            <body>
            <p>Dear Super Admin, Terdapat pesanan jasa baru yang harus anda verifikasi. Silahkan login sebagai Super admin di <a href="http://sispromotor.biologi.lipi.go.id/sispromotor/index.php/admin/login"> SISPROMOTOR </a> untuk memeriksa pesanan. </p><br>
            <p>Terimakasih</p>
            
            </body>
            </html>
        ';
        $mail->Send();
//                //
             }else{
                 $i=0; 
                 foreach($byk->result() as $b){
                     if($b->pelaksana!=""){
                         $i++;
                     }
                 }
                 
                 if($i==$byk->num_rows()-1){
                     $data=array('status_pemesanan'=>'sukses');
                 $where=array('id_order'=>$this->input->post('id_order'));
                 $this->Crud_m->update_data('order', $data, $where);
                 }
                 
                 $this->Crud_m->update_data('detail',$datadetail,'id_detail='.$this->input->post('id_detail'));
                     // mengirimkan email  
        require_once(APPPATH.'third_party/PHPMailer-master/PHPMailerAutoload.php');
        $mail = new PHPMailer();
        $destino = "inacc@mail.lipi.go.id"; //email tujuan
        $mail->AddAddress($destino, "Receiver");
        // $destino1 = "dian.nurcahyanto.0@gmail.com"; //email tujuan
        // $mail->AddCC($destino1, 'Receiver');
        // $destino3 = "trilisty01@gmail.com"; //email tujuan
        // $mail->AddCC($destino3, "Receiver");
        // $destino4 = "nsuharna@yahoo.com";
        // $mail->AddCC($destino4, "Receiver");
        $mail->IsSMTP(); // we are going to use SMTP
        $mail->SMTPAuth   = true; // enabled SMTP authentication
        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
        $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
        $mail->Port       = 465;                   // SMTP port to connect to GMail
        $mail->Username   = "sispromotor@gmail.com";  // user email address
        $mail->Password   = "jasa1234";            // password in GMail
        $mail->SetFrom('sispromotor@gmail.com', 'SISPROMOTOR');  //email pengirim
        $mail->isHTML(true);
        $mail->Subject    = "SISPROMOTOR";
        $mail->Body      = '
            <html>
            <head>
                <title>PEMESANAN JASA PUSLIT BIOLOGI - LIPI</title>
            </head>
            <body>
            <p>Kepada Yth <br> Super Admin, Terdapat pesanan jasa baru yang harus anda verifikasi. Silahkan login sebagai Super admin di <a href="http://sispromotor.biologi.lipi.go.id/sispromotor/index.php/admin/login"> SISPROMOTOR </a> untuk memeriksa pesanan. </p><br>
            <p>Terimakasih</p>
            
            </body>
            </html>
        ';
        $mail->Send();
//                //
             }
            
        redirect('administrasi/Pemesanan2');
        }
        
		 public function detail($id){
             $footer=$this->Crud_m->selectX('tampilan', 'id_tampilan=1')->row();
            $header=$this->Crud_m->selectX('tampilan', 'id_tampilan=1')->row();
            $video=$this->Crud_m->selectX('tutorial', 'id_tutorial=2')->row();
            $data = array( 'aktif1'=>'',
                          'aktif2'=>'active-menu',
                          'aktif21'=>'',
                          'aktif3'=>'',
                          'aktif4'=>'',
                          'aktif5'=>'',
                          'id'=>$id,
                         'footer'=>$footer->footer,
                         'upload_video'=>$video->upload_video,
                         'header'=>$header->header);
             $data['menunya'] = $this->Crud_m->join3('order', 'user','detail', 'order.id=user.id','detail.jumlah=1');
             $data['produk'] = $this->Crud_m->selectProduk1($id);	
             
              $data['admin_rhasil'] = $this->Crud_m->result_AdministrasiJ_riwayat()->num_rows();
               $data['admin_pesan'] = $this->Crud_m->selectmenu()->num_rows();
              $data['admin_arsip'] = $this->Crud_m->join_where('order', 'user', 'order.status_pemesanan','order.id=user.id','sukses')->num_rows();
             $data['admin_hasil'] = $this->Crud_m->result_AdministrasiJ()->num_rows();
			$this->load->view('administrasi/detail_view', $data);
         }
	
	}

?>