<?php

class Dashboard_lib{
	protected $_ci;
	function __construct(){
		$this->_ci =&get_instance();
		$this->_ci->load->model('kategori_model');
		$this->_ci->load->model('cart_model');
		$this->_ci->load->model('produk_model');
		$this->_ci->load->model('penjual/penjual_model');
	}
	function initDashboard(){
		$username = $this->_ci->session->userdata('username');
  		$data['user'] = $this->penjual_model->get_user($username)->row();
	  	$data['daftar_kategori']=$this->kategori_model->getAll();
		$data['daftar_produk']=$this->displayProduk();
  		return $data;
	}
	function getCategory($parent_id=0) {
		
		//$this->db->select('*');
		$this->_ci->db->from('kategori');
		$this->_ci->db->where('parent_id', $parent_id);
		$this->_ci->db->order_by('nama_kategori','asc');
		$data=$this->_ci->db->get()->result();
		$kategori = array();
		foreach ($data as $mainCategory) {
			$kat = array();
			$kat['id_kategori'] = $mainCategory->id_kategori;
			$kat['nama_kategori'] = $mainCategory->nama_kategori;
			$kat['parent_id'] = $mainCategory->parent_id;
			$kat['sub_categories'] = $this->getCategory($kat['id_kategori']);
			$kategori[$mainCategory->id_kategori] = $kat;
		}
		return $kategori;
	}
	function paging($rows,$perPage){
		$config['base_url'] = base_url().'index.php/produk/kategoriView/';
		$config['total_rows'] = $rows;
		$config ['per_page'] = $perPage;
		$config['uri_segment'] = 3;
		$this->_ci->pagination->initialize($config);
	}
	function displayProduk(){
		$data = array();
		$kategoriMain = $this->_ci->kategori_model->get_main()->result();
		foreach ($kategoriMain as $kategoriM) {
			$datafetch  = array();
			$kategori = $this->getCategory($kategoriM->id_kategori);
			$products = array();
			$products[] = $this->_ci->produk_model->getByCategory($kategoriM->id_kategori)->result();
			foreach ($kategori as $mainCat) {
				$products[]=$this->_ci->produk_model->getByCategory($mainCat['id_kategori'])->result();
				foreach ($mainCat['sub_categories'] as $sub) {
					$products[]=$this->_ci->produk_model->getByCategory($sub['id_kategori'])->result();
				}
			}
			for ($i=0;$i<count($products);$i++){
				for($j=0;$j<count($products[$i]);$j++){
					$datafetch[]=$products[$i][$j];
				}
			}
			$data[$kategoriM->id_kategori]=$datafetch;
			
		}
		return $data;
	}

}