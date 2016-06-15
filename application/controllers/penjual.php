<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjual extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('penjual/penjual_model');
		$this->load->model('produk_model');
		$this->load->model('kategori_model');
		$this->load->model('cart_model');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('template');
	}
	// melihat halaman login
	public function index(){
		$this->load->view('function_public/login');
	}

	// memeriksa keberadaan akun username
	public function login(){
		$username = $this->input->post('username', 'true');
		$password = $this->input->post('password', 'true');
	// check account
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
	  	$data['daftar_kategori']=$this->kategori_model->getAll();
		$data['daftar_produk']=$this->produk_model->getAll();
		if ($this->form_validation->run() == FALSE)
		{
			redirect(site_url('welcome'));
		} else
		{
			$temp_account = $this->penjual_model->check_user_account($username, $password)->row();
			$num_account = count($temp_account);
			if ($num_account > 0){
				// kalau ada set session
				$array_items = array(
				'password' => $temp_account->password,
				'username' => $temp_account->username,
				'logged_in' => true
				);
				
				$this->session->set_userdata($array_items);
				$username  = $this->session->userdata('username');
		  		$data['user'] = $temp_account;
			  	$data['daftar_kategori']=$this->kategori_model->getAll();
				$data['daftar_produk']=$this->produk_model->getAll();
				$this->session->set_flashdata('notification', 'Berhasil Login');
				$this->template->display('allproduct_page',$data,'ada');
			}  
			else {
			// kalau ga ada diredirect lagi ke halaman login
				$this->session->set_flashdata('notification', 'Username dan Password tidak cocok');
				redirect(site_url('welcome'));
			}
		}
	}
	public function register() {
		$data['nama']		=	$this->input->post('nama');
		$data['email']		=	$this->input->post('email');
		$data['telepon']		=	$this->input->post('telepon');
		$data['username']	=	$this->input->post('username');
		$data['password']	=	$this->input->post('password');
		$data2['daftar_kategori']= $this->kategori_model->getAll();
		
		$this->form_validation->set_rules('nama', 'Nama','required');
		$this->form_validation->set_rules('email', 'Email','required|valid_email');
		$this->form_validation->set_rules('telepon', 'Telepon','required|numeric');
		$this->form_validation->set_rules('username', 'Username','required');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('conf_password', 'Konfirmasi Password','matches[password]');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->template->display('register_page',$data2);
		}
		else
		{
			
			$this->penjual_model->savePenjual($data);
			
			echo '<script language="javascript">';
            echo 'alert("Successfully Registered")';
            echo '</script>';
            echo '<meta http-equiv="refresh" content="0;url=../" />';
			
			
		}
	}
	public function signup(){
		$this->load->view('function_public/signup');
	}
	public function logout(){
		$this->session->set_userdata(array('logged_in'=>false));
		$this->cart->destroy();
		redirect(site_url('welcome'));
	}
	public function viewAkun($uname,$sumber){
		$data['sumber'] = $sumber;
  		$data['user'] = $this->penjual_model->get_user($uname)->row();
  		$data['produk'] = $this->produk_model->getProByUser($uname)->result();
	  	$data['daftar_kategori']=$this->kategori_model->getAll();
  		//$data['daftar_keranjang']=$this->cart_model->ambil_produk($uname)->result();
		$this->template->display('akun_page',$data,'ada');
	}
	public function ubahPassword(){
		$username = $this->session->userdata('username');
		$newPass = $this->input->post('password');
		$this->penjual_model->editPassword($newPass,$username);
		echo '<script language="javascript">';
        echo 'alert("Password berhasil diubah")';
        echo '</script>';
        echo '<meta http-equiv="refresh" content="0;url=../penjual/viewAkun/'.$username.'/akun" />';
    }

	public function ubahProfil(){
		$username = $this->session->userdata('username');
		$data['nama'] = $this->input->post('nama');
		$data['email'] = $this->input->post('email');
		$data['telepon'] = $this->input->post('telepon');
		$this->form_validation->set_rules('nama', 'Nama','required');
		$this->form_validation->set_rules('email', 'Email','required|valid_email');
		$this->form_validation->set_rules('telepon', 'Telepon','required|numeric');
		if($this->form_validation->run() == TRUE){
			$this->penjual_model->editAkun($data,$username);
			echo '<script language="javascript">';
	        echo 'alert("Profil berhasil diubah")';
	        echo '</script>';
	    }else{
	    	
	    }
        $this->viewAkun($username,'akun');
    }
}