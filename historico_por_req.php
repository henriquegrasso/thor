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
				<h2> Selecione o requisito para ver seu histórico </h2><center>
				<table  align = "center" class="table table-hover">
					<thead class='thead-dark'>
						<tr align = "center">
							<th>ID</th>
							<th class = "nm">Requisito</th>					
							<th colspan = 2><center>Histórico</center></th>	
						</tr>
					</thead>
				<?php
					while ($valor = mysqli_fetch_array($rs)){ // nome entre[] igual ao do BD
						echo "<tr align = 'center'>
								<td> ".$valor["idrequisitos"]."</td>  
								<td> ".$valor["conteudo"]."</td>
								<td><center><a href='consulta_hist_req.php?seq=". $valor["idrequisitos"].
									"'><img src='figura/lupa.jpg' alt='edit' height='20'></a></center></td>								
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
