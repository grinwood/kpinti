<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Registrasi extends CI_Controller
{
	function __construct(){
		
		parent::__construct();
				
		$this->load->model('penjualModel'); 
	}
	
	public function index()
	{
		$this->form_validation->set_rules('username', 'Username','required');
		$this->form_validation->set_rules('password','Password','required');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('register');
		}
		else
		{
			$data['username']	=	$this->input->post('username');
			$data['password']	=	$this->input->post('password');
			
			$this->penjualModel->savePenjual($data);
			
            echo '<script language="javascript">';
            echo 'alert("Successfully Registered")';
            echo '</script>';
            echo '<meta http-equiv="refresh" content="0;url=../index.php" />';
                            
		}
	}
}

/* end of file controllers/registrasi.php */