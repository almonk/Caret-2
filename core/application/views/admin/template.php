<div class="row-fluid">
	<div class="span12">
		<h1><?=$title?></h1>
		<br/>
	</div>
</div>

<div class="row-fluid">
	<div class="span9">

		<?=form_open('admin/save_template/' . base64_encode($this->uri->segment(3) )) ?>
			<fieldset class="well">
			<textarea class="input-xlarge" style="width:90%;height:450px;font-family:courier" name="content"><?=$content?></textarea>
			<div class="form-actions">
	            <button type="submit" class="btn btn-primary span">Save changes</button>
			</div>
			</fieldset>
		</form>
	</div>

</div>