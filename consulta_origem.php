<?php	
	include "template/topo.php";
	
	if(!isset($_SESSION['id'])){	
		header('Location: login.php?msg=0');
	}
?>
<div id = "content">
  <?php		
		if($con){
			$sql = "select * from origem";
			$rs = mysqli_query($con, $sql);
			if($rs){?>
				<h2> Documentos Cadastrados </h2><center>
				<table  align = "center">
					<tr align = "center">
						<th>ID</th>
						<th class = "nm">Nome</th>
						<th>Tipo</th>
						<th>Descrição</th>						
						<th colspan = 2>Editar</th>	
					</tr>
				<?php
					while ($valor = mysqli_fetch_array($rs)){ // nome entre[] igual ao do BD
						echo "<tr align = 'center'>
								<td> ".$valor["id"]."</td>  
								<td class = 'nm'> ".$valor["nome"]."</td>
								<td> ".$valor["tipo"]."</td>
								<td> ".$valor["descricao"]."</td>								
								<td><a href='altera_origem.php?seq=". $valor["id"].
									"'><img src='figura/edit.png' alt='edit' height='20'></a></td>
								<td><a href='delete_origem.php?seq=". $valor["id"].
									"'><img  src='figura/del.png' alt='del' height='20'></a></td>
							</tr>";					
					}
					mysqli_free_result($rs);
					echo "</table></center>";
			}
			else{
				echo "Erro de Consulta de documentos: ".mysqli_error($con);
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
