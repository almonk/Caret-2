<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8 />
	<title>Caret</title>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<style>
		<? require('bootstrap.css') ?>
	</style>
</head>
<body>
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container">
				<ul class="nav">
					<li>
						<a href="<?=$base_url . 'admin'?>">Pages</a>
					</li>
					<li>
						<a href="<?=$base_url . 'admin/templates'?>">Templates</a>
					</li>
					<li>
						<a href="#">Log out</a>
					</li>	
				</ul>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row-fluid">
		<? if($this->session->flashdata('success')):?>
			<div class="alert alert-success">
				<?=$this->session->flashdata('success');?>
			</div>
		<? endif ?>
		</div>