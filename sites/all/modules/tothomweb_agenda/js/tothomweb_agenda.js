/**
 * @file         tothomweb_agenda.js
 *
 * @project      xarxanet.org/agenda
 * @version      1.0
 * @author       TOTHOMweb
 * @copyright    2020
 */

(function($) {
  var tothomwebAgenda = {

    /**
     * Initializes the Datepicker jQuery plugin in
     * the Date field.
     * 
     * @see https://fengyuanchen.github.io/datepicker
     */
    initializeDatepicker: function() {
      
      $('#tothomweb-agenda-form #edit-date').datepicker({
        language: 'ca-ES',
        format: 'dd-mm-yyyy'
      });
    },

    /**
     * Performs an AJAX call in order to get new Events without
     * having to refresh the page.
     */
    getMoreEventsHandler: function() {

      $('#tothomweb-agenda-form #more').click(function(e) {
        e.preventDefault();
        // Set the variables to be sent in the AJAX .
        var type = $(this).attr('data-type');
        var search = $(this).attr('data-search');
        var date = $(this).attr('data-date');
        var location = $(this).attr('data-location');
        var mode = $(this).attr('data-mode');
        var page = $(this).attr('data-page');
        // Launch the AJAX call.
        $.ajax({
          url: Drupal.settings.tothomweb_agenda.url,
          method: 'GET',
          dataType: 'html',
          data: {
            'type': type,
            'search': search,
            'date': date,
            'location': location,
            'mode': mode,
            'page': page,
            'trigger': 'AJAX'
          },
          success: function(response) {
            // Parse the response as HTML and get the list-items.
            var $output = $($.parseHTML(response));
            var $listItems = $output.find('ul.row li');
            // Append each list-item to the list.
            $.each($listItems, function(index, value) {
              $(this).appendTo($('#tothomweb-agenda-form #results ul.row'));
            })
            // Increment the page index.
            var currentIndex = parseInt($('#tothomweb-agenda-form #more').attr('data-page'));
            var newIndex = currentIndex + 1;
            $('#tothomweb-agenda-form #more').attr('data-page', newIndex);
            // Determine if maximum of items is reached and the "More" button must be hidden (2 methods).
            // Method 1: Checking if the count of recently appended items are few than the "Items Per Row" .
            var listItemsCount = $listItems.length;
            var itemsPerRow = parseInt($('#tothomweb-agenda-form #more-wrapper').attr('data-items-per-row'));
            if (listItemsCount < itemsPerRow) {
              // In this case, the button is removed immediately.
              $('#tothomweb-agenda-form #more-wrapper').remove();
            }
            // Method 2: Checking the old count of items against the new count, after they we're appended.
            var currentItemsCount = parseInt($('#tothomweb-agenda-form #more-wrapper').attr('data-count'));
            var newItemsCount = parseInt($('#tothomweb-agenda-form #results .item-list li').length);
            if (currentItemsCount < newItemsCount) {
              // If a new items were detected, increase the flag with the new count of items.
              $('#tothomweb-agenda-form #more-wrapper').attr('data-count', newItemsCount);
            }
            else {
              // If no items were appended, then remove the button immediately.
              $('#tothomweb-agenda-form #more-wrapper').remove();
            }
          }
        });
      });
    },

    /**
     * Helper function that appends a counter of items as a data-attribute, in the
     * "More" button's wrapper.
     * 
     * This flag will be helpful to compare if the number of items was increased after
     * an AJAX refresh, and to decide if the "More" button should be removed.
     */
    itemsCounterFlag: function() {
      var itemsCount = $('#tothomweb-agenda-form #results .item-list li').length;
      $('#tothomweb-agenda-form #more-wrapper').attr('data-count', itemsCount);
    }
  }
  // Launch the functions.
  Drupal.behaviors.tothomweb_agenda = {
    attach: function(context, settings) {
      tothomwebAgenda.initializeDatepicker();
      tothomwebAgenda.getMoreEventsHandler();
      tothomwebAgenda.itemsCounterFlag();
    }
  };
})(jQuery);
