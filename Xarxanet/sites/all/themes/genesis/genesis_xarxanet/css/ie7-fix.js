jQuery(document).ready(function() {
		
    var subdomini = "";

    /* Arregla les columnes dels llistats */ 
    var clearer = '<div style="clear:both;">&nbsp;</div>';
    
    /* Esborra l'opció de redimensionar el textarea de comentaris */
    jQuery('.grippie').remove();

    /* Converteix la llista d'etiquetes en div span per evitar problemes hasLayout IE7 */
    
    var lim = nCols();

    if (lim.px > 0) {
        fixCols(lim);			
    } else {
        if (lim.px == -1) {
           jQuery('.views-row-3').after(clearer);
           jQuery('.views-row-6').after(clearer);
           jQuery('.views-row-9').after(clearer);
           jQuery('.views-row-12').after(clearer);
           jQuery('.views-row-last').after(clearer);
        } else if (lim.px == -2) {
            jQuery('#portada-cursos').after(clearer);
            jQuery('.portada-superior-dreta').after(clearer);
        } else if (lim.px == -3) {
            jQuery('#financament-subvencio').after(clearer);
            jQuery('#recurs-formacio').after(clearer);
            jQuery('#financament-altres').after(clearer);
            jQuery('#recurs-juridic').after(clearer);
        } else if (lim.px == -4) {
            jQuery('#portada-noticia').after(clearer);
            jQuery('#portada-noticiax2').after(clearer);
            fixCols({px: 377+179*2, cols: 4});
        } else if (lim.px == -5) {
            jQuery('.portada-superior-dreta').after(clearer);
            fixCols({px: 377+179*2, cols: 4});
        }
    }
        
    function fixCols(lim) {
        var list = jQuery('.view-content .views-row');		//console.log(list);
        var nelems = list.length;
        var i= 1;
        var sumaParcial = {px:0, cols:0};

        list.each(function() {
            sumaParcial.px += parseInt( jQuery('.views-row-' + i + ' div a img').attr('width') );
            sumaParcial.cols++;
            
            if (sumaParcial.px > lim.px || sumaParcial.cols > lim.cols) {
                jQuery('.views-row-' + parseInt(i-1)).after(clearer);
                sumaParcial.px = 0;
                sumaParcial.cols = 0;
            } else if (sumaParcial.px == lim.px || sumaParcial.cols == lim.cols) {
                jQuery('.views-row-' + i).after(clearer);
                sumaParcial.px = 0;
                sumaParcial.cols = 0;
            }
            ++i;
        });    
        
    }    
	
	function nCols() {
		var loc = window.location;
		var input = loc.href;// loc.href


        // la portada és un cas particular perquè té views-row-x repetits
		if (input === "http://xarxanet.org" || input === "http://www.xarxanet.org" 
		   || input === "http://xarxanet.org/" || input === "http://www.xarxanet.org/") return {px: -1, cols: -1};
		
		if (input === "http://xarxanet.org/financaments" || input === "http://www.xarxanet.org/financaments" 
		   || input === "http://xarxanet.org/financaments/" || input === "http://www.xarxanet.org/financaments/") return {px: -3, cols: -3};
		
        var patt = /xarxanet\.org\/(agenda|recursos)(\/|)$/i;
        if (patt.test(input)) return {px: -2, cols: -2};
        
		patt = /\/((agenda\/[a-z]|(etiquetes\/[a-z]|(financaments\/[a-z])))(\/|))/i;
		if (patt.test(input)) return {px: 377+179*2, cols: 4};
		   
		// tinc subseccions per recursos i noticies -- 4 cols?
		patt = /\/([a-z]+\/(recursos|noticies|not%C3%ADcies)(\?[a-z]+=[0-9]+|)$)|(noticies)/i;  // amb pedaç per url mal formades i amb accents.
		if (patt.test(input)) return {px: 377+179*2, cols: 4};
	
        patt = /(ambiental|comunitari|cultural|social|internacional)(\/|)$/i;
        if (patt.test(input)) return {px: -5, cols: -5};
    
    
		// tinc una subsecció sola que ncecessiti 1 clearboth cada 2 grups grans?
		var patt3=/\/(economic$|projectes$|juridic$|formacio$|informatic$)(\/|)/i;
		if (patt3.test(input)) return {px: -4, cols: -4};
		
		return 0;
	}
});
