<?php
	
	include "template/topo.php";
	
	if(!isset($_SESSION['id'])){	
		header('Location: login.php?msg=0');
	}
?>
<div id = "content">
<?php
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
					echo "<center><h3>Cadastrado excluído com sucesso!!</h3></center>";						
				}
				else{
					echo "<center><h3>Erro de exclusão de cadastro: </h3></center> ".mysqli_error($con);
				}
			}
		}
	}
	else{
		echo "<center><h3>Erro de conexão: </h3></center>".mysqli_error($con);
	}
?>
	<div id = "pg_anteriores">
		<a href= "cadastro_cliente.php"><img src='figura/plus.png' alt='Cadastrar novo cliente ' class = "img_btn"></a>
		<a href= "consulta_usuario.php"><img src='figura/fin.png' alt='Retornar a Consulta' class = "img_btn"></a>
	</div><!--/pg_anteriores-->
</div><!--/content-->

	
<?php

	include "template/rodape.php";	
?>
