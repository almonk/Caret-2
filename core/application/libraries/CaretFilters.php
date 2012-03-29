<?
h2o::addFilter('markdown');
h2o::addFilter('include_js');

class CaretFilters extends FilterCollection{
    
    function markdown($text){
        // Parses template text into markdown
        return parse_markdown($text); 
    }
    
}
