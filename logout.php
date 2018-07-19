<?php
	session_start();
	unset($_SESSION["id"]);
	session_destroy();
	
	if(!isset($_SESSION['id'])){	
		//echo "Logout realizado com sucesso!";
		header('Location: login.php'); 
	}	
	/*Fim do conteúdo....*/
	include "template/rodape.php";
	
	


?>
