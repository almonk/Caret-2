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
        $config['upload_path'] = FCPATH . $theme_folder . 'assets/img/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '100';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';

        $CI->load->library('upload', $config);

        if ( ! $CI->upload->do_upload('image1'))
        {
            $error = array('error' => $CI->upload->display_errors());
            print_r($error);
        }
        else
        {

        }

        require_once(APPPATH . 'third_party/yaml/lib/sfYamlDumper.php');

        // There's some things we don't want to write...
        unset($array['url']);
        
        // Instantiate a new Yaml Parser
        $dumper = new sfYamlDumper();

        $yaml = $dumper->dump($array, 2);

        file_put_contents($theme_folder . 'content/' . base64_decode($page_uri) , $yaml);
    }

    public function get_field_type($key){
        // Get the controller instance of CodeIgniter
        $CI =& get_instance();

        // Get the theme folder
        $theme_folder = $CI->config->item('theme_folder');
        $fields_file = $theme_folder . '/templates/fields.yaml';

        // Instantiate a new Yaml Parser
        $yaml = new sfYamlParser();
        
        // Parse the contents of the yaml file into the $page array
        $fields = $yaml->parse(file_get_contents($fields_file));

        // Any fields we want to hide?
        if ($key == 'template' || $key == 'url') {
            return 'hidden';
        }

        // Find the field to render for this key
        if ($fields[$key]!='') {
            return $fields[$key];
        }else{
            // We can't find anything, so just return a standard input
            return 'text';
        }        
    }

    public function pretty_key($key){
        $key = ucwords($key);
        $key = str_replace("_", " ", $key);
        $key = str_replace("-", " ", $key);
        return $key;
    }
}