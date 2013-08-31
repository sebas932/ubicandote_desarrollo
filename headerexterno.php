<?php  include_once("admin/config.php");    
  global $config;
?>  
<!DOCTYPE html >
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
     <title>Ubicandote.com <?echo $title;?>  </title> 
     <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon"/>
    <link id="default-css" href="style.css" rel="stylesheet" media="all" />
    <link id="responsive-css" href="responsive.css" rel="stylesheet" media="all" />     
    <!-- **Font Awesome** -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/select2.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/avgrund.css">
    <link rel="stylesheet" href="css/simplemodal.css" type="text/css" media="screen" title="no title" charset="utf-8">
    <link type="text/css" rel="stylesheet" href="css/rcarousel.css" />
    <link type="text/css" rel="stylesheet" href="rlightbox/css/ui-lightness/jquery-ui-1.8.16.custom.css" />
    <link type="text/css" rel="stylesheet" href="rlightbox/css/lightbox.css" />   
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
   #mapaperfil{
      width:100%; 
      height:100%; 
      float: left;
   }

   #mapacontenedor{
   width: 75%;
height: 900px;
float: left;
right: 0;
position: fixed;
   }
  #infoperfiles {
  width: 550px;
height: auto;
float: right;
left: 0px;
padding: 90px 15px 240px 15px;
position: absolute;
background-color: #201A1A;
overflow: visible;
box-shadow: 2px 2px 6px #444;
  }

   #mapa{
      width:300px; 
      height:300px;
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

    img.imgprincipal {
      border-radius: 1px;
      width: 100%;
      box-shadow: 4px 4px 10px #000;
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
font-size: 12px;


left: 5px;
right: 0;
top: 85px;
overflow: auto;

border-radius: 1px;
padding: 10px;

color: #000;
vertical-align: top;
line-height: 18px;
}

    #linkcat{
      width: 200px;
      vertical-align: top;
    }

  </style>
  <script src="js/jquery.js"></script>
  </head>

  <body onload="load()">
   
      <!-- **Header** -->
      <header id="header">
        <div class="container">
          
            <!-- **Logo** -->
              <div id="logo">
                  <a href="index.php" title=""> <img src="images/logo.png" alt="" title="" /> </a>
              </div><!-- **Logo - End** --> 
              
              <!-- **Navigation** -->
              <nav id="main-nav">
                <ul>
                    <li class="current_page_item"> <a href="index.php#home" title="" class="external"> Inicio </a> <span> </span> </li>
                      <li> <a href="index.php#services" title="" class="external"> Nosotros </a> <span> </span> </li>
                      <li> <a href="index.php#servicios" title="" class="external"> Servicios </a> <span> </span> </li>
                      <li> <a href="articulos.php" title="" class="external"> Noticias </a> <span> </span> </li>
                      <li> <a href="index.php#promociones" title="" class="external"><div class="imgpro">  </div></a> <span> </span> </li>
                       
                      <li> <a href="index.php#contact" title="" class="external"> Contacto </a> <span> </span> </li>
                     
                  </ul>         
              </nav> <!-- **Navigation - End** -->      
          
          </div>
      </header><!-- **Header - End** -->