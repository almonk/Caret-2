<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {
    
    public function index(){	    
	    $page_uri = $this->cpage->find(uri_string());
	    echo $this->cpage->render($page_uri);

	    if ($this->config->item('cache_enabled')) {
	    	// Turn caching on
	    	$this->output->cache($this->config->item('cache_time'));
	    }

	    if ($this->config->item('debug')) {
	    	$this->output->enable_profiler(TRUE);http://www.kimantra.co.uk/
	    }
    }
    
}
