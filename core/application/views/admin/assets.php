<?=form_open_multipart('admin/asset/upload') ?>
<div class="row">
    <div class="twelve columns">
		<h4>Assets</h4>

    	<?=form_upload('userfile','')?>
    	<?=form_submit('upload','Upload')?>
	</div>
</div>
</form>