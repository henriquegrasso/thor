<?php
	include "template/topo.php";
	
	if(!isset($_SESSION['id'])){	
		header('Location: login.php?msg=0');
	}
?>
<?php
	//link  para as variaveis do form -> arquivo cadastro_cliente.php	
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
?>
	<div id = "content_index">
	
	<?php
	   if($con){
		$sql = "insert into requisito(titulo_req, texto_req, descricao, data, 
		           usuario_id_funcionario, usuario_id_cliente, origem_id,  categoria, tipo, estado, prioridade, 
		           id_user_alteracao, ultima_alteracao)".
			" values ('$nome_req', '$tx_req', '$tx_desc', now(), '$cmbEquipe', '$cmbCliente', $cmbOrigem, '$cmbCategoria', '$tipo', 
			'$status', '$pri',".$_SESSION['id'].",now())";
			$rs = mysqli_query($con, $sql);
			if($rs){
				echo "<center><h3>Documento cadastrado com sucesso!!</h3></center>";
			}
			else{
				echo "<center><h3>Erro de inclusão: </h3></center> ".mysqli_error($con);
				echo $sql;
			}
		}
		else{
			echo "<center><h3>Erro de conexão: </h3></center> ".mysqli_error($con);
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
