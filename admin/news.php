<?php

include("config.php");
include("templates.php");
access();
echo $header;





function addnews(){
global $config;
$query_admins = mysql_query("SELECT nombre FROM admins WHERE adminname='".$_COOKIE['user']."'");
$admins = mysql_fetch_array($query_admins); 

echo"
<script type='text/javascript' src='./ckeditor/ckeditor.js'></script>
<br />
<table cellpadding='4' cellspacing='0' border='0' align='center' width='80%' class='table table-bordered id='optionsform'>

<form method='post' enctype='multipart/form-data'>
<tr>
	<td colspan='2'>
	<b class='text-info'>Agregar Noticia</b>
	</td>
</tr>
<tr valign='top'>
	<td><b>Titulo:&nbsp;</b>
	</td>
	<td>
<input class='input-xlarge' type='text' name='articulos[titulo]' value='' size='90' maxlength='400'>
<b>Publico/Oculto - 1/0:&nbsp;</b>
<select name='articulos[estado]'>
	<option>1</option>
	<option>0</option>
</select>
	</td>
</tr>
<tbody id='tbody_keywords'>                                                                                
<tr valign='top'>
	<td ><b>Subtitulo:&nbsp;</b>
	</td> 
	<td>
		<input class='input-xxlarge' type='text' name='articulos[subtitulo]' value='' >
	</td>                           
</tr>
<tr valign='top'>
	<td><b>Autor:&nbsp;</b>
	</td> 
	<td>
	<input class='input-xxlarge' type='text' name='articulos[autor]' value='".$admins[nombre]."' size='90' maxlength='400'>
	</td>
</tr>
<tr valign='top'>
	<td><b>Link Imagen:&nbsp;</b>
	</td> 
	<td>
	<input class='input-xxlarge' type='text' name='articulos[linkimagen]' value='http://' size='250' maxlength='250'>
	<a href='#' onClick=\"MyWindow=window.open('http://talessoft.co/up','MyWindow','width=1000,height=500'); return false;\"><i class='icon-picture'></i> Subir Imagen</a>
	</td>
</tr>
<tr valign='top'>
	<td colspan='2'><b>	Descripcion	:&nbsp;</b>
	<textarea class='ckeditor' cols='80' id='editor2' name='articulos[descripcion]' cols='80' rows='8'></textarea>
	</td>
</tr>
<tbody id='tbody_keywords'>
<tr valign='top' >
	<td class='alt1' colspan='2'><b>	Contenido	:&nbsp;</b>
	<textarea class='ckeditor' cols='80' id='editor1' name='articulos[contenido]' cols='100' rows='14'></textarea>
<BR />
<br>
<input type='hidden' name='action' value='publicar'>
<input class='btn btn-success btn-large' type='submit' name='submit' value='Crear Noticia'>
</div></td></tr></table>
</form>
</td>
</tr>
</tbody>
</table>
$info

";


}

function publi($articulos){
	if(!$articulos[titulo]){
		$info.="entr";
		echo"
		Falto Ingresar el titulo
		";
		}else{
		$adminname = $_COOKIE['user'];
		$seourl = urls_amigables($articulos[titulo]);	
		mysql_query("INSERT INTO articulos (titulo, subtitulo, descripcion, contenido, autor,idautor,linkimagen, estado, counter, seourl)
		values('$articulos[titulo]','$articulos[subtitulo]','$articulos[descripcion]','$articulos[contenido]','$articulos[autor]','$adminname','$articulos[linkimagen]','$articulos[estado]','0','$seourl')");
		$info.= "
				<a href='./index.php'> Regresar </a>
				<h2>$articulos[titulo]</h2>
				$articulos[contenido]
				<strong>$articulos[autor]</strong>
				<em>$articulos[categoria]</em>";
				
				echo $info;
		}
		
	
}

function vernoticias(){
	global $config;
	
	$totaln=mysql_query("SELECT COUNT(*) FROM articulos");
	$totaln=mysql_fetch_array($totaln);
	$totaln="$totaln[0]";
	
	echo"
	<script language='javascript'>var confirmdelete='Esta  seguro de eliminar esta noticia?';</script>
	<a class='btn' href='./news.php'> 
		 <i class='icon-plus'></i> Agregar Articulo 
	</a>
	<br></br>
	<table cellpadding='4' cellspacing='0' border='0'  width='80%' class='table table-bordered' id='optionsform'>
	<colgroup span='2'>
		<col style='width:80%'></col>
		<col style='width:20%'></col>
	</colgroup>
	<tr>
		<td class='tcat' align='center' colspan='3'>
		<b>Noticias</b>
		</td>
	</tr>";
	
	$news = mysql_query("SELECT *,DATE_FORMAT(fecha,'%M %d, %Y at %h:%i') as \"fecha\" FROM articulos ORDER BY `idarticulo` DESC");
	while ($newn = mysql_fetch_array($news)){
		echo"
		<form method='post'>
		<tr valign='top'>
			<td colspan='3'><div>ID: $newn[idarticulo] | Posteado por: $newn[autor] | Date: $newn[fecha] | Titulo: <strong>$newn[titulo]</strong> </div></td>
		</tr>
		<tr valign='top'>
			<td colspan='2'><div> $newn[contenido]
		</td>
		
		<td class='alt1' width='1.5%' align='center'><br /><br />
		<form method='post'>
		<input type='hidden' name='action' value='eliminar'>
		<input type='hidden' name='newn[ids]' value='$newn[idarticulo]'>
		<input type='hidden' name='newn[titl]' value='$newn[titulo]'>
		<input type='image' src='./images/delete.png' name='submit' onClick='return confirm(confirmdelete);'>
		</form>
		</td>
		</tr>
		";
	}
	
			if($totaln == 0){
				echo"No Hay Noticias";
			}
		
		echo"
		</div>
		</form>
		</td>
		</tr>
		</tbody>
		</table>
		";
}

function deletenew($newn){
global $config;
mysql_query("DELETE FROM articulos WHERE idarticulo='$newn[ids]'");
echo"
<table cellpadding='4' cellspacing='0' border='0'  width='500px'>
<colgroup span='2'>
	<col style='width:45%'></col>
	<col style='width:55%'></col>
</colgroup>
<tr>
	<td class='tcat' align='center' colspan='2'>
	<b>Noticias</b>
	</td>
</tr>
<tr valign='top'>
	<td  colspan='2'><div>Eliminada</div></td>
</tr>
<tbody id='tbody_keywords'>
<tr valign='top'>
	<td class='alt1'><div class='smallfont' align='center'>
Noticia Eliminada ID: $newn[ids], Titulo: $newn[titl].
</td>
</tr>
</tbody>
</table>";


}

//$action = $_POST['action'];

//echo $_POST[action];

switch($action){
	
case "vernoticias":
vernoticias();
break;

case "eliminar":
deletenew($newn);
break;

case "publicar":
publi($articulos);
break;

default:
addnews();
break;
} 

echo $footer;
?>
