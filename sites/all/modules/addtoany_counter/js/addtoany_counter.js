/**
* @file      addtoany_counter.js
*/

(function ($) {

  Drupal.addtoany_counter = {

    /**
     * Updates a counter of the times the node has been shared,
     */

    update: function() {

      $('a[class^="share-icon-"], .field-name-addtoany .addtoany_list a').click(function() {
        
        var parts = $('link[rel="shortlink"]').attr('href').split('/');
        var nid = parts.slice(-1)[0];

        /**
        * Update the Bootstrap's Educational Area dropdown, with
        * the options regarding the Bootstrap's Educational Stage just selected,
        * with an AJAX call
        */ 

        $.ajax({
          url: Drupal.settings.addtoany_counter.url,
          method: 'GET',
          data: {
            'nid': nid,
            'action': 'get'
          },
          success: function(response) {
            console.log(response);
          },
          error: function(xhr, status, error) {
            // Uncomment the following line only for debug purposes
            // console.log('AJAX Error: ' + error);
          }
        });
      });
    },
  };
    
  /**
  * Initialize addtoany_counter Page functions
  */

  Drupal.behaviors.addtoany_counter = {
    attach: function (context) {
      Drupal.addtoany_counter.update();
    }
  };

})(jQuery);