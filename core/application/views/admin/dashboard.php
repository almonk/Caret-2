<? foreach ($pages as $page): ?>
	<li>
		<a href="<?=$base_url . 'admin/page/' . $page['_caret_filename']?>">
			<?=$page['title']?>
		</a>
	</li>
<? endforeach ?>