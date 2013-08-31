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
				<b class='text-info'>Agregar Categoria</b>
				</td>
			</tr>
			<tr valign='top'>
				<td><b>Nombre (sin espacios ni caracteres raros):&nbsp;</b>
				</td>
				<td>  <input class='input-xlarge' type='text' name='articulos[nombre]' value='' size='90' maxlength='400'> </td>
			</tr> 
			<tr valign='top'>
				<td><b>Link Imagen icono [25x25]:&nbsp;</b> </td> 
				<td> <input class='input-xxlarge' type='text' name='articulos[imgicono]' value='http://' size='250' maxlength='250'>
				<a href='#' onClick=\"MyWindow=window.open('http://talessoft.co/up','MyWindow','width=1000,height=500'); return false;\"><i class='icon-picture'></i> Subir Imagen</a>
				</td>
			</tr> 
			<tr valign='top'>
				<td><b>Zoom:&nbsp;</b> <input class='input-medium' type='text' name='articulos[zoom]' value='13' size='90' maxlength='400'>   </td> 
				<td><i class='icon-flag'></i> 
				 <b>Latitud:&nbsp;</b>   <input class='input-mini' type='text' name='articulos[lat]' value='3.430832' size='90' maxlength='400'> 
				 	<i class='icon-flag'></i>  
				 <b>Longitud:&nbsp;</b>  <input class='input-mini' type='text' name='articulos[lng]' value='-76.522919' size='90' maxlength='400'> 
				</td>
			</tr>

	  		<tr valign='top'>	<td>
				<br>
				<input type='hidden' name='action' value='publicar'>
				<input class='btn btn-success btn-large' type='submit' name='submit' value='Crear Categoria'>
				</td>
			</tr>
			 

		</form>
		 
		 
	</table>
	$info

	";


}

function publi($articulos){
	if(!$articulos[nombre]){
		$info.="entr";
		echo"
		Falto Ingresar el nombre
		";
		}else{
		$adminname = $_COOKIE['user'];
		$seourl = urls_amigables($articulos[nombre]);	
		mysql_query("INSERT INTO categorias (nombre,urlseo,imgicono,zoom,lat,lng)
		values('$articulos[nombre]','$seourl','$articulos[imgicono]','$articulos[zoom]','$articulos[lat]','$articulos[lng]')");
		$info.= "
				<a href='./categorias.php'> Agregar otra categoria </a>
				<h2><img src='$articulos[imgicono]'> $articulos[nombre]</h2>

				 ";
				
				echo $info;
		}
		
	
}

function vernoticias(){
	global $config;
	
	$totaln=mysql_query("SELECT COUNT(*) FROM categorias");
	$totaln=mysql_fetch_array($totaln);
	$totaln="$totaln[0]";
	
	echo"
	<script language='javascript'>var confirmdelete='Esta  seguro de eliminar esta categoria?';</script>
	<a class='btn' href='./categorias.php'> 
		 <i class='icon-tag'></i> Agregar Categoria
	</a>
	<br></br>
	<div class='row'>
	<div class='span12'>
	<table cellpadding='4' cellspacing='0' border='0'  width='80%' class='table table-bordered' id='optionsform'>
	<colgroup span='2'>
		<col style='width:80%'></col>
		<col style='width:20%'></col>
	</colgroup>
	<tr>
		<td class='tcat' align='center' colspan='3'>
		<b>Categorias</b>
		</td>
	</tr>";
	
	$news = mysql_query("SELECT * FROM categorias ORDER BY id DESC");
	while ($newn = mysql_fetch_array($news)){
		echo"
		<form method='post'>
		
		<tr valign='top'>

				<td colspan='2'>
				<div style='float:left;width:10%'> <img width='25' src='$newn[imgicono]'> </div>
				<div style='float:right;width:90%'> 
					<div>ID: $newn[id] | Nombre: <strong>$newn[nombre] </strong></div> 
				</div>
			    </td>
			
				<td class='alt1' width='1.5%' align='center'> 
					<form method='post'>
					<input type='hidden' name='action' value='eliminar'>
					<input type='hidden' name='newn[id]' value='$newn[id]'>
					<input type='hidden' name='newn[nombre]' value='$newn[nombre]'>
					<input type='image' src='./images/delete.png' name='submit' onClick='return confirm(confirmdelete);'>
					</form>
				</td>
		</tr>
		";
	}
	
			if($totaln == 0){
				echo"No Hay categorias";
			}
		
		echo"
		</div>
		</form>
		</td>
		</tr>
		</tbody>
		</table>
		</div>
		</div>
		";
}

function deletenew($newn){
global $config;
mysql_query("DELETE FROM categorias WHERE id='$newn[id]'");
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
 Eliminada ID: $newn[id], Titulo: $newn[nombre].
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
