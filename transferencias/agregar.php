<?php
include '../conexion.php';
if(!empty($_POST)){
	if(isset($_POST["emisor"]) && isset($_POST["receptor"]) &&isset($_POST["monto"]) && isset($_POST["movimiento"])){
		if($_POST["emisor"]!="" && $_POST["receptor"]!="" && $_POST["monto"]!=""){			
			
			$sql1= "select * from cuenta where id_cliente=".$_POST["emisor"];  
            $query1 = $con->query($sql1);
            $r=$query1->fetch_array();

            if($_POST["emisor"]==$_POST["receptor"]){
            	print "<script>alert(\"El emisor no puede ser igual al receptor.\");window.location='../transferencias.php';</script>";
            }else{

       		if($r["saldo"]<$_POST["monto"]){
       			print "<script>alert(\"El monto es mayor al saldo.\");window.location='../transferencias.php';</script>";
       		}else{    
       			//ingreso transferencia   			
				$sql2 = "
				insert into transferencias (id_persona_emisora,id_persona_receptora,id_movimiento,monto_movimiento) 
				value (
					\"$_POST[emisor]\",
					\"$_POST[receptor]\",
					\"$_POST[movimiento]\",
					\"$_POST[monto]\"
				)";
				$query2 = $con->query($sql2);

				//calculo mnuevo monto
				$sql3= "select * from cuenta where id_cliente=".$_POST["receptor"];  
	            $query3 = $con->query($sql3);
	            $re=$query3->fetch_array();
	            $saldo_receptor = $re["saldo"] + $_POST['monto'];

	            //actualizo cuenta correspondiente
	            $sql = "update cuenta set 
				saldo=".$saldo_receptor."
				where id_cliente=".$_POST["receptor"];
				$query = $con->query($sql);

				//actualizo saldo emisor
				$saldo_emisor = $r["saldo"] - $_POST['monto'];
				//actualizo cuenta correspondiente
	            $sql4 = "update cuenta set 
				saldo=".$saldo_emisor."
				where id_cliente=".$_POST["emisor"];
				$query4 = $con->query($sql4);

				if($query2!=null && $query!=null){
					print "<script>alert(\"Agregado exitosamente.\");window.location='../transferencias.php';</script>";
				}else{
					print "<script>alert(\"No se pudo agregar.\");window.location='../transferencias.php';</script>";
				}			
       		}

		   }
            
		}
	}
}



?>