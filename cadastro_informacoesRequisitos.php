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
		

		<div id="secao_AtorSite">
			<form action="cadastro_InformacoesRequisitos.php" method="post">	

				<label>Ator do Sistema</label><br>
				<input type="text" name="nome_Ator" id="text_Ator" value="sos"><br>
				<input type="submit" name="enviarAtor" id="bt_AdicionarAtor" value="Adicionar">

			</form>

			<table>
				<thead>
					<tr><th>Seções do Site</th></tr>
				</thead>
				<tbody>
					<?php if($con): ?>
						<?php
							$sql = "select * from ator";
							$rs = mysqli_query($con, $sql);
						?>
						<?php while($linhaAtor = mysqli_fetch_array($rs)): ?>
							<tr><td><?php echo $linhaAtor['nome']; ?></td></tr>
						<?php endwhile; ?>

					<?php endif; ?>
				</tbody>
			</table>

		</div>

		<hr>
		<hr>
		<hr>

		<div id="secao_secaoSite">
			<form action="cadastro_InformacoesRequisitos.php" method="post">	

				<label>Ator do Sistema</label><br>
				<input type="text" name="nome_Secao" id="text_Secao" value="sos"><br>
				<input type="submit" name="enviarAtor" id="bt_Secao" value="Adicionar">

			</form>

			<table>
				<thead>
					<tr><th>Seções do Site</th></tr>
				</thead>
				<tbody>
					<?php if($con): ?>
						<?php
							$sql = "select * from secao";
							$rs = mysqli_query($con, $sql);
						?>
						<?php while($linhaSecao = mysqli_fetch_array($rs)): ?>
							<tr><td><?php echo $linhaSecao['nome']; ?></td></tr>
						<?php endwhile; ?>

					<?php endif; ?>
				</tbody>
			</table>

		</div>



	</article>

<?php
	include "template/rodape.php";
?>