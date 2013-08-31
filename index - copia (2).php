<?php include("header.php");
?>  
<!-- **Main Section** -->
<section id="main">  
    <!-- **Home Content** -->
    <article id="home" class="content">

        <div id="mapaprincipal">  </div> 
        <div id="buscador"><input type="hidden" class="bigdrop" id="e6" style="width:225px" placeholder="Buscar" value="12"/> </div> 

        <div id="infolist"> 
            <ul id="listaperfiles"></ul>
        </div>
        <div id="info"> 
            <input type="hidden" id="e12" style="width: 100%; height:300px; display: none;" >
            <br><br>
            <img src="images/categorias.png">
            <input type="image" src="http://talessoft.co/upload/images/2013/06/29/YdiRA.png"  id="e12_open" > 
            <input type="image" src="http://talessoft.co/upload/images/2013/07/03/qauVY.png"  id="e12_close" >   

            <div id="barrainfo">
                <br>
                <?
                $catego;
                $result = mysql_query("SELECT * FROM categorias WHERE id=idpadre ORDER BY nombre ASC");
                while ($row = @mysql_fetch_assoc($result)) {
                    $linkcat_cat = '"' . $row['nombre'] . '"';
                    $catego.= "<a id='linkcat' href='#' onClick='linkcat(" . $linkcat_cat . ");'><div id='linkcat'><img src='" . $row['imgicono'] . "' border='0'/> " . $row['nombre'] . " </div></a>";
                }
                echo $catego;
                ?>
            </div> 
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
            <h5> Nuestra Empresa </h5>    
            <p>Ubicandote.com, es una empresa legalmente constituída en el 2012 que nació por iniciativa y finalidad satisfacer las necesidades de nuestros clientes “Entidades públicas, privadas o particulares”, que desean ofrecer sus productos y servicios para incrementar sus ganancias y para que el mundo lo conozca.
            </p>
            <p>Tras estudiar las necesidades de los clientes en cuanto a ubicar un lugar donde desean o necesitan ir o por que la contingencia se lo exige, desarrollamos el proceso que garantiza a través de un mapa físico y virtual la ubicación certera de su negocio.
            </p>
            <p>Este sistema de ubicandote.com resalta la imagen de sus clientes en el funcionamiento de la presentación de sus servicios a un nivel óptimo y profesional y le muestra el lugar exacto donde se ubica.
            </p>
            <p>Como resultado de este trabajo ubicandote.com, ha establecido un modelo que se caracteriza por su excelencia en la Prestación de Servicios, Ética Empresarial, Profesionalismo y un enfoque creativo para los clientes. Ubicandote.com, es una empresa prestadora de servicios en el área, de la publicidad y en métodos estratégicos de marketing, con principios y fundamentos en la Calidad y la Innovación que permite generar un estado de mejoramiento continuo a nuestros clientes.
            </p>  
            <div class="column one-third">
                <div class="bordered-box-content">
                    <div class="box-container"> 
                        <h5> Misión </h5>
                        <p>Somos una empresa especializada en Publicidad, Diseño y Marketing, garantizando un excelente servicio, calidad y efectividad a nuestros clientes e innovando en estrategias de mercadeo.
                        </p>
                        <br>
                    </div>
                    <span class="border"> </span>
                </div>
            </div> 
            <div class="column one-third">
                <div class="bordered-box-content">
                    <div class="box-container"> 
                        <h5> Visión</h5> 
                        <p>Ser una empresa con el más alto nivel de servicio al cliente a nivel local y nacional, centrados en la confianza y credibilidad para el desarrollo de nuestra empresa.</p>
                        <br><br>
                    </div>
                    <span class="border"> </span>
                </div>
            </div> 
            <div class="column one-third last">
                <div class="bordered-box-content">
                    <div class="box-container"> 
                        <h5> Valores</h5> 
                        <p>Para la efectiva presentación de su actividad ubicándote.com, adopta los siguientes valores como elementos orientados a la prestación de servicios: Puntualidad, Responsabilidad, Compromiso, Confianza, Honestidad y Respeto.
                        </p>
                    </div>
                    <span class="border"> </span>
                </div>
            </div> 
            <div class="hr-invisible"> </div> 
            <h5>Ubicreadores</h5> 
            <p>Nuestro equipo de Trabajo está compuesto por personas con conocimientos en diferentes disciplinas, con experiencia en el tema de Publicidad, Diseño, Mercadeo, Artes y Ciencias Sociales enfocados con una Responsabilidad Empresarial de la mano con el cliente. Unos de nuestros principales objetivos es el incrementar las ventas y utilización de sus servicios.
            </p>
            <br> <br> <br> <br> <br> <br> 
        </div><!-- **Container - End** -->
    </article><!-- **Services Content - End** -->
    <article id="servicios" class="content"> 
        <div class="pattern">   
            <!-- **Container** -->
            <div class="container">    
                <hgroup class="main-title">
                    <h2> Servicios </h2> 
                </hgroup> 
                <h3> Diseño Web </h3> 
                <div class="hr-invisible"> </div>

                <div class="column one-third">
                    <!--**Team Wrapper**-->
                    <div class="team-wrapper">
                        <hgroup class="member-name">
                            <h5> Sitio Web Económico</h5>
                            <h6> $500.000</h6>
                        </hgroup> 

                        <b>Incluye:</b>
                        <li>Hasta 5 páginas (links)</li>
                        <li>Formulario de Contacto</li>
                        <li>Hasta 3 imágenes del cliente por página</li>
                        <li>Diseño Personalizado de acuerdo a la imagen de su empresa y sus indicaciones. No utilizamos plantillas.</li>
                    </div><!--**Team Wrapper - End**-->
                </div>

                <div class="column one-third">
                    <!--**Team Wrapper**-->
                    <div class="team-wrapper">
                        <hgroup class="member-name">
                            <h5> Sitio Web Avanzado </h5>
                            <h6> $800.000</h6>
                        </hgroup>
                        <b>Incluye:</b>
                        <li>Hasta 8 páginas (links)</li>
                        <li>Banner animado</li>
                        <li>Banner con rotación animada de imágenes en la pagina principal</li>
                        <li>Formulario de Contacto</li>
                        <li>Hasta 5 imágenes del cliente por página</li>
                        <li>Diseño Personalizado de acuerdo a la imagen de su empresa y sus indicaciones. No utilizamos plantillas.</li>

                    </div><!--**Team Wrapper - End**-->
                </div>
                <div class="column one-third last">
                    <!--**Team Wrapper**-->
                    <div class="team-wrapper">
                        <hgroup class="member-name">
                            <h5> Sitio Web Ejecutivo </h5>
                            <h6>  $1.200.000</h6>
                        </hgroup>
                        <b>Incluye:</b>


                        <li>Hasta 15 páginas (links)</li>
                        <li>Banner animado</li>
                        <li>Banner con rotación animada de imágenes en la pagina principal</li>
                        <li>Registro de usuarios (Base de datos)</li>
                        <li>Buscador por palabra clave en la pagina principal.</li>
                        <li>Formulario de Contacto</li>
                        <li>Hasta 7 imágenes del cliente por página</li>
                        <li>Diseño Personalizado de acuerdo a la imagen de su empresa y sus indicaciones. No utilizamos plantillas.</li>
                    </div><!--**Team Wrapper - End**-->
                </div>
            </div><!-- **Container - End** -->
        </div>
    </article><!-- **Contact Content - End** -->

