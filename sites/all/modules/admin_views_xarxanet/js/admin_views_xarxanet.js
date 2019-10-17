
(function ($) {

  $(function() {

    /**
     * XARXANET-281
     * 
     * Custom visibility handler for the 'type of News' dropdown, one of 
     * the filters in the "admin/content" page.
     * 
     * It also sets the value of this dropdown to 'All', when the 'Type of Content' filter
     * is set to another value different than 'noticia_general', allowing to filter by
     * contents of the other Content Types, and fixing a bug caused by the 'type of News'
     * dropdown's value.
     */
    
    var body = $('body');
    var typeDropdown = $('select#edit-type');
    var subTypeDropdown = $('#edit-field-tipus-noticia-tid-wrapper');
    
    if (body.hasClass('page-admin-content')) {

      if (typeDropdown.length > 0 && subTypeDropdown.length > 0) {

        // On page's load event

        console.log('PageLoad Event: ' + typeDropdown.val());

        if (typeDropdown.val() != 'noticia_general') {
          subTypeDropdown.hide().find('select').val('All');
        }
        else {
          subTypeDropdown.show().find('select').val('All')
        }

        // On typeDropdown's change event

        typeDropdown.change(function() {
          
          console.log('Change Event: ' + typeDropdown.val());
          
          if (typeDropdown.val() != 'noticia_general') {
            subTypeDropdown.hide().find('select').val('All');
          }
          else {
            subTypeDropdown.show().find('select').val('All');
          }
        });
      }
    }
  });

})(jQuery);
