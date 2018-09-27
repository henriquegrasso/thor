<?php
	
	include "conexao.php";
	
	session_start();
	if(!isset($_SESSION['id'])){	
		header('Location: login.php?msg=0');
	}

	$idstory = $_SESSION['id_Story'];
	$idrequisitos = $_POST['select_Requisito'];
	$conteudo = $_POST['text_Conteudo'];	
	$tipo = $_POST['select_Tipo'];
	$status = $_POST['select_Status'];
	$prioridade = $_POST['select_Prioridade'];
	unset($_SESSION['id_Story']);
	
	if($con){
		$sql = "UPDATE story SET					
					tipo = '$tipo',	
					prioridade = '$prioridade', 	
					status = '$status',
					conteudo = '$conteudo', 
					idrequisitos = '$idrequisitos'
				WHERE idstory = '$idstory';";		
		$rs = mysqli_query($con, $sql);
		if ($rs) {            
            header('Location: selecionar_req_alt_story.php?msg=upd_success');
	    } else {
	            header('Location: selecionar_req_alt_story.php?msg=upd_error');
      	  	}
	}
	
?>
