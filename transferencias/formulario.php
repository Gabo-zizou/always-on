<?php


$user_id=null;
$sql1= "select * from personas where id_persona = ".$_GET["id"];
$query = $con->query($sql1);
$person = null;
if($query->num_rows>0){
while ($r=$query->fetch_object()){
  $person=$r;
  break;
}

  }
?>

<?php if($person!=null):?>

<form role="form" method="post" action="titulares/actualizar.php">
  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" value="<?php echo $person->nombres; ?>" name="nombres" required>
  </div>
  <div class="form-group">
    <label for="apellido">Apellido</label>
    <input type="text" class="form-control" value="<?php echo $person->apellidos; ?>" name="apellidos" required>
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" value="<?php echo $person->email; ?>" name="email" required>
  </div>
  <div class="form-group">
    <label for="estado">Estado</label>
    <select name="estado" class="form-control" required>
                    <option>--Seleccionar--</option>
                    <option value="1" <?php if($person->estado=='1'){echo 'selected';}?>>Activo</option>
                    <option value="0" <?php if($person->estado=='0'){echo 'selected';}?>>Inactivo</option>
                  </select>
  </div>
  <div class="form-group">
    <label for="clave">Clave</label>
    <input type="password" class="form-control" value="" name="clave" >
  </div>
  <input type="text" name="id_persona" value="<?php echo $person->id_persona; ?>">
  <div class="pull-right">
  <button type="submit" class="btn btn-success">Actualizar</button>
  </div>
</form>
<?php else:?>
  <p class="alert alert-danger">404 No se encuentra</p>
<?php endif;?>