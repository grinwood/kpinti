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
		$this->db->order_by('tgl_ditambah','desc');
		$hasil = $this->db->get();
		if($hasil->num_rows() > 0){
			$data = $hasil->result();
		}
		$hasil->free_result();
		return $data;
	}
	function getProByUser($user){
		$this->db->where('username',$user);
		$this->db->order_by('tgl_ditambah','desc');
		return $this->db->get('produk');
	}
	function getByCategory($id_kategori){
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
	public function getRows($id = ''){
		$this->db->select('*');
		$this->db->from('produk');
		if($id){
			$this->db->where("id_barang",$id);
			$query = $this->db->get();
			$result = $query->row_array();
		}else{
			$this->db->order_by('name','asc');
			$query = $this->db->get();
			$result = $query->result_array();
		}
		return !empty($result)?$result:false;
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
	function getKategori($id){
		$this->db->where('id_kategori',$id);
		return $this->db->get('kategori');
	}
	function searchProduk($target,$id=null){
		$data = array();
		$this->db->like("nama",$target);
		if($id!=NULL)
			$this->db->where('id_kategori',$id);
		$hasil = $this->db->get("produk");
		if($hasil->num_rows() > 0){
			$data = $hasil->result_array();
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
	function changeProdukDetail($data,$id,$id_kategori,$gambar){
		$this->db->where('id_barang',$id);
		$this->db->set('id_kategori',$id_kategori);
		$this->db->set($data);
		$this->db->set('nama_gbr',$gambar['nama_gbr']);
		$this->db->update('produk');
	}
	//insert transaction data
	public function insertTransaction($data = array()){
		$insert = $this->db->insert('payments_paypal',$data);
		return $insert?true:false;
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
	