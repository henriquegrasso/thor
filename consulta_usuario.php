<?php	
	include "template/topo.php";
	
	if(!isset($_SESSION['id'])){	
		header('Location: login.php?msg=0');
	}
?>
<div id = "content">
  <?php		
	
	if((isset($_GET['msg'])) && ($_GET['msg']=='del_success')) {
	    echo '
	    <div class="alert alert-success alert-dismissible fade show" role="alert">
		  <center><strong>Usuário deletado com sucesso!</strong></center>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>';

	  } elseif ((isset($_GET['msg'])) && ($_GET['msg']=='del_error')) {
		    echo '
		    <div class="alert alert-danger alert-dismissible fade show" role="alert">
			  <center><strong>Houve um problema ao deletar o usuário!</strong></center>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>';
		} elseif((isset($_GET['msg'])) && ($_GET['msg']=='upd_success')) {
	    echo '
	    <div class="alert alert-success alert-dismissible fade show" role="alert">
		  <center><strong>Usuário atualizado com sucesso!</strong></center>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>';

	  } elseif ((isset($_GET['msg'])) && ($_GET['msg']=='upd_error')) {
		    echo '
		    <div class="alert alert-danger alert-dismissible fade show" role="alert">
			  <center><strong>Houve um problema ao atualizar o Usuário!</strong></center>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>';
		}

		if($con){
			$sql = "select * from usuario";
			$rs = mysqli_query($con, $sql);
			if($rs){?>
				<h2> Clientes Cadastrados </h2><center>
				<hr>
				<table  align = "center" class="table">
					<thead class="thead-dark">
					  <tr align = "center">
						<th>ID</th>
						<th class = "nm" width = '140px'>Nome</th>
						<th>E-Mail</th>
						<th>Tel</th>
						<th>Área</th>
						<th>Editar</th>
						<th>Remover</th>				
					  </tr>
					</thead>
				<?php
					while ($valor = mysqli_fetch_array($rs)){ // nome entre[] igual ao do BD
						echo "<tr align = 'center'>
								<td> ".$valor["id"]."</td>  
								<td class = 'nm'> ".$valor["nome"]."</td>
								<td> ".$valor["email"]."</td>
								<td> ".$valor["telefone"]."</td>
								<td> ".$valor["area"]."</td>
								<td><a href='altera_usuario.php?seq=". $valor["id"].
									"'><img src='figura/edit.png' alt='edit' height='20'></a></td>
								<td><a href='delete_usuario.php?seq=". $valor["id"].
									"'><img  src='figura/del.png' alt='del' height='20'></a></td>
							</tr>";					
					}
					mysqli_free_result($rs);
					echo "</table></center>";
			}
			else{
				echo "Erro de Consulta de clientes: ".mysqli_error($con);
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
