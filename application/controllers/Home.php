<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
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
//Untuk user
    public function user(){
        $data["user"] = $this->db->get_where("user",["username !="=>$_SESSION["username"]])->result_array();
        $this->load->view('page/user',$data);
    }

    public function adduser(){
        $data["username"] = $this->input->post("username");
        $data["password"] = MD5($this->input->post("password"));
        $data["level"] = $this->input->post("level");
        $data["nama"] = $this->input->post("nama");
        
        $cek = $this->db->get_where("user",["username"=>$data["username"]]);
        if($cek->num_rows()>0){
            $this->session->set_flashdata("pesan",notif("danger","User sudah terdaftar !"));
        }else{
            $this->db->insert("user",$data);
            $this->session->set_flashdata("pesan",notif("success","User berhasil ditambahkan !"));
        }
        redirect("home/user");
    }

    function deleteuser($id){
        $this->db->where("id",$id);
        $this->db->delete("user");
        $this->session->set_flashdata("pesan",notif("warning","User berhasil dihapus !"));
        redirect("home/user");
    }
//Akhir dari user
//Untuk kategori
    public function kategori(){
        $data["kategori"] = $this->db->get_where("kategori")->result_array();
        $this->load->view('page/kategori',$data);
    }

    public function addkategori(){
        $data["kategori"] = $this->input->post("kategori");
        
        $cek = $this->db->get_where("kategori",["kategori"=>$data["kategori"]]);
        if($cek->num_rows()>0){
            $this->session->set_flashdata("pesan",notif("danger","Kategori sudah terdaftar !"));
        }else{
            $this->db->insert("kategori",$data);
            $this->session->set_flashdata("pesan",notif("success","Kategori berhasil ditambahkan !"));
        }
        redirect("home/kategori");
    }

    function deletekategori($id){
        $this->db->where("id",$id);
        $this->db->delete("kategori");
        $this->session->set_flashdata("pesan",notif("warning","Kategori berhasil dihapus !"));
        redirect("home/kategori");
    }
//Akhir kategori
//Untuk produk
    public function produk(){
        $data["produk"] = $this->db->get_where("produk")->result_array();
        $data["kategori"] = $this->db->get_where("kategori")->result_array();
        $this->load->view('page/produk',$data);
    }

    public function addproduk(){
        $data = $this->input->post();
        $parse = explode("-",$data["kategori"]);

        $data["idkategori"] = $parse[0];
        $data["kategori"] = $parse[1];
        $cek = $this->db->get_where("produk",["produk"=>$data["produk"]]);
        if($cek->num_rows()>0){
            $this->session->set_flashdata("pesan",notif("danger","Produk sudah terdaftar !"));
        }else{
            $this->db->insert("produk",$data);
            $this->session->set_flashdata("pesan",notif("success","Produk berhasil ditambahkan !"));
        }
        redirect("home/produk");
    }

    function deleteproduk($id){
        $this->db->where("id",$id);
        $this->db->delete("produk");
        $this->session->set_flashdata("pesan",notif("warning","Produk berhasil dihapus !"));
        redirect("home/produk");
    }
//Akhir produk
    public function logout(){
		session_destroy();
		redirect("login");
	}
}