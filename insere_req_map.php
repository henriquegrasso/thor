<?php
	
	include "template/topo.php";
	
	if(!isset($_SESSION['id'])){	
		header('Location: login.php?msg=0');
	}
?>
<div id = "content_index">
<?php
	
	$seq_req = $_POST['seq_req'];		
	$count = 0;
			if($con){
				if(isset($_POST['check'])){
					for($i = 0; $i < count($_POST['check']); $i++){
							$sql = "insert into requisito_has_requisito(requisito_id, depende_de)".
								" values ($seq_req, ".$_POST['check'][$i].")";
							$rs = mysqli_query($con, $sql);
							if($rs){
								$count++;
							}
							else{
								echo "<center><h3>Erro de inclusão: </h3></center> ".mysqli_error($con);
								echo $sql;
							}
					}
					if($count > 0){
						echo "<center><h3> $count mapeamento(s) cadastrado(s) com sucesso!!</h3></center>";
					}
				}
			}		
	?>	

	   <div id = "pg_anteriores">
			<a href= "rastrear_req.php"><img src='figura/plus.png' alt='Rastrear outro requisito ' class = "img_btn"></a>
			<a href= "visualizar_tab_req_map.php"><img src='figura/fin.png' alt='Visualizar rastreabilidade' class = "img_btn"></a>
		</div><!--/pg_anteriores-->
</div><!--/content-->
	
<?php

	include "template/rodape.php";	
?>
