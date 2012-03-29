<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Caret {
    // This is where the magic happens
    
    public function render_page($page_uri){
        // Get the controller instance of CodeIgniter
        $CI =& get_instance();

        // Get the theme folder
        $theme_folder = $CI->config->item('theme_folder');
        
        // Load required files
        $CI->load->spark('markdown/1.2.0');
        $CI->load->helper('url');
        
        require_once('core/application/third_party/h2o-php/h2o.php');
        require_once('CaretFilters.php');
        require_once('CaretTags.php');
        require_once('core/application/third_party/yaml/lib/sfYamlParser.php');
        
        // Instantiate a new Yaml Parser
        $yaml = new sfYamlParser();
        
        // Parse the contents of the yaml file into the $page array
        $page = $yaml->parse(file_get_contents($theme_folder . 'content/' . $page_uri));

        // Create the site array globals
        $config = array(
          'root' => base_url(),
          'segments' => $CI->uri->segment_array()
        );
        
        // Load the template using the yaml key 'template'
        $h2o = new h2o($theme_folder . 'templates/' . $page['template'] . '.html'); // load the template

        // Return the final html
        return html_entity_decode($h2o->render(compact('page', 'config')));
        
    }

    public function find_page($uri){
        $CI =& get_instance();

        // Get the theme folder
        $theme_folder = $CI->config->item('theme_folder');

        // UGH this function is so gross, but it works
        // 
        //
        // Resolves a URI to a file within pages/
        if ($uri == "") { // If uri is blank, assume we mean the homepage
            return "index.yaml"; // Look for the index.yaml datafile
        }else{ // Otherwise, parse the uri to find the matching datafile
            if (is_dir($theme_folder . 'content/' . $uri)) {// Check the directory exists
                return $uri . '/index.yaml'; // Return the index.yaml file in this directory
            }else{
                // Check the file exists
                if (file_exists($theme_folder . 'content/' . $uri . '.yaml')) {
                    return $uri . '.yaml';
                }else{
                    // Throw 404
                    show_404(); 
                }
            }
        }
    }

}

