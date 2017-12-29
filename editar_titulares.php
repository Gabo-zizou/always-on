<?php include 'conexion.php';?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Always On</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script type="text/javascript" src="js/ajax.js"></script>
</head>
<body>


  <nav class="navbar navbar-inverse">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="">Always On</a>
        <a class="navbar-brand" href="index.php">Titulares</a>
        <a class="navbar-brand" href="transferencias.php">Transferencias</a>
      </div>

    </nav>




    <div class="row-fluid">&nbsp;</div>  

    <div class="container">
      <?php include("titulares/formulario.php");?>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
  </html>