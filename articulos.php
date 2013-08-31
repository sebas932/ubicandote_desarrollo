

	
 
	
<?php include_once("./admin/config.php"); 
	$title = "Noticias";
    include("headerexterno.php");   
    echo '<!-- **Main Section** -->
	<section id="main">  
	    <!-- **Home Content** -->
	<article  class="content">
	<!-- **Container** -->
            <div class="container"> 
            <div class="hr-invisible"> </div>
            <hgroup class="main-title">
                    <h1> Noticias </h1> 
                </hgroup>	
              '; 	
	global $config;
	$idblog = $_GET[idblog];
	if(!$idblog){
	$totaln=mysql_query("SELECT COUNT(*) FROM articulos");
	$totaln=mysql_fetch_array($totaln);
	$totaln="$totaln[0]";
	$news = mysql_query("SELECT *,DATE_FORMAT(fecha,'%M %d, %Y') as \"fecha\" FROM articulos ORDER BY `idarticulo` DESC");
	while ($newn = mysql_fetch_array($news)){
		echo'
		<div class="row" style="width: 45%; float: left; padding: 10px; font-size: 12px;"> 
		<div>
		    <h5>'.$newn[titulo].'</h5> 
		    <p>'.$newn[fecha].'</p>
		    <div class="row">
		      <div><img class="alignleft " width="100px" src="'.$newn[linkimagen].'"></div>
		      <div style="font-size: 12px;">'.$newn[descripcion].'</div>
		    </div>
		    <div class="row">
		      <div class="span6">
		      </div>
		      <div class="span1"><a class="button small green" href="./articulos.php?idblog='.$newn[seourl].'"><strong>Leer más</strong></a></div>
		    </div>
		 </div>
		</div>
		<br>
		';
	}
			if($totaln == 0){
				echo"No Hay Noticias";
			}

	}else{
		$news = mysql_query("SELECT *,DATE_FORMAT(fecha,'%M %d, %Y') as \"fecha\" FROM articulos WHERE seourl='$idblog' ORDER BY `idarticulo` DESC");
		while ($newn = mysql_fetch_array($news)){
		$autor_query = mysql_query("SELECT * FROM admins WHERE adminname='$newn[idautor]'");
		$autor = mysql_fetch_assoc($autor_query);
		echo'
		<script language="JavaScript"> window.document.title = "Talessoft.co - '.$newn[titulo].'" </script>
		<div class="row">
			<div class="span2"></div>
			<div class="span7 noticia">
			    <div class="row">
			      <div class="span5">
			      <p class="tituloarticulo"><h5>'.$newn[titulo].'</h5></p>
			    <p>'.$newn[fecha].'</p>
			      </div>
			      <div class="span2 alignright">
			      <img width="100px" src="'.$autor[foto].'">
			      
			      '.$autor[nombre].'</div>
			    </div>
			    <hr>
			    <div class="row">
			      <div class="span7">'.$newn[contenido].'</div>
			      <br><br>
			    </div>
			    <div class="row">
			      <div class="span6">
					<!-- AddThis Button BEGIN -->
					<div class="addthis_toolbox addthis_default_style ">
					<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
					<a class="addthis_button_tweet"></a>
					<a class="addthis_button_pinterest_pinit"></a>
					<a class="addthis_counter addthis_pill_style"></a>
					<meta property="og:title" content="'.$newn[titulo].'" /> 
					<meta property="og:description" content="" />  
					<meta property="og:image" content="'.$newn[linkimagen].'" /> 
					</div>
					<script type="text/javascript">
						var addthis_config = {
						      services_custom: [{
						              name: "Talessoft.co - '.$newn[titulo].'",
						              url: "./articulos.php?idblog='.$newn[seourl].'",
						              icon: "'.$newn[linkimagen].'"
						      }]
						}
					</script>
					<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-51c21bc9085d6296"></script>
					<!-- AddThis Button END -->
			      </div>
			      <div class="alignright"><a href="./articulos.php"><strong>Volver</strong></a></div>
			    </div>
			 </div>
			</div> 	
			<br><br><br>
			<div class="row">
		 	<div class="span2"></div>
			<div class="span7 noticia">
				<form class="" method="post">
					<div class="control-group">
				    <div class="controls">
				      <input class="input-xlarge" type="text" id="" name="add[nombre]" placeholder="Nombre">
				    </div>
				   </div>
				  <div class="control-group">
				    <div class="controls">
				      <input class="input-xlarge" type="text" id="inputEmail" name="add[correo]" placeholder="Email" >
				    </div>
				  </div>
				  <div class="control-group">
				    <div class="controls">
				      <input class="input-xlarge" type="text" id="" name="add[web]" placeholder="Web Site" value="http://">
				    </div>
				  </div>
				  <div class="control-group">
				    <div class="controls">
				      <textarea class="ckeditor" id="editor1" name="add[comment]" class="button" maxlength="500" rows="5" cols="45" wrap="virtual"></textarea>
				    </div>
				  </div>
				   	  <input type="hidden" name="action" value="insert">
				      <button type="submit" name="submit" class="button medium green">Comentar</button>
				</form>
			';
			if($action == insert){
				if(!$add[correo]){
					echo 'Ha Olvidado ingresar un dato requerido.';	
				}else{
					mysql_query("INSERT INTO comentarios (articulo_id,comentario,nombre,correo,website) VALUES ('$newn[idarticulo]','$add[comment]','$add[nombre]','$add[correo]','$add[web]')");
					echo '<span class="label label-success"><strong>Gracias por dejarnos tu comentario. </strong></span><br><br>';
				}
			}
			$coment = mysql_query("SELECT *,DATE_FORMAT(fecha,'%M %d, %Y') as \"fechaf\" FROM comentarios WHERE articulo_id='$newn[idarticulo]' ORDER BY `fecha` ASC");
			while ($comentn = mysql_fetch_array($coment )){
				echo'<div class="comentario" style="background: #E2E2E2; color: #525252; margin: 10px; padding: 15px; border-radius: 10px;">
					<a href="'.$comentn[website].'"><strong>'.$comentn[nombre].'</strong></a> - '.$comentn[fechaf].'<br> '.$comentn[comentario].'<br>
				    </div>';
			} 
		echo "</div></div>
		<br>"; 	
		} 
	} 		
	?> 
            <div class="hr-invisible"> </div>	<div class="hr-invisible"> </div>	

</div>
	</article><!-- **Home Content - End** -->
    <!-- **Services Content** -->


</section><!-- **Main Section** -->
	<?php include("footer.php");   ?> 
	<script type='text/javascript' src='./admin/ckeditor/ckeditor.js'></script>
	<script type="text/javascript"> 
						CKEDITOR.replace( 'editor1', {
						toolbar: [ 	// Line break - next group will be placed in new line.
							{ name: 'basicstyles', items: [ 'Bold', 'Italic' ] }
						]
					});
		 </script> 
	
	 </body>



</html>
