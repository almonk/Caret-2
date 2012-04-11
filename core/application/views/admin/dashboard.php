<div class="row-fluid">
    <div class="span12">

		<h1>Pages</h1>
		<br/>

    	<ul class="nav nav-tabs nav-stacked">
			<? foreach ($pages as $page_item): ?>
				<li>
					<a href="<?=$base_url . 'admin/page/' . $page_item['_caret_filename']?>">
						<span style="font-size:13px;font-weight:bold;"><?=$page_item['title']?></span><br/>
						<span style="color:gray;font-size:11px;"><?=base64_decode($page_item['_caret_filename'])?></span>
					</a>
				</li>
			<? endforeach ?>
		</ul>
	</div>
</div>