<?php

class Produk_Model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	public function addProduct($data,$gbr,$kategori){
		$this->db->set('id_kategori',$kategori);
		$this->db->set($data);
		$this->db->set($gbr);
		$this->db->insert('produk');
	}
	function update(){
	}
	function getAll(){
		$data = array();
		$this->db->select("*");
		$this->db->from("produk");
		$hasil = $this->db->get();
		if($hasil->num_rows() > 0){
			$data = $hasil->result();
		}
		$hasil->free_result();
		return $data;
	}
	function getProByUser($user){
		$this->db->where('username',$user);
		return $this->db->get('produk');
	}
	function viewByKategori($id_kategori){
		$this->db->where('id_kategori',$id_kategori);
		return $this->db->get('produk');
	}
	function select_slide(){
		$data = array();
		$this->db->select("*");
		$this->db->from("kategori");
		$this->db->order_by("id_kategori","DESC");
		$this->db->limit(5);
		$hasil = $this->db->get();
		if($hasil->num_rows() > 0){
			$data = $hasil->result();
		}
		$hasil->free_result();
		return $data;
	}
	function getOnePro($id_barang){
		$this->db->select("*");
		$this->db->from("produk");
		$this->db->where("id_barang", $id_barang);
		return $this->db->get();
			
	}
/*	function count_all($sesi_cari = ''){
		if($sesi_cari == true){
			$this->db->like('judul', $sesi_cari);
		}
		$this->db->from('barang');
		return $this->db->count_all_results();
	} */

	function detail($id){
		$data = array();
		$this->db->select("*");
		$this->db->from("kategori");
		$this->db->where("id_kategori", $id);
		$hasil = $this->db->get();
		if($hasil->num_rows() > 0){
			$data = $hasil->result();
		}
		$hasil->free_result();
		return $data;
	}
	function searchProduk($target){
		$data = array();
		$this->db->like("nama",$target);
		$hasil = $this->db->get("produk");
		if($hasil->num_rows() > 0){
			$data = $hasil->result();
		}
		$hasil->free_result();
		return $data;
	}
	function deleteProduk($id){
		$this->db->where('id_barang',$id);
		$this->db->delete('produk');
	}
	function changeProduk($id,$data){
		$this->db->where('id_barang',$id);
		$this->db->set('harga',$data['harga']);
		$this->db->set('jumlah',$data['jumlah']);
		$this->db->update('produk');
	}
}

	/*	function delete($id){
			$this->delete_image($id);
			$this->db->where("id_barang",$id);
			$this->db->delete("barang");
		}
		
	} */

	/* end of file
	/* application/models/

	/*	function _nama_image($id = ''){
			$data = array();
			$this->db->select("*");
			$this->db->from("barang");
			$this->db->where("id_barang",$id);
			$hasil = $this->db->get();
			if($hasil->num_rows() > 0){
				return $hasil->row_array(); //return row sebagai associative array
			}
		} 

		function delete_image($id){
			$dimg = $this->_nama_image($id);
			$nama_image = $dimg["gambar"];
			$file = "./asset/images/barang/".$nama_image;
			$file2 = "./asset/images/barang/thumbs/".$nama_image;
			if(is_file($file)){
				unlink($file);
				unlink($file2);
			}
		}
		function do_upload($nama_file) {
			$config = array(
				'allowed_types' => 'jpg|jpeg|gif|png',
				'upload_path' => $this->gallery_path,
				'max_size' => 20000
			);
			
			$this->load->library('upload', $config);
			$this->upload->do_upload($nama_file);
		            $data = $this->upload->data($nama_file);
			$image_data = $this->upload->data();
			$nama_filenya = $image_data['file_name'];
			$config = array(
				'source_image' => $image_data['full_path'],
				'new_image' => $this->gallery_path . '/thumbs',
				'maintain_ration' => true,
				'width' => 250,
				'height' => 200
			);

			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
			return $nama_filenya;
			
		}

		function get_images(){
			$files = scandir($this->gallery_path);
			$files = array_diff($files, array('.', '..', 'thumbs'));
			$images = array();
			foreach ($files as $file) {
				$images []= array (
					'url' => $this->gallery_path_url . $file,
					'thumb_url' => $this->gallery_path_url . 'thumbs/' . $file
				);
			}
			return $images;
		}	
	
?>
*/
	