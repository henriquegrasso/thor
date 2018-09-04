<?php
	
	include "template/topo.php";
	
	if(!isset($_SESSION['id'])){	
		header('Location: login.php?msg=0');
	}
?>
<div id = "content">
<?php
	$seq_req = $_GET['seq'];
	if($con){
		$sql = "select * from requisitos WHERE idrequisitos =".$_GET['seq'];
		$rs = mysqli_query($con, $sql);
		if($rs){
			if($valor = mysqli_fetch_array($rs)){	
				$sql = "DELETE FROM requisitos
		          WHERE idrequisitos = $seq_req;";		
				$rs = mysqli_query($con, $sql);
				if($rs){
					$sql = "UPDATE log_requisito set id_user = ".$_SESSION['id']."
							WHERE id_req = $seq_req and texto_req_new='REQUISITO DELETADO';";	
					$rs = mysqli_query($con, $sql);
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
		<a href= "cadastrar_requisito.php"><img src='figura/plus.png' alt='Cadastrar novo requisito ' class = "img_btn"></a>
		<a href= "consultar_requisito.php"><img src='figura/fin.png' alt='Retornar a Consulta' class = "img_btn"></a>
	</div><!--/pg_anteriores-->
</div><!--/content-->

	
<?php

	include "template/rodape.php";	
?>
