<?php
	include "template/topo.php";
	
	if(!isset($_SESSION['id'])){	
		header('Location: login.php?msg=0');
	}



	if (isset($_POST['nome_Epico']) && $con) {
	    $nome_Epico = $_POST['nome_Epico'];
	    var_dump($_POST); 
	    $sql = "insert into epico(nome) values ('$nome_Epico')";

	    $rs = mysqli_query($con, $sql);
		if($rs){
			echo "<center><h3>Seção cadastrada com sucesso!!</h3></center>";
		}
		else{
			echo "<center><h3>Erro de inclusão: </h3></center> ".mysqli_error($con);
		}
	}

?>	

	<article id = "content_cad">
		<h2>Cadastro de Épicos </h2>


<?php
	if(isset($_GET['seqE'])){
		$seq_epico = $_GET['seqE'];
		if($con){
			$sql = "select * from epico WHERE idepico =".$_GET['seqE'];
			$rs = mysqli_query($con, $sql);
			if($rs){
				if($valor = mysqli_fetch_array($rs)){	
					$sql = "DELETE FROM epico
			          WHERE idepico = $seq_epico;";		
					$rs = mysqli_query($con, $sql);
					if($rs){
						echo "<center><h3>Épico excluído com sucesso!!</h3></center>";						
					}
					else{
						echo "<center><h3>Erro de exclusão de Épico: </h3></center> ".mysqli_error($con);
					}
				}
			}
		}
		else{
			echo "<center><h3>Erro de conexão: </h3></center>".mysqli_error($con);
		}
	}
?>
		

		<div id="div_cadastrar_epico">
			<form action="cadastro_epico.php" method="post">	

				<label>Épico</label><br>
				<input type="text" name="nome_Epico" id="text_Epico" value="sos"><br>
				<input type="submit" name="enviarEpico" id="bt_AdicionarAtor" value="Adicionar">

			</form>
		</div>

		<div id="div_listar_epico">
			<table>
				<thead>
					<tr>
						<th>Épicos</th>
						<th>Remover</th>
					</tr>
					
				</thead>
				<tbody>
					<?php if($con): ?>
						<?php
							$sql = "select * from epico";
							$rs = mysqli_query($con, $sql);
						?>
						<?php while($linhaEpico = mysqli_fetch_array($rs)): ?>
							<tr>
								<td><?php echo $linhaEpico['nome']; ?></td>
								<td><?php echo '<a href="cadastro_epico.php?seqE='.$linhaEpico["idepico"].'"> <img  src="figura/del.png" alt="del" height="20"></a>'?></td>
							<tr>
						<?php endwhile; ?>

					<?php endif; ?>
				</tbody>
			</table>
		</div>

	</article>

<?php
	include "template/rodape.php";
?>