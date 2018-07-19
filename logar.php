<?php 
	include "template/topo.php";
	$user = mysqli_real_escape_string($con, $_POST['user']);
	$senha  = mysqli_real_escape_string($con, $_POST['senha']);
	
	$sql = "select * from usuario where login = '$user' and senha = sha1('$senha')";// where cod_aluno not in(1) order by grupo, nome_aluno";
	$rs = mysqli_query($con, $sql);
	
	if(mysqli_num_rows ($rs)==1){
		$valor = mysqli_fetch_array($rs);
		echo "Login efetuado com sucesso. <br> Seja bem vind@: ". $valor['nome'];
		
		$_SESSION["id"]= $valor['id'];
		$_SESSION["nome"]= $valor['nome'];
		header("Location: index.php");		
	}
	else{
		session_destroy();
		header("Location: login.php?msg=falha no login.");
	}
	
	/*
	if(isset($_REQUEST['logar'])){
		$usuario = $_REQUEST['nome'];
		$senha = $_REQUEST['senha'];
		
		$sql = "SELECT * FROM usuario WHERE nome = '$usuario' AND senha = '$senha'";	
		$query = mysql_query($sql) or die ('Sem conexão');
		$qtda = mysql_num_rows($query);
		
		if($qtda == 0){
			echo 'Erro ao logar';
		}else{
			
			$_SESSION['nome'] = $usuario;
			$_SESSION['senha'] = $senha;
			
		}
	}*/
	include "template/rodape.php";
?>
