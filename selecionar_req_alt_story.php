<?php
	include "template/topo.php";
	
	if(!isset($_SESSION['id'])){	
		header('Location: login.php?msg=0');
	}


	if (!isset($_POST['submit'])) {
		$_POST['select_Requisito'] = "";
	
	}
	
?>	
	<article id = "content_cad">
	<?php
		if((isset($_GET['msg'])) && ($_GET['msg']=='del_success')) {
		    echo '
		    <div class="alert alert-success alert-dismissible fade show" role="alert">
			  <center><strong>Story deletada com sucesso!</strong></center>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>';

		  } elseif ((isset($_GET['msg'])) && ($_GET['msg']=='del_error')) {
			    echo '
			    <div class="alert alert-danger alert-dismissible fade show" role="alert">
				  <center><strong>Houve um problema ao deletar a Story!</strong></center>
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>';
			} elseif((isset($_GET['msg'])) && ($_GET['msg']=='upd_success')) {
		    echo '
		    <div class="alert alert-success alert-dismissible fade show" role="alert">
			  <center><strong>Story atualizada com sucesso!</strong></center>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>';

		  } elseif ((isset($_GET['msg'])) && ($_GET['msg']=='upd_error')) {
			    echo '
			    <div class="alert alert-danger alert-dismissible fade show" role="alert">
				  <center><strong>Houve um problema ao atualizar a Story!</strong></center>
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>';
			}
	?>	

		<!-- definir cabeçalho do artigo -->
			<h2> Cadastro de Story</h2>											
			<hr>
			<form id="form_BuscarReq" name="form_SalvarReq" method="post" action="selecionar_story.php">
				<div class="form-group">
					<label for="select_Requisito">Selecione o Requisito</label>
					<br>
						<select name="select_Requisito" class="form-control col-md-12 select" required >

							<option value="">Selecione...</option>									
							<?php if($con): ?>
								<?php
									$sql = "select * from requisitos";
									$rs = mysqli_query($con, $sql);
								?>
								<?php while($linhaRequisito = mysqli_fetch_array($rs)): ?>
									<option <?php echo 'value="'.$linhaRequisito["idrequisitos"].'"'?>><?php echo $linhaRequisito['conteudo']; ?></option>
								<?php endwhile; ?>
							<?php endif; ?>

						</select>
						<br>
					<input type="submit" name="submit" value="Confirmar" class="form-control col-md-4 offset-md-4 btn btn-primary">
				</div>

			</form>
			<hr>

	</article><!--/content-->
	
	<div id = "sidebar">							
		 								
	</div><!--/sidebar-->			
<?php
	include "template/rodape.php";
?>

