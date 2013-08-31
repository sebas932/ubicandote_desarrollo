<?php



include("config.php");
include("templates.php");
access();

global $config;
echo $header;
switch($action){
case "actualizar":
update($set);
break;
default:
vercampos();
break;
} 



function vercampos(){
		echo"<table><form method='post'>";	
		$sett = mysql_query("SELECT * FROM configuracion");
		while ($set = mysql_fetch_array($sett)){
			if($set[dato] == nombre){$set[namedefined] = 'Nombre del Sitio';}

			if($set[dato] == email){$set[namedefined] = 'Site E-Mail';}

			if($set[dato] == linksitio){$set[namedefined] = 'Link del Sitio web (http://dominio.com)';}

			echo"

			<tr>
			<td colspan='2'>$set[namedefined]</td>
			</tr>
			<tr valign='top'>
			<td>
			<input type='text' name='set[$set[dato]]' value='$set[valor]' size='70' maxlength='40'>
			</td>
			</tr>";
		}
		echo "
		<tr >
		<td class='alt1'><div class='smallfont' align='center'>

		<input type='hidden' name='action' value='actualizar'>

		<input type='submit' name='submit' value='Actualizar'></td></tr>

		</form>

		</td>

		</tr>

		</table>

		";

}



	function update($set){
		global $config;
		$settings=mysql_query("SELECT dato,valor FROM configuracion");
		while(list($dato,$valor)=mysql_fetch_row($settings)){	
		mysql_query("UPDATE configuracion SET valor='$set[$dato]' WHERE dato='$dato'");
		}
		echo "Datos Actualizados";}
echo $footer;

?>









