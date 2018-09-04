<?php
	
	include "template/topo.php";
	
	if(!isset($_SESSION['id'])){	
		header('Location: login.php?msg=0');
	}
?>
<div id = "content_index">
<?php
	$seq_req = $_POST['seq_req'];
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
		if($rs){
			echo "<center><h3>Cadastrado atualizado com sucesso!!</h3></center>";
		}
		else{
			echo "<center><h3> Erro de alteração: </h3></center>".mysqli_error($con);
		}
	}
	else{
		echo "<center><h3> Erro de conexão: </h3></center>".mysqli_error($con);
	}
	?>	

	   <div id = "pg_anteriores">
			<a href= "cadastrar_requisito.php"><img src='figura/plus.png' alt='Cadastrar novo requisito ' class = "img_btn"></a>
			<a href= "consultar_requisito.php"><img src='figura/fin.png' alt='Retornar a Consulta' class = "img_btn"></a>
		</div><!--/pg_anteriores-->
</div><!--/content-->
	
<?php

	include "template/rodape.php";	
?>
