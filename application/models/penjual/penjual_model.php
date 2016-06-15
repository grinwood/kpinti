<?php
class Penjual_model extends CI_Model {
	function __construct(){
		parent::__construct();
	}
	// cek keberadaan user di sistem
	function check_user_account($username, $password){
		$this->db->select('*');
		$this->db->from('penjual');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		return $this->db->get();
	}
	// mengambil data user tertentu
	function get_user($username){
		$this->db->select('*');
		$this->db->from('penjual');
		$this->db->where('username', $username);
		return $this->db->get();
	}
	public function savePenjual($data){
		$this->db->insert('penjual',$data);
	}
	public function editPassword($pass,$username){
		$this->db->where('username',$username);
		$this->db->set('password',$pass);
		$this->db->update('penjual');
	}
	public function editAkun($data,$username){
		$this->db->where('username',$username);
		$this->db->set($data);
		$this->db->update('penjual');
	}

	public function getUserByPro($id_barang){
		$this->db->select('*');
		$this->db->where('id_barang',$id_barang);
		$res=$this->db->get('produk')->row();
		return $this->get_user($res->username);
	}
}