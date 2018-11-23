<?php	
	include "template/topo.php";
	
	if(!isset($_SESSION['id'])){	
		header('Location: login.php?msg=0');
	}
?>
<div id = "content">
  <?php		
		if($con){
			$sql = "select * from requisitos WHERE status = 'Cancelado'";
			$rs = mysqli_query($con, $sql);
			$qtd = $rs->num_rows;
			if($qtd>0){
				if($rs){?>
					<h2> Requisitos de Status "Cancelado" </h2><center>
					<table  align = "center" class="table table-hover">
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
					while ($valor = mysqli_fetch_array($rs)){ // nome entre[] igual ao do BD
							echo "<tr align = 'center'>
									<td> ".$valor["idrequisitos"]."</td>  
									<td class = 'nm'> ".$valor["conteudo"]."</td>
									<td> ".$valor["tipo"]."</td>
									<td> ".$valor["status"]."</td>
									<td> ".$valor["prioridade"]."</td>
									<td> ".$valor["sprint"]."</td>
									<td> ".$valor["complexidade"]."</td>
									<td> ".$valor["responsavel"]."</td>								
									<td><a href='altera_req.php?id=". $valor["idrequisitos"].
										"'><img src='figura/edit.png' alt='edit' height='20'></a></td>
									<td><a href='delete_req.php?id=". $valor["idrequisitos"].
										"'><img  src='figura/del.png' alt='del' height='20'></a></td>
							</tr>";				
						}
						mysqli_free_result($rs);
						echo "</table></center>";
				}
			} else{
				echo "<center><h4>Nenhum resultado foi encontrado!</h4></center>
					  <br>
					   <div class='form-row'>	
						  	<div class='form-group col-md-3 offset-md-3'>
								<a href='consultar_requisito.php'><input class='form-control btn btn-primary' value='Todos os Requisitos'></a>
							</div>

							<div class='form-group col-md-3'>
								<a href='cadastro_req.php'><input class='form-control btn btn-primary' value='Cadastrar Requisito'></a>
							</div>
					  </div>
				";
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
