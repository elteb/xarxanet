Drupal.behaviors.views_rotator = function(context) {

	var menu_item = "<div class='view-rotator-menu-item'></div>";
	var items = $('.views-rotator-item');
	var menu_items;
	var view = $('.views-rotator');
	view.prepend("<div class='view-rotator-menu'></div>");
	var menu = $('.view-rotator-menu');
	var prev = $('.view-rotator-prev');
	var next = $('.view-rotator-next');
	var over = false;
	var time = Drupal.settings.views_rotator.timeout;
	var show_menu = Drupal.settings.views_rotator.menu;
	var left_menu = Drupal.settings.views_rotator.menu_left;
	var top_menu = Drupal.settings.views_rotator.menu_top;
	var show_arrows= Drupal.settings.views_rotator.arrows;
	var num_items = items.size();
	var changing = false;
 
 function vr_init()
 {
	
	if(num_items>=0)
	{
		var i = 0;
		var posy = items.eq(0).height();
		var posx = view.width();
		var posy_menu;
		var posx_menu;
		
		
		for(i=0;i<num_items;i++)
		{
				if(posy < items.eq(i).height()){
					posy = items.eq(i).height()
				}
				if(show_menu){
					menu.append(menu_item);
				}
			
		}
		
		if(show_menu)
		{
			menu_items = $('.view-rotator-menu-item');
			for(i=0;i<num_items;i++)
			{
				menu_items.eq(i).addClass("vr-"+i);
				menu_items.eq(i).click(vr_change);
			}
			posy_menu = posy - menu.height() + parseInt(left_menu);
			posx_menu = posx - menu.width() + parseInt(top_menu); 
			
			menu.css({
				'top':posy_menu,
				'left':posx_menu,
				'opacity': '0.85'
			});	
		
		}
		if(show_arrows)
		{
			next.click(vr_next);
			prev.click(vr_prev);
			next.css({
				'top':(posy/2)-(next.height()/2),
				'left':(posx)-(next.width())-20
			});	
			prev.css({
				'top':(posy/2)-(next.height()/2),
				'left':'0'
			});	
		}				
		view.css({'height':posy, 'position':'relative'});
		items.css({'position':'absolute'});
		menu_items = $('.view-rotator-menu-item');
		menu_items.eq(0).addClass("vr-shown");
		
		
		//items.hover(vr_nothing, vr_nothing);	
	}else{
		alert("There no view items!");
	}
	
 }
 var vr_show_index = function()
 {
	if(show_menu){
		menu.fadeIn("slow");
	}
	if(show_arrows){		
		next.fadeIn("slow");
		prev.fadeIn("slow");
	}
	over = true;
	
 };
 var vr_hide_index = function()
 {
	if(show_menu){
		menu.fadeOut("slow");
	}
	if(show_arrows){		
		next.fadeOut("slow");
		prev.fadeOut("slow");
	}
	over = false;
 };
 
 /*var vr_nothing = function()
 {
	return false;
 };*/
 
 function vr_show(n, delta)
 {
	var i = 0;
	var found = false;
	while(i<num_items && !found)
	{
		if(items.eq(i).hasClass("vr-shown"))
		{
			items.eq(i).fadeOut("slow", function(){$(this).removeClass("vr-shown")});
			menu_items.eq(i).removeClass("vr-shown");
			found = true;
		}else{
			i++;
		}
	}
	if(delta==null)
	{
		items.eq(n).fadeIn("slow", function(){$(this).addClass("vr-shown");changing=false;});
		menu_items.eq(n).addClass("vr-shown");
	}
	else
	{
		if((i+delta)>=num_items){
			i = 0;
		}else if((i+delta)<0){
			i = num_items-1;
		}
		else{
			i = i + delta;
		}
		items.eq(i).fadeIn("slow", function(){$(this).addClass("vr-shown");changing=false;});
		menu_items.eq(i).addClass("vr-shown");
	}
 }
var vr_next = function()
{
	if(!changing){
		changing = true;
		vr_show(0,1);
	}
}
var vr_prev = function()
{
	if(!changing){
		changing = true;
		vr_show(0,-1);
	}
}
var vr_autochange = function()
{
	if(!changing && !over){
		changing = true;
		vr_show(0,1);
	}
	window.setTimeout(vr_autochange, time);
}
 
 var vr_change = function()
 {
		if(!changing){
			changing = true;
			var classes = $(this).attr('class').split(' ');
			var num_classes = classes.length;
			var i = 0;
			var found = false;
			var id;
			while(i<num_classes && !found){
				if(classes[i].substr(0,3)=="vr-")
				{
					found = true;
				}else{
					i++;
				}
			}
			if(found){
				id = classes[i].replace("vr-","");
				vr_show(parseInt(id));
				
			}else{
				alert("Theres no class identifier");
			}
			
		}
		return false;
		
 }
 vr_init();
 
 $('.views-rotator').hover(vr_show_index,vr_hide_index);

 window.setTimeout(vr_autochange, time);

 };