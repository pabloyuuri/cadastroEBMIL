<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h2>Relatório de Entrada de Militares - CMF  </h2>
	<table border="1" style='width:50%'>
 	<tr>
 		<th>NOME DE GUERRA</th>
 		<th>DIV/SEÇÃO</th>
 		<th>DATA</th>
 		<th>HORÁRIO CHEGADA</th>
 		<th>SAIDA ALMOÇO</th>
 		<th>RETORNO ALMOÇO</th>
 		<th>HORÁRIO SAÍDA</th>
 	</tr>

</body>
</html>
<?php
	require_once 'Conexao.class.php';
		
		$conexao = new Conexao();
		$ExecuteSelect = $conexao->conectar()->prepare("SELECT *FROM `controlemil_table` WHERE NomeGuerra = '".$_POST['NomeGuerra']."' AND MONTH(data) = MONTH('".$_POST['data']."')  ;");
	    $ExecuteSelect->execute();
		if ($ExecuteSelect) {
		    while($relatorio = $ExecuteSelect->fetch(PDO::FETCH_ASSOC)) {
    				echo "<tr> ";
	      			echo "<td>".$relatorio['NomeGuerra']."</td>";
				    echo "<td>".$relatorio['DivSecao']."</td>";
				    echo "<td>".$relatorio['data']."</td>";
				    echo "<td>".$relatorio['HrChegada']."</td>";
				    echo "<td>".$relatorio['SaidaAlmoco']."</td>";
				    echo "<td>".$relatorio['RetornoAlmoco']."</td>";
				    echo "<td>".$relatorio['HrSaida']."</td>";
				    echo "</tr>";
			}
		}

		else {
			echo "Algo deu errado";
		}

       
	
	

?>