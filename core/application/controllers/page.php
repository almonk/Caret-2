<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {
    
    public function index(){
        $this->load->library('Caret');
        $this->load->helper('url');
        
        // Pass the uri string to Caret's router to resolve a datafile
        $page_uri = $this->caret->find_page(uri_string());
        
        echo $this->caret->render_page($page_uri);
    }
    
}
