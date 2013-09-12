$(document).ready(function(){
    //MENU DESPLEGABLE
    $("ul.Menu li").mouseover(function() {
        $(this).find("a").addClass("Blanco");
        $("ul.Menu").addClass("Trans");
    });
    $("ul.Menu li").mouseout(function() {
        $(this).find("a").removeClass("Blanco");
        $("ul.Menu").removeClass("Trans");
    });
    $(".QueEs").hide();
    $("#QueEs").click(function () {$(".QueEs").fadeIn(800);});
    $(".close").click(function () {$(".QueEs").fadeOut(800);});

    $("#Footer ul li").fadeTo(1,0.70);
    $("#Footer ul li").hover(
        function() {$(this).fadeTo("fast",1);},
        function() {$(this).fadeTo("fast",0.70);}
    );

    $('#search-form').submit(function(){
        window.location = $(this).attr('action') + escape($('#search-text').val());
        return false;
    });


    // search default text and clear on focus
         
    $("#search-text").focus();	

    $('#search-text').focus(function(){
    if($(this).val() == 'Cercar a Xarxanet.org...'){
        $(this).val('');
    }
    
    }).blur(function(){
    
    if($(this).val() == ''){
        $(this).val('Cercar a Xarxanet.org...');
    }

});

    
   

});