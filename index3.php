<?php include("admin/config.php");    
  global $config;
?>  
<!DOCTYPE html >
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Ubicandote.com</title> 
    <link id="default-css" href="style.css" rel="stylesheet" media="all" />
    <link id="responsive-css" href="responsive.css" rel="stylesheet" media="all" />     
    <!-- **Font Awesome** -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/select2.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/avgrund.css">
    <link rel="stylesheet" href="css/simplemodal.css" type="text/css" media="screen" title="no title" charset="utf-8">
    <!--[if IE 7]>
    <link rel="stylesheet" href="css/font-awesome-ie7.min.css">
    <![endif]--> 
    <!-- **Google - Fonts** -->
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather+Sans' rel='stylesheet' type='text/css'> 
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>  
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
    
<style>

   #mapaprincipal{
      width:100%; 
      height:800px;
   }
    .bordeado{
       border-radius: 5px;
       max-width: 170px;
    }
    #info {
      font-size: 13px;
      position: absolute;
      width: 175px;
     
      right: 20px;
      top: 160px;
      overflow: auto;
      background: #fff;
      border-radius: 10px;
      padding: 8px 5px;
      box-shadow: 4px 4px 10px #dddddd;
    }

    #categoriasdiv {
      font-size: 16px;
      position: absolute;
      right: 40px;
      top: 100px;
    }
    #e12 {
      width: 100%;
      height: 100%;
     }
   #barrainfo {
      font-size: 11px;
      position: fixed;
      width: 540px;
      height: 75px;
      left: 33%;
      right: 0px;
      bottom: 60px;
      overflow: auto;
      background: rgb(36, 36, 36);
      border-radius: 1px;
      padding: 10px;
      box-shadow: 2px 2px 1px rgb(126, 126, 126);
      color: #fff;
      vertical-align: middle;
    }

    #linkcat{
      vertical-align: top;
    }

  </style>
  </head>

  <body onload="load()">
   
      <!-- **Header** -->
      <header id="header">
        <div class="container">
          
            <!-- **Logo** -->
              <div id="logo">
                  <a href="index.html" title=""> <img src="images/logo.png" alt="" title="" /> </a>
              </div><!-- **Logo - End** --> 
              
              <!-- **Navigation** -->
              <nav id="main-nav">
                <ul>
                    <li class="current_page_item"> <a href="#home" title=""> Inicio </a> <span> </span> </li>
                      <li> <a href="#services" title=""> Nosotros </a> <span> </span> </li>
                      <li> <a href="#about" title=""> Servicios </a> <span> </span> </li>
                      <li> <a href="#team" title=""> Noticias </a> <span> </span> </li>
                      <li> <a href="#blog" title=""> Promociones </a> <span> </span> </li>
                      <li> <a href="#portfolio" title=""> Suscriptores</a> <span> </span> </li>
                      <li> <a href="#contact" title=""> Contacto </a> <span> </span> </li>
                     
                  </ul>         
              </nav> <!-- **Navigation - End** -->      
          
          </div>
      </header><!-- **Header - End** -->
<!-- **Main Section** -->
<section id="main">  
    <!-- **Home Content** -->
