<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require("models/goods.php");
$goods = new Goods();

if(isset($_REQUEST['id']) && isset($_REQUEST['codigo']) && isset($_REQUEST['nombre']) && isset($_REQUEST['precio']) && isset($_REQUEST['stock']))
{
    $code = $_REQUEST['codigo'];
    $name = $_REQUEST['nombre'];
    $price = $_REQUEST['precio'];
    $stock = $_REQUEST['stock'];
    $id = $_REQUEST['id'];
    
    if($goods->updateGoods($code, $name, $price, $stock, $id))
        header ('Location: articulos.php');
    else
        echo "Error al actualizar";

    echo "<a href='goodsPage.php'>Volver al Inicio</a>";
}
?>
