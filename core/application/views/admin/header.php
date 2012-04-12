<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8 />
	<title>Caret</title>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>core/assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>core/assets/css/admin.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="twelve columns">
				<ul class="nav-bar">
					<li>
						<a class="main" href="<?=$base_url . 'admin'?>">Pages</a>
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

		<div class="row">
			<div class="twelve columns">
			<? if($this->session->flashdata('success')):?>
				<div class="alert-box success">
					<?=$this->session->flashdata('success');?>
				</div>
			<? endif ?>
			</div>
		</div>