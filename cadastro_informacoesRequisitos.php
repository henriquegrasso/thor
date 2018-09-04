<?php
	include "template/topo.php";
	
	if(!isset($_SESSION['id'])){	
		header('Location: login.php?msg=0');
	}

	if (isset($_POST['nome_Secao']) && $con) {
	    $nome_secao = $_POST['nome_Secao'];
	    var_dump($_POST); 
	    $sql = "insert into secao(nome) values ('$nome_secao')";

	    $rs = mysqli_query($con, $sql);
		if($rs){
			echo "<center><h3>Seção cadastrada com sucesso!!</h3></center>";
		}
		else{
			echo "<center><h3>Erro de inclusão: </h3></center> ".mysqli_error($con);
		}
	}



	if (isset($_POST['nome_Ator']) && $con) {
	    $nome_Ator = $_POST['nome_Ator'];
	    var_dump($_POST); 
	    $sql = "insert into ator(nome) values ('$nome_Ator')";

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
		<h2>Configuração de Cadastro de Requisito </h2>


<?php
	if(isset($_GET['seqA'])){
		$seq_ator = $_GET['seqA'];
		if($con){
			$sql = "select * from ator WHERE idator =".$_GET['seqA'];
			$rs = mysqli_query($con, $sql);
			if($rs){
				if($valor = mysqli_fetch_array($rs)){	
					$sql = "DELETE FROM ator
			          WHERE idator = $seq_ator;";		
					$rs = mysqli_query($con, $sql);
					if($rs){
						echo "<center><h3>Ator excluído com sucesso!!</h3></center>";						
					}
					else{
						echo "<center><h3>Erro de exclusão de Ator: </h3></center> ".mysqli_error($con);
					}
				}
			}
		}
		else{
			echo "<center><h3>Erro de conexão: </h3></center>".mysqli_error($con);
		}
	}
?>
		
	
		<form action="cadastro_InformacoesRequisitos.php" method="post">	
				<div class="form-group col-md-3">
					<label labelfor="nome_Ator">Ator do Sistema</label>
					<input type="text" name="nome_Ator" id="text_Ator" value="sos" class="form-control">
				</div>
				<br>
				<div class="col-md-2">
					<input type="submit" name="enviarAtor" id="bt_AdicionarAtor" value="Adicionar" class="form-control">
				</div>
		</form>
	
		<table class="table table-hover table_ator">
			<thead class="thead-dark">
				<tr>
					<th>Atores do Site</th>
					<th>Remover</th>
				</tr>

			</thead>
			
			<tbody>
				<?php if($con): ?>
					<?php
						$sql = "select * from ator";
						$rs = mysqli_query($con, $sql);
					?>
					<?php while($linhaAtor = mysqli_fetch_array($rs)): ?>
						<tr>
							<td><?php echo $linhaAtor['nome']; ?></td>
							<td><?php echo '<a href="cadastro_InformacoesRequisitos.php?seqA='.$linhaAtor["idator"].'"> <img  src="figura/del.png" alt="del" height="20"></a>'?></td>
						<tr>
					<?php endwhile; ?>

				<?php endif; ?>
			</tbody>
		</table>

<?php
	if(isset($_GET['seqS'])){
		$seq_sec = $_GET['seqS'];
		if($con){
			$sql = "select * from secao WHERE idsecao =".$_GET['seqS'];
			$rs = mysqli_query($con, $sql);
			if($rs){
				if($valor = mysqli_fetch_array($rs)){	
					$sql = "DELETE FROM secao
			          WHERE idsecao = $seq_sec;";		
					$rs = mysqli_query($con, $sql);
					if($rs){
						echo "<center><h3>Seção excluída com sucesso!!</h3></center>";						
					}
					else{
						echo "<center><h3>Erro de exclusão de cadastro: </h3></center> ".mysqli_error($con);
					}
				}
			}
		}
		else{
			echo "<center><h3>Erro de conexão: </h3></center>".mysqli_error($con);
		}
	}	
?>

			<form action="cadastro_InformacoesRequisitos.php" method="post">	
				<div class="form-group col-md-3">
			
					<label>Seção do Site</label><br>
					<input type="text" name="nome_Secao" id="text_Secao" value="sos" class="form-control"><br>
				</div>
				<div class="col-md-3">
					<input type="submit" name="enviarAtor" id="bt_Secao" value="Adicionar" class="form-control">
				</div>
			</form>

			<table class="table table-hover table_secao">
				<thead class="thead-dark">
					<tr>
						<th>Seções do Site</th>
						<th>Remover</th>
					</tr>
				</thead>
				<tbody>
					<?php if($con): ?>
						<?php
							$sql = "select * from secao";
							$rs = mysqli_query($con, $sql);
						?>
						<?php while($linhaSecao = mysqli_fetch_array($rs)): ?>
							<tr>
								<td><?php echo $linhaSecao['nome']; ?></td>
								<td><?php echo '<a href="cadastro_InformacoesRequisitos.php?seqS='.$linhaSecao["idsecao"].'"> <img  src="figura/del.png" alt="del" height="20"></a>'?></td>
							</tr>
						<?php endwhile; ?>

					<?php endif; ?>
				</tbody>
			</table>

	</article>

<?php
	include "template/rodape.php";
?>