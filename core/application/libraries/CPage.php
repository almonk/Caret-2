<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class CPage {
    // This is where the magic happens
    public function ___construct(){
        
    }

    public function render($page_uri){
        // Get the controller instance of CodeIgniter
        $CI =& get_instance();

        // Get the theme folder
        $theme_folder = $CI->config->item('theme_folder');
        
        $page = $this->parse($page_uri);

        // Create the site array globals
        $config = array(
            'root' => base_url(),
            'theme_root' => base_url() . $theme_folder
        );

        $session = array(
            'segments' => $CI->uri->segment_array(),
            'url' => current_url()
        );
        
        // Load the template using the yaml key 'template'
        $h2o = new h2o($theme_folder . 'templates/' . $page['template'] . '.html'); // load the template

        // Return the final html
        return html_entity_decode($h2o->render(compact('page', 'config', 'session'))); 
    }

    public function find($uri){
        $CI =& get_instance();

        // Get the theme folder
        $theme_folder = $CI->config->item('theme_folder');

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

    public function parse($page_uri){
        // Get the controller instance of CodeIgniter
        $CI =& get_instance();

        // Get the theme folder
        $theme_folder = $CI->config->item('theme_folder');
        
        // Load required files
        $CI->load->spark('markdown/1.2.0');
        require_once(APPPATH . 'third_party/h2o-php/h2o.php');
        require_once('CFilters.php');
        require_once('CTags.php');
        require_once(APPPATH . 'third_party/yaml/lib/sfYamlParser.php');
        
        // Instantiate a new Yaml Parser
        $yaml = new sfYamlParser();
        
        // Parse the contents of the yaml file into the $page array
        $page = $yaml->parse(file_get_contents($theme_folder . 'content/' . $page_uri));

        $page['url'] = $this->add_url($page_uri);

        return $page;
    }

    private function add_url($page_uri){
        $page_array = '';

        $base_url = base_url();

        // If it's the homepage, we know the url already
        if ($page_uri == 'index.yaml') {
            return base_url();
        }else{
                // Otherwise, we gotta figure it out
            $page_array['url'] = explode('.', $page_uri); // Remove .yaml from pageuri

            // If we get double slashes in the url, we need to remove them
            if (substr($page_array['url'][0], 0, 1) == '/') {
                $base_url = substr_replace(base_url() ,"",-1);
            }

            $page_array['url'] = $base_url . $page_array['url'][0]; // Grab first element of exploded array

            // Turn trailing index into /
            if (substr($page_array['url'], -5) == 'index') {
                $page_array['url'] = str_replace('index', '',  $page_array['url']);
            }

            if (substr($page_array['url'], -1) == '/') {
                $length = strlen($page_array['url']);
                $page_array['url'] = substr($page_array['url'], 0 , $length -1);
            }

            return $page_array['url'];
        }
    }

}

