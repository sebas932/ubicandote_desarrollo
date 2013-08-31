<!DOCTYPE html >
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Ubicandote.com</title>
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>  
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript">
    //<![CDATA[
    var geocoder;



    var customIcons = {
      restaurant: {
        icon: 'icons/pin6.png',
        shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
      },
      bar: {
        icon: 'icons/pin7.png',
        shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
      }
    };
    var styles = [
        {
          featureType: "all",
          stylers: [
            { saturation: -80 }
          ]
        },{
          featureType: "road.arterial",
          elementType: "geometry",
          stylers: [
            { hue: "#00ffee" },
            { saturation: 50 }
          ]
        },{
          featureType: "poi.business",
          elementType: "labels",
          stylers: [
            { visibility: "off" }
          ]
        }
    ];

    function load() {
              geocoder = new google.maps.Geocoder();
              var map = new google.maps.Map(document.getElementById("mapaprincipal"), {
                center: new google.maps.LatLng(3.430832, -76.522919),
                disableDefaultUI: true,
                zoom: 13,
                mapTypeId: 'roadmap'
              });
              var infoWindow = new google.maps.InfoWindow;


              // Change this depending on the name of your PHP file
              downloadUrl("xml_maps.php", function(data) {
                var xml = data.responseXML;
                var markers = xml.documentElement.getElementsByTagName("marker");
                for (var i = 0; i < markers.length; i++) {
                  var name = markers[i].getAttribute("name");
                  var address = markers[i].getAttribute("address");
                  var type = markers[i].getAttribute("type");
                  var point = new google.maps.LatLng(
                      parseFloat(markers[i].getAttribute("lat")),
                      parseFloat(markers[i].getAttribute("lng")));
                  var html1 = "<b>" + name + "</b>";
                  var html2 = "<b>" + name + "</b> <br/>" + address;
                  var icon = customIcons[type] || {};
                  var marker = new google.maps.Marker({
                    map: map,
                    position: point,
                    icon: icon.icon,
                    shadow: icon.shadow
                  });
                  bindInfoWindow(marker, map, infoWindow, html1);
                  agregatales(marker, map, infoWindow, html2);
                  
                }
              });

              map.setOptions({styles: styles});

              
    }

    function bindInfoWindow(marker, map, infoWindow, html) {
      google.maps.event.addListener(marker, 'mouseover', function() {
        infoWindow.setContent(html);

        //map.setCenter(marker.getPosition());
        infoWindow.open(map, marker);
      });
    }
    function agregatales(marker, map, infoWindow, html) {
      google.maps.event.addListener(marker, 'click', function() {
        //infoWindow.setContent('asdasdas '+html);
        //map.setCenter(marker.getPosition());
        actualizaUbicacion(html); 
        infoWindow.open(map, marker);
      });
    }

      function actualizaUbicacion(html){
 
        document.getElementById('info').innerHTML = html;
    }

    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;

      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request, request.status);
        }
      };

      request.open('GET', url, true);
      request.send(null);
    }

    function doNothing() {}

    //]]>


  </script>
  <style>

   html
    {
        border:0;
        padding:0;
        margin:0;
        width:100%;
        height:100%;
    }
    
    #map_canvas
    {
        width:100%; 
        height:100%;
    }

    body {
      border:0;
      padding:0;
      margin:0;
      width:100%;
      height:100%;
      font-family: 'Oswald', sans-serif;
      padding-bottom: 0px;
      color: #000000;
      background: #45484d; /* Old browsers */
      background: -moz-linear-gradient(top,  #45484d 0%, #000000 100%); /* FF3.6+ */
      background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#45484d), color-stop(100%,#000000)); /* Chrome,Safari4+ */
      background: -webkit-linear-gradient(top,  #45484d 0%,#000000 100%); /* Chrome10+,Safari5.1+ */
      background: -o-linear-gradient(top,  #45484d 0%,#000000 100%); /* Opera 11.10+ */
      background: -ms-linear-gradient(top,  #45484d 0%,#000000 100%); /* IE10+ */
      background: linear-gradient(to bottom,  #45484d 0%,#000000 100%); /* W3C */
      filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#45484d', endColorstr='#000000',GradientType=0 ); /* IE6-9 */
    }
    #header{
      width: 1000px;
      margin: auto;
      padding: auto;
    }

    #logo{
      padding: 40px;
      background-image: url("image/logo.png");
      background-repeat: no-repeat;
    }

   #mapaprincipal{
      width:100%; 
        height:100%;
   }

    #top{
      width: 100%;
      height: 120px;
      position:absolute;
      background: #45484d; /* Old browsers */
      background: -moz-linear-gradient(top,  #45484d 0%, #000000 100%); /* FF3.6+ */
      background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#45484d), color-stop(100%,#000000)); /* Chrome,Safari4+ */
      background: -webkit-linear-gradient(top,  #45484d 0%,#000000 100%); /* Chrome10+,Safari5.1+ */
      background: -o-linear-gradient(top,  #45484d 0%,#000000 100%); /* Opera 11.10+ */
      background: -ms-linear-gradient(top,  #45484d 0%,#000000 100%); /* IE10+ */
      background: linear-gradient(to bottom,  #45484d 0%,#000000 100%); /* W3C */
      filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#45484d', endColorstr='#000000',GradientType=0 ); /* IE6-9 */
      z-index: 100;
    }

    #info
    {
        position:absolute;
        width:250px;
        height:250px;
        left:20px;
        top:300px;
        overflow:auto;
        background: #fff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 2px 2px 1px #dddddd;
    }   

  </style>
  </head>

  <body onload="load()">
    <div id="top"> 
      <div id="header">
        <div id="logo"></div>
      </div>
    </div>
    <div id="mapaprincipal">  </div>
    <div id="info"></div>
  </body>

</html>