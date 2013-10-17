<?php
    // put your code here
    require("models/goods.php");
    $goods = new Goods();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Pagina de Articulos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="css/bootstrap.css" rel="stylesheet">    
    <style type="text/css">

    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <link rel="shortcut icon" href="ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
	<link href='http://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
  </head>

  <body>
     
        <div class="navbar navbar-fixed-top">
          <div class="navbar-inner">
            <div class="container">
              <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </a>
              <a class="brand" href="index.php"><span class="color-highlight">Mi</span> Empresa</a>
              <div class="nav-collapse">
                <ul class="nav pull-right">
                  <li><a href="#">Inicio</a></li>
                  <li class="active"><a href="articulos.php">Articulos</a></li>
                  <li><a href="#">Quienes Somos</a></li>
                   <li><a href="#">Contactenos</a></li>

                </ul>
              </div>
            </div>
          </div>
        </div>
      
	<div class="container">
            <div id="myCarousel" class="carousel slide">
            <div class="carousel-inner">
              <div class="item active">
                <img src="img/featured/6.jpg" alt="">
                <div class="carousel-caption">
                  <h4>Somos Articulos</h4>
                  <p><i>"Los mejores articulos de la region"</i></p>
                </div>
              </div>
              
            </div>
            
         </div>
	<hr>
      <div class="row">
        <div class="span8">
			
			<div class="well">
			<h1>Artículos</h1><br/>
                        
                        <table class="table table-striped">
                            <tr><th>Id</th><th>Codigo</th><th>Nombre</th><th>Precio</th><th>Stock</th></tr>
                            <?php
                            if(isset($_REQUEST['id']) && isset($_REQUEST['uno'])){
                                $id = $_REQUEST['id'];    
                                $result3 = $goods->getByID($id);
                                while($registers3 = mysql_fetch_array($result3)){    
                             ?>
                                <tr>
                                    <td><?php print($registers3["id"]); ?></td>
                                    <td><?php print($registers3["codigo"]); ?></td>
                                    <td><?php print($registers3["nombre"]); ?></td>
                                    <td><?php print($registers3["precioUnidad"]); ?></td>
                                    <td><?php print($registers3["stock"]); ?></td>
                                </tr>
                            <?php 
                                }
                            }
                            else if(isset($_REQUEST['dos']))
                            {
                                $result2 = $goods->getByPriceAndStock(20, 3); // primero precio y despues stock
                                while($registers2 = mysql_fetch_array($result2)){    
                             ?>
                                <tr>
                                    <td><?php print($registers2["id"]); ?></td>
                                    <td><?php print($registers2["codigo"]); ?></td>
                                    <td><?php print($registers2["nombre"]); ?></td>
                                    <td><?php print($registers2["precioUnidad"]); ?></td>
                                    <td><?php print($registers2["stock"]); ?></td>
                                </tr>
                            <?php 
                            
                                } 
                            }
                            else{
                                
                            ?>
                            <?php 
                                $result = $goods->getAllGoods();
                                while($registers = mysql_fetch_array($result)){    
                             ?>
                                <tr>
                                    <td><?php print($registers["id"]); ?></td>
                                    <td><?php print($registers["codigo"]); ?></td>
                                    <td><?php print($registers["nombre"]); ?></td>
                                    <td><?php print($registers["precioUnidad"]); ?></td>
                                    <td><?php print($registers["stock"]); ?></td>
                                </tr>
                            <?php }  }  ?>
                        </table>
        	</div>
                <div class="well">
                <p><h3>Modificar un Articulo <h3></p>
                  <form class="well" action="deleteGoods.php" method="post">
                      <input type="text" class="span3" placeholder="Id" name="id">
                      <input type="text" class="span3" placeholder="Codigo" name="codigo"><br>
                      <input type="text" class="span3" placeholder="Nombre" name="nombre">
                      <input type="text" class="span3" placeholder="Precio" name="precio"><br>
                      <input type="text" class="span3" placeholder="Stock" name="stock"><br>
                      <button type="submit" class="btn">Modificar Articulo</button>
                  </form>
	  </div>
        </div>
		<div class="span4">
			<p><h3>Busqueda por Id<h3></p>
                        <div style="height: 171px">
                            <form class="well">
                                ID:<br/>
				<input type="text" class="span3" placeholder="Identificador" name="id"><br>
				<button type="submit" class="btn">Iniciar Busqueda</button>
                                <input type="hidden" name="uno"/>
			</form>
                        </div>
			<p><h3>Listar articulos segun precio y stock <h3></p>
                        <div style="height: 100px">
                            <form class="well" method="post" action="articulos.php">
				<button type="submit" class="btn">Listar Articulos</button>
                                <input type="hidden" name="dos"/>
                            </form>
                        </div>
        </div>
      </div>
      <br/><br/>
      <hr>
        <footer class="row">
            <p>
            &copy;2013 UPB Montería.<br>
            Diseñado por <a href="#">Marcela Benitez</a>
            </p>
        </footer>

    </div>
    
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap-transition.js"></script>
	<script src="js/bootstrap-carousel.js"></script>
    <script src="js/bootstrap-alert.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/bootstrap-scrollspy.js"></script>
    <script src="js/bootstrap-tab.js"></script>
    <script src="js/bootstrap-tooltip.js"></script>
    <script src="js/bootstrap-popover.js"></script>
    <script src="js/bootstrap-button.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
    <script src="js/bootstrap-typeahead.js"></script>
  </body>
</html>
