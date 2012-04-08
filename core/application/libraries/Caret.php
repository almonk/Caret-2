<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Caret {
    // This is where the magic happens
    public function ___construct(){

    }

    public function get_site_map(){
        $CI =& get_instance();
        $CI->load->helper('directory');
        require_once(APPPATH . 'third_party/yaml/lib/sfYamlParser.php');
        
        // Instantiate a new Yaml Parser
        $yaml = new sfYamlParser();

        // Get content folder
        $theme_folder = $CI->config->item('theme_folder');

        $map = directory_map($theme_folder . 'content');

        $pages = '';
        $i = 0;

        foreach ($map as $folder => $file) {
            // Parse the contents of the yaml file into the $page array
            if (is_string($folder)) {
                $map = directory_map($theme_folder . 'content/' . $folder);
                $this->parse_folder($map, $folder, $i);

            }else{
                $GLOBALS['pages'][$i] = $yaml->parse(file_get_contents($theme_folder . 'content/' . $file));
                $GLOBALS['pages'][$i]['_caret_filename'] = base64_encode($file);
                $i++;
            }
        }

        return $GLOBALS['pages'];
        unset($GLOBALS['pages']);
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

    function parse_folder($map, $folder_name, $i){
        $CI =& get_instance();
        $CI->load->helper('directory');
        require_once(APPPATH . 'third_party/yaml/lib/sfYamlParser.php');

        // Instantiate a new Yaml Parser
        $yaml = new sfYamlParser();

        // Get content folder
        $theme_folder = $CI->config->item('theme_folder');

        $pages = '';

        foreach ($map as $folder => $file) {
            // Parse the contents of the yaml file into the $page array
            if (is_string($folder)) {
                $map = directory_map($theme_folder . 'content/' . $folder_name . '/' . $folder);
                $this->parse_folder($map, $folder_name . '/' . $folder, $i);
            }else{
                $GLOBALS['pages'][$i] = $yaml->parse(file_get_contents($theme_folder . 'content/' . $folder_name . '/' . $file));
                $GLOBALS['pages'][$i]['_caret_filename'] = base64_encode($folder_name . '/' . $file);
                $i++;
            }
        }
    }

}

