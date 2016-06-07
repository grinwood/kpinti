<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Konten extends CI_Controller {
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
	}
	public function viewKonten($idCat,$idPro){
		$data['username'] = $this->session->userdata('username');
		$data['daftar_kategori']=$this->kategori_model->getAll();
		$data['kategori']=$this->kategori_model->getOneCat($idCat)->row();
		$data['produk']=$this->produk_model->getOnePro($idPro)->row();
		$this->template->displayPro($data);
	}
}