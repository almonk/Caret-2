<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8 />
	<title>Caret</title>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>core/assets/js/codemirror.js"></script>
	<script type="text/javascript" src="<?=base_url()?>core/assets/js/util/yaml.js"></script>
	<script type="text/javascript" src="<?=base_url()?>core/assets/js/util/simple-hint.js"></script>
	<script type="text/javascript" src="<?=base_url()?>core/assets/js/admin.js"></script>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>core/assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>core/assets/css/codemirror.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>core/assets/css/admin.css">
</head>
<body>
	<div class="container header">
		<div class="row">
			<div class="twelve columns">
				<ul class="nav-bar">
					<li>
						<a class="main" href="<?=$base_url . 'admin'?>">Pages</a>
					</li>
					<li>
						<a class="main" href="<?=$base_url . 'admin/assets'?>">Assets</a>
					</li>
					<li>
						<a class="main" href="<?=$base_url . 'admin/templates'?>">Templates</a>
					</li>
					<li>
						<a class="main" href="<?=$base_url . 'admin/logout'?>">Log out</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="twelve columns" style="margin-top:-20px;">
			<?  if (!is_dir($this->config->item('theme_folder'))): ?>
				<div class="alert-box">
					<b>No site folder found.</b>
				</div>
			<? endif ?>

			<? if($this->session->flashdata('success')):?>
				<div class="alert-box success">
					<?=$this->session->flashdata('success');?>
				</div>
			<? endif ?>
			<? if($this->session->flashdata('fail')):?>
				<div class="alert-box error">
					<?=$this->session->flashdata('fail');?>
				</div>
			<? endif ?>
			</div>
		</div>
		<div class="page">