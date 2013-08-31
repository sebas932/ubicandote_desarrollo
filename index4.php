<?php include("header.php");   ?> 
<!-- **Main Section** -->
<section id="main">  
    <!-- **Home Content** -->
<article id="home" class="content">
    <div id="mapaprincipal">  </div>
    <div id="categoriasdiv"><a href="#" id="categorias" class="button small blue">Categorias</a> </div>
    <div id="info">
      
      <br>
      <input type="hidden" id="e12" style="width: 100%; height:300px; display: none;" >
      <br><br><input type="image" src="http://talessoft.co/upload/images/2013/06/29/YdiRA.png"  id="e12_open" > 
      <input type="image" src="http://talessoft.co/upload/images/2013/07/03/qauVY.png"  id="e12_close" >   

      <div id="barrainfo"><br> <center> CLICK PARA MAS INFORMACION  </center></div> 
    </div>
    
</article><!-- **Home Content - End** -->
    <!-- **Services Content** -->
<article id="services" class="content"> 
   
          <!-- **Container** -->
            <div class="container">     
            
                <hgroup class="main-title">
                    <h2> Nosotros </h2>
                    
                </hgroup>
                  <br>  <br>
               
               <h6> Nuestra Empresa </h6>   <br>
                <p>Ubicandote.com, es una empresa legalmente constituída en el 2012 que nació por iniciativa y finalidad satisfacer las necesidades de nuestros clientes “Entidades públicas, privadas o particulares”, que desean ofrecer sus productos y servicios para incrementar sus ganancias y para que el mundo lo conozca.
                    </p>
                <p>Tras estudiar las necesidades de los clientes en cuanto a ubicar un lugar donde desean o necesitan ir o por que la contingencia se lo exige, desarrollamos el proceso que garantiza a través de un mapa físico y virtual la ubicación certera de su negocio.
                    </p>
                <p>Este sistema de ubicandote.com resalta la imagen de sus clientes en el funcionamiento de la presentación de sus servicios a un nivel óptimo y profesional y le muestra el lugar exacto donde se ubica.
                    </p>
                <p>Como resultado de este trabajo ubicandote.com, ha establecido un modelo que se caracteriza por su excelencia en la Prestación de Servicios, Ética Empresarial, Profesionalismo y un enfoque creativo para los clientes. Ubicandote.com, es una empresa prestadora de servicios en el área, de la publicidad y en métodos estratégicos de marketing, con principios y fundamentos en la Calidad y la Innovación que permite generar un estado de mejoramiento continuo a nuestros clientes.
                    </p>   <br>  <br>
               <h6> Misión </h6> 
                 <br>
              <p>Somos una empresa especializada en Publicidad, Diseño y Marketing, garantizando un excelente servicio, calidad y efectividad a nuestros clientes e innovando en estrategias de mercadeo.
             </p>

              <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
            </div><!-- **Container - End** -->
   
    </article><!-- **Services Content - End** -->

