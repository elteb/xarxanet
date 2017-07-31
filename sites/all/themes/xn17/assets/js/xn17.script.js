/**
 * @file
 * Custom scripts for theme.
 */
(function ($) {
  $(window).scroll(function() {
    var aTop = $('#third-header').offset().top;
    if ($(this).scrollTop() >= aTop) {
      $('#third-header-clone').show();
    }
    if ($(this).scrollTop() < aTop) {
      $('#third-header-clone').hide();
    }
  });
})(jQuery);
