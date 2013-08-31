<?php include("admin/config.php");		
  global $config;

  $q = $_GET[q];

  $sql=mysql_query("SELECT p.id AS id,p.nombre AS nombreperfil, p.lat AS latitud, p.lng AS longitud, c.nombre AS categoria, c.imgicono AS icono  
  	FROM  perfiles p, categorias c  
  	WHERE p.id_categoria=c.id AND ((p.nombre LIKE '%$q%') OR (p.claves LIKE '%$q%'))");
  while($row=mysql_fetch_assoc($sql)){
  $output[]=$row;
  }
  print(json_encode($output));
  mysql_close();
?>