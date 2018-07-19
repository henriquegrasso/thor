<?php
	
	include "template/topo.php";
	
	if(!isset($_SESSION['id'])){	
		header('Location: login.php?msg=0');
	}
?>
<div id = "content_index">
<?php
	$seq_req = $_POST['seq_req'];
	$nome_req = $_POST['nome_req'];	
	$tx_req = $_POST['tx_req'];
	$tx_desc  = $_POST['tx_desc'];	
	$cmbEquipe = $_POST['cmbEquipe'];
	$cmbCliente = $_POST['cmbCliente'];
	$cmbOrigem = $_POST['cmbOrigem'];
	$cmbCategoria = $_POST['cmbCategoria'];
	$tipo = $_POST['tipo'];
	$status = $_POST['status'];
	$pri = $_POST['pri'];
	
	if($con){
		$sql = "UPDATE requisito SET					
					titulo_req = '$nome_req',
					texto_req = '$tx_req',
					descricao = '$tx_desc',
					usuario_id_funcionario = $cmbEquipe,
					usuario_id_cliente = $cmbCliente,	
					origem_id = $cmbOrigem, 	
					categoria = '$cmbCategoria',
					tipo = '$tipo',
					estado = '$status', 
					prioridade = '$pri',
					id_user_alteracao = ".$_SESSION['id'].", 
					ultima_alteracao = now()
				WHERE id = $seq_req;";		
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
			<a href= "cadastro_req.php"><img src='figura/plus.png' alt='Cadastrar novo requisito ' class = "img_btn"></a>
			<a href= "consulta_req.php"><img src='figura/fin.png' alt='Retornar a Consulta' class = "img_btn"></a>
		</div><!--/pg_anteriores-->
</div><!--/content-->
	
<?php

	include "template/rodape.php";	
?>
