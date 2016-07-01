<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class KategoriT extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('kategori_model');
		$this->load->model('cart_model');
		$this->load->model('produk_model');
		$this->load->model('penjual/penjual_model');
		$this->load->library('template');
	}
	public function getCategory($parent_id) {
		
		//$this->db->select('*');
		$this->db->from('kategori');
		$this->db->where('parent_id', $parent_id);
		$this->db->order_by('nama_kategori','asc');
		$data=$this->db->get()->result();
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

	public function index(){
  		//$data['user'] = $this->penjual_model->get_user($this->session->userdata('username'))->row();
	  	//$data['daftar_kategori']=$this->kategori_model->getAll();
		//$data['daftar_produk']=$this->produk_model->getAll();
		$tree['daftar_kategori2']=$this->getCategory(0);
		//$user_info = $this->session->userdata('logged_in');
		/*
	  	if ($user_info==true){
			$data['username'] = $this->session->userdata('username');
	  		$data['daftar_keranjang']=$this->cart_model->ambil_produk($data['username'])->result();
			$this->template->display('tree_page',$data,'ada');
	  	}else{
	  		$this->template->display('tree_page',$tree);
	  	}*/
	}
	/*public function category_list($parent_id=0){
	  	static $kategori;
	  	if(!is_array($kategori)){
	  		$kat=$this->kategori_model->getAll();
	  		$kategori=array();
	  		foreach($kat->result_array() as $row){
	  			$kategori[]=$row;
	  		}
	  	}
	  	$list_items=array();
	  	foreach($kategori as $kat){
	  		if((int)$kat['parent_id']!==(int)$parent_id){
	  			continue;
	  		}
		  	$list_items[]='<li>';

		  	$list_items[] = '<a href="#' . $kat['id_kategori'] . '">';
	        $list_items[] = $kat['nama_kategori'];
	        $list_items[] = '</a>';

	        $list_items[] = category_list( $kat['id_kategori'] );

	        $list_items[] = '</li>';
	  	}
        $list_items = implode( '', $list_items );
        if ( '' == trim( $list_items ) )
	    {
	        return '';
	    }
	    return '<ul>' . $list_items . '</ul>';
	    $this->template->display('tree_page',$list_items);
	}*/
	
}