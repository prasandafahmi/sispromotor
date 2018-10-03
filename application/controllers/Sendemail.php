<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sendemail extends CI_Controller {


	public function __construct(){
			parent::__construct();
			$this->load->model('crud_m');
		}

	public function index() {
	$data = array ('aktif1'=>"",
			'aktif2'=>"",
			'aktif3'=>"",
			'aktif4'=>"",
			'aktif5'=>"",
			'aktif6'=>"",
            'aktif7'=>""
				

			);
	
	$this->load->view('sendemail', $data);
	}

}