</article><!-- **Services Content - End** -->
<article id="promociones" class="content"> 
    <div class="pattern">   
        <!-- **Container** -->
        <div class="container">    
            <hgroup class="main-title">
                <h2> Promociones </h2> 
            </hgroup> 


        </div><!-- **Container - End** -->
    </div>
</article><!-- **Contact Content - End** -->

<article id="contact" class="content"> 
    <div class="pattern">   
        <!-- **Container** -->
        <div class="container">     
            <hgroup class="main-title">
                <h2> Contacto </h2> 
            </hgroup> 
            <div class="hr-invisible"> </div> 
            <div class="column one-half"> 
                <div class="contact-info">  
                    <h4> Informacion de Contacto </h4>
                    <ul>
                        <li>  </li>
                        <li> <strong>Telefono:</strong>   </li> 
                        <li> <strong>Email:</strong> <a href="" title=""> contacto@ubicandote.com </a> </li>
                        <li> <strong>Web:</strong> <a href="" title=""> www.ubicandote.com </a> </li>
                    </ul>
                </div>
                <div class="hr-invisible"> </div>
                <h4> Suscribete! </h4> 
                <div class="dark-box">
                    <form action="#" method="get" class="newsletter-form">
                        <label> Tu E-mail <span> (Requerido) </span> </label>
                        <input type="email" name="email" autocomplete="off" required>
                        <input name="submit" type="submit" value="Enviar">
                    </form>
                </div> 
                <br><br><p></p>
                <a class="twitter-timeline" href="https://twitter.com/Ubicandote" data-widget-id="363508229696806912">Tweets by @Ubicandote</a>
                <script>!function(d, s, id){var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location)?'http':'https'; if (!d.getElementById(id)){js = d.createElement(s); js.id = id; js.src = p + "://platform.twitter.com/widgets.js"; fjs.parentNode.insertBefore(js, fjs); }}(document, "script", "twitter-wjs");</script>
                <div id="fb-root"></div>
                <script>(function(d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                                    if (d.getElementById(id)) return;
                                    js = d.createElement(s); js.id = id;
                                    js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=204394659618464";
                                    fjs.parentNode.insertBefore(js, fjs);
                            }(document, 'script', 'facebook-jssdk'));</script>
                <div class="fb-like-box" data-href="https://www.facebook.com/ubicandote.loquenecesitas" data-width="455" data-height="200" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
            </div> 
            <div class="column one-half last">
                <div class="dark-box">  
                    <h4> Formulario</h4>
                    <div class="message"></div>
                    <form action="php/sendmail.php" method="get" class="enquiry-form">
                        <p>
                            <label> Tu Nombre <span> (Requerido) </span> </label>
                            <input name="name" type="text" required>
                        </p>
                        <p>
                            <label> E-mail <span> (Requerido) </span> </label>
                            <input type="email" name="email" autocomplete="off" required>
                        </p>
                        <p>
                            <label> Mensaje <span> (Requerido) </span> </label>
                            <textarea name="message" cols="5" rows="3" required></textarea>                            
                        </p>
                        <input name="submit" type="submit" value="Enviar">
                    </form>
                </div>
            </div> 
            <div class="clear"> </div>
            <div class="hr-invisible"> </div> 
        </div><!-- **Container - End** -->
    </div>
