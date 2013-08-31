<?php 
//error_reporting(E_ALL);
include("config.php");
include("templates.php");
access();
echo $header;

$contenido .= '
	<script language="javascript">var confirmdelete="Esta  seguro  ?";</script>
	<div class="row-fluid">
		  <div class="span4">
			<table class="table table-bordered table-hover table-condensed">
			<tr>
			<td colspan="2"><strong>Ultimos Articulos</strong></td>
			</tr>';

			$query = mysql_query("SELECT * FROM articulos");
			while($articulo=mysql_fetch_array($query)) {
				$contenido .= '
				<tr>
				<td>'.$articulo['idarticulo'].'</td>
				<td><a href="#" rel="popover" title="'.$articulo['subtitulo'].'" data-content="">'.$articulo['titulo'].'</a> '.$articulo['autor'].'</td>
				</tr>
				';
			}
			$contenido .= '</table>

			<table class="table table-bordered table-hover table-condensed">
			<tr>
			<td colspan="3"><strong>Recomendados</strong><br>
			<form class="" method="post">
				<div class="input-append">
				  <input class="span4" id="appendedInputButtons" name="add[idperfil]" placeholder="IDPerfil" type="text">
				  <input type="hidden" name="action" value="insert">
				  <button class="btn" type="submit" name="submit">Agregar</button> 
				</div> 
				</form> '; 

			if($action == insert){
				if(!$add[idperfil]){
					echo 'Ha Olvidado ingresar un dato requerido.';	
				}else{
					mysql_query("INSERT INTO slider (idperfil) VALUES ('$add[idperfil]')"); 
					echo '<span class="label label-success"><strong>Agregado a lista de recomendados. '.$add[idperfil].'</strong></span><br><br>';
				}
			}
			if($action == borrar){ 
					mysql_query("DELETE FROM slider WHERE id='$del[idslider]'");
					echo '<span class="label label-inverse"><strong>Borrado de recomendados. '.$del[idslider].'</strong></span><br><br>'; 
			}
			$contenido .= '</td>
			</tr>  ';
			

			$query_slider = mysql_query("SELECT s.id AS idslider, s.idperfil AS idperfil, p.nombre AS nombre,p.imgnube AS imgnube, c.nombre AS catname 
			FROM  perfiles p, categorias c, slider s
			WHERE s.idperfil=p.id AND  p.id_categoria=c.id ");
			while($articulo=mysql_fetch_array($query_slider)) {
				$contenido .= '
				<tr>
				<td>'.$articulo['idslider'].'</td>
				<td><a href="#" rel="popover" title="'.$articulo['catname'].'" data-content="">'.$articulo['idperfil'].'</a> '.$articulo['nombre'].'</td>
				<td>
					<form class="" method="post">
					<input type="hidden" name="action" value="borrar">
					<input type="hidden" name="del[idslider]" value="'.$articulo[idslider].'"> 
					<input type="image" src="./images/delete.png" name="submit" onClick="return confirm(confirmdelete);">
					</form>
				</td>
				</tr>
				';
			}
			
			

			$contenido .= '</table>
		 </div>

		  
		 <div class="span4">
			<table class="table table-bordered table-hover table-condensed">
			<tr>
			<td colspan="2"><strong>Ultimos Perfiles</strong></td>
			</tr>';

			$query = mysql_query("SELECT * FROM perfiles order by id DESC limit 0,20");
			while($articulo=mysql_fetch_array($query)) {
				$contenido .= '
				<tr>
				<td>'.$articulo['id'].'</td>
				<td><a href="#" rel="popover" title="'.$articulo['slogan'].'" data-content="">'.$articulo['nombre'].'</a> 
                                    <a href="perfiles.php?action=editar&idperfil='.$articulo['id'].'"> - [Editar]</a> 
                                    '.$articulo['zona'].'</td>
				</tr>
				';
			}
			$contenido .= '</table>
		 </div>

		 <div class="span4">
			<table class="table table-bordered table-hover table-condensed">
			<tr>
			<td colspan="2"><strong>Ultimas Promociones</strong></td>
			</tr>';

			$query = mysql_query("SELECT * FROM promociones limit 0,10");
			while($articulo=mysql_fetch_array($query)) {
				$contenido .= '
				<tr>
				<td>'.$articulo['id'].'</td>
				<td><a href="#" rel="popover" title="'.$articulo['idperfil'].'" data-content=""><div style="width: 90px;">'.$articulo['promocion'].'</div></a> '.$articulo['fechaini'].'</td>
				</tr>
				';
			}
			$contenido .= '</table>
		 </div>


		
	</div>
';

echo $contenido;
echo $footer;

?>
