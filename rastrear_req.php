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
				<h2> Selecione o requisito a ser mapeado </h2><center>
				<table  align = "center">
					<tr align = "center">
						<th>ID</th>
						<th>Título</th>
						<th class = "nm">Requisito</th>					
						<th colspan = 2><center>Mapear</center></th>	
					</tr>
				<?php
					while ($valor = mysqli_fetch_array($rs)){ // nome entre[] igual ao do BD
						echo "<tr align = 'center'>
								<td> ".$valor["id"]."</td>  
								<td> ".$valor["titulo_req"]."</td>
								<td class = 'nm'> ".$valor["texto_req"]."</td>																
								<td><center><a href='mapear_req.php?seq=". $valor["id"].
									"'><img src='figura/edit.png' alt='edit' height='20'></a></center></td>								
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