</article><!-- **Contact Content - End** -->

</section><!-- **Main Section** -->
<?php include("footer.php"); ?> 
<script type="text/javascript">
            //<![CDATA[ 
            var filtros = (document.getElementById("e12").value).split(",");
            var marcas = [];
            var SM, SM2;
            var posicionActual, posicionNueva = 140;
            var markers;
            var map;
            var infoWindow;
            var customIcons = {
<?
$result = mysql_query("SELECT * FROM categorias WHERE 1");
while ($row = @mysql_fetch_assoc($result)) {
    echo $row['nombre'] . ": {  ";
    echo "icon: '" . $row['imgicono'] . "',  ";
    echo "shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'  ";
    echo "},  ";
}
?>

    };
            var styles = [
    {
    featureType: "all",
            stylers: [
    { saturation: - 35 }
    ]
    }, {
    featureType: "road.arterial",
            elementType: "geometry",
            stylers: [
    { hue: "#00ffee" },
    { saturation: 50 }
    ]
    }, {
    featureType: "poi.business",
            elementType: "labels",
            stylers: [
    { visibility: "off" }
    ]
    }
    ];
            function load() {
            map = new google.maps.Map(document.getElementById("mapaprincipal"), {
            center: new google.maps.LatLng(3.300832, - 76.522919),
                    disableDefaultUI: true,
                    scrollwheel: false,
                    zoom: 13,
                    mapTypeId: 'roadmap'
            });
                    infoWindow = new google.maps.InfoWindow;
                    // Change this depending on the name of your PHP file
                    downloadUrl("xml_maps.php?lat=3.400832&lng=-76.522919", function(data) {
            var xml = data.responseXML;
                    var center = xml.documentElement.getElementsByTagName("point");
                    var pointcenter = new google.maps.LatLng(
                    parseFloat(center[0].getAttribute("lat")),
                    parseFloat(center[0].getAttribute("lng")));
                    markers = xml.documentElement.getElementsByTagName("marker");
                    if (document.getElementById("e12").value){
            borraMarkers(marcas);
                    creaMarcas(markers, map, infoWindow);
            } else{
            //creaMarcasinicial(markers,map,infoWindow);
            }
            jQuery(document).ready(function ($) {
            $('#e12').click(function () {
            borraMarkers(marcas);
                    creaMarcas(markers, map, infoWindow);
                    console.log(document.getElementById("e12").value);
            });
                    $('#linkcat').click(function () {
            console.log("cat_boton");
            });
            })

                    map.setCenter(pointcenter);
            });
                    //map.setOptions({styles: styles});         
            }
    function borraMarkers(marcas) {
    for (var i = 0; i < marcas.length; i++) {
    marcas[i].setMap(null);
    }
    }
    function creaMarcasinicial(markers, map, infoWindow) {

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
            var html1 = "<p id='hook'>" + name + "</p>";
            var html2 = "<strong>" + name + "</strong> <br/> <i>" + slogan + "</i><hr> <img id='bordeado' width='200' src='" + imgnube + "'> <br/>" + address + "<br/>" + zona + "<br/><br/> <a class='pure-button' href='perfil.php?id=" + id + "'>Ver Perfil</a>";
            var icon = customIcons[type] || {};
            var marker = new google.maps.Marker({
    map: map,
            position: point,
            icon: icon.icon,
    });
            marcas.push(marker);
            bindInfoWindow(marker, map, infoWindow, name, address, slogan, imgnube, zona, telefonos, id);
            agregatales(marker, map, infoWindow, html2, name, address, slogan, imgnube, zona, telefonos, id);
    }
    }

    function creaMarcas(markers, map, infoWindow) {

    document.getElementById("infolist").style.display = "inline";
            document.getElementById('listaperfiles').innerHTML = "";
            for (var i = 0; i < markers.length; i++) {

    for (var j = 0; j < (document.getElementById("e12").value).split(",").length; j++) {
    var type = markers[i].getAttribute("type");
            if ((document.getElementById("e12").value).split(",")[j] == type){
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
            var html1 = "<p id='hook'>" + name + "</p>";
            var html2 = "<strong>" + name + "</strong> <br/> <i>" + slogan + "</i><hr> <img id='bordeado' width='200' src='" + imgnube + "'> <br/>" + address + "<br/>" + zona + "<br/><br/> <a class='pure-button' href='perfil.php?id=" + id + "'>Ver Perfil</a>";
            var actual = document.getElementById('listaperfiles').innerHTML;
            document.getElementById('listaperfiles').innerHTML = actual + ("<li>" + name + " <br> <i class='icon-tag'></i>" + type + "<a href='perfil.php?id=" + id + "' class='read-more'> Perfil » </a></li>")

            var icon = customIcons[type] || {};
            var marker = new google.maps.Marker({
    map: map,
            position: point,
            icon: icon.icon,
    });
            marcas.push(marker);
            bindInfoWindow(marker, map, infoWindow, name, address, slogan, imgnube, zona, telefonos, id);
            agregatales(marker, map, infoWindow, html2, name, address, slogan, imgnube, zona, telefonos, id);
    }
    }
    }
    }
    function bindInfoWindow(marker, map, infoWindow, name, address, slogan, imgnube, zona, telefonos, id) {
    google.maps.event.addListener(marker, 'mouseover', function() {
    infoWindow.setContent("<div style='font-size:12px;height: auto;width: 120px;float:left;'><p><b>" + name + "</b></p>" + address + "</div><img style='max-height: 80px;max-width: 80px;' class='alignright' src='" + imgnube + "'> ");
            infoWindow.open(map, marker);
    });
            google.maps.event.addListener(marker, 'mouseout', function() {

    infoWindow.close(map, marker);
    });
    }
    function agregatales(marker, map, infoWindow, html, name, address, slogan, imgnube, zona, telefonos, id) {
    google.maps.event.addListener(marker, 'click', function() {

    //html = "<div style='width: 100%;  float:left'> <img class='bordeado' id='imgnube' width='100%' src='"+imgnube+"'> </div><br><div style='width: 100%;  float: left;'> <strong id='name'>"+name+"</strong> <br/>"+address+"<br/> <br> <a class='pure-button' href='perfil.php?id="+id+"'>Ver Perfil</a>";
    //document.getElementById('barrainfo').innerHTML = html;
    window.open('./perfil.php?id=' + id, '_blank');
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

    function linkcat(cat) {
    jQuery(document).ready(function ($) {
    document.getElementById('e12').value = cat;
            console.log(document.getElementById("e12").value);
            SM.hide();
            borraMarkers(marcas);
            creaMarcas(markers, map, infoWindow);
            $("#e12").select2("val", cat);
            $("#e12").select2("data", [{id: cat, text: cat}]);
    });
    }
    jQuery(document).ready(function ($) {
    $("#e12").select2({tags:[
<?
$result = mysql_query("SELECT * FROM categorias WHERE 1");
while ($row = @mysql_fetch_assoc($result)) {
    echo '"' . $row['nombre'] . '",';
}
?>
    ]});
            $("#e12_open").click(function () { $("#e12").select2("open"); });
            $("#e12_close").click(function() {
    $("#e12").select2("val", "");
            borraMarkers(marcas);
    });
            if ($(this).scrollTop() < 140){
    SM = new SimpleModal({"hideHeader":true, "closeButton":false, "btn_ok":"Cerrar Ventana", "width":840, "offsetTop:":140});
            SM.show({
    "model":"alert",
<?
echo '"contents": "';
$cat;
$result = mysql_query("SELECT * FROM categorias WHERE id=idpadre ORDER BY nombre ASC");
while ($row = @mysql_fetch_assoc($result)) {
    $linkcat_cat = '\"' . $row['nombre'] . '\"';
    $cat.= "<a id='linkcat' href='#' onClick='linkcat(" . $linkcat_cat . ");'><div id='linkcat'><img src='" . $row['imgicono'] . "' border='0'/> " . $row['nombre'] . " </div></a>";
}
echo $cat . '"';
?>

    });
    }
    $('#categorias').click(function () {
    SM = new SimpleModal({"hideHeader":true, "closeButton":false, "btn_ok":"Cerrar Ventana", "width":840, "offsetTop:":140});
            SM.show({
    "model":"alert",
<?
echo '"contents": "';
echo $cat . '"';
?>

    });
    });
            $(window).scroll(function(){
    posicionNueva = $(this).scrollTop();
            console.log($(this).scrollTop());
            if (posicionNueva > 140){
    //$('#slider').fadeOut();
    //$('#slider2').fadeOut();
    } else if (posicionNueva < 140){
    //$('#slider').fadeIn();
    //$('#slider2').fadeIn();
    }
    posicionActual = posicionNueva;
    });
    })
            //]]> 

</script>
<script>

                    function scrollTo(target){
                    var myArray = target.split('#');
                            var targetPosition = jQuery('#' + myArray[1]).offset().top;
                            jQuery('html,body').animate({ scrollTop: targetPosition}, 'slow');
                            }

            jQuery(document).ready(function($) {
            $.extend($.fn.select2.defaults, {
            formatNoMatches: function () { return "No se encontraron resultados"; },
                    formatInputTooShort: function (input, min) { var n = min - input.length; return "Por favor adicione " + n + " caracter" + (n == 1? "" : "es"); },
                    formatInputTooLong: function (input, max) { var n = input.length - max; return "Por favor elimine " + n + " caracter" + (n == 1? "" : "es"); },
                    formatSelectionTooBig: function (limit) { return "Solo puede seleccionar " + limit + " elemento" + (limit == 1 ? "" : "s"); },
                    formatLoadMore: function (pageNumber) { return "Cargando más resultados..."; },
                    formatSearching: function () { return "Buscando..."; }
        });
                    $("#e6").on("select2-selecting", function(e) {
            //alert("selecting val="+ e.val+" choice="+ JSON.stringify(e.choice));

            window.open('./perfil.php?id=' + e.val, '_blank');
                    });
                    $("#e6").select2({
            placeholder: "Buscar ...",
                    minimumInputLength: 1,
                    ajax: {
            url: "http://guybrush.info/ubicandote/json.php",
                    dataType: 'json',
                    quietMillis: 100,
                    data: function (term, page) {
            return {
            q: term, // search term 
            };
            },
                    results: function (data) { // parse the results into the format expected by Select2.
            // since we are using custom formatting functions we do not need to alter remote JSON data
            console.log(data);
                    return {results: data};
            }
            },
                    formatResult: movieFormatResult, // omitted for brevity, see the source of this page
                    formatSelection: movieFormatSelection, // omitted for brevity, see the source of this page
                    dropdownCssClass: "bigdrop", // apply css that makes the dropdown taller
                    escapeMarkup: function (m) { return m; } // we do not want to escape markup since we are displaying html in results
        });
                    });</script>
<script>

                    function movieFormatResult(movie) {
                    var markup = "<table class='movie-result'><tr>";
                            if (movie.imgnube !== undefined && movie.posters.thumbnail !== undefined) {
                    markup += "<td class='movie-image'></td>";
                    }
                    markup += "<td class='movie-info'><div class='movie-title'>" + movie.nombreperfil + "</div>";
                            if (movie.categoria !== undefined) {
                    markup += "<div class='movie-info'><img src='" + movie.icono + "'/>" + movie.categoria + "</div>";
                    }
                    else if (movie.descripcion !== undefined) {
                    markup += "<div class='movie-synopsis'>" + movie.descripcion + "</div>";
                    }
                    markup += "</td></tr></table>"
                            return markup;
                    }

            function movieFormatSelection(movie) {
            return movie.nombreperfil;
                    console.log("movie.nombreperfil: " + movie.nombreperfil);
            }

</script>




</body>



</html>