<?php
include '../conexion.php';
if(!empty($_POST)){
	if(isset($_POST["nombres"]) && isset($_POST["apellidos"]) &&isset($_POST["email"]) && isset($_POST["estado"]) && isset($_POST["clave"])){
		if($_POST["nombres"]!="" && $_POST["apellidos"]!="" && $_POST["email"]!=""){			
			$clave = md5($_POST["clave"]);
			$sql = "
			insert into personas (nombres,apellidos,email,estado,clave,fecha_creacion) 
			value (
				\"$_POST[nombres]\",
				\"$_POST[apellidos]\",
				\"$_POST[email]\",
				\"$_POST[estado]\",
				\"$clave\",
				NOW())";
			$query = $con->query($sql);

			//ultima_id
			$last_id = $con->insert_id;
			
			//ultima id (forma 2)
			$sql1= "SELECT MAX(id_persona) AS id FROM personas";  
            $query1 = $con->query($sql1);
            $r=$query1->fetch_array();

			
			$sql2 = "
			insert into cuenta (saldo,id_cliente,id_tipo_cuenta) 
			value (
				\"$_POST[monto]\",
				".$last_id.",
				\"$_POST[tcuenta]\")";
			$query2 = $con->query($sql2);
			
			
			if($query!=null && $query2!=null){
				print "<script>alert(\"Agregado exitosamente.\");window.location='../index.php';</script>";
			}else{
				print "<script>alert(\"No se pudo agregar.\");window.location='../index.php';</script>";

			}
			
		}
	}
}



?>