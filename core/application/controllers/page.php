<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {
    
    public function index(){	    
	    $page_uri = $this->cpage->find(uri_string());
	    echo $this->cpage->render($page_uri);
    }
    
}
