<?php
class login_model extends CI_Model{
	function __construct(){
		$this->load->database(); // Berfungsi untuk memanggil database
	}

	// Berfungsi untuk mengambil data pada tabel user yang ada di database kita
	function ambil_data($tbl, $data){
		return $this->db->get_where($tbl,$data);
	}


}
