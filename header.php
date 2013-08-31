<?php
include_once("admin/config.php");
global $config;
?>  
<!DOCTYPE html >
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Ubicandote.com <? echo $title; ?>  </title> 
    <script src="js/jquery.js"></script>
    <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon"/>
    <link id="default-css" href="style.css" rel="stylesheet" media="all" />
    <link id="responsive-css" href="responsive.css" rel="stylesheet" media="all" />     
    <!-- **Font Awesome** -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/select2.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/avgrund.css">
    <link rel="stylesheet" href="css/simplemodal.css" type="text/css" media="screen" title="no title" charset="utf-8">
    <link href="css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
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
            height:800px;
            float: left;
        }
        #infoperfiles {
            width: 500px;
            height: 800px;
            float: right;
            left: 0px;
            padding: 84px 6px;
            position: fixed;
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
            font-size: 11px;
            position: absolute;
            width: 215px;
            right: 5px;
            top: 120px;
            overflow: auto;
            background: #FFF;
            border-radius: 10px;
            border: 5px solid #7EAE3F;
            padding: 4px 3px;
            box-shadow: 1px 2px 20px #B9B9B9;
        }
        #buscador {

            position: absolute;
            left: 14px;
            top: 129px;

        }
        #infolist {
            background: url(images/directorio.png) center top no-repeat;
            font-size: 11px;
            position: absolute;
            width: 240px;
            left: 5px;
            top: 288px;
            max-height: 275px;
            overflow: auto;
            background: #FFF;
            border-radius: 10px;
            border: 5px solid #7EAE3F;
            box-shadow: 4px 4px 10px #DDD;
            display: none;
        }
        ul#listaperfiles {
            background: url(images/directorio.png) center top no-repeat;
            background-position-y: -6px;
            list-style-type: none;
            padding: 39px 0px 0px 0px;

        }
        ul#listaperfiles li {
            background-repeat: no-repeat;
            background-position: 0px 5px;
            padding: 4px;
            margin: 5px;
            background-color: #F7FAF7;
            border-radius: 5px;
        }


        .recomendados {
            padding-bottom: 5px;
            font-size: 14px;
        }



        img.imgprincipal {
            border-radius: 1px;
            width: 100%;

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

            margin-left: -20px;
            font-size: 4px;
            left: 0px;
            right: 0;
            top: 85px;
            overflow-x: hidden;
            overflow-y: auto;
            border-radius: 1px;
            max-height: 375px;
            color: #000;
            vertical-align: top;


        }
        #linkcat:hover {

            background: #F7FAF7;
            border-radius: 5px;
        }
        #linkcat {
            font-size: 12px;
            width: 200px;
            vertical-align: top;
            float: left;
            color: #21791D;
            cursor: pointer;
        }

    </style>
    
    
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
                    <li class="current_page_item"> <a href="#home" title="" > Inicio </a> <span> </span> </li>
                    <li> <a href="#services" title="" > Nosotros </a> <span> </span> </li>
                    <li> <a href="#servicios" title=""> Servicios </a> <span> </span> </li>
                    <li> <a href="articulos.php" title="" class="external"> Noticias </a> <span> </span> </li>
                    <li> <a href="#promociones" title=""> <div class="imgpro">  </div>  </a> <span> </span> </li>

                    <li> <a href="#contact" title=""> Contacto </a> <span> </span> </li>

                </ul>         
            </nav> <!-- **Navigation - End** -->      

        </div>
    </header><!-- **Header - End** -->