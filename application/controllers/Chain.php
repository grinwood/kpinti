<?php 
	if (!defined('BASEPATH'))exit('No direct script access allowed');

	class Chain extends CI_Controller {

		function __construct() {
			parent::__construct();
			
			$this->load->helper(array('url','html'));
			$this->load->model('kategori_model');
			$this->load->database();
		}

		function index() {
		}
		
		function add_ajax_kat($id_kategori){
		    $query = $this->db->get_where('kategori',array('parent_id'=>$id_kategori));
		    $data = "<option disabled selected value > - Pilih Sub Kategori  - </option>";
		    foreach ($query->result() as $value) {
		        $data .= "<option value='".$value->id_kategori."'>".$value->nama_kategori."</option>";
		    }
		    echo $data;
		}
		
		function add_ajax_kat2($id_kategori2){
		    $query = $this->db->get_where('kategori',array('parent_id'=>$id_kategori2));
		    $data = "<option disabled selected value> - Pilih Sub Kategori - </option>";
		    foreach ($query->result() as $value) {
		        $data .= "<option value='".$value->id_kategori."'>".$value->nama_kategori."</option>";
		    }
		    echo $data;
		}
	}
?>