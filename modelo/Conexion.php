<?php
include '../autoload.php';

class Conexion
{

  function get_conexion()
  {

    try {

        $conexion = new PDO("mysql:host=".SERVER.";dbname=".BD."",USER,PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
      $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); #captura el error en espesifico de la bd

      return $conexion;

    //testear la conexion
/*      $conexion = ($conexion) ? "ok" : "error" ;
     echo $conexion; */

    } catch (\Exception $e) {
      echo $e->getMessage();
    }
  }
}

    
/* $conexion =  new Conexion();
$conexion =  $conexion->get_conexion(); */

 ?>