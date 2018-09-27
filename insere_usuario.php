<?php
include "conexao.php"; 

	$user = $_POST['user'];
	$senha = $_POST['senha'];
	$nome_cliente = $_POST['nome_usuario'];
	$area_cliente  = $_POST['area_usuario'];
	$email_cliente = $_POST['email_usuario'];
	$telefone = $_POST['tel_usuario'];

	   if($con){
		$sql = "insert into usuario(login, senha, nome, email, telefone, area)".
			" values ('$user', sha1('$senha'), '$nome_cliente','$email_cliente', '$telefone', '$area_cliente')";
			$rs = mysqli_query($con, $sql);
			if ($rs) {            
            header('Location: login.php?msg=success');
	        }
	        else {
	            header('Location: cadastro-usuario.php?msg=error');
      	  	}
      	}			
?>	