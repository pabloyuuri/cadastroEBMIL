<?php
	require_once 'Conexao.class.php';
	$conexao = new Conexao();
	$consulta = $conexao->conectar()->prepare("SELECT divsecao_post.DivSecao, nomeguerra_post.NomeGuerra
												 FROM nomeguerra_post 						
												 INNER JOIN divsecao_post
												 ON divsecao_post.id = nomeguerra_post.divsecao_ID
												 WHERE nomeguerra_post.divsecao_ID ='".$_POST['id']."'");
	$consulta->execute();
	
	if ($consulta) {
	    while($NomeGuerra = $consulta->fetch(PDO::FETCH_ASSOC)) {
	    	var_dump($NomeGuerra);
	    	echo '<option value="'.$NomeGuerra['NomeGuerra'].'">'.$NomeGuerra['NomeGuerra'] . '</option>'; 
	    }
	}

	else {
		echo "Algo deu errado";
	}

?>