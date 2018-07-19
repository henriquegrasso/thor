<?php	
	include "template/topo.php";
	
	if(!isset($_SESSION['id'])){	
		header('Location: login.php?msg=0');
	}
?>
<div id = "content">
  <?php		
		if($con){
			$sql = "select * from usuario";
			$rs = mysqli_query($con, $sql);
			if($rs){?>
				<h2> Clientes Cadastrados </h2><center>
				<table  align = "center">
					<tr align = "left">
						<th>ID</th>
						<th class = "nm" width = '140px'>Nome</th>
						<th>CPF</th>
						<th>E-Mail</th>
						<th>Tel</th>
						<th>Cel</th>
						<th>Área</th>
						<th colspan = 2>Editar</th>						
					</tr>
				<?php
					while ($valor = mysqli_fetch_array($rs)){ // nome entre[] igual ao do BD
						echo "<tr align = 'center'>
								<td> ".$valor["id"]."</td>  
								<td class = 'nm'> ".$valor["nome"]."</td>
								<td> ".$valor["cpf"]."</td>
								<td> ".$valor["email"]."</td>
								<td> ".$valor["telefone_fixo"]."</td>
								<td> ".$valor["telefone_cel"]."</td>
								<td> ".$valor["area"]."</td>
								<td><a href='altera_usuario.php?seq=". $valor["id"].
									"'><img src='figura/edit.png' alt='edit' height='20'></a></td>
								<td><a href='delete_usuario.php?seq=". $valor["id"].
									"'><img  src='figura/del.png' alt='del' height='20'></a></td>
							</tr>";					
					}
					mysqli_free_result($rs);
					echo "</table></center>";
			}
			else{
				echo "Erro de Consulta de clientes: ".mysqli_error($con);
			}
		}
		else{
			echo "Erro de conexão: ".mysqli_error($con);
		}
 ?>
</div>
<?php
	include "template/rodape.php";
?>
