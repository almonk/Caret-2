<div class="row-fluid">
    <div class="span12">

		<h1>Templates</h1>
		<br/>

    	<ul class="nav nav-tabs nav-stacked">
			<? foreach ($templates as $template): ?>
				<li>
					<a href="<?=$base_url . 'admin/template/' . base64_encode($template)?>">
						<?=$template?>
					</a>
				</li>
			<? endforeach ?>
		</ul>
	</div>
</div>