
var eMap = {
  
  }


var settings = {
  path : "",
  cck : false,
  field_name : ""
  }

var map;
var MarkerCCK;
var vagueriesOverlay;
var vagueriesDiv;

  
google.load("maps", "2.x");

// Call this function when the page has been loaded
function initialize() 
{
   
  for (atributo in eMap)
  {
    var Mapa = eMap[atributo];

     map = new google.maps.Map2(document.getElementById(Mapa.id));




    //VAGERIES:
    //   var pointSW = new GLatLng(24.257041,-127.089844);
   //var pointNE = new GLatLng(50.34351,-65.390625);
   /*
  var pointSW = new GLatLng(42.81152174509788,0.230712890625);
  var pointNE = new GLatLng(40.42186036204519,3.175048828125);
  */
  
  
  var pointSW = new GLatLng(40.494612104993564,0.15944767103064805);
  var pointNE = new GLatLng(42.864263748484376,3.295872689341195);

   vagueriesOverlay = new GGroundOverlay(settings.path + "/mapa2.png", new GLatLngBounds(pointSW, pointNE)) ;

   map.addOverlay(vagueriesOverlay);
   
   // FI VAGUERIES

   

    //map.setUIToDefault();
    map.addControl(new GSmallMapControl());
    map.addControl(new GMapTypeControl());
    
//////////////////////////////////////////////////////////////////////    
   
 VagueriesControl.prototype = new GControl();
 VagueriesControl.prototype.initialize = function(map) {
 
 var container = document.createElement("div");

 vagueriesDiv=document.createElement("div");
 vagueriesDiv.title= "Back to saved position";
 vagueriesDiv.style.backgroundColor= "white";
 vagueriesDiv.style.color= "black";
 vagueriesDiv.style.fontSize ="12px";
 vagueriesDiv.style.border= "1px solid black";
 vagueriesDiv.style.paddingLeft= "1px";
 vagueriesDiv.style.marginBottom= "4px";
 vagueriesDiv.style.textAlign ="center";
 vagueriesDiv.style.cursor= "pointer";
 vagueriesDiv.style.width = "100px";
 vagueriesDiv.style.fontFamily = "Arial";
 vagueriesDiv.style.fontWeight = "bold";
 
 container.appendChild(vagueriesDiv);
 vagueriesDiv.appendChild(document.createTextNode("Vegueries"));
 GEvent.addDomListener(vagueriesDiv, "click", function() {
         if(vagueriesOverlay.isHidden()) 
         { 
           if(map.getZoom() > 10)
            {
              vagueriesDiv.style.display= "none";
              vagueriesDiv.style.fontWeight = "normal";
           } 
           else
           {
              vagueriesOverlay.show();
              vagueriesDiv.style.color= "black";
              vagueriesDiv.style.fontWeight = "bold";
            }
            
         }
         else
         {
            vagueriesOverlay.hide();
            vagueriesDiv.style.fontWeight = "normal";
         }
        });

 map.getContainer().appendChild(container);
 return container;
}

GEvent.addListener(map,"moveend", function() 
{     
  if(map.getZoom() > 10)
  {
    if(!vagueriesOverlay.isHidden()) 
     {
        vagueriesOverlay.hide();
        vagueriesDiv.style.display = "none";
     }
  }
  else
  {
    if(vagueriesDiv.style.display == "none") 
     {
        vagueriesDiv.style.display = "block";
        vagueriesDiv.style.fontWeight = "normal";
     }
  }
});



VagueriesControl.prototype.getDefaultPosition = function() {
 return new GControlPosition(G_ANCHOR_TOP_RIGHT, new GSize(7,31));
}


///////////////////////////////////////////////////////
    map.addControl(new VagueriesControl());   
    
    
    var bounds = new GLatLngBounds;
    var arrMarkers;
 
 
    if(Mapa.markers != undefined)
    {
      if(Mapa.markers.length > 0)
      {
        
        
        arrMarkers = new Array(Mapa.markers.length);
        
        for(var i = 0; i<Mapa.markers.length; i++)
        {
          var markerIcon = new GIcon(G_DEFAULT_ICON);
          markerIcon.image = settings.path + Mapa.markers[i].marker +".png";
         

          // Set up our GMarkerOptions object
          markerOptions = { icon:markerIcon, title: Mapa.markers[i].title };

          var latlng = new GLatLng(Mapa.markers[i].latitude, Mapa.markers[i].longitude);
          arrMarkers[i] = new GMarker(latlng, markerOptions);
          bounds.extend(latlng);

          arrMarkers[i].bindInfoWindowHtml(Mapa.markers[i].text);

          map.addOverlay(arrMarkers[i]);
        
        }
      }
    }

    

if(settings.cck)
{


var aux = document.getElementsByName("form_id");
fragmentoTexto = aux[0].value.split('_node_form');


  GEvent.addListener(map,"moveend", function() 
    {     
    
    //  alert(settings.field_name);
    
      document.getElementsByName(settings.field_name + "[0][mapa_possition_zoom]")[0].value = map.getZoom();
      document.getElementsByName(settings.field_name + "[0][mapa_possition_lat]")[0].value = map.getCenter().lat();
      document.getElementsByName(settings.field_name + "[0][mapa_possition_lng]")[0].value = map.getCenter().lng();
      
      
      if(map.getZoom() > 10)
      {
        if(!vagueriesOverlay.isHidden()) 
         {
            vagueriesOverlay.hide();
            vagueriesDiv.style.fontWeight = "normal";
         }
     } 
    }
  );
}   


//    var boundaries = new GLatLngBounds(new GLatLng(40.42186036204519,3.175048828125), new GLatLng(42.81152174509788,0.230712890625));
 //   var campusmap = new GGroundOverlay( settings.path + "Vegueries_reivindicades.png", boundaries);
//   map.addOverlay(campusmap); 

   
//   var pointSW = new GLatLng(42.81152174509788,0.230712890625);
//   var pointNE = new GLatLng(40.42186036204519,3.175048828125);

//   var groundOverlay = new GGroundOverlay( settings.path + "/Vegueries_reivindicades.png", new GLatLngBounds(pointSW, pointNE)) ;
//var groundOverlay = new GGroundOverlay("http://www.usnaviguide.com/ws-2008-02/images/us_counties.png", new GLatLngBounds(pointSW, pointNE)) ;
//   map.addOverlay(groundOverlay);
    
    
    
     
    if(Mapa.behavior["autozoom"] && Mapa.markers != undefined)
    {
      if(Mapa.latitude == undefined && Mapa.longitude == undefined )
      {
        map.setCenter(bounds.getCenter());
        var zoom = map.getBoundsZoomLevel(bounds);
        if(Mapa.maxzoom != undefined)if(zoom > Mapa.maxzoom) zoom = Mapa.maxzoom;
        map.setZoom(zoom);
      }
      else
      {// Se centrará el mapa en lat long, y el zoom permitirá ver todo!
        
        var newBouds = new GLatLngBounds;
        for(var i = 0; i<Mapa.markers.length; i++)
        {
          var latlng = new GLatLng(Mapa.markers[i].latitude, Mapa.markers[i].longitude);
          newBouds.extend(latlng);
          

          var vector = new GLatLng(Mapa.latitude - Mapa.markers[i].latitude , Mapa.longitude - Mapa.markers[i].longitude);
          var vectorInvers = new GLatLng(- vector.lat(), - vector.lng());
          
          latlng = new GLatLng(Mapa.latitude - vectorInvers.lat(), Mapa.longitude - vectorInvers.lng());
          
          newBouds.extend(latlng);
        }
        
        map.setCenter(new GLatLng(Mapa.latitude, Mapa.longitude));
        var zoom = map.getBoundsZoomLevel(newBouds);
        if(Mapa.maxzoom != undefined)if(zoom > Mapa.maxzoom) zoom = Mapa.maxzoom;
        map.setZoom(zoom);
        
      }
    
      
      
    }
    else
    {
      map.setCenter(new GLatLng(Mapa.latitude, Mapa.longitude), Mapa.zoom);
    }

  
  
if(settings.cck && Mapa.id == "CCK_Mapa")
{

  
  
       
    var markerIconCCK = new GIcon(G_DEFAULT_ICON);
    markerOptionsCCK =  { 
                          icon:markerIconCCK, 
                          draggable: true
                        };

    if(Mapa.markerCCK[0].latitude == 0)
    {
      MarkerCCK = new GMarker(map.getCenter(),markerOptionsCCK);
      map.addOverlay(MarkerCCK);
      document.getElementsByName(settings.field_name+"[0][mapa_marker_lat]")[0].value = map.getCenter().lat();
      document.getElementsByName(settings.field_name + "[0][mapa_marker_lng]")[0].value = map.getCenter().lng();
    }
    else
    {
      MarkerCCK = new GMarker(new GLatLng(Mapa.markerCCK[0].latitude,Mapa.markerCCK[0].longitude),markerOptionsCCK);
      map.addOverlay(MarkerCCK);
    }
     
     GEvent.addListener(MarkerCCK,"dragend", function(point) {     
                            document.getElementsByName(settings.field_name + "[0][mapa_marker_lat]")[0].value = point.lat();
                            document.getElementsByName(settings.field_name + "[0][mapa_marker_lng]")[0].value = point.lng();
                        }
    );

    GEvent.addListener(map,"click", function(overlay, latlng) {     
      if (overlay) 
      { 
          if(overlay == MarkerCCK)
          {
            MarkerCCK.openInfoWindowHtml(document.getElementsByName(settings.field_name + "[0][mapa_marker_text]")[0].value);
          }
      }
      else
      {
        MarkerCCK.setLatLng(latlng);
        document.getElementsByName(settings.field_name + "[0][mapa_marker_lat]")[0].value = latlng.lat();
        document.getElementsByName(settings.field_name + "[0][mapa_marker_lng]")[0].value = latlng.lng();
      }
    });

}
 
 
 

    //FI MAPA
  }
  
}
google.setOnLoadCallback(initialize);


