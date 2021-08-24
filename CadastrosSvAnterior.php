<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css" media="screen" />
</head>
<body style="position: absolute; left: 30%; background-color:#3368ad; font: Arial, 12px; color: white;">
	<h2>Relatório de Entradas de Militares do Serviço de Ontem - CMF  </h2>
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
require_once '../classes/Conexao.class.php';
$conexao = new Conexao();
$select = $conexao->conectar()->prepare("SELECT *FROM controlemil_table WHERE data = (SELECT CURRENT_DATE() - 01 ) ");
$select->execute();
if ($select) {
	    while($CadastrosRecentes = $select->fetch(PDO::FETCH_ASSOC)) {
	    	echo "<tr> ";
	      	echo "<td>".$CadastrosRecentes['NomeGuerra']."</td>";
			echo "<td>".$CadastrosRecentes['DivSecao']."</td>";
			echo "<td>".$CadastrosRecentes['data']."</td>";
			echo "<td>".$CadastrosRecentes['HrChegada']."</td>";
			echo "<td>".$CadastrosRecentes['SaidaAlmoco']."</td>";
			echo "<td>".$CadastrosRecentes['RetornoAlmoco']."</td>";
			echo "<td>".$CadastrosRecentes['HrSaida']."</td>";
			echo "</tr>";
	    }
	}
?>