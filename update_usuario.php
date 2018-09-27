<?php
	
	include "conexao.php";
	
	session_start();
	if(!isset($_SESSION['id'])){	
		header('Location: login.php?msg=0');
	}

	$iduser = $_POST['iduser'];	
	$nome = $_POST['nome'];
	$area  = $_POST['area'];
	$email = $_POST['email'];
	$telefone = $_POST['telefone'];
	
	if($con){
		$sql = "UPDATE usuario SET
					nome = '$nome',
					area = '$area',
					email = '$email',
					telefone = '$telefone'
				WHERE id = $iduser;";		
		$rs = mysqli_query($con, $sql);
		if ($rs) {            
            header('Location: consulta_usuario.php?msg=upd_success');
	        }
	        else {
	            header('Location: consulta_usuario.php?msg=upd_error');
      	  	}
	}

?>
