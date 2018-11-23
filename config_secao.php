<?php
	include "template/topo.php";
	
	if(!isset($_SESSION['id'])){	
		header('Location: login.php?msg=0');
	}

?>	

	<article id = "content_cad">
	
<?php
	if (isset($_POST['nome_Secao']) && $con) {
	    $nome_secao = $_POST['nome_Secao'];
	    $sql = "insert into secao(nome) values ('$nome_secao')";

	    $rs = mysqli_query($con, $sql);
		if($rs){
			echo '
			<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <center><strong>Seção do Site cadastrada com sucesso!</strong></center>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
			';
		}
		else{
			echo '
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  <center><strong>Houve um problema ao adicionar uma Seção do Site!</strong></center>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
			'.mysqli_error($con);
		}
	}

?>

<?php
	if(isset($_GET['seq'])){
		$seq_secao = $_GET['seq'];
		if($con){
			$sql = "select * from secao WHERE idsecao =".$_GET['seq'];
			$rs = mysqli_query($con, $sql);
			if($rs){
				if($valor = mysqli_fetch_array($rs)){	
					$sql = "DELETE FROM secao
			          WHERE idsecao = $seq_secao;";		
					$rs = mysqli_query($con, $sql);
					if($rs){
						echo '
						<div class="alert alert-success alert-dismissible fade show" role="alert">
						  <center><strong>Seção do Site removida com sucesso!</strong></center>
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>
						';						
					}
					else{
						echo '
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
						  <center><strong>Houve um problema ao remover a Seção do Site!</strong></center>
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

		<h3>Configuração de Seções do site </h3>
		<hr>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<form action="config_secao.php" method="post">	
						<div class="form-group">
							<h4>Seção do site</h4>
							<input type="text" name="nome_Secao" id="text_Secao" class="form-control text" required>
							<br />
							<input type="submit" name="enviarSecao" id="bt_AdicionarSecao" value="Adicionar" class="form-control btn btn-primary">
						</div>
				</form>			
			</div>
		
			<div class="col-md-6">
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
									<td><?php echo '<a href="config_secao.php?seq='.$linhaSecao["idsecao"].'"> <img  src="figura/del.png" alt="del" height="20"></a>'?></td>
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