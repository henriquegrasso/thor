<?php	
	include "template/topo.php";
	
	if(!isset($_SESSION['id'])){	
		header('Location: login.php?msg=0');
	}
?>
<div id = "content">
  <?php		
		if($con){
			$sql = "select * from requisito";
			$rs = mysqli_query($con, $sql);
			if($rs){?>
				<h2> Requisitos Cadastrados </h2><center>
				<table  align = "center">
					<tr align = "center">
						<th>ID</th>
						<th class = "nm">Requisito</th>						
						<th>Categoria</th>
						<th>Tipo</th>
						<th>Status</th>
						<th>Prioridade</th>
						<th colspan = 2>Editar</th>	
					</tr>
				<?php
					while ($valor = mysqli_fetch_array($rs)){ // nome entre[] igual ao do BD
						echo "<tr align = 'center'>
								<td> ".$valor["id"]."</td>  
								<td class = 'nm'> ".$valor["texto_req"]."</td>
								<td> ".$valor["categoria"]."</td>
								<td> ".$valor["tipo"]."</td>
								<td> ".$valor["estado"]."</td>
								<td> ".$valor["prioridade"]."</td>								
								<td><a href='altera_req.php?seq=". $valor["id"].
									"'><img src='figura/edit.png' alt='edit' height='20'></a></td>
								<td><a href='delete_req.php?seq=". $valor["id"].
									"'><img  src='figura/del.png' alt='del' height='20'></a></td>
							</tr>";					
					}
					mysqli_free_result($rs);
					echo "</table></center>";
			}
			else{
				echo "Erro de Consulta de requisito: ".mysqli_error($con);
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
