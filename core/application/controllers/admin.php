<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
    
    public function index(){
        if ($this->session->userdata('logged_in') == true) {
            $this->load->helper('html');
        	$data['pages'] = $this->caret->get_site_map();
        	$data['base_url'] = base_url();

        	$this->load->view('admin/header', $data);
    	    $this->load->view('admin/dashboard', $data);
    	    $this->load->view('admin/footer');
        }else{
            redirect('admin/login');
        }
    }

    public function login(){
        $this->load->helper('form');
        $data['base_url'] = base_url();
        $this->load->view('admin/login', $data);
    }

    public function do_login(){
        if ($this->input->post('password') == $this->config->item('admin_password')) {
            $this->session->set_userdata('logged_in', true);
            redirect('admin');
        }else{
            $this->session->set_flashdata('fail', '<b>Incorrect password</b>');
            redirect('admin/login');
        }
    }

    public function logout(){
        $this->session->unset_userdata('logged_in');
        redirect(base_url());
    }
    
    public function page($file){
        $this->load->helper('form');

        $data['base_url'] = base_url();
    	$data['page'] = $this->cpage->parse(base64_decode($file));
        $data['pages'] = $this->caret->get_site_map();

    	$this->load->view('admin/header', $data);
	    $this->load->view('admin/page', $data);
	    $this->load->view('admin/footer');
    }

    public function save($page_uri){
        $this->caret->save_page(base64_decode($page_uri), $this->input->post());
        $this->session->set_flashdata('success', '<b>Page updated</b>');
        
        redirect('admin/page/' . base64_decode($page_uri));
    }

    public function templates(){
        $theme_folder = $this->config->item('theme_folder');
        $data['base_url'] = base_url();

        $data['templates'] = directory_map(APPPATH . '../../' . $theme_folder . '/templates');

        $this->load->view('admin/header', $data);
        $this->load->view('admin/templates', $data);
        $this->load->view('admin/footer');
    }

    public function template($file){
        $theme_folder = $this->config->item('theme_folder');
        $this->load->helper('form');
        $this->load->helper('file');

        $data['title'] = base64_decode($file);
        $data['content'] = read_file(APPPATH . '../../' . $theme_folder . '/templates/' . $data['title']);
        $data['base_url'] = base_url();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/template', $data);
        $this->load->view('admin/footer');
    }

    public function save_template($file){
        $theme_folder = $this->config->item('theme_folder');

        $file = base64_decode($file);
        $contents = $this->input->post('content');

        file_put_contents($theme_folder . 'templates/' . base64_decode($file), $contents);

        $this->session->set_flashdata('success', '<b>Template saved</b>');
        redirect('admin/template/' . $file);
    }

}
