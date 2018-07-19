<?php
	include "template/topo.php";
	
?>
<?php
	//link  para as variaveis do form -> arquivo cadastro_usuario.php
	$user = $_POST['user'];
	$senha = $_POST['senha'];
	$nome_cliente = $_POST['nome_usuario'];
	$cpf_cliente  = $_POST['cpf_usuario'];
	$area_cliente  = $_POST['area_usuario'];
	$email_cliente = $_POST['email_usuario'];
	$tel_cliente = $_POST['tel_usuario'];
	$cel_cliente = $_POST['cel_usuario'];
	$tipo = $_POST['tipo'];
?>
	<div id = "content_index">
	
	<?php
	   if($con){
		$sql = "insert into usuario(login, senha, nome, cpf, email, telefone_fixo, telefone_cel, area, tipo)".
			" values ('$user', sha1('$senha'), '$nome_cliente','$cpf_cliente','$email_cliente', '$tel_cliente', '$cel_cliente', '$area_cliente', '$tipo')";
			$rs = mysqli_query($con, $sql);
			if($rs){
				echo "<center><h3>Usuário cadastrado com sucesso!!</h3></center>";
			}
			else{
				echo "<center><h3>Erro de inclusão: </h3></center> ".mysqli_error($con);
			}
		}
		else{
			echo "<center><h3>Erro de conexão: </h3></center> ".mysqli_error($con);
		}			
	?>	
</div><!--/content-->

<?php
	include "template/rodape.php";
?>
