<?php
include '../conexion.php';
if(!empty($_POST)){
	if(isset($_POST["nombres"]) &&isset($_POST["apellidos"]) &&isset($_POST["email"]) &&isset($_POST["estado"])){
		if($_POST["nombres"]!=""&& $_POST["apellidos"]!=""&&$_POST["email"]!=""){
			
			
			$sql = "update personas set 
				nombres=\"$_POST[nombres]\",
				apellidos=\"$_POST[apellidos]\",
				email=\"$_POST[email]\",
				estado=\"$_POST[estado]\"
				where id_persona=".$_POST["id_persona"];

			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Actualizado exitosamente.\");window.location='../index.php';</script>";
			}else{
				print "<script>alert(\"No se pudo actualizar.\");window.location='../index.php';</script>";

			}
		}
	}
}



?>