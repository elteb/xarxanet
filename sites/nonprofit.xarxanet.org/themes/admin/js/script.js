/**
 * @file 	script.js
 */

(function($) {

	$(function() {

		$('.field-name-field-portfolio-design-image').hide();
		$('.field-name-field-portfolio-display input').change(function() {

			if ($(this).val() == '43') {
				$('.field-name-field-portfolio-design-image').hide();
				$('.field-name-field-portfolio-web-image-big').show();
				$('.field-name-field-portfolio-web-image-medium').show();
				$('.field-name-field-portfolio-web-image-small').show();
				$('.field-name-field-portfolio-web-platform').show();
			}

			if ($(this).val() == '44') {
				$('.field-name-field-portfolio-design-image').show();
				$('.field-name-field-portfolio-web-image-big').hide();
				$('.field-name-field-portfolio-web-image-medium').hide();
				$('.field-name-field-portfolio-web-image-small').hide();
				$('.field-name-field-portfolio-web-platform').hide();
			}
		});

	});

})(jQuery);
