<?php

class Get_from_Tag extends H2o_Node{
    var $page;

    function __construct($argstring, $parser, $pos=0) {
        // Get the controller instance of CodeIgniter
        $CI =& get_instance();

        // Get the theme folder
        $theme_folder = $CI->config->item('theme_folder');

        $this->page = $argstring;
        $this->body = $parser->parse('endget_from');
        $options = $parser->options;
    }

    function render($context, $stream){
        $yaml = new sfYamlParser();
       
        // Parse the contents of the yaml file into the $page array
        $page = $yaml->parse(file_get_contents($theme_folder . $this->page . '.yaml'));

        $output = new StreamWriter;
       
        $context->set('get', $page);
        $this->body->render($context, $output);
        
        $output = $output->close();

        $stream->write($output);
    }
}

class Children_of_Tag extends H2o_Node{
   
    function __construct($argstring, $parser, $pos=0) {
        $this->page = $argstring;
        $this->body = $parser->parse('endchildren_of');
        $options = $parser->options;
    }
    
    function render($context, $stream){
        $CI =& get_instance();

        $CI->load->helper('directory');

        // Map the directory beneath the specified folder
        if ($this->page == '/') {
          // Get children of the root
          $children = directory_map('pages/');
        }else{
          // Look at the uri the user has provided
          $children = directory_map('pages/' . $this->page . '/');
        }

        $yaml = new sfYamlParser();
        
        $output = new StreamWriter;
       
        $context->set('children', $children);
        $this->body->render($context, $output);
        
        $output = $output->close();

        $stream->write($output); 
    }
    
}

h2o::addTag('get_from');
h2o::addTag('children_of');