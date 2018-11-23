<?php
	include "template/topo.php";
	
	if(!isset($_SESSION['id'])){	
		header('Location: login.php?msg=0');
	}

?>	
			<article id = "content_cad">
				<!-- definir cabeçalho do artigo -->
					<h2> Consulta Avançada</h2>				
								

					<hr>

					<form id="form_SalvarReq" name="form_SalvarReq" method="post" action="mon_combinacao.php">
					  <div class="form-row">
						<div class="form-group col-md-2">
							<label name="lb_Tipo">Tipo</label>
							<select name="select_Tipo" id="select_Tipo" class="form-control select">
								<option value=-1>Todos</option>
								<option>Funcional</option>
								<option>Não-Funcional</option>
								<option>Interface</option>
							</select>	
						</div>
						
						<div class="form-group col-md-4">		
							<label name="lb_Status">Status</label>
							<select name="select_Status" id="select_Status" class="form-control select">
								<option value=-1>Todos</option>
								<option>Em Aberto</option>
								<option>Em Progresso</option>
								<option>Sob Aprovação</option>
								<option>Finalizado</option>
								<option>Cancelado</option>
							</select>
						</div>

						<div class="form-group col-md-2">
							<label name="lb_Prioridade">Prioridade</label>
							<select name="select_Prioridade" id="select_Prioridade" class="form-control select">
								<option value=-1>Todos</option>
								<option>Alta</option>
								<option>Média</option>
								<option>Baixa</option>
							</select>
						</div>
						
						<div class="form-group col-md-2">
							<label name="lb_Complexidade">Complexidade</label>
							<select name="select_Complexidade" id="select_Complexidade" class="form-control select">
								<option value=-1>Todos</option>
								<option>Baixa</option>
								<option>Média</option>
								<option>Alta</option>
							</select>
						</div>
						
					  </div>
					  <br>
					  <div class="form-row">
						<div class="form-group col-md-3 offset-md-3">
							<input class="form-control btn btn-primary" type="reset" value="Limpar">	
						</div>

						<div class="form-group col-md-3">
							<input class="form-control btn btn-primary" type="submit" name="bt_Salvar" value="Consultar" >	
						</div>

					  </div>
					</form>
					<hr>

			</article><!--/content*-->
					
<?php
	include "template/rodape.php";
?>

