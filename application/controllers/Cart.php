<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller{
   function __construct() {
      parent::__construct();
      $this->load->model('billing_model');
      $this->load->library('cart');	
      $this->load->library('template');
      $this->load->model('penjual/penjual_model');
      $this->load->model('m_wilayah');
  }
	
	function index(){
		//$this->template->display('cart_page');
		//$this->load->view('cart_page');
	}
	function view($idpro){
		$data['id_barang'] = $idpro;
		$this->load->view('cart_page',$data);
	}
	function viewall(){
		if($this->session->userdata('logged_in')==true){
			$username = $this->session->userdata('username');
	  		$data['user'] = $this->penjual_model->get_user($username)->row();
			$this->template->display('cartBesar_page',$data,'ada');
	  	}else
			$this->template->display('cartBesar_page');
	}
	function add(){
     	// Set array for send data.
		$insert_data = array(
			'id' => $this->input->post('id'),
			'name' => $this->input->post('name'),
			'price' => $this->input->post('price'),
			'qty' => 1
		);		
        // This function add items into cart.
		$this->cart->insert($insert_data);	      
        // This will show insert data in cart.
		//redirect('shopping');
    }
    function remove($rowid) {
                    // Check rowid value.
		if ($rowid==="all"){
                       // Destroy data which store in  session.
			$this->cart->destroy();
		}else{
                    // Destroy selected rowid in session.
			$data = array(
				'rowid'   => $rowid,
				'qty'     => 0
			);
                     // Update cart data, after cancle.
			$this->cart->update($data);
		}
		
                 // This will show cancle data in cart.
		$this->viewall();
	}
	function update_cart($origin){ 
                // Recieve post values,calcute them and update
                $cart_info =  $_POST['cart'] ;
 		foreach( $cart_info as $id => $cart)
		{	
                    $rowid = $cart['rowid'];
                    $price = $cart['price'];
                    $amount = $price * $cart['qty'];
                    $qty = $cart['qty'];
                    
                    	$data = array(
				'rowid'   => $rowid,
                                'price'   => $price,
                                'amount' =>  $amount,
				'qty'     => $qty
			);
             
			$this->cart->update($data);
		}
		if($origin == "kecil"){
			$id_barang = key($cart_info);
			$this->view($id_barang);
		}else if ($origin =="besar"){
			$this->viewall();
		}   
	}
	
	function billing_view(){
                // Load "billing_view".
		$keranjang = $this->cart->total_items();

        if($keranjang == 0)
        {
            
        }else{
			$data['provinsi']=$this->m_wilayah->get_all_provinsi();
			if($this->session->userdata('logged_in')==true){
				$username = $this->session->userdata('username');
		  		$data['user'] = $this->penjual_model->get_user($username)->row();
				$this->template->display('checkout_page',$data,'ada');
			}else
				$this->template->display('checkout_page',$data);
		}
    }
    function save(){
    	$customer = array(
			'nama' 		=> $this->input->post('nama'),
			'email' 	=> $this->input->post('email'),
			//'provinsi'=> $this->input->post('provinsi'),
			//'kota'	=> $this->input->post('kota'),
			'alamat' 	=> $this->input->post('alamat'),
			'kodePos' 	=> $this->input->post('kodePos'),
			//'keterangan'=>$this->input->post('keterangan'),
			'kurir'		=> $this->input->post('kurir'),
			'caraBayar' => $this->input->post('caraBayar')
		);	
    	var_dump($customer);
    }
    public function save_order(){
          // This will store all values which inserted  from user.
		$customer = array(
			'nama' 		=> $this->input->post('nama'),
			'email' 	=> $this->input->post('email'),
			'provinsi'	=> $this->input->post('provinsi'),
			'kota'		=> $this->input->post('kota'),
			'alamat' 	=> $this->input->post('alamat'),
			'kode_pos' 	=> $this->input->post('kodePos'),
			'keterangan'=> $this->input->post('keterangan'),
			'kurir'		=> $this->input->post('kurir'),
			'cara_bayar' => $this->input->post('caraBayar')
		);		
                 // And store user imformation in database.
		$cust_id = $this->billing_model->insert_customer($customer);

		$order = array(
			'tanggal' 		=> date('Y-m-d'),
			'id_customer' 	=> $cust_id
		);		

		$ord_id = $this->billing_model->insert_order($order);
		
		if ($cart = $this->cart->contents()):
			foreach ($cart as $item):
				$order_detail = array(
					'id_order' 		=> $ord_id,
					'id_produk' 	=> $item['id'],
					'quantity' 		=> $item['qty'],
					'price' 		=> $item['price']
				);		

                            // Insert product imformation with order detail, store in cart also store in database. 
                
		         $cust_id = $this->billing_model->insert_order_detail($order_detail);
			endforeach;
		endif;
	      
                // After storing all imformation in database load "billing_success".
                //$this->load->view('billing_success');
		$this->cart->destroy();
	}
}