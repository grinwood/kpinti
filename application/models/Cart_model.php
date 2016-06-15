<?php
	Class Cart_Model extends CI_Model{
		function __construct(){
			parent::__construct();
		}
			
		function addCart($username,$data,$data2){
			$this->db->set('id_order',$data2->id_order);
			$this->db->set('username',$username);
			$this->db->set('id_barang',$data['id']);
			$this->db->set('barang_order',$data['name']);
			$this->db->set('jumlah_order',$data['qty']);
			$this->db->set('harga_order',$data['price']);
		    $this->db->insert('cart');
		}
		function ambil_produk($username){
			$this->db->select('*');
			$this->db->from('cart');
			$this->db->where('username',$username);
			return $this->db->get();
		}
		function getAll(){
			$this->db->select('*');
			$this->db->from('cart');
			return $this->db->get();
		}
		function updateCart($data){
			$this->db->where('id_order', $data['id_order']);
			$this->db->set('jumlah_order',$data['qty']);
			$this->db->set('harga_order',$data['price']);
			$this->db->update('cart');
		}
		function deleteCart($where,$cart){
			$this->db->where($where);
			$this->db->delete($cart);
		}
		function cekId($username){
			$this->db->select('id_barang');
			$this->db->from('cart');
			$this->db->where('username',$username);
			return $this->db->get();	
		}
		function cekIdpesan($username){
			$this->db->select('id_pemesanan');
			$this->db->from('cart');
			$this->db->where('username',$username);
			return $this->db->get();	
		}
				
	}
?>