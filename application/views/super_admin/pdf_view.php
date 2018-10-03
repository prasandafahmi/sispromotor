<?php

 $pdf = new TCPDF();
 $pdf->AddPage();

$str='<html>
   <head>
		<title>LAPORAN KESELURUHAN</title>
   </head>
   <body >
	<h2>Laporan Seluruh Pemesanan</h2>
    <table border="3">
		<tr>
		   <th>No</th>
           <th>Nama</th>
           <th>Tanggal order</th>
           <th>Jenis</th>
           <th>Spesifikasi</th>
           <th>Request</th>
           <th>Status Persetujuan</th>
           <th>Tanggal Pembayaran</th>
           <th>Status Pembayaran</th>
		</tr>';
         $i=1;
		 foreach($laporan->result() as $permenu){
			  $str.='<tr>
			          <td>'.$i.'</td>
					  <td>'.$permenu->nama.'</td>
					  <td>'.$permenu->date.'</td>
					  <td>'.$permenu->kategori.'</td>
					  <td>'.$permenu->jenis.'</td>
					  <td>'.$permenu->request.'</td>
					  <td>'.$permenu->status_persetujuan.'</td>
					  <td>'.$permenu->tanggal.'</td>
					  <td>'.$permenu->status.'</td>
                      
					 </tr>';
             $i++;
		 }
		$str.='<table>
   </body>
</html>';
 
 $pdf->WriteHTML($str);
 $pdf->Output('laporan1.pdf','I');       
?>