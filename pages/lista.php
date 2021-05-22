<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto</title>

    <!-- Scripts de bootstrap 4-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- css -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">



<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

</head>
<body>
    
<br>

<h4 style="text-align: center;">Lista de Registro</h4>



<div class="container-fluid">
<div class="row">
<div class="col-md-12">

<div class="table-responsive-md">
          <table class="lista" id="consulta">
              <thead>
                   
                  
          

              </thead>

           

          </table>

    </div>
</div>
</div>
</div>


</body>


<script>

$(document).ready(function() { 

    $("#consulta").DataTable({
      "destroy":true,
      "bAutoWidth": false,
      "deferRender": true,
      "sAjaxSource" : "http://localhost/proyecto-integrador/controlador/Cgrafico.php?op=1",
      "aoColumns" : [
        {title: "Nombre",mData :"nombres"},
        {title: "Respuestas",mData :"respuesta_formulario"},
        {title: "Preguntas",mData :"desc_preg"}
      
      ]

      });


});


</script>
</html>