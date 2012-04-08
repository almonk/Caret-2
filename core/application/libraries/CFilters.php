<?
h2o::addFilter('markdown');

class CFilters extends FilterCollection{
    
    function markdown($text){
        // Parses template text into markdown
        return parse_markdown($text); 
    }

}
