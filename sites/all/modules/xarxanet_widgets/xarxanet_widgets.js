
function xxnetWidget(parameter){
	this.attributes=parameter;
	this.start=xxnetStart;
	if(window.xxnetAttributes==null){
		window.xxnetAttributes = new Array();
	}
	window.xxnetAttributes[0] = this.attributes; //this index will be in the class of the script in case this become multiwidget somewhen.
	
}

function xxnetStart(){
	
	addScript("http://www.xarxanet.org/widgets/0/"+this.attributes.content);//this index will be in the class of the script in case this become multiwidget somewhen.
	
}

function addScript(url) {
    var script = document.createElement('script');
    script.src = url;
    document.body.appendChild(script);
}
function addCss(url) {
    var head = document.getElementsByTagName("head")[0]; 
    var css = document.createElement('link');
	css.type="text/css";
	css.rel="stylesheet";
	css.media="all";
	css.href=url;
    head.appendChild(css);
}
function json_callback(data, id){
	var script = document.getElementById("xxnet-widget");
	var newcontent = document.createElement('div');
	newcontent.innerHTML=data.content;
	script.parentNode.insertBefore(newcontent, script);
	
	addCss("http://www.xarxanet.org/sites/all/modules/xarxanet_widgets/xarxanet_widgets.css");
	
	//var scripts = document.getElementsByTagName('script');
	/*for(var i=0; i<scripts.length; i++)
	{
		if(scripts[i].src == 'http://www.xarxanet.org/sites/all/modules/xarxanet_widgets/xarxanet_widgets.js')
		{
			
			var newcontent = document.createElement('div');
			newcontent.innerHTML=data.content;
			scripts[i].parentNode.insertBefore(newcontent, scripts[i]);
			break;
		}
	}*/
	
	var header = document.getElementById("xxnet-header"); //will be by class if multiwidget
	var bottom = document.getElementById("xxnet-bottom"); //will be by class if multiwidget
	var container = document.getElementById("xxnet-container"); //will be by class if multiwidget
	var container_inner = document.getElementById("xxnet-container-inner"); //will be by class if multiwidget
	var wrapper = document.getElementById("xxnet-wrapper"); //will be by class if multiwidget
	
	container.style.height=window.xxnetAttributes[id].height; //TODO validate data none repeat scroll 0 0 #00DD00
	container_inner.style.height=window.xxnetAttributes[id].height; //TODO validate data none repeat scroll 0 0 #00DD00
	header.style.background="#"+window.xxnetAttributes[id].background;
	bottom.style.background="#"+window.xxnetAttributes[id].background;
	container.style.background="#"+window.xxnetAttributes[id].background;
	wrapper.style.width=window.xxnetAttributes[id].width;
	headers = document.getElementsByClassName("xxnet-header-section");
	for(i=0;i<headers.length;i++){
		headers[i].style.background="#"+window.xxnetAttributes[id].background;
		headers[i].style.color="#"+window.xxnetAttributes[id].header_color;
	}
}

if (document.getElementsByClassName == undefined) {
	document.getElementsByClassName = function(className)
	{
		var hasClassName = new RegExp("(?:^|\\s)" + className + "(?:$|\\s)");
		var allElements = document.getElementsByTagName("*");
		var results = [];

		var element;
		for (var i = 0; (element = allElements[i]) != null; i++) {
			var elementClass = element.className;
			if (elementClass && elementClass.indexOf(className) != -1 && hasClassName.test(elementClass))
				results.push(element);
		}

		return results;
	}
}