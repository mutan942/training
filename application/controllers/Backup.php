<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {
	function __construct() {
		parent::__construct();
        if(!isset($_SESSION["id_user"])){
            redirect("login");
        }
	}
	
	public function index()
	{
		$this->load->view('page/home');
	}

    public function logout(){
		session_destroy();
		redirect("login");
	}
}