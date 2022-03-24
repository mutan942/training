<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
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

	public function transaksi()
	{
		$data["pending"] = $this->db->get_where("transaksi",["status"=>"pending"])->result_array();
		$this->load->view('pageuser/transaksi',$data);
	}

	public function addtrans(){
		$data["kode"] = date("YmdHis");
		$data["tgl"] = date("Y-m-d H:i:s");
		$data["kasir"] = $_SESSION["username"];
		$data["status"] = "pending";
		$this->db->insert("transaksi",$data);
		redirect("user/belanja/".$data["kode"]);
	}

	public function belanja($kode){
		$data["transaksi"] = $this->db->get_where("transaksi",["kode"=>$kode])->row_array();
		$this->load->view("pageuser/belanja",$data);
	}

	public function getproduk(){
		$search = $_GET["search"];
		$sql = "SELECT * FROM produk WHERE produk LIKE '%$search%' ORDER BY produk ASC";
		$result = $this->db->query($sql);
		
		if ($result->num_rows() > 0) {
			$list = array();
			$key=0;
			foreach($result->result_array() as $row) {
				$list[$key]['id'] = $row['id'];
				$list[$key]['text'] = $row['produk']; 
			$key++;
			}
			echo json_encode($list);
		} else {
			echo "Produk tidak ada !";
		}
	}

	function simpanproduk(){
		$idproduk = $this->input->post("idproduk");
		$kode = $this->input->post("kode");
		$cek = $this->db->get_where("transaksidetail",["produkid"=>$idproduk,"kode"=>$kode]);
		$produk = $this->db->get_where("produk",["id"=>$idproduk])->row_array();
		if($cek->num_rows()>0){
			$lama = $cek->row_array();
			$this->db->where(["produkid"=>$idproduk,"kode"=>$kode]);
			$qty = intval($lama["qty"])+1;
			$harga = intval($lama["harga"])*$qty;
			$this->db->update("transaksidetail",["qty"=>$qty,"total"=>$harga]);
		}else{
			$this->db->insert("transaksidetail",[
				"kode" => $kode,
				"produkid" => $produk["id"],
				"produk" => $produk["produk"],
				"qty" => 1,
				"harga" => $produk["harga"],
				"total" => $produk["harga"],
			]);
		}
		$this->db->where("id",$idproduk);
		$stoksekarang = intval($produk["stok"])-1;
		$this->db->update("produk",["stok"=>$stoksekarang]);
		$arr = ["kode"=>$kode];
		echo json_encode();
	}

	public function tableproduk(){
		$kode = $this->input->post("kode");
		$total = $this->db->query("select sum(total) as total from transaksidetail where kode='$kode'")->row_array();
		$item = $this->db->query("select * from transaksidetail where kode='$kode'")->result_array();
		$html = "<table class='table'>";
		foreach($item as $i){
			$html .= "<tr>";
			$html .= "<td>$i[produk]</td>";
			$html .= "<td width='150'><input type='number' class='form-control' id='it$i[id]' value='$i[qty]' onchange='ubahqty($i[id])'/></td>";
			$html .= "<td>$i[harga]</td>";
			$html .= "<td>$i[total]</td>";
			$html.="</tr>";
		}
		$html .= "</table>";
		$arr = [
			"total" => $total["total"],
			"item" => $html,
		];
		echo  json_encode($arr,TRUE);
	}

	public function ubahqty(){
		$detail = $this->db->get_where("transaksidetail",["id"=>$_POST["iddetail"]])->row_array();
		$qtylama = intval($detail["qty"]);
		$qtybaru = intval($this->input->post("qtybaru"));
		$selisih = $qtylama-$qtybaru;

		$produk = $this->db->get_where("produk",["id"=>$detail["produkid"]])->row_array();
		$this->db->where(["id"=>$_POST["iddetail"]]);
		$totalbaru = intval($produk["harga"])*$qtybaru;
		$this->db->update("transaksidetail",[
			"harga" => $produk["harga"],
			"qty" => $qtybaru,
			"total" => $totalbaru,
		]);

		$stokbaru = intval($produk["stok"])+($selisih);
		$this->db->where(["id"=>$detail["produkid"]]);
		$this->db->update("produk",["stok"=>$stokbaru]);
		if($qtybaru<=0){
			$this->db->where(["id"=>$_POST["iddetail"]]);
			$this->db->delete("transaksidetail");
		}
	}

	function accpenjualan(){
		$d["kode"] = $this->input->post("kode");
		$d["bayar"] = $this->input->post("bayar");
		$d["total"] = $this->input->post("total");
		$d["kembalian"] = $this->input->post("kembalian");
		$d["tglbayar"] = date("Y-m-d H:i:s");
		$d["status"] = "payment";
		if(intval($d["kembalian"])<0){
			$this->session->set_flashdata("pesan",notif("danger","Uang setoran kurang !"));
			redirect("user/belanja/".$d["kode"]);
		}else{
			$this->session->set_flashdata("pesan",notif("success","Nomor transaksi berhasil : ".$d["kode"]));
			$this->db->where("kode",$d["kode"]);
			$this->db->update("transaksi",$d);
			redirect("user/transaksi");
		}
	}

    public function logout(){
		session_destroy();
		redirect("login");
	}
}