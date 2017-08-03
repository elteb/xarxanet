/**
 * @file
 * Custom scripts for theme.
 */
(function ($, Drupal, window, document, undefined) {
  /* TODO - Behaviors!!! */
  Drupal.behaviors.radix_dropdown = {
    attach: function(context, setting) {

      $(window).scroll(function() {
        var aTop = $('#third-header').offset().top;
        if ($(this).scrollTop() >= aTop) {
          $('#third-header-clone').show();
        }
        if ($(this).scrollTop() < aTop) {
          $('#third-header-clone').hide();
        }
      });

      $(document).ready(function() {
        $(".menu-link.depth-2").click(function(){
          $(this).next(".submenu.depth-3").toggle();
          //alert('ei');
        });
      });
    }
  };
})(jQuery, Drupal, this, this.document);
