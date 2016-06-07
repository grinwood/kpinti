<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('penjual/penjual_model');
		$this->load->model('produk_model');
		$this->load->model('kategori_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
	}
	public function index()
	{
		$data['daftar_kategori']=$this->kategori_model->getAll();
		$data['daftar_produk']=$this->produk_model->getAll();
		$this->load->view('home_page',$data);
	}
}