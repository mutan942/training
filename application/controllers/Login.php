<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct() {
		parent::__construct();
		if(isset($_SESSION["id_user"])){
			redirect("home");
		}
	}
	
	public function index()
	{
		$this->load->view('login');
	}

	public function ceklogin(){
		$username = $this->input->post("username");
		$password = MD5($this->input->post("password"));
		$cek = $this->db->get_where("user",[
			"username" => $username,
			"password" => $password
		]);
		if($cek->num_rows() > 0){
			$data = $cek->row_array();
			$this->session->set_userdata([
				"id_user" => $data["id"],
				"username" => $username,
				"level" => $data["level"]
			]);
			$this->session->set_flashdata("pesan",notif("success","Selamat datang !"));
			redirect("home");
		}else{
			$this->session->set_flashdata("pesan",notif("warning","Username atau password tidak ditemukan !"));
			redirect("login");
		}
	}
}