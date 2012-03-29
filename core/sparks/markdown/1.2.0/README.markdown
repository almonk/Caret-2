# Markdown

This spark can be used to transform markdown to HTML. It includes and uses third-party class
available at [http://michelf.com/projects/php-markdown/](http://michelf.com/projects/php-markdown/).

It is currently in use at [GetSparks.org](http://getsparks.org).

## Usage

To use this spark, first load it. After that, you can call the parse_markdown
function, which accepts a block of markdown, and returns HTML. Here's an example:

    # Below, x.x is the version number
    $this->load->spark('markdown/x.x');
    $html = parse_markdown($some_markdown_string);

## Support

Send any questions to me at katzgrau@gmail.com, or find me on Twitter: [@\_kennyk\_](http://twitter.com/_kennyk_)