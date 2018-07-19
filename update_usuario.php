<?php
	
	include "template/topo.php";
	
	if(!isset($_SESSION['id'])){	
		header('Location: login.php?msg=0');
	}
?>
<div id = "content_index">
<?php
	$seq_user = $_POST['seq_user'];	
	$nome_user = $_POST['nome_user'];
	$cpf_user  = $_POST['cpf_user'];
	$area_user  = $_POST['area_user'];
	$email_user = $_POST['email_user'];
	$tel_user = $_POST['tel_user'];
	$cel_user = $_POST['cel_user'];
	$tipo_user = $_POST['tipo_user'];
	
	if($con){
		$sql = "UPDATE usuario SET					
					nome = '$nome_user',
					cpf = '$cpf_user',
					area = '$area_user',
					email = '$email_user',
					telefone_fixo = '$tel_user',
					telefone_cel = '$cel_user',
					tipo = '$tipo_user'
					
				WHERE id = $seq_user;";		
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
		<a href= "cadastro_usuario.php"><img src='figura/plus.png' alt='Cadastrar novo cliente ' class = "img_btn"></a>
		<a href= "consulta_usuario.php"><img src='figura/fin.png' alt='Retornar a Consulta' class = "img_btn"></a>
	</div><!--/pg_anteriores-->
</div><!--/content-->
	
<?php

	include "template/rodape.php";	
?>
