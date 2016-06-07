<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
		$this->load->model('kategori_model');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('template');
	}
	// melihat halaman login
	public function index(){	
	}

	public function kategoriView($id){
		$data['daftar_kategori']=$this->kategori_model->getAll();
		$data['daftar_produk']=$this->produk_model->getAll();
		$log = $this->session->userdata('logged_in');
		$data['produk']=$this->produk_model->viewByKategori($id)->result();
		if($log==true)
			$data['username'] = $this->session->userdata('username');
		$this->template->display('kategori_page',$data,$log);
	}
	public function cariProduk() {
		$target = $this->input->post('search','true');
		$result['daftar_result'] = $this->produk_model->searchProduk($target);
		$result['daftar_kategori'] = $this->kategori_model->getAll();
		$this->template->display('result_page',$result);
	}
	public function tambahProduk(){
		$idKategori = $this->input->post('kategori','true');
		$user = $this->session->userdata('username');
		$data['username'] = $user;
		$data['nama'] = $this->input->post('nama','true');
		$data['jumlah'] = $this->input->post('jumlah','true');
		$data['harga'] = $this->input->post('harga','true');
		$data['deskripsi'] = $this->input->post('deskripsi','true');
		$data2=$data;
		$data['daftar_kategori']=$this->kategori_model->getAll();

		$this->form_validation->set_rules('kategori', 'Kategori','required');
		$this->form_validation->set_rules('nama', 'Nama Barang','required');
		$this->form_validation->set_rules('jumlah','Jumlah Barang','required|integer');
		$this->form_validation->set_rules('harga','Harga Barang','required|integer');

		if($this->form_validation->run() == FALSE){
			$this->template->display('addproduct_page',$data,'ada');
		}
		else
		{
			$gambar = array('nama_gbr'=>'');
			$config = array(
			'upload_path'=>"./uploads/",
			'allowed_types'=>"gif|jpg|jpeg|png|bmp",
			'max_size' => "2048000"
			);

			
			$this->load->library('upload',$config);		
	        if ($this->upload->do_upload())
	        {
	            $gbr = $this->upload->data();
	            $gambar['nama_gbr'] = $gbr['file_name'];
				
				echo '<script language="javascript">';
		        echo 'alert("berhasil foto")';
		        echo '</script>';
		        //echo '<meta http-equiv="refresh" content="0;url=../dashboard" />'; 
	        }else{
	        	  
	        	echo '<script language="javascript">';
		        echo 'alert("gagal foto")';
		        echo '</script>';
		        //echo '<meta http-equiv="refresh" content="0;url=../dashboard" />'; 
	        }
			$this->produk_model->addProduct($data2,$gambar,$user,$idKategori);
			echo '<script language="javascript">';
	        echo 'alert("Product Added")';
	        echo '</script>';
	        echo '<meta http-equiv="refresh" content="0;url=../dashboard" />';
		}
	}
}