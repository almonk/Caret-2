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
	
	
Change the value of <code>$config['base_url']</code> to reflect the URL to your Caret installation.

### Step 2: Edit the .htaccess file

In the root of your Caret installation, open up the .htaccess file. You'll see something like this:

	RewriteEngine on
	RewriteCond $1 !^(index\.php|public|images|robots\.txt)
	RewriteRule ^(.*)$ /caret2/index.php/$1 [L]
	
Change the string <code>/caret2</code> to the name of your subfolder or, if you want Caret to run in the root of your domain remove it entirely (leaving just index.php).

<hr/>

## Writing content

Everything from the content to the assets and templates of your site are kept (by default) in the <code>site/</code> directory (we'll refer to this as the 'theme'). You can change the name of this folder within the <code>core/application/config/config.php</code> file.

### Pages

Pages are where all your content lives. They are simple yaml files found within the <code>/site/content</code> directory. Let's go ahead and write our first page, it will be an about page, so we'll give it the filename <code>index.yaml</code>.

Now the file has been created, we'll enter some content...

	Title: Homepage
	Template: default
	Body: We are a small company founded in 1989...

<div>
    <strong>Remember!</strong> Your page defines which layout renders it using the <code>Template:</code> key
</div>

Note that the folder structure in this directory corresponds exactly to your URL structure so that if we put an <code>index.yaml</code> file within <code>site/content/about</code> that page could be found at <code>http://localhost/caret2/about</code>

Now, we need to display that content with a template.

### Relation to templates

Templates are HTML files found within the <code>/site/templates</code> directory. These files prescribe how your content is rendered. Caret uses the [h2o templating language](http://www.h2o-template.org/), which keeps things clean & simple.

Our about page created above will be looking for a template called <code>default.hmtml</code>, so lets create that and fill it with a skeletal layout.

	<!DOCTYPE html>
	<html>
	<head>
		<meta charset=utf-8 />
		<title>{{ page.title }}</title>
		<link rel="stylesheet" type="text/css" href="{{ config.theme_root }}assets/css/master.css" />
	</head>
	<body>
		<h1>{{ page.title }}</h1>

		{{ page.body }}
	</body>
	</html>

Now, if you visit <code>http://localhost/caret2/</code>, you should see your template rendered with the data fromm your about page pulled in. Magic.

<hr/>

## Tags
Tags are written in your templates and help you do various things with your data. 
For a full list of h2o tags, please see this list, this page covers tags **unique to Caret only**.

### get_from tag
This tag allows you to grab data from any page of your Caret site. You could use it to avoid duplicating content in your pages.

For example, if we wanted to get the telephone number from our home page, we could use the following code in any page.

	{% get_from index %}
		{{ get.phone }}
	{% endget_from %}

<hr/>


## Filters

Filters are used to modify the output of Caret. H2o has some built in filters, but here we'll focus on the ones exclusive to Caret.

### Markdown

Filtering your data through the inbuilt Markdown parser is simple and helps to keep your yaml files HTML free. Filters are added using the pipe symbol ( **|** ), so if we wanted to parse the contents of our <code>{{ page.body }}</code>, we'd do it like this.

    {{ page.body | markdown }}

<hr/>

## Environment variables

Caret injects various variables into templates to make your life easier; <code>page</code> which relates to all the data defined in your yaml file for the currently viewed page, and <code>config</code> which contains information about your configuration.

### page
Say for example you create a yaml file within pages called about.yaml. Your page might look something like this:

	Title: About us
	Template: default
	Body: We are a small company situated in Greater London
	...

If I wanted to output the body text, within my template you'd write <code>{{ page.body }}</code>.


### config

Caret injects three variables to each template:

- <code>{{ config.root }}</code> - The base url of the site e.g. http://localhost/caret2/
- <code>{{ config.theme_root }}</code> - The base url of the theme e.g. http://localhost/caret2/site/
- <code>{{ config.segments }}</code> - An array containing the segments within the url. For example, if we had the url http://localhost/caret2/about/company/history, this array would contain <code>['about', 'company', 'history']</code>. Useful for building breadcrumbs.

These variables are useful for using in your templates to point to other resources, e.g.

    <link rel="stylesheet" href="{{ config.theme_root }}assets/css/bootstrap.css">
    <link rel="stylesheet" href="{{ config.theme_root }}assets/css/style.css">

	…

	<a href="{{ config.root }}">Go home</a>

<hr/>

## About
Caret is a little project by [Alasdair Monk](http://alasdairmonk.com), it is entirely free of charge for use in personal or commercial projects.
