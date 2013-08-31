<?php include("header.php");   ?> 

<?php 
$perfilid = $_GET[id];
$sql=mysql_query("SELECT *,p.nombre AS nombreperfil, p.lat AS latitud, p.lng AS longitud, c.nombre AS categoria FROM  perfiles p, categorias c WHERE p.id_categoria=c.id and p.id=$perfilid");
$row=mysql_fetch_assoc($sql);
?> 

<!-- **Main Section** -->
<section id="main">
	
    <!-- **Blog Single Content** -->
	<article class="content"> 
    	<div class="pattern">   
        	<!-- **Container** -->
            <div class="container">        
            
            	<div class="hr-invisible"> </div>
                
                <hgroup class="sub-title">
                    <h1> <a href="" title=""> <?php echo $row['nombreperfil'];  ?>  </a> </h1>
                   
                </hgroup>
                
                <section id="primary">
                    <!-- **Blog Entry** -->
                    <article class="blog-single-entry">
                        <img class="imgprincipal" src="<?php echo $row['imgprincipal'];  ?>">
                        <div class="single-entry">
                            <div class="entry-thumb">
                                <div id="mapa"> </div>
                            </div>
                            <div class="entry-metadata">  

                                <div class="date">Descripción: <?php echo $row['slogan'];  ?>  </div>   
                                <div class="splitter"> </div>                      	
                                <div class="date">Telefonos: <?php echo $row['telefonos'];  ?> </div>
                                <div class="splitter"> </div>
                                <div class="date">Direcciones: <?php echo $row['direcciones'];  ?></div>
                                <div class="splitter"> </div>
                                <div class="date">Celulares: <?php echo $row['celulares'];  ?></div>
                                <div class="splitter"> </div>
                                <div class="date">Email: <?php echo $row['email'];  ?></div>
                                <div class="splitter"> </div>
                                <div class="tags"> <i class="icon-tag"> </i> <a href="" title=""> <?php echo $row['categoria'];  ?> </a> </div>
                                <div class="social-share">
                                    <h5> Compartir </h5>
                                    <a href="" title="" class="facebook"> </a>
                                    <a href="" title="" class="google"> </a>
                                    <a href="" title="" class="twitter"> </a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="entry-details">    
                            <div class="entry-body">
                               <?php echo $row['contenido'];  ?>
                                <div class="splitter"> </div> </div>
                        </div>
                        
                       
                        
                        
                        
                                    
                        
                    </article><!-- **Blog Entry - End** -->                    
                
                </section>
                
                <!-- **Sidebar** -->
                <div id="secondary">
                    
                      
                                    
                </div><!-- **Sidebar - End** -->
                
            </div><!-- **Container - End** -->
        </div>
    </article><!-- **Blog Single Content - End** -->
    
   

</section><!-- **Main Section** -->

<?php include("footer.php");   ?> 

<script>
jQuery(function($){
    $(".tweets").tweet({
      join_text: "auto",
      username: "ubicandote",
      count: 3,
      loading_text: "loading tweets..."
    });
  });
</script>

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
        
        var mapOptions = {
          center: new google.maps.LatLng(<?php echo $row['latitud']; ?>,<?php echo $row['longitud'];  ?>),
          zoom: 17,
          disableDefaultUI: true,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("mapa"),
            mapOptions);
        var point = new google.maps.LatLng(<?php echo $row['latitud']; ?>,<?php echo $row['longitud'];  ?>);
        var marker = new google.maps.Marker({
                              map: map,
                              position: point,
                              icon: <?php echo "'".$row['imgicono']."'"; ?>
                              
                            });
        map.setOptions({styles: styles}); 
      }
    </script>

</body>
</html>
