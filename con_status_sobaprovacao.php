<?php	
	include "template/topo.php";
	
	if(!isset($_SESSION['id'])){	
		header('Location: login.php?msg=0');
	}
?>
<div id = "content">
  <?php		
		if($con){
			$sql = "select * from requisitos WHERE status = 'Sob Aprovacao'";
			$rs = mysqli_query($con, $sql);
			if($rs){?>
				<h2> Requisitos com Status "Sob Aprovação" </h2><center>
				<table  align = "center">
					<tr align = "left">
						<th>ID</th>
						<th>Requisito</th>
						<th>Responsável</th>														
					</tr>
				<?php
					while ($valor = mysqli_fetch_array($rs)){ // nome entre[] igual ao do BD
						echo "<tr align = 'center'>
								<td> ".$valor["idrequisitos"]."</td>  
								<td> ".$valor["conteudo"]."</td>
								<td> ".$valor["responsavel"]."</td>
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
