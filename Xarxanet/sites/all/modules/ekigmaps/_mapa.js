
var eMap = {
  
  }


var settings = {
  path : "",
  cck : false
  }

var map;
var MarkerCCK;

  
google.load("maps", "2.x");

// Call this function when the page has been loaded
function initialize() 
{
   
  for (atributo in eMap)
  {
    var Mapa = eMap[atributo];

     map = new google.maps.Map2(document.getElementById(Mapa.id));


    //map.setUIToDefault();
    map.addControl(new GSmallMapControl());
    map.addControl(new GMapTypeControl());

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
  GEvent.addListener(map,"moveend", function() 
    {     
      document.getElementsByName("field_mapa4[0][mapa][possition][zoom]")[0].value = map.getZoom();
      document.getElementsByName("field_mapa4[0][mapa][possition][lat]")[0].value = map.getCenter().lat();
      document.getElementsByName("field_mapa4[0][mapa][possition][lng]")[0].value = map.getCenter().lng();
    }
  );
}   


    

    
    
    
     
    if(Mapa.behavior["autozoom"] && Mapa.markers != undefined)
    {
      if(Mapa.latitude == undefined && Mapa.longitude == undefined )
      {
        map.setCenter(bounds.getCenter());
        var zoom = map.getBoundsZoomLevel(bounds);
        if(zoom > Mapa.maxzoom) zoom = Mapa.maxzoom;
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
        if(zoom > Mapa.maxzoom) zoom = Mapa.maxzoom;
        map.setZoom(zoom);
        
      }
    
      
      
    }
    else
    {
      map.setCenter(new GLatLng(Mapa.latitude, Mapa.longitude), Mapa.zoom);
    }

  
  
if(settings.cck)
{

        
    var markerIconCCK = new GIcon(G_DEFAULT_ICON);
    markerOptionsCCK =  { 
                          icon:markerIconCCK, 
                          draggable: true
                        };
    MarkerCCK = new GMarker(map.getCenter(),markerOptionsCCK);
    map.addOverlay(MarkerCCK);
    document.getElementsByName("field_mapa4[0][mapa][marcador][lat]")[0].value = map.getCenter().lat();
    document.getElementsByName("field_mapa4[0][mapa][marcador][lng]")[0].value = map.getCenter().lng();
     
     GEvent.addListener(MarkerCCK,"dragend", function(point) {     
                            document.getElementsByName("field_mapa4[0][mapa][marcador][lat]")[0].value = point.lat();
                            document.getElementsByName("field_mapa4[0][mapa][marcador][lng]")[0].value = point.lng();
                        }
    );




    GEvent.addListener(map,"click", function(overlay, latlng) {     
      if (overlay) 
      { 
          if(overlay == MarkerCCK)
          {
            MarkerCCK.openInfoWindowHtml(document.getElementsByName("field_mapa4[0][mapa][texto]")[0].value);
          }
      }
      else
      {
        MarkerCCK.setLatLng(latlng);
        document.getElementsByName("field_mapa4[0][mapa][marcador][lat]")[0].value = latlng.lat();
        document.getElementsByName("field_mapa4[0][mapa][marcador][lng]")[0].value = latlng.lng();
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
        //getContainer() 
    }
  });


}

function cckTemp()
{
  //var map = new google.maps.Map2(document.getElementById("CCK_Mapa"));
  var a = "";
  for(atributo in map.getContainer() )
  {
    a += atributo;
    a += "\n";
    
  }
  alert(a);
  
  //getContainer() 
}

function cckMoveMap()
{
  var position = new GLatLng(document.getElementsByName("field_mapa4[0][mapa][possition][lat]")[0].value,document.getElementsByName("field_mapa4[0][mapa][possition][lng]")[0].value);
  map.setCenter(position,parseInt(document.getElementsByName("field_mapa4[0][mapa][possition][zoom]")[0].value));
}

function cckMoveMarker()
{
  var position = new GLatLng(document.getElementsByName("field_mapa4[0][mapa][marcador][lat]")[0].value,document.getElementsByName("field_mapa4[0][mapa][marcador][lng]")[0].value);
  MarkerCCK.setLatLng(position);
}

