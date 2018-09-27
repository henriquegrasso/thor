<?php	
	include "template/topo.php";
	
	if(!isset($_SESSION['id'])){	
		header('Location: login.php?msg=0');
	}
?>
<div id = "content">
<?php
	if(isset($_POST['select_Requisito'])){
		$idrequisito = $_POST['select_Requisito'];
		if($con){
			$sql = "select * from story where idrequisitos = $idrequisito";
			$sql2 =  "select conteudo from requisitos where idrequisitos = $idrequisito";
			$rs = mysqli_query($con, $sql);
			$rs2 = mysqli_query($con,$sql2);
			$valor2 = mysqli_fetch_array($rs2);

			echo '<h3>Requisito:</h3>
				  <strong>'.$valor2['conteudo'].'</strong>
					<br><br>
				  <h3> Stories: </h3><center>';
			$qtd = $rs->num_rows;
			if($qtd>0){
				if($rs){
					echo '
					<table  align = "center" class="table">
						<thead class="thead-dark">
							<tr align = "center">
								<th scope="col">ID</th>
								<th scope="col" class = "nm">Story</th>
								<!-- <th>Épico</th>	 -->
								<th scope="col" >Tipo</th>					
								<th scope="col" >Status</th>
								<th scope="col" >Prioridade</th>
								<th  scope="col">Editar</th>
								<th  scope="col">Remover</th>
							</tr>
						</thead>';

					while ($valor = mysqli_fetch_array($rs)){ // nome entre[] igual ao do BD
						echo "<tr align = 'center'>
						<td> ".$valor["idstory"]."</td> 
						<td class = 'nm'> ".$valor["conteudo"]."</td>
						<td> ".$valor["tipo"]."</td>
						<td> ".$valor["status"]."</td>
						<td> ".$valor["prioridade"]."</td>
						<td><a href='altera_story.php?id=". $valor["idstory"].
						"'><img src='figura/edit.png' alt='edit' height='20'></a></td>
						<td><a href='delete_story.php?id=". $valor["idstory"].
						"'><img  src='figura/del.png' alt='del' height='20'></a></td>
						</tr>";			
					}	
					mysqli_free_result($rs);
					echo "</table></center>";
				}
			} else{
				echo "<center><h4>Não há stories cadastradas para esse requisito!</h4></center>";
			}
			echo "
			<br>
			<div class='col-md-4 offset-md-4'>
			<center><a href='selecionar_req_alt_story.php'><input class='form-control btn btn-primary' value='Voltar'></a></center>
			</div>
			<br><br>";
		}
	}		

echo "</div>";

	include "template/rodape.php";
?>
