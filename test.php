<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
** Creado en Julio de 2009 por Montes http://mooontes.com
** Bajo licencia http://creativecommons.org/licenses/by/3.0/es/deed.es
**
** Ejemplo de programación con Google Maps API V3
**
** Centrado del mapa en la ubicación del visitante, captura de eventos, 
** reverse geocoding y uso de la libreria para hacer zoom con la rueda del ratón
-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
 
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
     
    <title>Test Google Maps API V3 -mooontes.com-</title>
     
    <style type="text/css">  
    html
    {
        border:0;
        padding:0;
        margin:0;
        width:100%;
        height:100%;
    }
    body
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
    #info
    {
        position:absolute;
        width:250px;
        height:250px;
        left:20px;
        top:300px;
        background-color:white;
        padding:5px;
        overflow:auto;
    }   
    </style>
 
     
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>  
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>  
     
    <script type="text/javascript">
    var map;
    var geocoder;
 
    function initialize() {
         
        //Inicializamos geocoder y centramos el mapa en la ubicación del visitante
        geocoder = new google.maps.Geocoder();
        if (google.loader.ClientLocation)
        {
            //Averiguamos latitud/longitud del visitante
            var latt = google.loader.ClientLocation.latitude;
            var longg = google.loader.ClientLocation.longitude;
             
            //Centramos el mapa en sus coordenadas
            var latlng = new google.maps.LatLng(latt,longg);
        }
        else
        {
            //Si no localizamos la ubicacion del visitante, centramos el mapa en Madrid
            var latlng = new google.maps.LatLng("40.41153868","-3.70362707");
        }
         
        //Creamos el mapa
        var myOptions = {
        zoom: 5,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
         
        //Añadimos un listener, se activará cuando el mapa esté totalmente cargado
        google.maps.event.addListener(map, 'bounds_changed',function() 
            {
                //Primera actualización del div que muestra los detalles de la ubicacion actual
                actualizaUbicacion(); 
                //Al haber cargado totalmente el mapa, eliminamos este listener
                google.maps.event.clearListeners(map, 'bounds_changed');
                //Y añadimos dos, uno se activará cuando se termine de arrastrar el mapa y otro cuando se cambie el nivel de zoom
                google.maps.event.addListener(map, 'dragend',function() { actualizaUbicacion() });
                google.maps.event.addListener(map, 'zoom_changed',function() { actualizaUbicacion() });
            }
        );
                 
    }
 
     
    function actualizaUbicacion()
    {
 
        //Coordenadas del centro del mapa que usaremos para el reverse geocoding
        var lattlng = map.getCenter();
     
        if (geocoder) 
        {
            geocoder.geocode({'latLng': lattlng}, function(results, status) 
            {
                if (status == google.maps.GeocoderStatus.OK) 
                {
                    if (results[1]) 
                    {
                        var reverse_geo = results[1];
                         
                        var text = "<a href='http://mooontes.com'>mooontes.com</a><br /><br />Map center: " 
                            + map.getCenter()+ "<br /><br />Reverse Geocoding:<br />";
                        if (reverse_geo.address_components[0]) { text = text + "0: " + reverse_geo.address_components[0].long_name + "<br />"; }
                        if (reverse_geo.address_components[1]) { text = text + "1: " + reverse_geo.address_components[1].long_name + "<br />"; }
                        if (reverse_geo.address_components[2]) { text = text + "2: " + reverse_geo.address_components[2].long_name + "<br />"; }
                        if (reverse_geo.address_components[3]) { text = text + "3: " + reverse_geo.address_components[3].long_name + "<br />"; }
                        if (reverse_geo.address_components[4]) { text = text + "4: " + reverse_geo.address_components[4].long_name + "<br />"; }
                 
                        text = text + "5: " + reverse_geo.formatted_address;
                 
                        document.getElementById('info').innerHTML = text;
                    }
                } 
                else 
                {
                    document.getElementById('info').innerHTML = "No hay información de Reverse Geocoding.";
                }
            });
        }
    }
     
    //--></script>
     
</head>
<body onload="initialize()">
    <div id="map_canvas"></div>
    <div id="info"><a href="http://mooontes.com">mooontes.com</a></div>
</body>
</html>