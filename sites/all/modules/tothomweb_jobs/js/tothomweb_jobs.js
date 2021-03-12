/**
 * @file         tothomweb_job_offer.js
 *
 * @project      xarxanet.org/job_offer
 * @version      1.0
 * @author       TOTHOMweb
 * @copyright    2021
 */

(function($) {
  var tothomwebJobOffer = {

    /**
     * Initializes the Datepicker jQuery plugin in
     * the especified Date field.
     *
     * @see https://fengyuanchen.github.io/datepicker
     */
    initializeDatepicker: function() {

      $('#tothomweb-jobs-form #edit-job-offer-date').datepicker({
        language: 'ca-ES',
        format: 'dd-mm-yyyy'
      });
    }
  }
  // Launch the functions.
  Drupal.behaviors.tothomweb_job_offer = {
    attach: function(context, settings) {
      tothomwebJobOffer.initializeDatepicker();
    }
  };
})(jQuery);