function cckSearch(address)
{
  nombreSitio = "Johannesburg";

  var geocoder = new GClientGeocoder();
  geocoder.getLatLng(address, function(point) {
    if (point) 
    {
        //var map = new google.maps.Map2(document.getElementById("CCK_Mapa"));
        map.setCenter(point,13);
        MarkerCCK.setLatLng(point);
        
        document.getElementsByName(settings.field_name + "[0][mapa_marker_lat]")[0].value = point.lat();
        document.getElementsByName(settings.field_name + "[0][mapa_marker_lng]")[0].value = point.lng();
    }
  });


}

function cckTemp(algo)
{
  alert(algo);
/*
  //var map = new google.maps.Map2(document.getElementById("CCK_Mapa"));
  var a = "";
  for(atributo in map.getContainer() )
  {
    a += atributo;
    a += "\n";
    
  }
  alert(a);
  
  //getContainer() 
  */
}

function cckMoveMap()
{
  var position = new GLatLng(document.getElementsByName(settings.field_name + "[0][mapa_possition_lat]")[0].value,document.getElementsByName(settings.field_name + "[0][mapa_possition_lng]")[0].value);
  map.setCenter(position,parseInt(document.getElementsByName(settings.field_name + "[0][mapa_possition_zoom]")[0].value));
}

function cckMoveMarker()
{
  var position = new GLatLng(document.getElementsByName(settings.field_name + "[0][mapa_marker_lat]")[0].value,document.getElementsByName(settings.field_name + "[0][mapa_marker_lng]")[0].value);
  MarkerCCK.setLatLng(position);
  
}



function VagueriesControl() { }





