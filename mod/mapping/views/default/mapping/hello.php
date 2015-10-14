<p>Select Research Sites:</p>

<select name="sites" width="100%" onchange="loadLatLng(map, this.selectedIndex)">
<option value="-1" selected="selected">--</option>
<option text="baltimore"  >Baltimore,MD,US</option>
<option text="budhapest" >Budhapest, Hungary</option>
<option value="helsinki" >Helsinki and Lahti, Finland</option>
<option value="potchefstroom">Potchefstroom, South Africa</option>
</select>
		
<!-- <input type="submit" id="Butt2" value="Submit KML Sites" onClick="loadKmlLayer(src2, map)"/>
<input type="submit" id="Butt3" value="Submit KML Pictures" onClick="loadLatLng(map)"/> -->
	 

<?php	
	
/* 
 $data = file_get_contents("http://dsa002.pha.jhu.edu/EarthScience/EarthScience/getData?Query=select*%20from%20site&format=json);
//echo $dataintext = implode("\n",$data);
echo $data */
$url=elgg_get_site_url (   $site_guid = 0  );
		
		
php?>

 <script type='text/javascript'>


var map;
var kmlLayer;
//var src1 = 'https://developers.google.com/maps/tutorials/kml/westcampus.kml';
//var src2 = 'http://pages.towson.edu/mmcguire/csn4se/sites.kml';
//var src3 = 'http://yuting.a2hosted.com/KMLPHOTO.kml';
var url="<?php echo $url?>";
var src3 = 'http://yutingsite.com/queryGluseen/baltimoresite.kml?key=' + Math.random();
//var src3 = url+'/baltimoreKML.kml?key=' + Math.random();
//var src3 = _SERVER["DOCUMENT_ROOT"].'/baltimoreKML.kml?key=' + Math.random();
//alert(url);
//alert("hhhhhhhhhh");
function initializeKML() {


  map = new google.maps.Map(document.getElementById('map_canvas'), {
    center: new google.maps.LatLng(-19.257753, 146.823688),
    zoom: 2,
    mapTypeId: google.maps.MapTypeId.TERRAIN
  });

  google.maps.event.addDomListener(window, 'load', initialize);

  historicalOverlay.setMap(null);
  
}

function loadKmlLayer(src, map) {
   kmlLayer = new google.maps.KmlLayer(src, 
    { suppressInfoWindows: false,
      preserveViewport: true, //map isn't centered and zoomed
            map: map }
  );
  
  google.maps.event.addListener(kmlLayer, 'click', function(kmlEvent) {
  showInContentWindow(kmlEvent.latLng, kmlEvent.featureData.infoWindowHtml);
 
  
});

function showInContentWindow(position, text) {

 var content="<div style=' width: 200px; ' ></div> <h1 > "+ text + "</h1>";
 //window.alert('DIV clicked');
  var infowindow = new google.maps.InfoWindow({
    content: content, 
    position: position,
	
  })
  infowindow.open(map);
}

}

function loadLatLng(map, index){
   
switch (index) {

    case 1: 
        map.panTo(new google.maps.LatLng(39.2833, -76.6167)); 
        map.setZoom(8);
        loadKmlLayer(src3, map);
	
		break; 
    case 2:

        map.panTo(new google.maps.LatLng(47.4338, 19.244)); 
		    map.setZoom(8);
        loadKmlLayer(src3, map);
        break; 
	case 3:
		map.panTo(new google.maps.LatLng(60.1733244, 24.9410248)); 
		map.setZoom(7);
    loadKmlLayer(src3, map);
        break; 
	case 4:
		map.panTo(new google.maps.LatLng(-26.7145297, 27.0970475)); 
		map.setZoom(8);
    loadKmlLayer(src3, map);
        break; 
       
    default:
		var latLng = new google.maps.LatLng(39.2833, -76.6167); //Makes a latlng
		map.panTo(latLng); //Make map global
		map.setZoom(9);
}
}

//google.maps.event.addDomListener(window, 'load', initialize);

</script>

 

	
	

	
	
	
