<?php
	include "template/topo.php";
?>				
			<article id = "content_index">
				<header>
				</header>
				<?php
	              if((isset($_GET['msg'])) && ($_GET['msg']=='success')) {
	                echo '
	                <div class="alert alert-success">
	                  <center><strong>Cadastro efetuado com sucesso!</strong></center>
	                </div>';
	              }
          		?>  
				    <div class="row">
				        <div class="col-md-12">
				            <div class="row">
				                <div class="col-md-6 mx-auto">

				                    <!-- form card login -->
				                    <div class="card rounded-0">
				                        <div class="card-header">
				                            <h3 class="mb-0">Entrar</h3>
				                        </div>
				                        <div class="card-body">
				                            <form class="form" role="form" autocomplete="off" id="formLogin" novalidate="" name="login" method="POST" action="logar.php">
				                                <div class="form-group">
				                                    <label for="uname1">Usuário</label>
				                                    <input type="text" class="form-control form-control-lg rounded-0" name="user" id="uname1" required="">
				                                    <div class="invalid-feedback">Oops, you missed this one.</div>
				                                </div>
				                                <div class="form-group">
				                                    <label>Senha</label>
				                                    <input type="password" class="form-control form-control-lg rounded-0" id="pwd1" required="" autocomplete="new-password" name="senha">
				                                    <div class="invalid-feedback">Enter your password too!</div>
				                                </div>
				                                <div>
				                                    <label class="custom-control custom-checkbox">
				                                      <input type="checkbox" class="custom-control-input">
				                                      <span class="custom-control-indicator"></span>
				                                    </label>
				                                </div>
				                                <button type="submit" class="btn btn-success btn-lg float-right" id="btnLogin">Entrar</button>
				                            </form>
				                        </div>
				                        <!--/card-block-->
				                    </div>
				                    <!-- /form card login -->

				                </div>


				            </div>
				            <!--/row-->

				        </div>
				        <!--/col-->
				    </div>
				    <!--/row-->

			</article><!--/content-->				
<?php
	include "template/rodape.php";
?>
		
