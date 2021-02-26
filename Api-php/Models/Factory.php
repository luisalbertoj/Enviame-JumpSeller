<?php
require_once(realpath(dirname(__FILE__) . '/../Utils/Database.php'));

class Factory
{
 
     private $db;
 
     public function __construct()
     {
          $this->db = Database::getConnection();
     }
 
     public function getAll($model)
     {                  
          $sql = "SELECT * FROM $model";
 
          return $result = $this->db->query($sql);
 
     }
 
}