<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of goods
 *
 */

require("connection.php");

class Goods {
    //put your code here
    
    public $connector;
    
    //Constructor
    public function Goods()
    {
       $this->connector = new Connection("empresa");
    }
    
    public function getAllGoods()
    {
        $query = "SELECT *
                  FROM articulos";
        $result = $this->connector->getResults($query);
        //$registers = mysql_fetch_array($result);
        return $result;
    }
    
    public function getByID($id)
    {
        $query = "SELECT *
                  FROM articulos
                  WHERE id='$id'";
        $result = $this->connector->getResults($query);
        //$registers = mysql_fetch_array($result);
        return $result;
    }
    
    public function getByPriceAndStock($price,$stock)
    {
        $query = "SELECT * 
                  FROM empresa.articulos
                  WHERE precioUnidad > '$price'
                  AND stock <= '$stock'";
        $result = $this->connector->getResults($query);
        //$registers = mysql_fetch_array($result);
        return $result;
    }
    
    public function updateGoods($code, $name, $price, $stock, $id)
    {
        $query = "UPDATE articulos 
                  SET nombre='$name', codigo='$code', precioUnidad='$price', stock='$stock' 
                  WHERE id='$id'";
        
        $result = $this->connector->getResults($query);
        $affecteds = mysql_affected_rows($this->connector->db_link);
        
        if ($affecteds > 0)
            return true;
        else 
            return false;
        
    }
    
}

?>
