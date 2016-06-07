<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class dashboard extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('kategori_model');
		$this->load->model('produk_model');
		$this->load->library('template');
		}
	public function index(){
  		$data['username'] = $this->session->userdata('username');
  		$data['password'] = $this->session->userdata('password'); 
	  	$data['daftar_kategori']=$this->kategori_model->getAll();
		$data['daftar_produk']=$this->produk_model->getAll();
		$user_info = $this->session->userdata('logged_in');
	  	if ($user_info==true){
			$data['username'] = $this->session->userdata('username');
			$this->template->display('allproduct_page',$data,'ada');
	  	}else{
	  		$this->template->display('allproduct_page',$data);
	  	}
	}
	public function konten($idCat,$idPro){
		$data['daftar_kategori']=$this->kategori_model->getAll();
		$data['kategori']=$this->kategori_model->getOneCat($idCat)->row();
		$data['produk']=$this->produk_model->getOnePro($idPro)->row();
		$user_info = $this->session->userdata('logged_in');
	  	if ($user_info==true){
			$data['username'] = $this->session->userdata('username');
			$this->template->display('content_page',$data,'ada');
	  	}else{
			$this->template->display('content_page',$data);
	  	}
	}
}