/**
 * @file
 * Custom scripts for theme.
 */
(function ($, Drupal, window, document, undefined) {
  /* TODO - Behaviors!!! */
  Drupal.behaviors.radix_dropdown = {
    attach: function(context, setting) {

      // -----------------------------------------------------------------------
      // Scrolling
      // -----------------------------------------------------------------------
      $(window).scroll(function() {
        var aTop = $('#third-header').offset().top;
        if ($(this).scrollTop() >= aTop) {
          $('#third-header-clone').show();
        }
        if ($(this).scrollTop() < aTop) {
          $('#third-header-clone').hide();
        }
      });

      // -----------------------------------------------------------------------
      // Main menu
      // -----------------------------------------------------------------------
      $(document).ready(function() {
        $(".menu-icon").click(function(){
          $("#main-menu").slideToggle("slow", function(){
            $("#main-wrapper").fadeToggle();
          });
        });
        $("#close-button").click(function(){
          $("#main-menu").slideToggle("slow", function(){
            $("#main-wrapper").fadeToggle();
          });
        });
        $(".menu-link.depth-2").click(function(){
          $(this).next(".submenu.depth-3").slideToggle("slow");
          $(this).children().toggleClass("opened");
          $(this).children().toggleClass("closed");
        });
        if ($(window).width() < 768) {
          $(".menu-link.depth-1").click(function(){
            $(this).next(".submenu.depth-2").slideToggle("slow");
            $(this).children().toggleClass("opened");
            $(this).children().toggleClass("closed");
          });
        }
      // -----------------------------------------------------------------------
      // Main menu
      // -----------------------------------------------------------------------
        if ($(window).width() < 768) {
          $(".block-menu").children('h4').click( function(){
            $(this).next(".block__content").slideToggle("slow");
            $(this).parent(".block-menu").toggleClass("opened");
            $(this).parent(".block-menu").toggleClass("closed");
          });
        }
      });
    }
  };
})(jQuery, Drupal, this, this.document);
