
/**
 * @file
 * jQuery helper functions for the Simplenews Scheduler module interface on node edit page.
 */

/**
 * Set scheduler info's display attribute to hide and show based on the option value.
 */

(function ($) {
	Drupal.behaviors.simplenewsSendingTime = {
		attach: function (context, settings) {
			var simplenewsSendingTime = function () {
			    if($(".simplenews-command-send :radio:checked").val() == '5') {
			        $('#edit-simplenews-sending-time').css({display: "block"});
			    } else {
			      $('#edit-simplenews-sending-time').css({display: "none"});
			    }
			}
	
			// Update sending time display at page load and when a send option is selected.
			$(function() { simplenewsSendingTime(); });
			$(".simplenews-command-send").click( function() { simplenewsSendingTime(); });
		}
	}
})(jQuery);

