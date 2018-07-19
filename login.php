<?php
	include "template/topo.php";
?>				
			<article id = "content_index">
				<header>
					<h2>Login</h2>
				</header>
				<!-- definir artigo -->
			  <div id = "login">				
				  <?php
				   if(isset($_GET['msg'])){ echo "===>>>> ".$_GET['msg']." <<<===== <br><br>"; }
				  ?>
				<form name="login" action="logar.php" method='POST'>			
					Usuário:  <input type="text" name="user" size=40 maxlenght=80 class = "log_form"> <br><br>
					Senha:    <input type="password" name="senha" size=40 maxlenght=80 class = "log_form1"><br><br><br>
					<input type="submit" name = "logar" value="Entrar" class="btn_monitora_login">							
				</form>
											
			  </div><!--/login-->
			  <img src = "figura/check.jpg" />
			  <img src = "figura/olho2.jpeg" />			 
			</article><!--/content-->				
<?php
	include "template/rodape.php";
?>
		
