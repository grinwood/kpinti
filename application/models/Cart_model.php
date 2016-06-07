<?php
	Class Cart_Model extends CI_Model{
		function __construct(){
			parent::__construct();
		}
			
		function addCart($username,$data){
			$this->db->set('username',$username);
			$this->db->set('id_barang',$data->id_barang);
			$this->db->set('barang_order',$data->nama);
			$this->db->set('jumlah_order',1);
			$this->db->set('harga_order',$data->harga);
		    $this->db->insert('cart');
			
		}
		function ambil_produk(){
			$this->db->select('*');
			$this->db->from('cart');
			return $this->db->get();
			
		}
		
		
		function deleteCart($where,$cart){
			$this->db->where($where);
			$this->db->delete($cart);
		}
		
		
    }
?>