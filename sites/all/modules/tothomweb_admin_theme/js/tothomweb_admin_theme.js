/**
 * @file         tothomweb_admin_theme.js
 *
 * @project      xarxanet.org/tothomweb_admin_theme
 * @version      1.0
 * @author       TOTHOMweb
 * @copyright    2020
 */

(function($) {
  var tothomweb_admin_theme = {

    /**
     * Helper function that overrides the attribute 'for' of all labels
     * of all CKEditor fields on the page.
     * 
     * By default, the label is pointing to the hidden textarea. So, in this 
     * function we'll change it in order to point to the CKEditor's container.
     * 
     * Notice that the id of every CKEditor container is the same than the related textarea,
     * but it's preceded with the 'cke_' string.
     * 
     * This function does it's stuff everywhere: in back-office forms and also in the front-end,
     * in forms like the Comments form.
     */
    textareaCKEditorOverrides: function() {
      // Check if there are any CKEditor textareas on the current page being viewed.
      if ($('textarea.ckeditor-mod').length > 0) {
        // Iterate over them.
        $.each($('textarea.ckeditor-mod'), function() {
          var $wrapper = $(this).closest('.form-type-textarea');
          // Check if $wrapper element exists.
          if ($wrapper) {
            var $label = $wrapper.find('label');
            // Check if $label element exists.
            if ($label) {
              // Override the 'for' attribute, pointing to the CKEditor container,
              // instead of the default textarea.
              var forAttr = $label.attr('for');
              $label.attr('for', 'cke_' + forAttr);
            }
          }
        })
      }
    }
  }
  // Launch the functions.
  Drupal.behaviors.tothomweb_admin_theme = {
    attach: function(context, settings) {
      tothomweb_admin_theme.textareaCKEditorOverrides();
    }
  };
})(jQuery);
