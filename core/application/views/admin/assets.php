<?=form_open_multipart('admin/asset/upload') ?>
<div class="row">
	<div class="twelve columns">
		<h3>Assets</h3>
		<br/>
	</div>
</div>

<div class="row">
    <div class="eight columns">
    	<table style="width:100%">
    		<thead>
	    		<tr>
		    		<th>
		    			Filename
		    		</th>
		    	</tr>
		    </thead>
			<? foreach ($assets as $asset): ?>
				<tr>
					<td>
						<a href="<?=$this->caret->get_asset_url($asset)?>" target="_blank">
							<?=$asset?>
						</a>
					</td>
				</tr>
			<? endforeach ?>
		</table>
	</div>

	<div class="four columns">

		<div class="panel">
			<h5>Add asset</h5>
			<p>Caret only accepts jpgs, png, gif files at a maximum of 3MB</p>
	    	<?=form_upload('userfile','')?>
			<?=form_submit('upload','Upload')?>
		</div>
	</div>
</div>
</form>