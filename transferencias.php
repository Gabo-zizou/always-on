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
        <button type="button" data-toggle="modal" data-target="#nuevoTransferencia" class="btn btn-primary btn-md" >Nueva Transferencia</button>       

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
              <th>Emisor</th>
              <th>Fecha movimiento</th>
              <th>Receptor</th>
              <th>Tipo de Movimiento</th>
              <th>Monto</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $user_id=null;
            $sql1= "SELECT
                    movimiento.movimiento,
                    CONCAT(
                      personas.nombres,
                      ' ',
                      personas.apellidos
                    ) AS emisor,
                    transferencias.monto_movimiento,
                    transferencias.id_transferencia,
                    transferencias.fecha_movimiento,
                    transferencias.id_persona_receptora
                  FROM
                    transferencias
                  INNER JOIN movimiento ON (
                    transferencias.id_movimiento = movimiento.id_movimiento
                  )
                  INNER JOIN personas ON (
                    transferencias.id_persona_emisora = personas.id_persona
                  )";
            $query = $con->query($sql1);
            while ($r=$query->fetch_array()){

              $sql3= "select * from personas where id_persona=".$r["id_persona_receptora"];  
              $query3 = $con->query($sql3);
              $re=$query3->fetch_array();
            ?>
            <tr>
              <td><?php echo $r["id_transferencia"]; ?></td>
              <td><?php echo $r["emisor"]; ?></td>
              <td><?php echo $r["fecha_movimiento"]; ?></td>
              <td><?php echo $re["nombres"].' '.$re["apellidos"];?></td>
              <td><?php echo $r["movimiento"]; ?></td>
              <td><?php echo $r["monto_movimiento"]; ?></td>  
            </tr>
            <?php }?> 
             </tbody>
        </table>
      </div>

      <div class="modal fade" id="nuevoTransferencia" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Nueva Persona</h4>
            </div>
            <form role="form" method="post" action="transferencias/agregar.php">
              <div class="col-lg-12">
                <div class="form-group">
                  <label>Emisor</label>

                  
                  <select name="emisor" class="form-control" required>
                    <option>--Seleccionar--</option>
                    <?php
                    $sql2= "select * from personas";
                    $query2 = $con->query($sql2);
                    while ($p=$query2->fetch_array()){?>
                    <option value="<?php echo $p["id_persona"];?>"><?php echo $p["nombres"].' '.$p["apellidos"]; ?></option>
                    <?php }?>
                  </select>
                </div>

                <div class="form-group">
                  <label>Receptor</label>
                  <select name="receptor" class="form-control" required>
                    <option>--Seleccionar--</option>
                    <?php
                    $sql2= "select * from personas";
                    $query2 = $con->query($sql2);
                    while ($p=$query2->fetch_array()){?>
                    <option value="<?php echo $p["id_persona"];?>"><?php echo $p["nombres"].' '.$p["apellidos"]; ?></option>
                    <?php }?>
                  </select>
                </div>

                <div class="form-group">
                  <label>Tipo de Movimiento</label>
                  <select name="movimiento" class="form-control" required>
                    <option>--Seleccionar--</option>
                    <?php
                    $sql3= "select * from movimiento where estado=1";
                    $query3 = $con->query($sql3);
                    while ($m=$query3->fetch_array()){?>
                    <option value="<?php echo $m["id_movimiento"];?>"><?php echo $m["movimiento"].' '.$p["apellidos"]; ?></option>
                    <?php }?>
                  </select>
                </div>

                <div class="form-group">
                  <label>Monto</label>
                  <input name="monto" class="form-control" required>
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