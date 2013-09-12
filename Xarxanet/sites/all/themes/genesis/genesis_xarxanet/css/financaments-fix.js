jQuery(document).ready(function() {
    /* Arregla les columnes dels llistats */ 
    var clearer = '<div style="clear:both;">&nbsp;</div>';

    var list = jQuery('.view-content .views-row');

    var nelems = list.length;
    var i= 1;
    var ncols = 4;
    for(var i = ncols; i < nelems; i += ncols) {
        jQuery('.views-row-' + i).after(clearer);
    }
    jQuery('.views-row-last').after(clearer);
});


