<?php if(!defined('BASEPATH'))exit('No direct script access allowed');

class Produk extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('input');
		$this->load->model('kategori_model');
		$this->load->model('produk_model');
	}

	function index(){
		$data['daftar_kategori']=$this->KategoriModel->getAll()->result();
		$kategori=$menu=$this->load->view('template/menu',$data);
		$this->load->view('menu_kategori',$kategori);
	}
	function getKategori(){
		return $this->KategoriModel->getAll()->result();
	}
}

/* end of file controllers/kategori.php */