<?php
	
	include "conexao.php";

	session_start();
	if(!isset($_SESSION['id'])){	
		header('Location: login.php?msg=0');
	}

	$seq_req = $_SESSION['id_req'];
	$conteudo = $_POST['text_Conteudo'];	
	$relator = $_POST['text_Relator'];
	$responsavel = $_POST['text_Responsavel'];
	$sprint = $_POST['text_Sprint'];
	$tipo = $_POST['select_Tipo'];
	$complexidade = $_POST['select_Complexidade'];
	$status = $_POST['select_Status'];
	$prioridade = $_POST['select_Prioridade'];

	if($con){
		$sql = "UPDATE requisitos SET					
					relator = '$relator',
					responsavel = '$responsavel',
					sprint = '$sprint',
					complexidade = '$complexidade',
					tipo = '$tipo',	
					prioridade = '$prioridade', 	
					status = '$status',
					conteudo = '$conteudo', 
					id_user_alteracao = ".$_SESSION['id'].", 
					ultima_alteracao = now()
				WHERE idrequisitos = '$seq_req';";		
		$rs = mysqli_query($con, $sql);


		$sql2 = "insert into log_requisito(texto_req_old, texto_req_new, id_req, id_user, dt_alteracao) values('".$_SESSION['texto_req_old']."', '$conteudo', '".$_SESSION['id_req']."', '".$_SESSION['id']."', now())";
		$rs2 = mysqli_query($con, $sql2);
		unset($_SESSION['texto_req_old']);
		unset($_SESSION['id_req']);
		if($rs){
		 header('Location: consultar_requisito.php?msg=upd_success');
        }
        else {
            header('Location: consultar_requisito.php?msg=upd_error');
  	  	}
	}
	
?>
