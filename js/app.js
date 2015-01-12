var $ = jQuery.noConflict();

$('#hamburger').click(function(e) {
	e.preventDefault();
	$('#main-nav ul').toggleClass('shown');
});
