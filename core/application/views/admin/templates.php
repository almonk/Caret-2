<div class="row">
    <div class="eight columns">
		<h3>Templates</h3>
		<br/>

    	<table style="width:100%">
    		<thead>
	    		<tr>
		    		<th>
		    			Filename
		    		</th>
		    	</tr>
		    </thead>
			<? foreach ($templates as $template): ?>
				<tr>
					<td>
						<a href="<?=$base_url . 'admin/template/' . base64_encode($template)?>">
							<?=$template?>
						</a>
					</td>
				</tr>
			<? endforeach ?>
		</table>
	</div>
</div>