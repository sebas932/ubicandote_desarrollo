<?php
include("admin/config.php");    
global $config;
$table= htmlentities($_GET["table"]);
$sth = mysql_query("SELECT idperfil FROM ".$table);
$rows = array();
while($r = mysql_fetch_assoc($sth)) {
    $rows[] = $r;
}
print json_encode($rows); 
?>