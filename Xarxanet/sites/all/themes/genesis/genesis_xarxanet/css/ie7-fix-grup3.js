jQuery(document).ready(function() {
	if ( jQuery.browser.msie ) {

var clearer = '<div style="clear:both;"></div>';
jQuery('#portada-cursos').after(clearer); 
jQuery('.portada-superior-dreta').after(clearer); 


}
});
