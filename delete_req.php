<?php
	
	include "conexao.php";
	
	if(!isset($_SESSION['id'])){	
		header('Location: login.php?msg=0');
	}

	$id_req = $_GET['id'];
	if($con){
		$sql = "select * from requisitos WHERE idrequisitos =".$_GET['id'];
		$rs = mysqli_query($con, $sql);
		if($rs){
			if($valor = mysqli_fetch_array($rs)){	
				$sql = "DELETE FROM requisitos
		          WHERE idrequisitos = $id_req;";		
				$rs = mysqli_query($con, $sql);
				if($rs){
					$sql = "UPDATE log_requisito set id_user = ".$_SESSION['id']."
							WHERE id_req = $id_req and texto_req_new='REQUISITO DELETADO';";	
					$rs = mysqli_query($con, $sql);
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
