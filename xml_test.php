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
  $query = "SELECT * FROM markers WHERE 1";
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
    echo 'name="' . parseToXML($row['name']) . '" ';
    echo 'address="' . parseToXML($row['address']) . '" ';
    echo 'lat="' . $row['lat'] . '" ';
    echo 'lng="' . $row['lng'] . '" ';
    echo 'type="' . $row['type'] . '" ';
    echo '/>';
  }

  // End XML file
  echo '</markers>';

?>
