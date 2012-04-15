<?=form_open('admin/save/' . base64_encode($this->uri->segment(3) )) ?>
<div class="row">
	<div class="six columns">
		<h3><?=$page['title']?></h3>
		<p><?=$page['url']?> <a href="<?=$page['url']?>" class="btn" target="_blank">view</a></p>
	</div>

	<div class="four columns" style="text-align:right;">
		<input type="submit" value="Save changes" style="display:none;"/>
		<a href="#" class="button black submit">Save page</a>
	</div>
</div>

<div class="row">
	<div class="eight columns form">
			<? foreach ($page as $key => $value):?>
				<? $field = $this->caret->get_field_type($key)?>	

				<? if ($field == 'textarea'): ?>
					<p>
					<label><?=$this->caret->pretty_key($key)?></label>	
					<textarea style="height:250px;" class="expand input-text" name="<?=$key?>"><?=$value?></textarea>
					</p>
				<? elseif ($field == 'text'): ?>	
					<p>
					<label><?=$this->caret->pretty_key($key)?></label>	
					<input type="text" class="large input-text" name="<?=$key?>" value="<?=$value?>">
					</p>
				<? elseif ($field == 'hidden'): ?>
					<input type="hidden" name="<?=$key?>" value="<?=$value?>"/>
				<? elseif ($field == 'image'): ?>
					<p>
					<label><?=$this->caret->pretty_key($key)?></label>	
					<?=form_dropdown($key,$this->caret->get_assets(),$value)?>
					</p>
				<? endif ?>

			<? endforeach; ?>
		
	</div>
</div>
</form>