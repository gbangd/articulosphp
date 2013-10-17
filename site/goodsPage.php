<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<?php
    // put your code here
    require("models/goods.php");
    $goods = new Goods();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <div>
            <h2>Lista de todos los articulos</h2>
            <table>
                <tr><th>Id</th><th>Codigo</th><th>Nombre</th><th>Precio</th><th>Stock</th></tr>
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
                 <?php }    ?>
            </table>
        </div>
        <div>
            <h2>Lista de todos los articulos con precio mayor que 20000 y stock maximo 10</h2>
            <table>
                <tr><th>Id</th><th>Codigo</th><th>Nombre</th><th>Precio</th><th>Stock</th></tr>
                 <?php 
                    $result2 = $goods->getByPriceAndStock(20, 3);
                    while($registers2 = mysql_fetch_array($result2)){    
                 ?>
                <tr>
                    <td><?php print($registers2["id"]); ?></td>
                    <td><?php print($registers2["codigo"]); ?></td>
                    <td><?php print($registers2["nombre"]); ?></td>
                    <td><?php print($registers2["precioUnidad"]); ?></td>
                    <td><?php print($registers2["stock"]); ?></td>
                </tr>
                 <?php }    ?>
            </table>
        </div>
        <div>
            <h2>Buscar por ID</h2>
            <?php 
               if(isset($_REQUEST['id'])){
            ?> 
            <table>
                <tr><th>Id</th><th>Codigo</th><th>Nombre</th><th>Precio</th><th>Stock</th></tr>
                 <?php 
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
                <?php } ?> 
                
            </table>
            <form method="post" action="goodsPage.php">
                Id Articulo: <input type="text" name="id"/>
                <input type="submit" value="Buscar"/>
            </form>
            <?php  }else{  ?> <!-- End if , start else -->
            <form method="post" action="goodsPage.php">
                Id Articulo: <input type="text" name="id"/>
                <input type="submit" value="Buscar"/>
            </form>
            <?php } ?> <!-- End else -->
        </div>
        <div>
            <h2>Modificar Articulo</h2>
            
            <form method="post" action="deleteGoods.php">
                Id Articulo: <input type="text" name="id"/><br/>
                Nuevo Codigo: <input type="text" name="codigo"/><br/>
                Nuevo Nombre: <input type="text" name="nombre"/><br/>
                Nuevo Precio: <input type="text" name="precio"/><br/>
                Nuevo Stock: <input type="text" name="stock"/><br/>
                
                <input type="submit" value="Actualizar"/>
            </form>
        </div>
    </body>
</html>
