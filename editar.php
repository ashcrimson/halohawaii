<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Lista de Precios</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<style>
    body {
        margin-top: 20px;
        background-image: url('img/fondo-hawaii.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
        background-size: cover;
    }

  
    table, tr, td {
          border: 1px solid black;
          border-collapse: collapse;
          
          
     }

     tr td {
      max-width: 20%;
     }

     tr td:nth-child(1) {
  max-width: 10%;
}

     .table-striped > tbody > tr:nth-child(2n) > td, .table-striped > tbody > tr:nth-child(2n) > th {
   background-color: #fff;

    }

    .table-hover tbody tr:hover td, .table-hover tbody tr:hover th {
  background-color: #D3D3D3;
}

 .primera_fila {
    font-weight: bold;
    background-color: #D4D4D4;
 }   



</style>
</head>

<body>
<div class="container">
 <div class="row">
    <div class="col-sm-4 col-md-2"></div>
    <div class="col-sm-4 col-md-8">
    <img src="img/logo-halo-hawaii.jpg" class="img-responsive" alt="">
   &nbsp;
     </div>
     <div class="col-sm-4 col-md-2"></div>
 </div>
<h1 style="text-align: center;">ACTUALIZAR</h1>

<?php

  include("conexion.php");

  if (!isset($_POST["bot_actualizar"])) {

    $id=$_GET["id"];

    $nombre=$_GET["nombre"];

    $precio=$_GET["precio"];

    $fabricante=$_GET["fabricante"];  

  }else{

    $id=$_POST["id"];

    $nombre=$_POST["nombre"];

    $precio=$_POST["precio"];

    $fabricante=$_POST["fabricante"];

    $sql="UPDATE precios SET nombre=:minom, precio=:mipre, fabricante=:mifab WHERE id=:miid";

    $resultado=$base->prepare($sql);

    $resultado->execute(array(":miid"=>$id, ":minom"=>$nombre, ":mipre"=>$precio, ":mifab"=>$fabricante));

    header("Location:index.php");

  }
  

?>
<p>&nbsp;</p>
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <table  class="table  table-hover table-striped" style="width: 60%;" align="center">
    <tr>
      <td></td>
      <td><label for="id"></label>
      <input type="hidden" name="id" id="id" value="<?php echo $id ?>"></td>
    </tr>
    <tr>
      <td>Nombre</td>
      <td><label for="nombre"></label>
      <input type="text" name="nombre" id="nombre" value="<?php echo $nombre ?>"></td>
    </tr>
    <tr>
      <td>Apellido</td>
      <td><label for="precio"></label>
      <input type="text" name="precio" id="precio" value="<?php echo $precio ?>"></td>
    </tr>
    <tr>
      <td>Dirección</td>
      <td><label for="fabricante"></label>
      <input type="text" name="fabricante" id="fabricante" value="<?php echo $fabricante ?>"></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="bot_actualizar" id="bot_actualizar" value="Actualizar"></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</div>
</body>
</html>