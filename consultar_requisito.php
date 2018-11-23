<?php	
	include "template/topo.php";
	
	if(!isset($_SESSION['id'])){	
		header('Location: login.php?msg=0');
	}
?>
<div id = "content">

<?php
	if(isset($_POST['bt_FinalizarCadastro'])) {
		$relator = $_POST['text_Relator'];
		$responsavel = $_POST['text_Responsavel'];
		$sprint = $_POST['text_Sprint'];
		$tipo = $_POST['select_Tipo'];
		$complexidade = $_POST['select_Complexidade'];
		$status = $_POST['select_Status'];
		$prioridade = $_POST['select_Prioridade'];
		$conteudo = $_SESSION['conteudo'];

	    //var_dump($_POST);
	    $sql = "insert into requisitos(relator, responsavel, sprint, complexidade, status, prioridade, tipo, conteudo) values('$relator', '$responsavel', '$sprint', '$complexidade', '$status', '$prioridade', '$tipo', '$conteudo')";
	    $rs = mysqli_query($con, $sql);
		// $new_req_id = mysqli_insert_id($rs); 
		// echo "new req id: ".$new_req_id; 
		// 		$sql2 = "insert into log_requisito(texto_req_old, texto_req_new, id_req, id_user, dt_alteracao) values('-', 'REQUISITO CADASTRADO', '$new_req_id', '".$_SESSION['id_req']."', now())";
		// 		$rs2 = mysqli_query($con, $sql2);
		if($rs){
			echo '
			 <div class="alert alert-success alert-dismissible fade show" role="alert">
			  <center><strong>Requisito cadastrado com sucesso!</strong></center>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>';
		}
		else{
			echo '
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  <center><strong>Houve um problema ao cadastrar o requisto!</strong></center>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>'
			 .mysqli_error($con);
		}
		unset($_SESSION['conteudo']);
	}
?>

  <?php		
	if((isset($_GET['msg'])) && ($_GET['msg']=='del_success')) {
	    echo '
	    <div class="alert alert-success alert-dismissible fade show" role="alert">
		  <center><strong>Requisito deletado com sucesso!</strong></center>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>';

	  } elseif ((isset($_GET['msg'])) && ($_GET['msg']=='del_error')) {
		    echo '
		    <div class="alert alert-danger alert-dismissible fade show" role="alert">
			  <center><strong>Houve um problema ao deletar o requisito!</strong></center>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>';
		} elseif((isset($_GET['msg'])) && ($_GET['msg']=='upd_success')) {
	    echo '
	    <div class="alert alert-success alert-dismissible fade show" role="alert">
		  <center><strong>Requisito atualizado com sucesso!</strong></center>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>';

	  } elseif ((isset($_GET['msg'])) && ($_GET['msg']=='upd_error')) {
		    echo '
		    <div class="alert alert-danger alert-dismissible fade show" role="alert">
			  <center><strong>Houve um problema ao atualizar o requisito!</strong></center>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>';
		}

		if($con){
			$sql = "select * from requisitos";
			$rs = mysqli_query($con, $sql);
			if($rs){?>
				<h2> Requisitos Cadastrados </h2><center>
				<hr>
				<br>
				<div class="form-group col-md-3 offset-md-9">
					<a href="cadastro_req.php"><input type="button" name="bt_CadastrarRequisito" value="Cadastrar Requisito" class="form-control btn btn-primary "></a>
				</div>
				<table  align = "center" class="table table-hover sortable">
					<thead class="thead-dark">
						<tr align = "center">
							<th scope="col">ID</th>
							<th scope="col" class = "nm">Requisito</th>
							<!-- <th>Épico</th>	 -->
							<th scope="col" >Tipo</th>					
							<th scope="col" >Status</th>
							<th scope="col" >Prioridade</th>
							<th scope="col" >Sprint</th>
							<th scope="col" >Complexidade</th>
							<th scope="col" >Responsável</th>
							<th  scope="col" colspan = 2>Editar</th>	
						</tr>
					</thead>

				<?php
					while ($valor = mysqli_fetch_array($rs)){ // nome entre[] igual ao do BD
						echo "<tr align = 'center'>
									<td> ".$valor["idrequisitos"]."</td>  
									<td class = 'nm'> ".$valor["conteudo"]."</td>
									<td> ".$valor["tipo"]."</td>
									<td> ".$valor["status"]."</td>
									<td> ".$valor["prioridade"]."</td>
									<td> ".$valor["sprint"]."</td>
									<td> ".$valor["complexidade"]."</td>
									<td> ".$valor["responsavel"]."</td>								
									<td><a href='altera_req.php?id=". $valor["idrequisitos"].
										"'><img src='figura/edit.png' alt='edit' height='20'></a></td>
									<td><a href='delete_req.php?id=". $valor["idrequisitos"].
										"'><img  src='figura/del.png' alt='del' height='20'></a></td>
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
