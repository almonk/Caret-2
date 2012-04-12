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
			<div class="four columns centered">
			<? if($this->session->flashdata('fail')):?>
				<div class="alert-box error">
					<?=$this->session->flashdata('fail');?>
				</div>
			<? endif ?>
			</div>
		</div>

		<div class="row">
			<div class="four columns centered">
				<?=form_open('admin/do_login') ?>
					<label>Password</label>
					<input type="password" name="password" class="input-text"/>
					<input type="submit" value="Login"/>
				</form>
			</div>
		</div>
	</div>
</body>
</html>