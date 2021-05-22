<?php 

include '../modelo/Conexion.php';
$conexion = new Conexion();
$conexion = $conexion->get_conexion();

$opcion = $_REQUEST['op'];


switch ($opcion) {
    case '1':
        try {
            $query = "select rf.respuesta_formulario,concat(u.nom_usu,' ', u.apep_usu) nombres,u.numero_doc_usu,p.desc_preg from registro_formulario rf left join usuarios u on rf.id_usuarios = u.id_usuarios
            left join preguntas p on rf.id_pregunta = p.id_pregunta";
            $statement = $conexion->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            $json = [
              "sEcho"=>1,
              "iTotalRecords"=>count($result),
              "iTotalDisplayRecords"=>count($result),
              "aaData"=>$result
            ];
            echo json_encode($json);
          } catch (\Exception $e) {
            echo "error".$e->getMessage();
          }
        
        break;


        case '2':
            try {
                $query = "select  ROW_NUMBER() OVER( ORDER BY cp.des_cate_preg) AS secuencia, cp.des_cate_preg,ur.id_ubicacion,desc_ubicacion,p.desc_preg  from registro_formulario rf left join ubicacion_registro ur on ur.id_ubicacion  = rf.id_ubicacion
                left join preguntas p on rf.id_pregunta = p.id_pregunta
                left join categoria_preguntas cp on p.id_cate_preg = cp.id_cate_preg";
                $statement = $conexion->prepare($query);
                $statement->execute();
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                $json = [
                  "sEcho"=>1,
                  "iTotalRecords"=>count($result),
                  "iTotalDisplayRecords"=>count($result),
                  "aaData"=>$result
                ];
                echo json_encode($json);
              } catch (\Exception $e) {
                echo "error".$e->getMessage();
              }
            

            break;
    
    default:
        # code...
        break;
}





?>