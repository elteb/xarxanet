/**
 * @file         tothomweb_agenda.js
 *
 * @project      xarxanet.org/agenda
 * @version      1.0
 * @author       TOTHOMweb
 * @copyright    2020
 */

(function($) {

  Drupal.behaviors.tothomweb_agenda = {
    attach: function (context, settings) {






      $('#tothomweb-agenda-form #edit-date').datepicker({
        language: 'ca-ES',
        format: 'dd-mm-yyyy'
      });






      $('#tothomweb-agenda-form #more').click(function(e) {
        e.preventDefault();

        console.log('Ajax triggered!');
        
        var type = $(this).attr('data-type');
        var search = $(this).attr('data-search');
        var date = $(this).attr('data-date');
        var location = $(this).attr('data-location');
        var mode = $(this).attr('data-mode');
        var page = $(this).attr('data-page');

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
            'trigger': 'DEFAULT'
          },
          success: function(response) {
            console.log(response);
            // var $output = $($.parseHTML(response));
            // $output = $output.find('#tothomweb-agenda-form #results');
            // console.log($output);
            // $('#tothomweb-agenda-form #results').empty();
            // $output.appendTo($('#tothomweb-agenda-form #results'));
          }
        });
      });

    }
  };

})(jQuery);