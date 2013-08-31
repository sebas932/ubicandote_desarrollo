<?php

include("config.php");
include("templates.php");
access();
echo $header;


	function editar(){ 

		$idperfil =  $_GET[idperfil];
        
        $cat;
        $result = mysql_query("SELECT * FROM categorias WHERE 1 ORDER BY nombre ASC");
        while ($row = @mysql_fetch_assoc($result)){$cat.= "<option value='".$row['id']."'>".$row['nombre']." - ".$row['id']."</option>"; }
        $result_perfil = mysql_query("SELECT * FROM perfiles WHERE id='$idperfil'");
        $perfil = @mysql_fetch_assoc($result_perfil);                
        	$operacion = $_POST['operacion'];
			// Promociones  /////////////////////////////////////////////////////////////////////////////////////////////////////////////
			$contenido .= '<table class="table table-bordered table-hover table-condensed span4">
			<tr> <td colspan="3"><strong>Promociones</strong>  <code>&lt;img src="linkdelaimagen" &gt;</code> <br>
			<form class="" method="post">
				<div class="input-append">
				  <input class="span6" id="appendedInputButtons" name="promo" placeholder="Promocion"  type="text">
				  <input type="hidden" name="operacion" value="insert">
				  <button class="btn" type="submit" name="submit">Agregar</button> 
				</div> 
				</form> '; 
			$promo = $_POST['promo']; $idpromo = $_POST['idpromo'];
			if($operacion == insert){
				if(!$promo){
					echo 'Ha Olvidado ingresar un dato requerido.'.$promo;	
				}else{
					mysql_query("INSERT INTO promociones (idperfil,promocion) VALUES ('$idperfil','$promo')"); 
					echo '<span class="label label-success"><strong>Agregado. '.$add[id].'</strong></span><br><br>';
				}
			}
			if($operacion == borrar){ 
					mysql_query("DELETE FROM promociones WHERE id='$idpromo'");
					echo '<span class="label label-inverse"><strong>Borrado. '.$del[id].'</strong></span><br><br>'; 
			}
			$contenido .= '</td> </tr>  '; 
			$query_slider = mysql_query("SELECT *
			FROM  promociones
			WHERE idperfil='$idperfil' ");
			while($articulo=mysql_fetch_array($query_slider)) {
				$contenido .= '
				<tr> <td>'.$articulo['id'].'</td>
				<td><a href="#" rel="popover" title="'.$articulo['fechafinal'].'" data-content="">'.$articulo['fechaini'].'</a> '.$articulo['promocion'].'</td>
				<td> <form class="" method="post">
					<input type="hidden" name="operacion" value="borrar">
					<input type="hidden" name="idpromo" value="'.$articulo[id].'"> 
					<input type="image" src="./images/delete.png" name="submit" onClick="return confirm(confirmdelete);">
					</form>
				</td> </tr> ';
			} 
			$contenido .= '</table>';

			// Categorias ///////////////////////////////////////////////////////////////////////////////////////////////////////////// 
			$contenido .= '<table class="table table-bordered table-hover table-condensed span4">
			<tr> <td colspan="3"><strong>Categorias</strong> <br>
			<form class="" method="post"> 
					<select name="cate"> 
						'.$cat.'
					</select> 
				  <input type="hidden" name="operacion" value="insertcat">
				  <button class="btn" type="submit" name="submit">Agregar</button>  
				</form> '; 
			$cate = $_POST['cate']; $idcatepe = $_POST['idcatepe'];
			if($operacion == insertcat){
				if(!$cate){
					echo 'Ha Olvidado ingresar un dato requerido.'.$cate;	
				}else{
					mysql_query("INSERT INTO perfiles_categorias (idperfil,idcategoria) VALUES ('$idperfil','$cate')"); 
					echo '<span class="label label-success"><strong>Agregado. '.$add[id].'</strong></span><br><br>';
				}
			}
			if($operacion == borrarcat){ 
					mysql_query("DELETE FROM perfiles_categorias WHERE id='$idcatepe'");
					echo '<span class="label label-inverse"><strong>Borrado. '.$del[id].'</strong></span><br><br>'; 
			}
			$contenido .= '</td> </tr>  '; 
			$perfiles_categorias = mysql_query("SELECT * FROM perfiles_categorias WHERE idperfil='$idperfil' ");
			while($articulo=mysql_fetch_array($perfiles_categorias)) {
				$query_categorias = mysql_query("SELECT * FROM categorias WHERE id='$articulo[idcategoria]' ");
				$categoria=mysql_fetch_array($query_categorias);
				$contenido .= '
				<tr> <td>'.$articulo['id'].'</td>
				<td><a href="#" rel="popover" title="" data-content="">'.$categoria['nombre'].'</a> '.$articulo['idcategoria'].'</td>
				<td> <form class="" method="post">
					<input type="hidden" name="operacion" value="borrarcat">
					<input type="hidden" name="idcatepe" value="'.$articulo[id].'"> 
					<input type="image" src="./images/delete.png" name="submit" onClick="return confirm(confirmdelete);">
					</form>
				</td>  </tr> ';
			} 
			$contenido .= '</table>'; 

			// Galeria /////////////////////////////////////////////////////////////////////////////////////////////////////////////
			$contenido .= '<table class="table table-bordered table-hover table-condensed span8">
			<tr> <td colspan="3"><strong>Galeria</strong> <br>
			<form class="" method="post">
				<div class="input-append">
				  <input class="span5" id="appendedInputButtons" name="img" placeholder="Imagen"  type="text">
				  <input class="span5" id="appendedInputButtons" name="imgthumb" placeholder="Imagen Thumbnail"  type="text">
				  <input type="hidden" name="operacion" value="insertimg">
				  <button class="btn" type="submit" name="submit">Agregar</button> 
				</div> 
				</form> '; 
			$img = $_POST['img']; $imgthumb = $_POST['imgthumb']; $idimg = $_POST['idimg'];
			if($operacion == insertimg){
				if(!$img){
					echo 'Ha Olvidado ingresar un dato requerido.';	
				}else{
					mysql_query("INSERT INTO img_galeria (idperfil,img,imgthumb) VALUES ('$idperfil','$img','$imgthumb')"); 
					echo '<span class="label label-success"><strong>Agregado.</strong></span><br><br>';
				}
			}
			if($operacion == borrarimg){ 
					mysql_query("DELETE FROM img_galeria WHERE id='$idimg'");
					echo '<span class="label label-inverse"><strong>Borrado.</strong></span><br><br>'; 
			}
			$contenido .= '</td> </tr>  '; 
			$query_slider = mysql_query("SELECT *
			FROM  img_galeria
			WHERE idperfil='$idperfil' ");
			while($articulo=mysql_fetch_array($query_slider)) {
				$contenido .= '
				<tr> <td>'.$articulo['id'].'</td>
				<td> <img style="height: 80px;" src="'.$articulo['imgthumb'].'"> </td>
				<td>
					<form class="" method="post">
					<input type="hidden" name="operacion" value="borrarimg">
					<input type="hidden" name="idimg" value="'.$articulo[id].'"> 
					<input type="image" src="./images/delete.png" name="submit" onClick="return confirm(confirmdelete);">
					</form>
				</td> </tr> ';
			} 
			$contenido .= '</table>';
			echo $contenido;
    

		echo"
		<script type='text/javascript' src='./ckeditor/ckeditor.js'></script>
		<br />
		<table cellpadding='4' cellspacing='0' border='0' align='center' width='80%' class='table table-bordered id='optionsform'>

		<form method='post' enctype='multipart/form-data'>
		<tr>
			<td colspan='2'>
			<b class='text-info'>Agregar Perfil</b>
			</td>
		</tr>
		<tr valign='top'>
			<td><b>Nombre de Establecimiento:&nbsp;</b> </td>
			<td>
		<input class='input-xlarge' type='text' name='articulos[nombre]' value='".$perfil[nombre]."' size='90' maxlength='400'>
		<i class='icon-tag'></i>  <b>Categoria:&nbsp;</b>
		<select  name='articulos[id_categoria]'> 
			$cat
		</select> ".$perfil[id_categoria]."
		</td>
		</tr>
		<tbody id='tbody_keywords'> 
		<tr valign='top'>
			<td ><b>Palabras Clave:&nbsp;</b> </td> 
			<td> <input class='input-xxlarge' type='text' name='articulos[claves]' value='".$perfil[claves]."' > </td>                           
		</tr>
		<tr valign='top'>
			<td ><b>slogan:&nbsp;</b> </td> 
			<td> <input class='input-xxlarge' type='text' name='articulos[slogan]' value='".$perfil[slogan]."' > </td>                           
		</tr>
		<tr valign='top'>
			<td><b>Direcciones:&nbsp;</b> </td> 
			<td> <input class='input-xxlarge' type='text' name='articulos[direcciones]' value='".$perfil[direcciones]."' size='90' maxlength='400'> </td>
		</tr> 
		<tr valign='top'>
			<td><b>Telefonos:&nbsp;</b><input class='input-xlarge' type='text' name='articulos[telefonos]' value='".$perfil[telefonos]."' size='90' maxlength='400'>  </td> 
			<td><b>Celulares:&nbsp;</b><input class='input-xlarge' type='text' name='articulos[celulares]' value='".$perfil[celulares]."' size='90' maxlength='400'> </td> 
		</tr> 
		<tr valign='top'>
			<td><b>Email:&nbsp;</b> <input class='input-xlarge' type='text' name='articulos[email]' value='".$perfil[email]."' size='90' maxlength='400'></td> 
			<td><b>Twitter:&nbsp;</b><input class='input-xlarge' type='text' name='articulos[twitter]' value='".$perfil[twitter]."' size='90' maxlength='400'>  </td> 
		</tr> 
		<tr valign='top'>
			<td><b>Facebook:&nbsp;</b> <input class='input-xlarge' type='text' name='articulos[fb]' value='".$perfil[fb]."' size='90' maxlength='400'></td> 
			 <td><b>Web:&nbsp;</b><input class='input-xlarge' type='text' name='articulos[web]' value='".$perfil[web]."' size='90' maxlength='400'>  </td> 
		</tr>  
		<tr valign='top'>
			<td><b>Link Imagen Principal:&nbsp;</b> </td> 
			<td> <input class='input-xxlarge' type='text' name='articulos[imgprincipal]' value='".$perfil[imgprincipal]."' size='250' maxlength='250'>
			<a href='#' onClick=\"MyWindow=window.open('http://talessoft.co/up','MyWindow','width=1000,height=500'); return false;\"><i class='icon-picture'></i> Subir Imagen</a>
			</td>
		</tr>
		<tr valign='top'>
			<td><b>Link Imagen Nube:&nbsp;</b> </td> 
			<td> <input class='input-xxlarge' type='text' name='articulos[imgnube]' value='".$perfil[imgnube]."'  size='90' maxlength='400'> </td>
		</tr>

		<tr valign='top'>
			<td><b>Zona:&nbsp;</b> <input class='input-medium' type='text' name='articulos[zona]' value='".$perfil[zona]."' size='90' maxlength='400'>   </td> 
			<td><i class='icon-flag'></i> 
			 <b>Latitud:&nbsp;</b>   <input class='input-mini' type='text' name='articulos[lat]' value='".$perfil[lat]."' size='90' maxlength='400'> 
			 	<i class='icon-flag'></i>  
			 <b>Longitud:&nbsp;</b>  <input class='input-mini' type='text' name='articulos[lng]' value='".$perfil[lng]."' size='90' maxlength='400'> 
			</td>
		</tr>

		<tbody id='tbody_keywords'>
		<tr valign='top' >
			<td class='alt1' colspan='2'><b>	Contenido	:&nbsp;</b>
			<textarea class='ckeditor' cols='80' id='editor1' name='articulos[contenido]' cols='100' rows='14' >".$perfil[contenido]."</textarea>
		<BR />
		<br>
		<input type='hidden' name='action' value='actualizar'>
		<input type='hidden' name='articulos[idperfil]' value='$idperfil'>
		<input class='btn btn-success btn-large' type='submit' name='submit' value='Actualizar'>
		</div></td></tr></table>
		</form>
		</td>
		</tr>
		</tbody>
		</table>
		 

		";
		

	}
	function actualizar($articulos){
		if(!$articulos[nombre]){
			$info.="entr";
			echo"
			Falto Ingresar el nombre
			";
			}else{ 
			mysql_query("UPDATE perfiles SET nombre='$articulos[nombre]',claves='$articulos[claves]',slogan='$articulos[slogan]',telefonos='$articulos[telefonos]',celulares='$articulos[celulares]',direcciones='$articulos[direcciones]',email='$articulos[email]',twitter='$articulos[twitter]',fb='$articulos[fb]',web='$articulos[web]',imgprincipal='$articulos[imgprincipal]',imgnube='$articulos[imgnube]',contenido='$articulos[contenido]',id_categoria='$articulos[id_categoria]',lat='$articulos[lat]',lng='$articulos[lng]',zona='$articulos[zona]' WHERE id='$articulos[idperfil]'");
			$info.= "
					<a href='./perfiles.php?action=vernoticias'> Volver a los perfiles </a> | 
					<a href='./perfiles.php?action=editar&idperfil=$articulos[idperfil]'> Actualizar de nuevo </a>
					<h2>$articulos[nombre]</h2>
					$articulos[contenido]
					<em>$articulos[id_categoria]</em>"; 
					echo $info;
			} 
	}


function addnews(){
		global $config;
		$query_admins = mysql_query("SELECT nombre FROM admins WHERE adminname='".$_COOKIE['user']."'");
		$admins = mysql_fetch_array($query_admins); 
		 
        $cat;
        
        $result = mysql_query("SELECT * FROM categorias WHERE 1");
        while ($row = @mysql_fetch_assoc($result)){  
        $cat.= "<option value='".$row['id']."'>".$row['nombre']."</option>";
        }
                             
            

		echo"
		<script type='text/javascript' src='./ckeditor/ckeditor.js'></script>
		<br />
		<table cellpadding='4' cellspacing='0' border='0' align='center' width='80%' class='table table-bordered id='optionsform'>

		<form method='post' enctype='multipart/form-data'>
		<tr>
			<td colspan='2'>
			<b class='text-info'>Agregar Perfil</b>
			</td>
		</tr>
		<tr valign='top'>
			<td><b>Nombre de Establecimiento:&nbsp;</b>
			</td>
			<td>
		<input class='input-xlarge' type='text' name='articulos[nombre]' value='' size='90' maxlength='400'>
		<i class='icon-tag'></i> 
		<b>Categoria:&nbsp;</b>
		<select name='articulos[id_categoria]'> 
			$cat
		</select>
			</td>
		</tr>
		<tbody id='tbody_keywords'> 
		<tr valign='top'>
			<td ><b>Palabras Claves:&nbsp;</b> </td> 
			<td> <input class='input-xxlarge' type='text' name='articulos[claves]' value='' > </td>                           
		</tr>
		<tr valign='top'>
			<td ><b>slogan:&nbsp;</b> </td> 
			<td> <input class='input-xxlarge' type='text' name='articulos[slogan]' value='' > </td>                           
		</tr>
		<tr valign='top'>
			<td><b>Direcciones:&nbsp;</b> </td> 
			<td> <input class='input-xxlarge' type='text' name='articulos[direcciones]' value='' size='90' maxlength='400'> </td>
		</tr> 
		<tr valign='top'>
			<td><b>Telefonos:&nbsp;</b><input class='input-xlarge' type='text' name='articulos[telefonos]' value='' size='90' maxlength='400'>  </td> 
			<td><b>Celulares:&nbsp;</b><input class='input-xlarge' type='text' name='articulos[celulares]' value='' size='90' maxlength='400'> </td> 
		</tr> 
		<tr valign='top'>
			<td><b>Email:&nbsp;</b> <input class='input-xlarge' type='text' name='articulos[email]' value='' size='90' maxlength='400'></td> 
			<td><b>Twitter:&nbsp;</b><input class='input-xlarge' type='text' name='articulos[twitter]' value='http://' size='90' maxlength='400'>  </td> 
		</tr> 
		<tr valign='top'>
			<td><b>Facebook:&nbsp;</b> <input class='input-xlarge' type='text' name='articulos[fb]' value='http://' size='90' maxlength='400'></td> 
			 <td><b>Web:&nbsp;</b><input class='input-xlarge' type='text' name='articulos[web]' value='http://' size='90' maxlength='400'>  </td> 
		</tr>  
		<tr valign='top'>
			<td><b>Link Imagen Principal:&nbsp;</b> </td> 
			<td> <input class='input-xxlarge' type='text' name='articulos[imgprincipal]' value='http://' size='250' maxlength='250'>
			<a href='#' onClick=\"MyWindow=window.open('http://talessoft.co/up','MyWindow','width=1000,height=500'); return false;\"><i class='icon-picture'></i> Subir Imagen</a>
			</td>
		</tr>
		<tr valign='top'>
			<td><b>Link Imagen Nube:&nbsp;</b> </td> 
			<td> <input class='input-xxlarge' type='text' name='articulos[imgnube]' value='http://'  size='90' maxlength='400'> </td>
		</tr>

		<tr valign='top'>
			<td><b>Zona:&nbsp;</b> <input class='input-medium' type='text' name='articulos[zona]' value='' size='90' maxlength='400'>   </td> 
			<td><i class='icon-flag'></i> 
			 <b>Latitud:&nbsp;</b>   <input class='input-mini' type='text' name='articulos[lat]' value='' size='90' maxlength='400'> 
			 	<i class='icon-flag'></i>  
			 <b>Longitud:&nbsp;</b>  <input class='input-mini' type='text' name='articulos[lng]' value='' size='90' maxlength='400'> 
			</td>
		</tr>

		<tbody id='tbody_keywords'>
		<tr valign='top' >
			<td class='alt1' colspan='2'><b>	Contenido	:&nbsp;</b>
			<textarea class='ckeditor' cols='80' id='editor1' name='articulos[contenido]' cols='100' rows='14'></textarea>
		<BR />
		<br>
		<input type='hidden' name='action' value='publicar'>
		<input class='btn btn-success btn-large' type='submit' name='submit' value='Crear Perfil'>
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
		if(!$articulos[nombre]){
			$info.="entr";
			echo"
			Falto Ingresar el nombre
			";
			}else{
			$adminname = $_COOKIE['user'];
			$seourl = urls_amigables($articulos[nombre]);	
			
			mysql_query("INSERT INTO perfiles (nombre,claves, slogan, telefonos, celulares, direcciones,email,twitter, fb, web, seourl,imgprincipal,imgnube,contenido,id_categoria,lat,lng,zona)
			values('$articulos[nombre]','$articulos[claves]','$articulos[slogan]','$articulos[telefonos]','$articulos[celulares]','$articulos[direcciones]','$articulos[email]','$articulos[twitter]','$articulos[fb]','$articulos[web]','$seourl','$articulos[imgprincipal]','$articulos[imgnube]','$articulos[contenido]','$articulos[id_categoria]','$articulos[lat]','$articulos[lng]','$articulos[zona]')");
			
			$query= mysql_query("SELECT MAX(id) FROM perfiles");
			$idperfil = mysql_result($query,0,0); 
			mysql_query("INSERT INTO perfiles_categorias (idperfil,idcategoria) VALUES ('$idperfil','$articulos[id_categoria]')"); 
			
			$info.= "
					<a href='./perfiles.php'> Agregar otro perfil </a>
					<h2>$articulos[nombre]</h2>
					$articulos[contenido]
					<em>$articulos[id_categoria]</em>"; 
					echo $info;
			} 
	}

	function vernoticias(){
		global $config;
		
		$totaln=mysql_query("SELECT COUNT(*) FROM articulos");
		$totaln=mysql_fetch_array($totaln);
		$totaln="$totaln[0]";
		
		echo"
		<div class='row-fluid'>
		<script language='javascript'>var confirmdelete='Esta  seguro de eliminar este perfil?';</script>
		<a class='btn' href='./perfiles.php'> 
			 <i class='icon-map-marker'></i> Agregar Perfil
		</a>
		<br></br>
		
		<h5>Perfiles</h5>
		<div class='row-fluid'>

		";
		
		$news = mysql_query("SELECT *,DATE_FORMAT(fecha,'%M %d, %Y at %h:%i') as \"fecha\" FROM perfiles ORDER BY id DESC");
		while ($newn = mysql_fetch_array($news)){
			echo"
			
		<div class='well well-small'>
			<div class='row-fluid'>
				<div class='span1'> <img width='100' src='$newn[imgnube]'> </div>
				<div class='span9'>
					$newn[id] | <strong>$newn[nombre] </strong>| Fecha : $newn[fecha] <br>
					Zona: $newn[zona] - WEB: $newn[web] - 
					IDCategoria: $newn[id_categoria] - <a href='../perfil.php?id=$newn[id]'>Link Perfil</a><br>
				</div>
				<div class='span1'>
					<a href='./perfiles.php?action=editar&idperfil=$newn[id]'><i class='icon-edit'></i></a>
				</div>	
				<div class='span1'>
					<form method='post'>
					<input type='hidden' name='action' value='eliminar'>
					<input type='hidden' name='newn[id]' value='$newn[id]'>
					<input type='hidden' name='newn[nombre]' value='$newn[nombre]'>
					<input type='image' src='./images/delete.png' name='submit' onClick='return confirm(confirmdelete);'>
					</form>
				</div>
			 
			</div>	
			
		 </div> ";
		}
		
				if($totaln == 0){
					echo"No Hay Perfiles";
				}
			
			echo"
			</div></div>
			";
	}

	function deletenew($newn){
		global $config;
		mysql_query("DELETE FROM perfiles WHERE id='$newn[id]'");
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
		Noticia Eliminada ID: $newn[id], Titulo: $newn[nombre].
		</td>
		</tr>
		</tbody>
		</table>";


	}

	 

	switch($action){

		case "editar":
		editar();
		break;

		case "actualizar":
		actualizar($articulos);
		break;
		
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
