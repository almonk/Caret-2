<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
    
    public function index(){
    	$this->load->library('Caret');
    	$this->load->helper('url');

    	$data['pages'] = $this->caret->get_site_map();
    	$data['base_url'] = base_url();

	    $this->load->view('admin/dashboard', $data);
    }
    
    public function page($file){
    	$this->load->library('Caret');
    	$this->load->helper('url');

    	echo base64_decode($file);

    	$data['base_url'] = base_url();

	    $this->load->view('admin/page', $data);
    }

}
