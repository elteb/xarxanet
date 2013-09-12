$(function(){
    $('#inicia-sessio').click(function() {
        $('#equiblock')
            .css('display', 'inline')
            .css('left', $(this).position().left + 'px');
        return false;
    });

    $(document).click(function(event) {
        if($(event.target).parents('#equiblock').length < 1) {
            $('#equiblock').hide();
        }
    });
});