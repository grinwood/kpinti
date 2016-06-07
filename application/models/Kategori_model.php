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
			$this->db->order_by('nama_kategori','asc');
			$result = $this->db->get('kategori');

			$dropdown[''] = 'Pilih Kategori';
			if($result->num_rows()>0){
				foreach($result->result() as $row){
					$dropdown[$row->id_kategori] = $row->nama_kategori;
				}
			}
			return $dropdown;
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