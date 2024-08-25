<?php 

namespace model;
use PDO;

class ConectarBd
{

  private static $instance;
  public static function getCon(){

    if(!isset(self::$instance)){
      self::$instance = new PDO('mysql:host=localhost;dbname=usuarios;charset=utf8','root','');
    }
    
    return self::$instance;
  
  }

}