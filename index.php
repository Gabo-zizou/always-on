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



    <div class="container">


      <div class="pull-right">
        <button type="button" data-toggle="modal" data-target="#nuevoModal" class="btn btn-primary btn-md" >Nuevo</button>
      </div>
    </div>
    <div class="row-fluid">&nbsp;</div>  

    <div class="container">
      
      <div class="panel panel-default">
        <div class="panel-heading">Lista de Contenido</div>
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Nombres</th>
              <th>Apellidos</th>
              <th>Email</th>
              <th>Monto Cta.</th>
              <th>Estado</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
          <?php

            $user_id=null;
            $sql1= "SELECT
                      personas.id_persona,
                      personas.nombres,
                      personas.apellidos,
                      personas.email,
                      personas.estado,
                      cuenta.saldo
                    FROM
                      personas
                    LEFT JOIN cuenta ON (
                      personas.id_persona = cuenta.id_cliente
                    )";
            $query = $con->query($sql1);
            while ($r=$query->fetch_array()){
            ?>
            <tr>
              <td><?php echo $r["id_persona"]; ?></td>
              <td><?php echo $r["nombres"]; ?></td>
              <td><?php echo $r["apellidos"]; ?></td>
              <td><?php echo $r["email"]; ?></td>
              <td><?php echo $r["saldo"]; ?></td>
              <td><?php echo $r["estado"]; ?></td>
              <td>
                <a href="editar_titulares.php?id=<?php echo $r["id_persona"]; ?>" class="btn btn-warning btn-md" role="button">Editar</a>
                <a href="#" class="btn btn-danger btn-md" role="button" disabled>Eliminar</a>
              </td>  
            </tr>
            <?php }?> 
             </tbody>
        </table>
      </div>

      <div class="modal fade" id="nuevoModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Nueva Persona</h4>
            </div>
            <form role="form" method="post" action="titulares/agregar.php">
              <div class="col-lg-12">
                <div class="form-group">
                  <label>Nombres</label>
                  <input name="nombres" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>apellidos</label>
                  <input name="apellidos" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>Email</label>
                  <input name="email" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>Tipo de Cta.</label>
                  <select name="tcuenta" class="form-control" required>
                    <option>--Seleccionar--</option>
                    <?php
                    $sql2= "select * from tipo_cuenta";
                    $query2 = $con->query($sql2);
                    while ($p=$query2->fetch_array()){?>
                    <option value="<?php echo $p["id_tipo"];?>"><?php echo $p["cuenta"];?></option>
                    <?php }?>
                  </select>
                  
                </div>

                <div class="form-group">
                  <label>Monto</label>
                  <input name="monto" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>Clave</label>
                  <input name="clave" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>Estado</label>
                  <select name="estado" class="form-control" required>
                    <option>--Seleccionar--</option>
                    <option>Activo</option>
                    <option>Inactivo</option>
                  </select>
                  
                </div>

                <div class="pull-right">
                <button type="submit" class="btn btn-success btn-sm pull right">Guardar</button>
                </div>

                <div class="row-fluid">&nbsp;</div>

              </div>
            </form>
            <br/>
          </div>
        </div>
      </div>

    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
  </html>