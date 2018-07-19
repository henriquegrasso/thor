<?php
	include "template/topo.php";
	
	if(!isset($_SESSION['id'])){	
		header('Location: login.php?msg=0');
	}
?>
<?php
	//link  para as variaveis do form -> arquivo cadastro_cliente.php
	$nome_origem = $_POST['nome_origem'];
	$tipo_origem  = $_POST['tipo_origem'];
	$desc_origem = $_POST['desc_origem'];
	
?>
	<div id = "content_index">
	
	<?php
	   if($con){
		$sql = "insert into origem(nome, tipo, descricao)".
			" values ('$nome_origem','$tipo_origem','$desc_origem')";
			$rs = mysqli_query($con, $sql);
			if($rs){
				echo "<center><h3>Documento cadastrado com sucesso!!</h3></center>";
			}
			else{
				echo "<center><h3>Erro de inclusão: </h3></center> ".mysqli_error($con);
			}
		}
		else{
			echo "<center><h3>Erro de conexão: </h3></center> ".mysqli_error($con);
		}			
	?>
	<div id = "pg_anteriores">
		<a href= "cadastro_origem.php"><img src='figura/plus.png' alt='Cadastrar novo requisito ' class = "img_btn"></a>
		<a href= "consulta_origem.php"><img src='figura/fin.png' alt='Retornar a Consulta' class = "img_btn"></a>
	</div><!--/pg_anteriores-->
</div><!--/content-->

<?php
	include "template/rodape.php";
?>
