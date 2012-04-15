jQuery(document).ready(function($) {
	$('a.submit').click(function(event) {
		event.preventDefault();
		$('form').submit();
	});
});
