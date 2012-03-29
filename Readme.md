# Caret 2
### The NoDB, Yaml based CMS

Caret 2 is a little CMS, built in CodeIgniter, that allows you to quickly add a simple content management system to a website without the need for a database and with very little configuration.

## Installation

The quickest way to get started on your local machine is with MAMP or XAMPP. Clone Caret into your htdocs directory:

	git clone https://almonk@github.com/almonk/Caret-2.git caret2
	
Now browse to <code>http://localhost/caret2</code> and you should see the **'FFFUU It works!'** screen.

## Configuration

### Step 1: Edit the config file

If your configuration is a little different, and it probably will be, open up the config file at <code>core/application/config/config.php</code>.

You'll see something like this:

	/*
	|--------------------------------------------------------------------------
	| Base Site URL
	|--------------------------------------------------------------------------
	|
	| URL to your CodeIgniter root. Typically this will be your base URL,
	| WITH a trailing slash:
	|
	|	http://example.com/
	|
	| If this is not set then CodeIgniter will guess the protocol, domain and
	| path to your installation.
	|
	*/
	$config['base_url']	= 'http://localhost/caret2/';
	
	
Change this values to reflect your environment.

### Step 2: Edit the .htaccess file

In the root of your Caret installation, open up the .htaccess file. You'll see something like this:

	RewriteEngine on
	RewriteCond $1 !^(index\.php|public|images|robots\.txt)
	RewriteRule ^(.*)$ /caret2/index.php/$1 [L]
	
Change the string <code>/caret2</code> to the name of your subfolder or, if you want Caret to run in the root of your domain remove it entirely (leaving just index.php).

	