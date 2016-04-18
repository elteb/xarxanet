
/**
 * @file
 * jQuery helper functions for the Simplenews Scheduler module interface on node edit page.
 */

/**
 * Set scheduler info's display attribute to hide and show based on the option value.
 */
Drupal.behaviors.simplenewsSendingTime = function (context) {
  var simplenewsSendingTime = function () {
    if($(".simplenews-command-send :radio:checked").val() == '5') {
        $('.sending_time').css({display: "block"});
    } else {
      $('.sending_time').css({display: "none"});
    }
  }

  // Update sending time display at page load and when a send option is selected.
  $(function() { simplenewsSendingTime(); });
  $(".simplenews-command-send").click( function() { simplenewsSendingTime(); });
}
