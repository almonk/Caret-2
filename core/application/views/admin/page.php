<div class="row-fluid">
	<div class="span12">
		<? if($this->session->flashdata('success')):?>
			<div class="alert alert-success">
				<?=$this->session->flashdata('success');?>
			</div>
		<? endif ?>
		<h1><?=$page['title']?></h1>
		<br/>
	</div>
</div>

<div class="row-fluid">
	<div class="span9">

		<?=form_open('admin/save/' . base64_encode($this->uri->segment(3) )) ?>
			<fieldset class="well">
			<? foreach ($page as $key => $value):?>
				<div class="control-group">
					<label class="control-label"><?=$key?></label>						
					<div class="controls">
						<?php if ($key == 'body'): ?>
							<textarea class="input-xlarge span9" style="height:250px;" name="<?=$key?>"><?=$value?></textarea>
						<?php else: ?>	
							<input type="text" class="input-xlarge" name="<?=$key?>" value="<?=$value?>">
						<? endif ?>						
					</div>
				</div>
			<? endforeach; ?>
			<div class="form-actions">
	            <button type="submit" class="btn btn-primary span">Save changes</button>
			</div>
			</fieldset>
		</form>
	</div>

	<div class="span3">
		<a href="<?=$page['url']?>" class="btn" target="_blank">View page</a>
	</div>

</div>