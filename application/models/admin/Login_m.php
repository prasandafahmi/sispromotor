<?php
class Login_m extends CI_Model{
	function __construct(){
		$this->load->database();
	}
	// Berfungsi untuk mengambil data pada tabel admin yang ada di database kita
	function ambil_data($tbl, $data){
		return $this->db->get_where($tbl,$data);
		
	}
}