<article id="home" class="content">
    <div id="mapaprincipal">  </div>
    <div id="categoriasdiv"><a href="#" id="categorias" class="button small blue">Categorias</a></div>
    <div id="info">
      
          <input type="hidden" id="e12" style="width: 100%; height:300px; display: none;" value="
        <?
          $query = "SELECT * FROM categorias WHERE 1";
          $result = mysql_query($query);
          $categorias;
          while ($row = @mysql_fetch_assoc($result)){ 
            //echo '<a href=""><div id="linkcat"><img height="25" src="'.$row['imgicono'].'" border="0"/> '.$row['nombre'].' </div></a>'; 
            $categorias.=  $row['nombre'].',';
          }
          echo substr($categorias, 0, -1);;
        ?> 
 ">
          
        
    </div>
    <div id="barrainfo"><br><br> <center> CLICK PARA MAS INFORMACION  </center></div> 
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
    <!-- **Footer** -->
    <footer id="footer">
            <div class="container">
                  <p class="copyright"><a href="http://talessoft.co"><img src="https://talessoft.co/upload/images/2013/06/28/Z3cs.png" border="0" /></a> Todos los derechos reservados &copy; 2013 </p>
                  <div class="social-share">
                      <a href="" title="" class="facebook"> </a>
                      <a href="" title="" class="youtube"> </a>
                      <a href="" title="" class="google"> </a>
                      <a href="" title="" class="twitter"> </a>
                  </div>      
              </div>
          </footer><!-- **Footer - End** --> 


    <!-- **jQuery** -->
  <script src="js/modernizr-2.6.2.min.js"></script>
  <script src="js/jquery.js"></script>
  <script src="js/jquery.easing.1.2.js"></script>
  <script src="js/jquery.visualNav.js"></script>    
  <script src="js/jquery.mobilemenu.js"></script>
  <script src="js/core-custom.js"> </script>    
  <script src="js/jquery.avgrund.js"> </script>  
  <script src="js/select2.js"> </script>   
  <script src="js/select2.min.js"> </script> 

  <script src="js/mootools-core-1.3.1.js" type="text/javascript" charset="utf-8"></script>
  <script src="js/mootools-more-1.3.1.1.js" type="text/javascript" charset="utf-8"></script>
  <script src="js/simple-modal.js" type="text/javascript" charset="utf-8"></script>
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
                    position: google.maps.ControlPosition.LEFT_CENTER
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
                            var html2 = "<strong>"+name+"</strong> <br/> <i>"+slogan+"</i><hr> <img id='bordeado' width='200' src='"+imgnube+"'> <br/>"+address+"<br/>"+zona+"<br/><br/> <a class='pure-button' href='#'>Ver Perfil</a>";
                            var icon = customIcons[type] || {};
                            
                             var marker = new google.maps.Marker({
                              map: map,
                              position: point,
                              icon: icon.icon,
                              shadow: icon.shadow
                            });
                            marcas.push(marker);
                            bindInfoWindow(marker, map, infoWindow, html1);
                            agregatales(marker, map, infoWindow, html2,name,address,slogan,imgnube,zona,telefonos);  
                        
                    }
    }

    function creaMarcas(markers,map,infoWindow) {

      for (var i = 0; i < markers.length; i++) {

                      for (var j = 0; j < (document.getElementById("e12").value).split(",").length; j++) {
                            var type = markers[i].getAttribute("type");
                        if((document.getElementById("e12").value).split(",")[j]==type){
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
                            var html2 = "<strong>"+name+"</strong> <br/> <i>"+slogan+"</i><hr> <img id='bordeado' width='200' src='"+imgnube+"'> <br/>"+address+"<br/>"+zona+"<br/><br/> <a class='pure-button' href='#'>Ver Perfil</a>";

                           
                            var icon = customIcons[type] || {};
                            
                             var marker = new google.maps.Marker({
                              map: map,
                              position: point,
                              icon: icon.icon,
                              shadow: icon.shadow
                            });
                            marcas.push(marker);
                            bindInfoWindow(marker, map, infoWindow, html1);
                            agregatales(marker, map, infoWindow, html2,name,address,slogan,imgnube,zona,telefonos);  
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
    function agregatales(marker, map, infoWindow, html,name,address,slogan,imgnube,zona,telefonos) {
      google.maps.event.addListener(marker, 'click', function() {

        html = "<div style='height: 100%; width:30%; float:left'> <img class='bordeado' id='imgnube' height='100%' src='"+imgnube+"'> </div> <div style='height: 100%; width:70%;  float: right;'> <strong id='name'>"+name+"</strong> - <i id='slogan'>"+slogan+"</i><br/>"+address+"<br/>"+zona+"<br/><br/> <a class='pure-button' href='#'>Ver Perfil</a> </div>";
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

                 $('#categorias').click(function () { 
                                
                  var SM = new SimpleModal({"hideHeader":true, "closeButton":false, "btn_ok":"Cerrar Ventana", "width":500, "offsetTop:":140});
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