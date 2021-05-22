<?php 

include 'Conexion.php';
class Graficos {

   function GraficoxSintomas(){
         

     try {
         
        
         
        $modelo    = new Conexion();
        $conexion  = $modelo->get_conexion();
        $query     ="SELECT desc_preg,count(p.id_pregunta) cantidad from registro_formulario rf left join preguntas p on rf.id_pregunta = p.id_pregunta
        group by p.id_pregunta;";
        $statement = $conexion->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;

     } catch (\Exception $e) {
    echo $e->getMessage();
  }
  
  
   }

   function GraficoxBarras(){
         

    try {
        
       
        
       $modelo    = new Conexion();
       $conexion  = $modelo->get_conexion();
       $query     ="SELECT ur.id_ubicacion,desc_ubicacion,count(rf.id_ubicacion) cantidad from registro_formulario rf left join ubicacion_registro ur on ur.id_ubicacion  = rf.id_ubicacion
       group by rf.id_ubicacion";
       $statement = $conexion->prepare($query);
       $statement->execute();
       $result = $statement->fetchAll(PDO::FETCH_ASSOC);
       return $result;

    } catch (\Exception $e) {
   echo $e->getMessage();
 }
 
 
  }





}



?>