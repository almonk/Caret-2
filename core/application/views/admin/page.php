<?=form_open('admin/save/' . base64_encode($this->uri->segment(3) )) ?>
<div class="row">
	<div class="six columns">
		<h4><?=$page['title']?></h4>
		<p><?=$page['url']?> <a href="<?=$page['url']?>" class="btn" target="_blank">view</a></p>
	</div>

	<div class="four columns" style="text-align:right;">
		<input type="submit" value="Save changes"/>
	</div>
</div>

<div class="row">
	<div class="eight columns">
			<? foreach ($page as $key => $value):?>
				<? $field = $this->caret->get_field_type($key)?>	

				<? if ($field == 'textarea'): ?>
					<label><?=$this->caret->pretty_key($key)?></label>	
					<textarea style="height:250px;" class="expand input-text" name="<?=$key?>"><?=$value?></textarea>
				<? elseif ($field == 'text'): ?>	
					<label><?=$this->caret->pretty_key($key)?></label>	
					<input type="text" class="large input-text" name="<?=$key?>" value="<?=$value?>">
				<? elseif ($field == 'hidden'): ?>
					<input type="hidden" name="<?=$key?>" value="<?=$value?>"/>
				<? elseif ($field == 'image'): ?>
					<label><?=$this->caret->pretty_key($key)?></label>	
					<?=form_dropdown($key,$this->caret->get_assets(),$value)?>
				<? endif ?>

			<? endforeach; ?>
		
	</div>
</div>
</form>