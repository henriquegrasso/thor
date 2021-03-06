<?php	
	include "template/topo.php";
	
	if(!isset($_SESSION['id'])){	
		header('Location: login.php?msg=0');
	}
?>


<div id = "content">
  <?php		
		if($con){
			$sql = "select * from log_requisito inner join usuario on id_user = usuario.id order by dt_alteracao DESC";
			$rs = mysqli_query($con, $sql);
			if($rs){?>
				<h2> Requisitos Alterados </h2><center>
				<table  align = "center" class="table table-hover">
					<thead class='thead-dark'>
						<tr align = "center">
							<th>ID</th>
							<th class = "nm">Requisito Novo</th>
							<th class = "nm">Requisito Antigo</th>					
							<th>Usuário</th>
							<th>Data</th>							
						</tr>
					</thead>
				<?php
					while ($valor = mysqli_fetch_array($rs)){ // nome entre[] igual ao do BD
						echo "<tr align = 'center'>
								<td> ".$valor["id_req"]."</td>  
								<td class = 'nm'> ".$valor["texto_req_new"]."</td>
								<td class = 'nm'> ".$valor["texto_req_old"]."</td>
								<td> ".$valor["nome"]."</td>
								<td> ".$valor["dt_alteracao"]."</td>								
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

