  <?php
$query_slider = mysql_query("SELECT s.id AS idslider, s.idperfil AS idperfil, p.nombre AS nombre,p.imgnube AS imgnube, c.nombre AS catname 
FROM  perfiles p, categorias c, slider s
WHERE s.idperfil=p.id AND  p.id_categoria=c.id ");
$query_slider2 = mysql_query("SELECT s.id AS idslider, s.idperfil AS idperfil, p.nombre AS nombre,p.imgnube AS imgnube, c.nombre AS catname 
FROM  perfiles p, categorias c, promociones s
WHERE s.idperfil=p.id AND  p.id_categoria=c.id ");
  ?>  
    <!-- **Footer** -->
    <footer id="footer">
            <div class="container">
                  
                    <div class="imgre">  </div> 
                  <div id="slider">  
                       
                        <a href="#" id="prev2" class="prev-posts"  > <i class="icon-chevron-left"> </i> </a>
                        <div class="blog-carousel">  
                                  <ul id="blog-carousel">
                                  <?  
                                  while ($slider = @mysql_fetch_assoc($query_slider)){ 
                                    echo ' 
                                      <li>  <div style="float:left;width:35%;padding:0px;"> <img class="bordeado" width="100%" src="'.$slider['imgnube'].'" alt="" title="">   </div>
                                            <div style="float:right;width:60%;padding:3px;">
                                                <strong>'.$slider['nombre'].' </strong> <br>
                                                <div class="tags"> <i class="icon-tag"></i> '.$slider['catname'].'</a>   </div> <br>
                                                <a href="perfil.php?id='.$slider['idperfil'].'" title="" class="read-more"> Ver Perfil » </a>  <br>
                                            </div>
                                      </li>
                                    '; 
                                  }
                                  ?>  
                                  </ul>
                        </div>
                        <a href="#" id="next2" class="next-posts"  > <i class="icon-chevron-right"></i></a>  
                  </div>
     

                  <div class="social-share">
                      <p class="copyright"></p>
                      <a target="_blank" href="https://www.facebook.com/ubicandote.loquenecesitas" title="" class="facebook"> </a>
                      <a target="_blank" href="" title="" class="youtube"> </a>
                      <a target="_blank" href="https://plus.google.com/114828254198784297447/posts" title="" class="google"> </a>
                      <a target="_blank" href="https://twitter.com/Ubicandote" title="" class="twitter"> </a>
                      &nbsp;&nbsp;<a target="_blank" href="http://talessoft.co"><img src="./images/logotales.png" border="0" /></a> 
                  </div>      
              </div>
          </footer><!-- **Footer - End** --> 



    <!-- **jQuery** -->
    
  <script src="js/json2.js"></script>
  <script src="js/modernizr-2.6.2.min.js"></script>
   
  <script src="js/jquery.easing.1.2.js"></script>
  <script src="js/jquery.visualNav.js"></script>    
  <script src="js/jquery.mobilemenu.js"></script>
  <script src="js/core-custom.js"> </script>    
  <script src="js/jquery.avgrund.js"> </script>  
  <script src="js/select2.js"> </script>   
  <script src="js/select2.min.js"> </script> 
  
  <script type="text/javascript" src="js/CollapsibleLists.js"></script>
 

  <script src="js/jquery.tweet.js" charset="utf-8"></script>
  <script src="js/jquery.carouFredSel-6.2.0-packed.js"></script>

  <script type="text/javascript" src="js/jquery.ui.core.js"></script>
  <script type="text/javascript" src="js/jquery.ui.widget.js"></script>
  <script type="text/javascript" src="js/jquery.ui.rcarousel.js"></script>
  <script type="text/javascript" src="rlightbox/lib/jquery.ui.rlightbox.min.js"></script> 

  <script src="js/mootools-core-1.3.1.js" type="text/javascript" charset="utf-8"></script>
  <script src="js/mootools-more-1.3.1.1.js" type="text/javascript" charset="utf-8"></script>
  <script src="js/simple-modal.js" type="text/javascript" charset="utf-8"></script>

  <script>!window.jQuery && document.write(unescape('%3Cscript src="js/minified/jquery-1.9.1.min.js"%3E%3C/script%3E'))</script>
  <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
  <script>
      CollapsibleLists.apply();
    jQuery(document).ready(function($) {
        $('#publicidad-slider').carouFredSel({
        responsive: true,
        auto: true,
        width: '95%',
        height: '100%',
        pagination: "#pager",
        scroll: 1,        
        items: {
          width: 160,
          height: 140,
          visible: {
              min: 1,
              max: 1
            }
        },
        scroll: {
          duration: 7000
        } 
      }); 
        $('#blog-carousel').carouFredSel({
        responsive: true,
        auto: true,
        width: '95%',
        prev: '#prev2',
        next: '#next2',
        height: 'auto',
        pagination: "#pager",
        scroll: 1,        
        items: {
          width: 160,
          visible: {
              min: 1,
              max: 2
            }
        }       
      }); 
      $('#carousel').carouFredSel({
        responsive: true,
        auto: true,
        width: '95%',
        prev: '#prev',
        next: '#next',
        height: 'auto',
        pagination: "#pager",
        scroll: 1,        
        items: {
          width: 160,
          visible: {
              min: 1,
              max: 2
            }
        }       
      });
    })
    </script>
   