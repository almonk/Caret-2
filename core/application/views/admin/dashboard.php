<div class="row-fluid" style="padding-top:20px;">
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
		<h1>Dashboard</h1>
	</div>

</div>