/**
 * @file
 * xarxanet_titles scripts.
 */
(function ($, Drupal) {
  'use strict';

  $(function() {
    
    if ($('form#noticia-general-node-form').length > 0) {
      
      // Set variables
      var maxChars = 110;
      var $title = $('#edit-title');
      var $actions = $('#edit-actions');

      // Set default messages
      var idleMessage = 'El títol està limitat a un màxim de ' + maxChars + ' caràcters.<br>Si es sobrepasen, no podràs desar aquest contingut.';
      var attentionMessage = 'Queden pocs caràcters per arribar al límit establert.';
      var dangerMessage = 'S\'han sobrepassat els ' + maxChars + ' caràcters permesos.<br>S\'ha deshabilitat el botó per desar aquest contingut.';
      
      // Add a counter in the Title field
      var charCounter = '<div id="char-counter"><span class="current">0</span>/<span class="allowed">' + maxChars + '</span></div>'
      var $charCounter = $(charCounter);
      $charCounter.appendTo($title.parent());
      
      // Add a message box in the Title field
      var charMessage = '<div id="char-message"></div>'
      var $charMessage = $(charMessage);
      $charMessage.appendTo($title.parent());

      // Add an overlapped div over the submit button, to avoid clicking on it (in certain cases)
      var disableSubmit = '<div id="disable-submit"></div>'
      var $disableSubmit = $(disableSubmit);
      $disableSubmit.appendTo($actions);

      // Now, let's count the characters on the Title field and perform some DOM overrides
      
      // On DOM ready event
      var chars = $('#edit-title').val().length;
      $('#char-counter .current').text(chars);
      if (chars >= 90 && chars <= maxChars) {
        $('#char-counter').removeClass().addClass('attention');
        $('#char-message').html(attentionMessage);
        $('#disable-submit').hide();
      }
      if (chars > maxChars) {
        $('#char-counter').removeClass().addClass('danger');
        $('#char-message').html(dangerMessage);
        $('#disable-submit').show();
      }
      if (chars > 0 && chars < 90) {
        $('#char-counter').removeClass().addClass('success');
        $('#char-message').html(idleMessage);
        $('#disable-submit').hide();
      }
      
      // On Keyup event
      $title.keyup(function() {
        var chars = $('#edit-title').val().length;
        $('#char-counter .current').text(chars);
        if (chars >= 90 && chars <= maxChars) {
          $('#char-counter').removeClass().addClass('attention');
          $('#char-message').html('').html(attentionMessage);
          $('#disable-submit').hide();
        }
        if (chars > maxChars) {
          $('#char-counter').removeClass().addClass('danger');
          $('#char-message').html('').html(dangerMessage);
          $('#disable-submit').show();
        }
        if (chars > 0 && chars < 90) {
          $('#char-counter').removeClass().addClass('success');
          $('#char-message').html('').html(idleMessage);
          $('#disable-submit').hide();

        }
      });
    }
  });
})(jQuery, Drupal);
