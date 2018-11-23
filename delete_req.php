<?php
	
	include "conexao.php";
	
	session_start();
	if(!isset($_SESSION['id'])){	
		header('Location: login.php?msg=0');
	}

	$id_req = $_GET['id'];
	if($con){
		$sql = "select * from requisitos WHERE idrequisitos =".$_GET['id'];
		$rs = mysqli_query($con, $sql);
		if($rs){
			if($valor = mysqli_fetch_array($rs)){	
				$texto_req_old = $valor['conteudo'];
				$_SESSION['texto_req_old'] = $texto_req_old;
				$sql = "DELETE FROM requisitos
		          WHERE idrequisitos = $id_req;";		
				$rs = mysqli_query($con, $sql);

				$sql2 = "insert into log_requisito(texto_req_old, texto_req_new, id_req, id_user, dt_alteracao) values('$texto_req_old', 'REQUISITO DELETADO', '$id_req', '".$_SESSION['id']."', now())";
				$rs2 = mysqli_query($con, $sql2);
				$_SESSION['rs2'] = 'rs2 foi!';
				if($rs){
					 header('Location: consultar_requisito.php?msg=del_success');
		        }
		        else {
		            header('Location: consultar_requisito.php?msg=del_error');
	      	  	}
			}
		}
	}
	else{
		echo "<center><h3>Erro de conexão: </h3></center>".mysqli_error($con);
	}
	
?>
