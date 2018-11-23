<?php
	include "template/topo.php";
	
	if(!isset($_SESSION['id'])){	
		header('Location: login.php?msg=0');
	}

?>	

	<article id = "content_cad">
<?php
	
	if (isset($_POST['nome_Ator']) && $con) {
	    $nome_Ator = $_POST['nome_Ator'];
	    $sql = "insert into ator(nome) values ('$nome_Ator')";

	    $rs = mysqli_query($con, $sql);
		if($rs){
			echo '
			<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <center><strong>Ator cadastrado com sucesso!</strong></center>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
			';
		}
		else{
			echo '
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  <center><strong>Houve um problema no cadastro de Ator!</strong></center>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
			 '.mysqli_error($con);
		}
	}



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
						echo '
						<div class="alert alert-success alert-dismissible fade show" role="alert">
						  <center><strong>Ator removido com sucesso!</strong></center>
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>
						';						
					}
					else{
						echo '
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
						  <center><strong>Houve um problema ao remover o Ator!</strong></center>
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>
						 '.mysqli_error($con);
					}
				}
			}
		}
		else{
			echo "<center><h3>Erro de conexão: </h3></center>".mysqli_error($con);
		}
	}
?>

		<h3>Configuração de Atores do site </h3>

	<hr>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<form action="config_ator.php" method="post">	
						<div class="form-group">
							<h4>Ator do Sistema</h4>
							<input type="text" name="nome_Ator" id="text_Ator" class="form-control text" required>
							<br>
							<input type="submit" name="enviarAtor" id="bt_AdicionarAtor" value="Adicionar" class="form-control btn btn-primary">
						</div>
				</form>			
			</div>
		
			<div class="col-md-6">
				<table class="table table-hover table_ator">
					<thead class="thead-dark">
						<tr>
							<th>Atores do site</th>
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
									<td><?php echo '<a href="config_ator.php?seqA='.$linhaAtor["idator"].'"> <img  src="figura/del.png" alt="del" height="20"></a>'?></td>
								<tr>
							<?php endwhile; ?>

						<?php endif; ?>
					</tbody>
				</table>
			</div>			
		</div>
	</div>

	</article>

<?php
	include "template/rodape.php";
?>