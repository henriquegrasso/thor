<?php	
	include "template/topo.php";
	
	if(!isset($_SESSION['id'])){	
		header('Location: login.php?msg=0');
	}
?>
<div id = "content">
  <?php		
		if($con){
			$sql = "select * from requisito order by id";
			$rs = mysqli_query($con, $sql);
			if($rs){
				while ($valor = mysqli_fetch_array($rs)){ //carrega vetor req[] 
					$req[] = $valor['id'];
					$texto[] = $valor['texto_req'];//adicionei
				}
				?>
				<center><h2> Visualização do Mapeamento entre requisitos </h2>
				<table  align = "center">
					<tr align = "center"></center>
						<th class = "color_table"><center title = "Requisito / Depende de">R/D</center></th>					
						
				<?php
					for($i=0 ; $i < count($req);$i++){ // nome entre[] igual ao do BD
						echo " <th class = 'colort'><center title ='".$texto[$i]."'>".$req[$i]."</center></th>";						
					}							
					echo 	"</center></tr>";		
					mysqli_free_result($rs);				
					$sql = "select * from requisito_has_requisito order by requisito_id, depende_de";
					$rs = mysqli_query($con, $sql);
					if(isset($req)){						
						for ($i = 0; $i < count($req); $i++){
							echo "<tr><th class = 'colort'><center title = '".$texto[$i]."'>".$req[$i]."</center></th>"; 
							if($valor['requisito_id'] < $req[$i]){
								if($valor = mysqli_fetch_array($rs)){}//pega o proximo registro
							}							
							for($j=0; $j < count($req); $j++){
								if($i == $j){
									echo "<td class = 'color'><center> </center></td>";
								}
								else{
									if($valor['requisito_id'] == $req[$i]){
										if($valor['depende_de'] < $req[$j]){
											if($valor = mysqli_fetch_array($rs)){} //pega o proximo registro
										}
										else{
											if( $valor['depende_de']==$req[$j]){
												$dep = "select * from requisito_has_requisito where requisito_id =".$valor['depende_de'].
												                                             "  AND depende_de = ".$valor['requisito_id'];
												$rsdep = mysqli_query($con, $dep);
												if(mysqli_num_rows($rsdep)==1 ){	
													echo "<td><center><img src = 'figura/seta_bi.png' class = 'format_img'></center></td>";	
												}else{		
													echo "<td><center> <img src = 'figura/seta.png' class = 'format_img'> </center></td>";
												}
												if($valor = mysqli_fetch_array($rs)){} //pega o proximo registro
											}
											else{
												echo "<td><center> - </center></td>";
											}	
																					
										}
									}
									else{
										echo "<td><center> - </center></td>";
									}
								}
							}//for j
							echo "</tr>";
						}//for i
					}//if isset(req)
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
