<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	private $resultArray ;
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
		$this->load->library('paypal_lib');
		$this->resultArray = array();
	}
	// melihat halaman login
	public function index(){	
	}
	public function sortBy($field, &$array, $direction = 'asc') // by joshtronic.com a.k.a Josh Sherman
	{
		usort($array, create_function('$a, $b', '
			$a = $a["' . $field . '"];
			$b = $b["' . $field . '"];

			if ($a == $b)
			{
				return 0;
			}

			return ($a ' . ($direction == 'desc' ? '>' : '<') .' $b) ? -1 : 1;
		'));

		return true;
	}
	public function sorting(){
		$tmp = $this->input->post('sort-by','true');
		$by = 'tgl_ditambah';
		$type = 'desc';
		if($tmp==1){
			$by = 'tgl_ditambah';
			$type = 'desc';
		}else if($tmp==2){
			$by = 'harga';
			$type = 'asc';
		}else if($tmp==3){
			$by = 'harga';
			$type = 'desc';
		}
		if($this->session->userdata('sort')!=null){
			$res = $this->session->userdata('sort');
			$this->sortBy($by,$res,$type);
			$data['daftar_result'] = $res;
			if($this->session->userdata('logged_in')==true){
				$data['user'] = $this->penjual_model->get_user($this->session->userdata('username'))->row();;
				$this->template->display('result_page',$data,'ada');
			}else
				$this->template->display('result_page',$data);
		}
	}

	public function kategoriView($id,$sortedBy='tgl_ditambah',$sortedType='desc'){
		$this->session->set_userdata('search','');
		$data['daftar_result'] = array();
		$datafetch  = array();
		$kategori = $this->dashboard_lib->getCategory($id);
		$products = array();
		$products[] = $this->produk_model->getByCategory($id)->result_array();
		$parent = $this->kategori_model->get_secondary($id)->result();
		if($parent==null){
			$data['daftar_result'] = $this->produk_model->getByCategory($id)->result_array();
		}else{
			foreach ($kategori as $mainCat) {
				$products[]=$this->produk_model->getByCategory($mainCat['id_kategori'])->result_array();
				foreach ($mainCat['sub_categories'] as $sub) {
					$products[]=$this->produk_model->getByCategory($sub['id_kategori'])->result_array();
				}
			}
			for ($i=0;$i<count($products);$i++){
				for($j=0;$j<count($products[$i]);$j++){
					$datafetch[]=$products[$i][$j];
				}
			}
			$data['daftar_result']=$datafetch;
		}
		$this->sortBy($sortedBy,$data['daftar_result'],$sortedType);
		$this->session->set_userdata('sort', $data['daftar_result']);
		/*$this->dashboard_lib->paging(count($data['daftar_produk']),3);
		$strLink = $this->pagination->create_links();
		$data['links'] = explode('&nbsp;',$strLink );*/
		if($this->session->userdata('logged_in')==true){
			$data['user'] = $this->penjual_model->get_user($this->session->userdata('username'))->row();;
			$this->template->display('result_page',$data,'ada');
		}else
			$this->template->display('result_page',$data);
	}

	public function cariProduk($sortedBy='tgl_ditambah',$sortedType='desc') {
		$target = $this->input->post('search','true');
		$this->session->set_userdata('search',$target);
		$result['daftar_produk']=$this->produk_model->getAll();
		if($target==null)
			if($this->session->userdata('logged_in')==true){
		  		$result['user'] = $this->penjual_model->get_user($this->session->userdata('username'))->row();
				$this->template->display('allproduct_page',$result,'ada');
			}else
				$this->template->display('allproduct_page',$result);
		else{
			$this->session->set_userdata('search',$target);
			$result['daftar_result'] = $this->produk_model->searchProduk($target);
			$this->sortBy($sortedBy,$result['daftar_result'],$sortedType);
			$this->session->set_userdata('sort', $result['daftar_result']);
			if($this->session->userdata('logged_in')==true){
		  		$result['user'] = $this->penjual_model->get_user($this->session->userdata('username'))->row();
				$this->template->display('result_page',$result,'ada');
			}
			else
				$this->template->display('result_page',$result);
		}
	}
	public function cariByKategori($id,$sortedBy='tgl_ditambah',$sortedType='desc') {

		$target = $this->session->userdata('search');
		$result['daftar_produk']=$this->produk_model->getAll();
		$result['daftar_result']=array();
		$datafetch = array();
		if($target==null)
			$this->kategoriView($id);
		else{
			$this->session->set_userdata('search',$target);
			$kategori = $this->dashboard_lib->getCategory($id);
			$products = array();
			$products [] = $this->produk_model->searchProduk($target,$id);
			$parent = $this->kategori_model->get_secondary($id)->result();
			if($parent==null){
				$result['daftar_result'] = $this->produk_model->searchProduk($target,$id);
			}else{
				foreach ($kategori as $mainCat) {
					$products[]=$this->produk_model->searchProduk($target,$mainCat['id_kategori']);
					foreach ($mainCat['sub_categories'] as $sub) {
						$products[]=$this->produk_model->searchProduk($target,$sub['id_kategori']);
					}
				}
				for ($i=0;$i<count($products);$i++){
					for($j=0;$j<count($products[$i]);$j++){
						$datafetch[]=$products[$i][$j];
					}
				}
				$result['daftar_result']=$datafetch;
			}
			$this->sortBy($sortedBy,$result['daftar_result'],$sortedType);
			$this->session->set_userdata('sort', $result['daftar_result']);
			if($this->session->userdata('logged_in')==true){
		  		$result['user'] = $this->penjual_model->get_user($this->session->userdata('username'))->row();
				$this->template->display('result_page',$result,'ada');
			}
			else
				$this->template->display('result_page',$result);
		}
	}
	public function tambahProduk(){
		$data['chain_kategori']=$this->kategori_model->getDropdown();
		
		$kat['kat1'] = $this->input->post('kategori','true');
		$kat['kat2'] = $this->input->post('kategori2','true');
		$kat['kat3'] = $this->input->post('kategori3','true');
		if ($kat['kat3'] == null){
			if ($kat['kat2'] == null) {
				$idKategori = $kat['kat1'];
			} else{
				$idKategori = $kat['kat2'];
				}	
		} elseif ($kat['kat3'] != null) {
			$idKategori = $kat['kat3'];
		}
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
	public function ubahProdukDetail($id,$uname){
		$data['produk']=$this->produk_model->getOnePro($id)->row();
		$data['kate3'] = $this->kategori_model->getOneCat($data['produk']->id_kategori)->row();
		$data['kate2'] = $this->kategori_model->getOneCat($data['kate3']->parent_id)->row();
		$data['kate1'] = $this->kategori_model->getOneCat($data['kate2']->parent_id)->row();

		$data['chain_kategori']=$this->kategori_model->getDropdown();	
		$kat['kat1'] = $this->input->post('kategori','true');
		$kat['kat2'] = $this->input->post('kategori2','true');
		$kat['kat3'] = $this->input->post('kategori3','true');
		if($kat['kat1']==null){
			$idKategori = $data['produk']->id_kategori;
		}else if ($kat['kat3'] == null){
			if ($kat['kat2'] == null) {
				$idKategori = $kat['kat1'];
			} else{
				$idKategori = $kat['kat2'];
				}	
		} elseif ($kat['kat3'] != null) {
			$idKategori = $kat['kat3'];
		}
  		$data['user'] = $this->penjual_model->get_user($this->session->userdata('username'))->row();
		$post['nama'] = $this->input->post('nama','true');
		$post['jumlah'] = $this->input->post('jumlah','true');
		$post['harga'] = $this->input->post('harga','true');
		$post['deskripsi'] = $this->input->post('deskripsi','true');

		$this->form_validation->set_rules('kategori', 'Kategori','');
		$this->form_validation->set_rules('nama', 'Nama Barang','required');
		$this->form_validation->set_rules('jumlah','Jumlah Barang','required|integer');
		$this->form_validation->set_rules('harga','Harga Barang','required|integer');

		if($this->form_validation->run() == FALSE)
			$this->template->display('editproduk_page',$data,'ada');
		else
		{
			$gbr = $data['produk']->nama_gbr;
			$gambar = array('nama_gbr'=>$gbr);
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
			$this->produk_model->changeProdukDetail($post,$id,$idKategori,$gambar);
			echo '<script language="javascript">';
	        echo 'alert("Product Berhasil diubah")';
	        echo '</script>';
	        redirect(site_url('penjual/viewAkun/'.$uname.'/barang'));
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

	function buy($id){
		//Set variables for paypal form
		$paypalURL = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //test PayPal api url
		$paypalID = 'rian95-facilitator@gmail.com'; //business email
		$returnURL = site_url(); //payment success url
		$cancelURL = site_url(); //payment cancel url
		$notifyURL = site_url('paypal/ipn'); //ipn url
		//get particular product data
		$product = $this->produk_model->getRows($id);
		$userID = 1; //current user id
		$logo = base_url().'assets/images/codexworld-logo.png';
		
		$this->paypal_lib->add_field('business', $paypalID);
		$this->paypal_lib->add_field('return', $returnURL);
		$this->paypal_lib->add_field('cancel_return', $cancelURL);
		$this->paypal_lib->add_field('notify_url', $notifyURL);
		$this->paypal_lib->add_field('item_name', $product['nama']);
		$this->paypal_lib->add_field('custom', $userID);
		$this->paypal_lib->add_field('item_number',  $product['id_barang']);
		$this->paypal_lib->add_field('amount',  $product['harga']);		
		$this->paypal_lib->image($logo);
		
		$this->paypal_lib->paypal_auto_form();
	}
}