<div class="row">
	<div class="six columns">
		<h4><?=$page['title']?></h4>
		<p><?=$page['url']?> <a href="<?=$page['url']?>" class="btn" target="_blank">view</a></p>
	</div>
</div>

<div class="row">
	<div class="eight columns">

		<?=form_open('admin/save/' . base64_encode($this->uri->segment(3) )) ?>
			<? foreach ($page as $key => $value):?>
					<label class="control-label"><?=$key?></label>						
						<?php if ($key == 'body'): ?>
							<textarea style="height:250px;" class="expand input-text" name="<?=$key?>"><?=$value?></textarea>
						<?php else: ?>	
							<input type="text" class="large input-text" name="<?=$key?>" value="<?=$value?>">
						<? endif ?>
			<? endforeach; ?>
		
	</div>

	<div class="four columns">
		<input type="submit" value="Save changes"/>
		</form>
	</div>


</div>