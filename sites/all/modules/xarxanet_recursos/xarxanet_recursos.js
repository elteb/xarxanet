Drupal.behaviors.xarxanet_recursos = function() {
    var content_items = $(".item-bloc-recursos");
    var container_index_items = $("xarxanet-recursos-titles");
    var height = getMaxHeight(content_items);
    var index_items = $(".title-bloc-recursos");

    if(height > container_index_items.height()) {
        $("#xarxanet-recursos-parent").css("height", (height+190) + 'px');
    };

    function getMaxHeight(set) {
        var height = 0
           ,size = set.size();

        for(var i=0; i < size; i++) {
            if(height < set.eq(i).height()) {
                height = set.eq(i).height();
            }
        }
        return height;
    };

    index_items.bind('mouseenter', function() {
        var i = index_items.index($(this));
        
        if(i!=-1){
            content_items.not(":hidden").hide();
            content_items.eq(i).show();
        }
        return false;
    });
};