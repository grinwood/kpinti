<?php
	Class Kategori_Model extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		function insert(){
			$data = array(
					"nama_kategori" => $this->input->post("nama_kategori")
				);
			if($this->input->post('id_kategori')){
				$this->db->where("id_kategori", $this->input->post('id_kategori'));
				$this->db->update("kategori", $data);
			}else{
				$this->db->insert("kategori", $data);
			}
		}
		function update(){
		}
		function getDropdown(){
			$this->db->select('*');
			$this->db->where('parent_id',0);
			$this->db->from('kategori');
			$query = $this->db->get();
			
			return $query->result();
		}
		function getAll(){
			$data = array();
			$this->db->select("*");
			$this->db->from("kategori");
			$hasil = $this->db->get();
			if($hasil->num_rows() > 0){
				$data = $hasil->result();
			}
			$hasil->free_result();
			return $data;
		}
		function getOneCat($id_kategori){
			$this->db->select("*");
			$this->db->from("kategori");
			$this->db->where("id_kategori", $id_kategori);
			return $this->db->get();
		}
		function get_main(){
		    $this->db->where('parent_id',0);
		    $query = $this->db->get('kategori');
		    return $query;
		}

		function get_secondary($parent){
		    $this->db->where('parent_id',$parent);
		    $query = $this->db->get('kategori');
		    return $query;
		}
		function getAllCat($parent_id){
			$this->db->select('*');
			$this->db->from('kategori');
			$this->db->where('parent_id', $parent_id);
			return $this->db->get();
		}
		function select_slide(){
			$data = array();
			$this->db->select("*");
			$this->db->from("produk");
			$this->db->order_by("id_barang","DESC");
			$this->db->limit(5);
			$hasil = $this->db->get();
			if($hasil->num_rows() > 0){
				$data = $hasil->result();
			}
			$hasil->free_result();
			return $data;
		}		
		function delete($id){
			$this->db->where("id_kategori",$id);
			$this->db->delete("id_kategori");
		}
	}
?>