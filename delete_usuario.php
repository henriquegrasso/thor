<?php
	
	include "conexao.php";

	session_start();
	if(!isset($_SESSION['id'])){	
		header('Location: login.php?msg=0');
	}

	$seq_user = $_GET['seq'];
	if($con){
		$sql = "select * from usuario WHERE id =".$_GET['seq'];
		$rs = mysqli_query($con, $sql);
		if($rs){
			if($valor = mysqli_fetch_array($rs)){	
				$sql = "DELETE FROM usuario
		          WHERE id = $seq_user;";		
				$rs = mysqli_query($con, $sql);
				if($rs){
				 header('Location: consulta_usuario.php?msg=del_success');
		        }
		        else {
		            header('Location: consulta_usuario.php?msg=del_error');
		  	  	}
			}
		}
	}

?>
