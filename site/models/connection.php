<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of conection
 *
  */

require("constants.php");

class Connection {
    //put your code here
    
    public $db_link;
    
    //Constructor
    public function Connection($database)
    {
         $this->setConnection($database);      
    }
    
    public function setConnection($database)
    {
        $this->db_link = mysql_connect(SERVER, USER, PASS) or die("Error al conectar");
        mysql_select_db($database, $this->db_link) or die("Error en la base de datos");
    }
    
    public function getResults($query)
    {
        $results = mysql_query($query, $this->db_link);
        return $results;
    } 
    
    public function disconnect()
    {
        mysql_close($this->db_link);
    }

}

?>
