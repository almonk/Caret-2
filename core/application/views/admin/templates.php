<div class="row">
    <div class="twelve columns">
		<h4>Templates</h4>

    	<ul>
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