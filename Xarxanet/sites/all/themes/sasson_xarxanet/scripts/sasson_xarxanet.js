/*
 * ##### Sasson - advanced drupal theming. #####
 *
 * SITENAME scripts.
 *
 */

(function($) {
  
  // DUPLICATE AND UNCOMMENT
  // Drupal.behaviors.behaviorName = {
  //   attach: function (context, settings) {
  //     // Do some magic...
  //   }
  // };
	Drupal.behaviors.veureMes = {
		attach: function (context, settings) {
			if($('.veure-mes-p').length) {
				$(".veure-mes-p").prependTo("#main");
			}
		}
	};

})(jQuery);
