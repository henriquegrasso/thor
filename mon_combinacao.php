<?php	
	include "template/topo.php";
	
	if(!isset($_SESSION['id'])){	
		header('Location: login.php?msg=0');
	}
?>
<div id = "content">
  <?php		
		$flag = 0;
		if($con){
			$sql = "select * from requisitos"; 

				if($_POST['select_Tipo'] != -1 ){
					if($flag == 0){
						$flag = 1;
						$sql .= " WHERE ";
					}else{
						$sql .= " and ";
					}
					$sql .= " tipo = '".$_POST['select_Tipo'] . "' ";
					
				}
				if($_POST['select_Status'] != -1 ){
					if($flag == 0){
						$flag = 1;
						$sql .= " WHERE ";
					}else{
						$sql .= " and ";
					}
					$sql .= " status = '".$_POST['select_Status'] . "' ";
					
				}
				if($_POST['select_Complexidade'] != -1 ){
					if($flag == 0){
						$flag = 1;
						$sql .= " WHERE ";
					}else{
						$sql .= " and ";
					}
					$sql .= " complexidade = '".$_POST['select_Complexidade'] . "' ";
					
				}
				if($_POST['select_Prioridade'] != -1 ){
					if($flag == 0){
						$flag = 1;
						$sql .= " WHERE ";
					}else{
						$sql .= " and ";
					}
					$sql .= " prioridade = '".$_POST['select_Prioridade'] . "' ";					
				}
						
			$rs = mysqli_query($con, $sql);
			if($rs){?>
				<h2> Requisitos Organizados por Combinação de Fatores</h2><center>
				<table  align = "center" class="table table-hover table_ator">
					<thead class="thead-dark">	
						<tr align = "left">
							<th>ID</th>
							<th>Requisito</th>												
							<th>Status</th>																							
						</tr>
					</thead>
				<?php
					while ($valor = mysqli_fetch_array($rs)){ // nome entre[] igual ao do BD						
							echo "<tr align = 'center'>
								<td> ".$valor["idrequisitos"]."</td>								 
								<td> ".$valor["conteudo"]."</td>								
								<td> ".$valor["status"]."</td>							
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