</section><!-- **Main Section** -->
<?php include("footer.php");   ?> 
  <script type="text/javascript">
    //<![CDATA[ 
    var filtros =(document.getElementById("e12").value).split(",");
    var marcas = []; 
    var customIcons = {
          <? 
          $result = mysql_query("SELECT * FROM categorias WHERE 1");
          while ($row = @mysql_fetch_assoc($result)){ 
            echo  $row['nombre'].": {  ";
            echo "icon: '".$row['imgicono']."',  ";
            echo "shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'  ";
            echo "},  ";
          }
          ?> 
      
    };
    var styles = [
        {
          featureType: "all",
          stylers: [
            { saturation: -85 }
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
              var map = new google.maps.Map(document.getElementById("mapaprincipal"), {
                center: new google.maps.LatLng(3.430832, -76.522919),
                disableDefaultUI: true,
                zoomControl: true,
                zoomControlOptions: {
                    style: google.maps.ZoomControlStyle.LARGE,
                    position: google.maps.ControlPosition.LEFT_BOTTOM
                },
                scrollwheel: false,
                zoom: 13,
                mapTypeId: 'roadmap'
              });
              var infoWindow = new google.maps.InfoWindow;


              // Change this depending on the name of your PHP file
              downloadUrl("xml_maps.php?lat=3.430832&lng=-76.522919", function(data) {
                    var xml = data.responseXML;
                    var center = xml.documentElement.getElementsByTagName("point");
                    var pointcenter = new google.maps.LatLng(
                          parseFloat(center[0].getAttribute("lat")),
                          parseFloat(center[0].getAttribute("lng")));

                    var markers = xml.documentElement.getElementsByTagName("marker");


                    creaMarcasinicial(markers,map,infoWindow);

                    jQuery(document).ready(function ($) {
                              $('#e12').click(function () { 
                                borraMarkers(marcas)
                                creaMarcas(markers,map,infoWindow);
                                console.log(document.getElementById("e12").value);
                              }); 
                   })  

                    map.setCenter(pointcenter);
              });

              map.setOptions({styles: styles});         
    }
    function borraMarkers(marcas) {
      for (var i = 0; i < marcas.length; i++) {
          marcas[i].setMap(null);
      } 
    } 
    function creaMarcasinicial(markers,map,infoWindow) {

                  for (var i = 0; i < markers.length; i++) {
                            var id = markers[i].getAttribute("id");
                            var type = markers[i].getAttribute("type");
                            var name = markers[i].getAttribute("name");
                            var address = markers[i].getAttribute("address");
                            var slogan = markers[i].getAttribute("slogan");
                            var telefonos = markers[i].getAttribute("telefonos");
                            var zona = markers[i].getAttribute("zona");
                            var imgnube = markers[i].getAttribute("imgnube");
                            var point = new google.maps.LatLng(
                                parseFloat(markers[i].getAttribute("lat")),
                                parseFloat(markers[i].getAttribute("lng")));
                            var html1 = "<strong>" + name + "</b>";
                            var html2 = "<strong>"+name+"</strong> <br/> <i>"+slogan+"</i><hr> <img id='bordeado' width='200' src='"+imgnube+"'> <br/>"+address+"<br/>"+zona+"<br/><br/> <a class='pure-button' href='perfil.php?id="+id+"'>Ver Perfil</a>";
                            var icon = customIcons[type] || {};
                            
                             var marker = new google.maps.Marker({
                              map: map,
                              position: point,
                              icon: icon.icon,
                              shadow: icon.shadow
                            });
                            marcas.push(marker);
                            bindInfoWindow(marker, map, infoWindow, html1);
                            agregatales(marker, map, infoWindow, html2,name,address,slogan,imgnube,zona,telefonos,id);  
                        
                    }
    }

    function creaMarcas(markers,map,infoWindow) {

      for (var i = 0; i < markers.length; i++) {

                      for (var j = 0; j < (document.getElementById("e12").value).split(",").length; j++) {
                            var type = markers[i].getAttribute("type");
                        if((document.getElementById("e12").value).split(",")[j]==type){
                            var id = markers[i].getAttribute("id");
                            var name = markers[i].getAttribute("name");
                            var address = markers[i].getAttribute("address");
                            var slogan = markers[i].getAttribute("slogan");
                            var telefonos = markers[i].getAttribute("telefonos");
                            var zona = markers[i].getAttribute("zona");
                            var imgnube = markers[i].getAttribute("imgnube");
                            
                            var point = new google.maps.LatLng(
                                parseFloat(markers[i].getAttribute("lat")),
                                parseFloat(markers[i].getAttribute("lng")));
                            var html1 = "<strong>" + name + "</b>";
                            var html2 = "<strong>"+name+"</strong> <br/> <i>"+slogan+"</i><hr> <img id='bordeado' width='200' src='"+imgnube+"'> <br/>"+address+"<br/>"+zona+"<br/><br/> <a class='pure-button' href='perfil.php?id="+id+"'>Ver Perfil</a>";

                           
                            var icon = customIcons[type] || {};
                            
                             var marker = new google.maps.Marker({
                              map: map,
                              position: point,
                              icon: icon.icon,
                              shadow: icon.shadow
                            });
                            marcas.push(marker);
                            bindInfoWindow(marker, map, infoWindow, html1);
                            agregatales(marker, map, infoWindow, html2,name,address,slogan,imgnube,zona,telefonos,id);  
                          }
                         }   
                    }
    } 
    function bindInfoWindow(marker, map, infoWindow, html) {
      google.maps.event.addListener(marker, 'mouseover', function() {
        infoWindow.setContent(html);

        //map.setCenter(marker.getPosition());
        infoWindow.open(map, marker);
      });
    }
    function agregatales(marker, map, infoWindow, html,name,address,slogan,imgnube,zona,telefonos,id) {
      google.maps.event.addListener(marker, 'click', function() {

        html = "<div style='width: 100%;  float:left'> <img class='bordeado' id='imgnube' width='100%' src='"+imgnube+"'> </div><br><div style='width: 100%;  float: left;'> <strong id='name'>"+name+"</strong> <br> <i id='slogan'>"+slogan+"</i><br/>"+address+"<br/>"+zona+"<br/><br/> <a class='pure-button' href='perfil.php?id="+id+"'>Ver Perfil</a>";
         document.getElementById('barrainfo').innerHTML = html;
        infoWindow.open(map, marker);
      });
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



    jQuery(document).ready(function ($) { 
                $("#e12").select2({tags:[
                  <? 
                  $result = mysql_query("SELECT * FROM categorias WHERE 1");
                  while ($row = @mysql_fetch_assoc($result)){  echo '"'.$row['nombre'].'",'; }
                  ?> 
                ]});
                $("#e12_open").click(function () { $("#e12").select2("open"); });
                $("#e12_close").click(function () { $("#e12").select2("close"); });

                 $('#categorias').click(function () { 
                                
                  var SM = new SimpleModal({"hideHeader":true, "closeButton":false, "btn_ok":"Cerrar Ventana", "width":650, "offsetTop:":140});
                      SM.show({
                        "model":"alert",
                        <?   echo '"contents": "';
                            $cat;
                             //echo '<a href=""><div id="linkcat"><img height="25" src="'.$row['imgicono'].'" border="0"/> '.$row['nombre'].' </div></a>'; 
                            $result = mysql_query("SELECT * FROM categorias WHERE 1");
                            while ($row = @mysql_fetch_assoc($result)){ 
                             $cat.= "<a href=''><div id='linkcat'><img src='".$row['imgicono']."' border='0'/> ".$row['nombre']." </div></a>";
                             }
                             echo $cat.'"';
                         ?> 

                      });
                   }); 

                
                
                var posicionActual, posicionNueva = 140;

                $(window).scroll(function(){
                posicionNueva = $(this).scrollTop();
                console.log($(this).scrollTop());

                if(posicionNueva>140){
                $('#barrainfo').fadeOut();
                } else if(posicionNueva<140){
                $('#barrainfo').fadeIn();
                }
                posicionActual=posicionNueva;
                });

    })
    //]]>


  </script>
  </body>



</html>