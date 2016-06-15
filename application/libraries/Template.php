<?php
class Template {
	protected $_ci;
	function __construct()
	{
		$this->_ci =&get_instance();
	}
	function display($template,$data=null,$log=null)
	{
		$_ci =&get_instance();
		$_ci->load->model('Kategori_model');
		$kat['daftar_kategori']=$_ci->Kategori_model->getAll();
		$menu = $this->chooseMenu($log);
		$_data['_content']=$this->_ci->load->view($template,$data, true);	
		$_data['_header']=$this->_ci->load->view('template/header',$data, true);
		$_data['_kategori_menu']=$this->_ci->load->view('template/menu_kategori',$kat, true);
		$_data['_top_menu']=$this->_ci->load->view('template/'.$menu,$data, true);
		$_data['_right_menu']=$this->_ci->load->view('template/sidebar',$data, true);
		$this->_ci->load->view('/template.php',$_data);
	}
	function chooseMenu($log){
		$menu = 'menu'; //nama file di views/template/menu.php
		if($log!=null){
			$menu = 'menu_dashboard'; //nama file di views/template/menu_dahsboard.php
		}
		return $menu;
	}
}