$(document).ready( function() {
  // Hide the breadcrumb details, if no breadcrumb.
  $('#edit-xarxanet-breadcrumb').change(
    function() {
      div = $('#div-xarxanet-breadcrumb-collapse');
      if ($('#edit-xarxanet-breadcrumb').val() == 'no') {
        div.slideUp('slow');
      } else if (div.css('display') == 'none') {
        div.slideDown('slow');
      }
    }
  );
  if ($('#edit-xarxanet-breadcrumb').val() == 'no') {
    $('#div-xarxanet-breadcrumb-collapse').css('display', 'none');
  }
  $('#edit-xarxanet-breadcrumb-title').change(
    function() {
      checkbox = $('#edit-xarxanet-breadcrumb-trailing');
      if ($('#edit-xarxanet-breadcrumb-title').attr('checked')) {
        checkbox.attr('disabled', 'disabled');
      } else {
        checkbox.removeAttr('disabled');
      }
    }
  );
  $('#edit-xarxanet-breadcrumb-title').change();
} );
