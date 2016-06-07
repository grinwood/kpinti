<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
	    parent::__construct();
	    $this->load->library('template');
		$this->load->helper('url');
		$this->load->model('penjual/penjual_model');
		$this->load->model('produk_model');
		$this->load->model('kategori_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
	}
	function index(){
		$data['daftar_kategori']=$this->kategori_model->getAll();
		$data['daftar_produk']=$this->produk_model->getAll();
	    $this->template->display('allproduct_page',$data);
	}
	function contoh_parameter(){
		$this->template->display('view_parameter',array('judul’=>’judul View'));
	}
}
