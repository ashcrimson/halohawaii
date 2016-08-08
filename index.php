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
     <p style="text-align: center;"><b>*Estos precios se encuentran sujetos a variaciones del dólar</b></p>
     </div>
     <div class="col-sm-4 col-md-2"></div>
 </div>
<?php

include("conexion.php");

/*$conexion=$base->query("SELECT * FROM DATOS_USUARIOS");

$registros=$conexion->fetchAll(PDO::FETCH_OBJ);*/

$registros=$base->query("SELECT * FROM precios")->fetchAll(PDO::FETCH_OBJ);

if (isset($_POST["cr"])) {
  
  $nombre=$_POST["nombre"];

  $precio=$_POST["precio"];

  $fabricante=$_POST["fabricante"];

  $sql="INSERT INTO precios (nombre, precio, fabricante) VALUES (:nom, :pre, :fab)";

  $resultado=$base->prepare($sql);

  $resultado->execute(array(":nom"=>$nombre, ":pre"=>$precio, ":fab"=>$fabricante));

  header("Location:index.php");
}
?>
<div class="row">

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
  <table class='table table-responsive table-hover table-striped' style="width: 60%;" align="center" ; >
    <tr >
      <td class="primera_fila">Id</td>
      <td class="primera_fila">Nombre</td>
      <td class="primera_fila">Precio</td>
      <td class="primera_fila">Fabricante</td>
      <td class="sin">&nbsp;</td>
      <td class="sin">&nbsp;</td>
      
    </tr> 
   
		<?php

    foreach ($registros as $producto) :?>
   	<tr>
      <td><?php echo $producto->id?></td>
      <td><?php echo $producto->nombre?></td>
      <td><?php echo $producto->precio?></td>
      <td><?php echo $producto->fabricante?></td>
 
      <td class="bot"><a href="borrar.php?id=<?php echo $producto->id?>"><input type='button' name='del' id='del' value='Borrar'></a></td>
      <td class='bot'><a href="editar.php?id=<?php echo $producto->id?> & nombre=<?php echo $producto->nombre?> & precio=<?php echo $producto->precio?> & fabricante=<?php echo $producto->fabricante?>"><input type='button' name='up' id='up' value='Actualizar'></a></td>
    </tr> 
    <?php

    endforeach;
    ?>      
	<tr>
	<td></td>
      <td><input type='text' name='nombre' size='10' class='centrado'></td>
      <td><input type='text' name='precio' size='10' class='centrado'></td>
      <td><input type='text' name='fabricante' size='10' class='centrado'></td>
      <td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td></tr>    
  </table>
</form>
<p>&nbsp;</p>



</div>
</div>
</body>
</html>