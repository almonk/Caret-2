<div class="row-fluid">
    <div class="span2">
    	<ul class="nav nav-tabs nav-stacked">
			<? foreach ($pages as $page_item): ?>
				<li>
					<a href="<?=$base_url . 'admin/page/' . $page_item['_caret_filename']?>">
						<?=$page_item['title']?><br/>
						<span style="color:gray;font-size:11px;"><?=base64_decode($page_item['_caret_filename'])?></span>
					</a>
				</li>
			<? endforeach ?>
		</ul>
	</div>

	<div class="span10">
		<? if($this->session->flashdata('success')):?>
			<div class="alert alert-success">
				<?=$this->session->flashdata('success');?>
			</div>
		<? endif ?>

		<h1>Edit page</h1>

		<?=form_open('admin/save/' . base64_encode($this->uri->segment(3) )) ?>
			<fieldset>
			<legend><?=$page['title']?></legend>
			<? foreach ($page as $key => $value):?>
				<div class="control-group">
					<label class="control-label"><?=$key?></label>						
					<div class="controls">
						<?php if ($key == 'body'): ?>
							<textarea class="input-xlarge" style="height:100px;" name="<?=$key?>"><?=$value?></textarea>
						<?php else: ?>	
							<input type="text" class="input-xlarge" name="<?=$key?>" value="<?=$value?>">
						<? endif ?>						
					</div>
				</div>
			<? endforeach; ?>
			<div class="form-actions">
	            <button type="submit" class="btn btn-primary">Save changes</button>
			</div>
			</fieldset>
		</form>
	</div>

</div>