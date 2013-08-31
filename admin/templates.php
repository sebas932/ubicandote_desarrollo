<?php 


$header = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html>
	<head>
	<title>TalesSoft AdminCP</title>
	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Content-Language" content="en-us" />
	<style>
		.tools:hover{
			background: #2E2D2D;
			border-radius: 10px;
			position: fixed;
			padding: 9px;
			right: -10px;
			top: 50%;
		}
		.tools {
			background: #2E2D2D;
			border-radius: 10px;
			position: fixed;
			padding: 9px;
			right: -148px;
			top: 50%;
			 
    		-moz-transition:right 0.5s, -moz-transform 0.5s;
   			-webkit-transition:right 0.5s, -webkit-transform 0.5s;
    		-o-transition:right 0.5s, -o-transform 0.5s;
    		transition:right 0.5s, transform 0.5s;
		}
	</style>
	</head>
	<body>
	<div class="tools">
		<i class="icon-upload icon-white"> </i> <a class="btn btn-inverse"href ="#"onClick=\'MyWindow=window.open("http://talessoft.co/up","MyWindow","width=1000,height=700"); return false;\'>SUBIR IMAGENES</a>
	</div>
	<div class="container" style="background:#fbfbfb;padding:20px;">
	<a style="float:right" href="login.php?do=kill"><span class="label label-inverse">Desconectar</span></a>
	<h2>Administrador de Contenido</h2>
	<p>Bienvenido '.$_COOKIE['user'].' </p>

	<div class="navbar navbar-inverse">
	  <div class="navbar-inner">

	<ul class="nav nav-pills">
		<li><a href="index.php"><i class="icon-home icon-white"></i> Home</a></li>
		<li><a href="./news.php?action=vernoticias"><i class="icon-align-justify icon-white"></i> Articulos</a></li>
		<li><a href="./perfiles.php?action=vernoticias"><i class="icon-map-marker icon-white"></i> Perfiles</a></li>
		<li><a href="./categorias.php?action=vernoticias"><i class="icon-tags icon-white"></i> Categorias</a></li>
	</ul>
	<ul class="nav pull-right">
		<li><a href="./configuracion.php"><i class="icon-wrench icon-white"></i> Configuracion</a></li>
		<li><a href="'.$config['linksitio'].'"><i class="icon-eye-open icon-white"></i> Ver Sitio</a></li>
		  
	</ul>

	    <ul class="nav">
	      
	    </ul>
	  </div>
	</div>
	<hr />
	<br />';

$login_header = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html>
	<head>
	<title>TalesSoft AdminCP</title>
	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Content-Language" content="en-us" />
	</head>
	<body>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<div class="container">
	<h2>Administrador de Contenido</h2>
	<hr />
	<br />';

	$footer = '<br /><br /><hr /><div style="text-align: center;clear: both;"><a href="http://www.talessoft.co"><img src="images/logo-agencia_blanco.png" width="100px"></a> </div></div>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-tooltip.js"></script>
	<script src="js/bootstrap-popover.js"></script>
	<script src="js/application.js"></script>
	</body>

	</html>';
?>