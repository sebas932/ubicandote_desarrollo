<?php  include_once("admin/config.php");   
    $perfilid = $_GET[id];
    $sql=mysql_query("SELECT *,p.nombre AS nombreperfil, p.lat AS latitud, p.lng AS longitud, c.nombre AS categoria FROM  perfiles p, categorias c WHERE p.id_categoria=c.id and p.id=$perfilid");
    $row=mysql_fetch_assoc($sql);
    $title = " - ".$row['nombreperfil'];
    include("headerexterno.php");  
    
?> 
<!-- **Main Section** -->
<section id="main">  
    <!-- **Home Content** -->
<article  class="content">
    <div id="mapacontenedor"><div id="mapaperfil"></div></div>
    
    <div id="infoperfiles">
      <!-- **Blog Entry** -->
                    <article class="blog-single-entry">
                      
                        <img alt="<?php echo $row['nombreperfil'];  ?>" class="imgprincipal" src="<?php echo $row['imgprincipal'];  ?>">
                        <div class="single-entry">
                            
                            <div class="entry-metadata">        
                                <div class="date">Teléfonos: <?php echo $row['telefonos'];  ?> </div>
                                <div class="splitter"> </div>
                                <div class="date">Direcciones: <?php echo $row['direcciones'];  ?></div>
                                <div class="splitter"> </div>
                                <div class="date">Celulares: <?php echo $row['celulares'];  ?></div>
                                <div class="splitter"> </div>
                                <div class="date">Email: <?php echo $row['email'];  ?> </div>
                                
                               
                                
                                <div class="splitter"> </div>
                                <div class="tags"> <i class="icon-tag"> </i> <a href="" title=""> <?php echo $row['categoria'];  ?> </a> 
                                <div class="social-share">
                                    <?php if($row['fb'] != 'http://'){?><a href="<?php echo $row['fb'];  ?>" title="" class="facebook"> </a><?php } ?>
                                    <?php if($row['twitter']){?><a href="<?php echo $row['twitter'];  ?>" title="" class="twitter"> </a><?php } ?>
                                </div>
                                </div>

                                <?php 



                                $query_promo = mysql_query("SELECT * FROM promociones WHERE idperfil=$perfilid");
                                if (mysql_num_rows($query_promo) != 0) {
                                  echo ' 
                                        <a href="#" id="promo" class="button red">Promociones</a>';
                                  echo '<div class="promoinfo" style="padding: 10px 20px; float: left; clear: both; ">';
                                  while ($promo = @mysql_fetch_assoc($query_promo)){
                                        echo $promo['promocion']."<br>";
                                        
                                  }
                                  echo '</div> ';
                                  
                                }
                                ?>
                                    
                                
                            </div>
                        </div>
                        
                        <div class="entry-details">    
                            <div class="entry-body">
                               <?php echo $row['contenido'];  ?>
                                <div class="splitter"> </div> </div>
                        </div>     

                        <div id="carousel_perfil">

                          <?
                            $query_img = mysql_query("SELECT * FROM img_galeria WHERE idperfil=$perfilid");
                            while ($img = @mysql_fetch_assoc($query_img)){
                              echo '<a href="'.$img['img'].'" class="lb_gallery"><img class="imgcarousel" height="100" src="'.$img['imgthumb'].'" /></a>';

                            }
                          ?>
                            
                        </div> 

                    </article><!-- **Blog Entry - End** -->       
    </div>
    
</article><!-- **Home Content - End** -->
    <!-- **Services Content** -->


</section><!-- **Main Section** -->
<?php include("footer.php");   ?> 
 <script type="text/javascript">
      function load() {
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
        var infoWindow;
        var mapOptions = {
          center: new google.maps.LatLng(<?php echo $row['latitud']; ?>,<?php echo $row['longitud'];  ?>),
          zoom: 16,
          disableDefaultUI: true,
          scrollwheel: false,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("mapaperfil"),
            mapOptions);
        var point = new google.maps.LatLng(<?php echo $row['latitud']; ?>,<?php echo $row['longitud'];  ?>);
        var marker = new google.maps.Marker({
                              map: map,
                              position: point,
                              icon: <?php echo "'".$row['imgicono']."'"; ?>
                              
                            });
         infoWindow = new google.maps.InfoWindow;                   
         infoWindow.setContent("<div class='nube'><img class='nube' src='<?php echo $row['imgnube'];  ?>'><p><b><?php echo $row['nombre'];  ?></b></p><?php echo $row['direcciones'];  ?><br> <?php echo $row['telefonos'];  ?><br><br><a class='pure-button' target='_blank' href='https://maps.google.es/maps?q=%40<?php echo $row['latitud'];  ?>,<?php echo $row['longitud'];  ?>&hl=es-419&t=m&z=17&daddr=%40<?php echo $row['latitud'];  ?>,<?php echo $row['longitud'];  ?>'>Cómo llegar</a></div> ");
         infoWindow.open(map, marker);                   
        //map.setOptions({styles: styles}); 
      }
    </script>
    <script type="text/javascript"> 
    
      jQuery(function($) {
        $(".promoinfo").hide();
        $("#promo").click(function () {
        $(".promoinfo").toggle("slow");
         
        });

        function generatePages() {
          var _total, i, _link;
          
          _total = $( "#carousel_perfil" ).rcarousel( "getTotalPages" );
          
          for ( i = 0; i < _total; i++ ) {
            _link = $( "<a href='#'></a>" );
            
            $(_link)
              .bind("click", {page: i},
                function( event ) {
                  $( "#carousel_perfil" ).rcarousel( "goToPage", event.data.page );
                  event.preventDefault();
                }
              )
              .addClass( "bullet off" )
              .appendTo( "#pages" );
          }
          
          // mark first page as active
          $( "a:eq(0)", "#pages" )
            .removeClass( "off" )
            .addClass( "on" )
            .css( "background-image", "url(images/page-on.png)" );

        }

        function pageLoaded( event, data ) {
          $( "a.on", "#pages" )
            .removeClass( "on" )
            .css( "background-image", "url(images/page-off.png)" );

          $( "a", "#pages" )
            .eq( data.page )
            .addClass( "on" )
            .css( "background-image", "url(images/page-on.png)" );
        }       

        $( ".lb_gallery" ).rlightbox();
        
        $( "#carousel_perfil" ).rcarousel({
          auto: {enabled: true},
          start: generatePages,
          pageLoaded: pageLoaded,
          speed: 1000,
          margin: 5,
          width: 160,
          height: 120,
          navigation: {
            prev: ".someFancyClass",
            next: "#andFunnyID"
          }
        });
        
        $( ".bullet" )
          .hover(
            function() {
              $( this ).css( "opacity", 0.7 );
            },
            function() {
              $( this ).css( "opacity", 1.0 );
            }
          );          
      });
    </script>
  </body>



</html>