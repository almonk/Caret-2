<?php

class Get_from_Tag extends H2o_Node{
    var $page;

    function __construct($argstring, $parser, $pos=0) {

        $this->page = $argstring;
        $this->body = $parser->parse('end get_from');
        $options = $parser->options;
    }

    function render($context, $stream){
        // Get the controller instance of CodeIgniter
        $CI =& get_instance();

        // Get the theme folder
        $theme_folder = $CI->config->item('theme_folder');

        $yaml = new sfYamlParser();
       
        // Parse the contents of the yaml file into the $page array
        $page = $yaml->parse(file_get_contents($theme_folder . 'content/' . $this->page . '.yaml'));

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
        $this->body = $parser->parse('end children_of');
        $options = $parser->options;
    }
    
    function render($context, $stream){
        // Get the controller instance of CodeIgniter
        $CI =& get_instance();
        $Caret = new Caret();

        // Get the theme folder
        $theme_folder = $CI->config->item('theme_folder');

        $yaml = new sfYamlParser();

        $CI->load->helper('directory');

        // Map the directory beneath the specified folder
        if ($this->page == '') {
          // Get children of the root
          $children = directory_map($theme_folder . 'content/', 1);
        }else{
          // Look at the uri the user has provided
          $children = directory_map($theme_folder . 'content/' . $this->page . '/', 1);
        }

        // Reset our counter variable
        $i = 0;

        // Loop through directory and parse yaml files
        foreach ($children as $child) {
            // If child contains yaml, we know it's a page and not a folder
            if (strpos($child, '.yaml')) {
                $page[$i] = $yaml->parse(file_get_contents($theme_folder . 'content/' . $this->page . '/' . $child));

                $page[$i]['url'] = $Caret->add_page_url($this->page . '/' . $child);

                // Increase the counter
                $i++;
            }
        }
        $output = new StreamWriter;
       
        $context->set('children', $page);
        $this->body->render($context, $output);
        
        $output = $output->close();

        $stream->write($output); 

    }
    
}

h2o::addTag('get_from');
h2o::addTag('children_of');