<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
    
    public function index(){
    	$this->load->library('Caret');
    	$this->load->helper('url');

    	$data['pages'] = $this->caret->get_site_map();
    	$data['base_url'] = base_url();

    	$this->load->view('admin/header', $data);
	    $this->load->view('admin/dashboard', $data);
	    $this->load->view('admin/footer');
    }
    
    public function page($file){
    	$this->load->library('Caret');
    	$this->load->helper('url');
        $this->load->helper('form');

        $data['base_url'] = base_url();
    	$data['page'] = $this->caret->parse_page(base64_decode($file));
        $data['pages'] = $this->caret->get_site_map();

    	$this->load->view('admin/header', $data);
	    $this->load->view('admin/page', $data);
	    $this->load->view('admin/footer');
    }

    public function save($page_uri){
        $this->load->library('Caret');

        $this->caret->save_page(base64_decode($page_uri), $this->input->post());
    }

}
