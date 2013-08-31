<?php include("admin/config.php");    
  global $config;


  function parseToXML($htmlStr) 
  { 
  $xmlStr=str_replace('<','&lt;',$htmlStr); 
  $xmlStr=str_replace('>','&gt;',$xmlStr); 
  $xmlStr=str_replace('"','&quot;',$xmlStr); 
  $xmlStr=str_replace("'",'&#39;',$xmlStr); 
  $xmlStr=str_replace("&",'&amp;',$xmlStr); 
  return $xmlStr; 
  } 

  $lat = $_GET[lat];
  $lng = $_GET[lng];

  // Select all the rows in the markers table
  //$query = "SELECT *,p.id AS idperfil,p.nombre AS nombreperfil, p.lat AS latitud, p.lng AS longitud, c.nombre AS categoria FROM  perfiles p, categorias c WHERE p.id_categoria=c.id";
  $query = "SELECT *,p.id AS idperfil,p.nombre AS nombreperfil, p.lat AS latitud, p.lng AS longitud, c.nombre AS categoria 
            FROM  perfiles_categorias pc,perfiles p, categorias c 
            WHERE pc.idcategoria=c.id and pc.idperfil=p.id";
  $result = mysql_query($query);
  if (!$result) { die('Invalid query: ' . mysql_error()); } 
  header("Content-type: text/xml"); 
  // Start XML file, echo parent node
 
  echo '<markers>';
   if ($lat && $lng) {
    echo '<point ';
    echo 'lat="' . parseToXML($lat) . '" ';
    echo 'lng="' . parseToXML($lng) . '" ';
    echo '/>';
  }

  // Iterate through the rows, printing XML nodes for each
  while ($row = @mysql_fetch_assoc($result)){
    // ADD TO XML DOCUMENT NODE
    echo '<marker ';
     echo 'id="' . $row['idperfil']. '" ';
    echo 'name="' . parseToXML($row['nombreperfil']) . '" ';
    echo 'slogan="' . parseToXML($row['slogan']) . '" ';
    echo 'address="' . parseToXML($row['direcciones']) . '" ';
    echo 'telefonos="' . parseToXML($row['telefonos']) . '" ';
    echo 'celulares="' . parseToXML($row['celulares']) . '" ';
    echo 'imgnube="' . parseToXML($row['imgnube']) . '" ';
    echo 'zona="' . parseToXML($row['zona']) . '" ';
    echo 'lat="' . $row['latitud'] . '" ';
    echo 'lng="' . $row['longitud'] . '" ';
    echo 'type="' . $row['categoria'] . '" ';
    echo '/>';
  }

  // End XML file
  echo '</markers>';

?>
