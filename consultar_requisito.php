<?php	
	include "template/topo.php";
	
	if(!isset($_SESSION['id'])){	
		header('Location: login.php?msg=0');
	}
?>
<div id = "content">
  <?php		
		if($con){
			$sql = "select * from requisitos";
			$rs = mysqli_query($con, $sql);
			if($rs){?>
				<h2> Requisitos Cadastrados </h2><center>
				<table  align = "center" class="table">
					<thead class="thead-dark">
						<tr align = "center">
							<th scope="col">ID</th>
							<th scope="col" class = "nm">Requisito</th>
							<!-- <th>Épico</th>	 -->
							<th scope="col" >Tipo</th>					
							<th scope="col" >Status</th>
							<th scope="col" >Prioridade</th>
							<th scope="col" >Sprint</th>
							<th scope="col" >Complexidade</th>
							<th scope="col" >Responsável</th>
							<th  scope="col" colspan = 2>Editar</th>	
						</tr>
					</thead>

				<?php
					// $sql2 = "select * from epico";
					// $rsEpico = mysqli_query($con, $sql2);
					while ($valor = mysqli_fetch_array($rs)){ // nome entre[] igual ao do BD
						
						// while($valorEpico = mysqli_fetch_array($rsEpico)){ 
						// 	if ($valor["idepico"] == $valorEpico["idepico"]) {
						// 		$nomeEpico = $valorEpico["nome"]; 
						// 		echo $valorEpico["nome"];
						// 	} else{
						// 		$nomeEpico = "false"; 
						// 	}
						// }

						echo "<tr align = 'center'>
									<td> ".$valor["idrequisitos"]."</td>  
									<td class = 'nm'> ".$valor["conteudo"]."</td>
									<td> ".$valor["tipo"]."</td>
									<td> ".$valor["status"]."</td>
									<td> ".$valor["prioridade"]."</td>
									<td> ".$valor["sprint"]."</td>
									<td> ".$valor["complexidade"]."</td>
									<td> ".$valor["responsavel"]."</td>								
									<td><a href='altera_req.php?seq=". $valor["idrequisitos"].
										"'><img src='figura/edit.png' alt='edit' height='20'></a></td>
									<td><a href='delete_req.php?seq=". $valor["idrequisitos"].
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
