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
			$sql = "select * from requisito"; 
				if($_POST['cmbEquipe'] != -1 ){
					if($flag == 0){
						$flag = 1;
						$sql .= " WHERE ";
					}else{
						$sql .= " and ";
					}
					$sql .= " usuario_id_funcionario = ".$_POST['cmbEquipe'] . " ";
					
				} 
				if($_POST['cmbCliente'] != -1 ){
					if($flag == 0){
						$flag = 1;
						$sql .= " WHERE ";
					}else{
						$sql .= " and ";
					}
					$sql .= " usuario_id_cliente = ".$_POST['cmbCliente'] . " ";
					
				} 
				
				if($_POST['cmbOrigem'] != -1 ){
					if($flag == 0){
						$flag = 1;
						$sql .= " WHERE ";
					}else{
						$sql .= " and ";
					}
					$sql .= " origem_id = ".$_POST['cmbOrigem'] . " ";
					
				} 
				if($_POST['cmbCategoria'] != -1 ){
					if($flag == 0){
						$flag = 1;
						$sql .= " WHERE ";
					}else{
						$sql .= " and ";
					}
					$sql .= " categoria = '".$_POST['cmbCategoria'] . "' ";
					
				}
				if($_POST['tipo'] != -1 ){
					if($flag == 0){
						$flag = 1;
						$sql .= " WHERE ";
					}else{
						$sql .= " and ";
					}
					$sql .= " tipo = '".$_POST['tipo'] . "' ";
					
				}
				if($_POST['status'] != -1 ){
					if($flag == 0){
						$flag = 1;
						$sql .= " WHERE ";
					}else{
						$sql .= " and ";
					}
					$sql .= " estado = '".$_POST['status'] . "' ";
					
				}
				if($_POST['pri'] != -1 ){
					if($flag == 0){
						$flag = 1;
						$sql .= " WHERE ";
					}else{
						$sql .= " and ";
					}
					$sql .= " prioridade = '".$_POST['pri'] . "' ";					
				}
						
			$rs = mysqli_query($con, $sql);
			if($rs){?>
				<h2> Requisitos Organizados por Combinação de Fatores</h2><center>
				<table  align = "center">
					<tr align = "left">
						<th>ID</th>
						<th>Requisito</th>												
						<th>Estado</th>																							
					</tr>
				<?php
					while ($valor = mysqli_fetch_array($rs)){ // nome entre[] igual ao do BD						
							echo "<tr align = 'center'>
								<td> ".$valor["id"]."</td>								 
								<td> ".$valor["texto_req"]."</td>								
								<td> ".$valor["estado"]."</td>							
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
