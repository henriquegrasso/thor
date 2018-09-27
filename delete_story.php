<?php
	
	include "conexao.php";
	
	if(!isset($_SESSION['id'])){	
		header('Location: login.php?msg=0');
	}

	$idStory = $_GET['id'];
	if($con){
		$sql = "select * from story WHERE idstory =".$_GET['id'];
		$rs = mysqli_query($con, $sql);
		if($rs){
			if($valor = mysqli_fetch_array($rs)){	
				$sql = "DELETE FROM story
		          WHERE idstory = $idStory;";		
				$rs = mysqli_query($con, $sql);
				if ($rs) {
					// $sql = "UPDATE log_requisito set id_user = ".$_SESSION['id']."
					// 		WHERE idstory = $idStory and texto_story_new='STORY DELETADA';";	
					// $rs = mysqli_query($con, $sql);
		            header('Location: selecionar_req_alt_story.php?msg=del_success');
	    		} else {
	            	header('Location: selecionar_req_alt_story.php?msg=del_error');
      	  		}
			}
		}
	}

?>