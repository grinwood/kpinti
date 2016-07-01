<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {
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
	public function index(){
	  	$data['daftar_kategori']=$this->kategori_model->getAll();
		$data['daftar_produk']=$this->dashboard_lib->displayProduk();
		$data['daftar_kategori2'] = $this->dashboard_lib->getCategory(0);
		$user_info = $this->session->userdata('logged_in');
	  	if ($user_info==true){
	  		$data['user'] = $this->penjual_model->get_user($this->session->userdata('username'))->row();
			$this->template->display('home_page',$data,'ada');
	  	}else{
	  		$this->template->display('home_page',$data);
	  	}
	}
	public function konten($idCat,$idPro){
		$data['daftar_kategori']=$this->kategori_model->getAll();
		$data['kategori']=$this->kategori_model->getOneCat($idCat)->row();
		$data['produk']=$this->produk_model->getOnePro($idPro)->row();
		$data['penjual']=$this->penjual_model->getUserByPro($idPro)->row();
  		//$data['daftar_keranjang']=$this->cart_model->ambil_produk($this->session->userdata('username'))->result();
		$user_info = $this->session->userdata('logged_in');
	  	if ($user_info==true){
	  		$data['user'] = $this->penjual_model->get_user($this->session->userdata('username'))->row();
			$this->template->display('content_page',$data,'ada');
	  	}else{
			$this->template->display('content_page',$data);
	  	}
	}
}