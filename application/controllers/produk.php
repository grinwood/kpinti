<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
		$this->load->model('penjual/penjual_model');
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
		if($this->session->userdata('logged_in')==true)
			$this->template->display('result_page',$result,'ada');
		else
			$this->template->display('result_page',$result);
	}
	public function tambahProduk(){
		$idKategori = $this->input->post('kategori','true');
		$data['daftar_kategori']=$this->kategori_model->getAll();
		$post['username'] = $post['username'] = $this->session->userdata('username');
  		$data['user'] = $this->penjual_model->get_user($post['username'])->row();
		$post['nama'] = $this->input->post('nama','true');
		$post['jumlah'] = $this->input->post('jumlah','true');
		$post['harga'] = $this->input->post('harga','true');
		$post['deskripsi'] = $this->input->post('deskripsi','true');

		$this->form_validation->set_rules('kategori', 'Kategori','required');
		$this->form_validation->set_rules('nama', 'Nama Barang','required');
		$this->form_validation->set_rules('jumlah','Jumlah Barang','required|integer');
		$this->form_validation->set_rules('harga','Harga Barang','required|integer');

		if($this->form_validation->run() == FALSE)
			$this->template->display('addproduct_page',$data,'ada');
		else
		{
			$gambar = array('nama_gbr'=>'');
			$config = array(
			'upload_path'=>"./uploads/",
			'allowed_types'=>"gif|jpg|jpeg|png|bmp",
			'max_size' => "2048000",
			'file_name' => "File_".time()
			);

			
			$this->load->library('upload',$config);		
	        if ($this->upload->do_upload())
		        {
		            $gbr = $this->upload->data();
		            $gambar['nama_gbr'] = $gbr['file_name'];
					
			        //echo '<meta http-equiv="refresh" content="0;url=../dashboard" />'; 
		        }else{
		        	  
			        //echo '<meta http-equiv="refresh" content="0;url=../dashboard" />'; 
		        }
			$this->produk_model->addProduct($post,$gambar,$idKategori);
			echo '<script language="javascript">';
	        echo 'alert("Product Added")';
	        echo '</script>';
	        echo '<meta http-equiv="refresh" content="0;url=../dashboard" />';
		}
	}
	public function deleteProduk($id,$username){
		$this->produk_model->deleteProduk($id);
		echo '<script language="javascript">';
	    echo 'alert("Produk berhasil dihapus")';
	    echo '</script>';
	    redirect(site_url('penjual/viewAkun/'.$username.'/barang'));
	}
	public function ubahProduk($id,$uname){
  		$data['user'] = $this->penjual_model->get_user($uname)->row();
  		$data['produk'] = $this->produk_model->getProByUser($uname)->result();
		$data['harga'] = $this->input->post('harga','true');
		$data['jumlah'] = $this->input->post('jumlah','true');

		$this->form_validation->set_rules('jumlah','Jumlah Barang','required|integer');
		$this->form_validation->set_rules('harga','Harga Barang','required|integer');

		if($this->form_validation->run() == FALSE)
			$this->session->set_flashdata('notif-barang-gagal', 'Input harus angka');
		else
		{
			$this->produk_model->changeProduk($id,$data);
			$this->session->set_flashdata('notif-barang-success', 'Berhasil diubah');
		}
	    redirect(site_url('penjual/viewAkun/'.$uname.'/barang'));
	}
}