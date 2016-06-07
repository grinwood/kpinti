<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller{
   function __construct() {
      parent::__construct();
      $this->load->helper('url');
	  $this->load->library('session');
	  $this->load->helper('form');
      $this->load->model('produk_model');
      $this->load->model('kategori_model');	  
      $this->load->model('cart_model');
      $this->load->model('penjual/penjual_model');	}
	
	function index(){
		$user_info = $this->session->userdata('logged_in');
	  	if ($user_info!=false){
	  		$data['username'] = $this->session->userdata('username');
	  		$data['password'] = $this->session->userdata('password'); 
			$data['daftar_kategori']=$this->kategori_model->getAll();
			$data['daftar_keranjang']=$this->cart_model->ambil_produk()->result();
			$this->template->display('cart_page',$data,'ada');
	  	}
	  	else
	  	{
	    	redirect(site_url('welcome'));
	  	}
	}

	function tambahBarang($user,$idPro){
		$user=$this->session->userdata('username');
		$data=$this->produk_model->getOnePro($idPro)->row();
		$this->cart_model->addCart($user,$data);

		echo '<script language="javascript">';
        echo 'alert("berhasil ditambahkan ke dalam keranjang")';
        echo '</script>';
        echo '<meta http-equiv="refresh" content="0;url='.site_url('dashboard').'" />';
        /*redirect(site_url('dashboard'));*/
	}
	
	function deleteBarang($id_pemesanan){
		//$user=$this->session->userdata('username');
		$where = array('id_pemesanan'=>$id_pemesanan);
		$this->cart_model->deleteCart($where,'cart');
		echo '<script language="javascript">';
        echo 'alert("Hapus barang berhasil dilakukan")';
        echo '</script>';
        echo '<meta http-equiv="refresh" content="0;url='.site_url('cart').'" />';
		
		
	}
}