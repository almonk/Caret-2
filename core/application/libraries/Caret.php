<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Caret {
    // This is where the magic happens
    public function ___construct(){

    }

    public function get_site_map(){
        $CI =& get_instance();
        $CI->load->helper('caret_directory');

        // Get content folder
        $theme_folder = $CI->config->item('theme_folder');

        $map = caret_directory_map($theme_folder . 'content');
        return $map;
    }

    public function save_page($page_uri, $array){
        // Get the controller instance of CodeIgniter
        $CI =& get_instance();

        // Get the theme folder
        $theme_folder = $CI->config->item('theme_folder');

        require_once(APPPATH . 'third_party/yaml/lib/sfYamlDumper.php');
        
        // Instantiate a new Yaml Parser
        $dumper = new sfYamlDumper();

        $yaml = $dumper->dump($array, 2);

        file_put_contents($theme_folder . 'content/' . base64_decode($page_uri) , $yaml);
    }

}

