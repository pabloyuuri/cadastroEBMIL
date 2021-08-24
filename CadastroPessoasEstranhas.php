<?php
	require_once 'classes/Conexao.class.php';
	require_once 'classes/CadastroPessoasEstranhas.class.php';
	
	$objCadastro = new CadastroPessoasEstranhas();
	if(isset($_POST['CadastrarPessoasEstranhas'])) {
	   	if($objCadastro->QueryInsertOrUpdate($_POST) == 'ok') {
	       
	    }
	}
	else {
		
	}
  
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/formularios.css" media="screen" />
	<script type="text/javascript" src="jquery.js"></script>
	<style type="text/css">
		.carregando{
			color:#ff0000;
			display:none;
		}
	</style>
</head>
<body>
	<table id="formularios">
		<tr>
			<th>
				<div>
					<form method="POST">					
						<!--- Campo Nome Pessoa Estranha -->
						<tr>	
							<th scope="row">
								<div>
									<label>Nome:</label>
								</div>
							</th>
							<td>
								<div>
									<input type="text" name="nome">
								</div>
							</td>
						</tr>
							<!-- Campo N° Indentidade -->
						<tr>
							<th scope="row">
								<div title="rg">
									<label>N° Identificação</label>
								</div>
							</th>
							<td>
								<div>
									<input type="number" name="rg">
								</div>
							</td>
						</tr>

						<!-- Campo Orgão Expedidor -->
						<tr>
							<th scope="row">
								<div>
									<label>Orgão Expedidor</label>
								</div>
							</th>
							<td>
								<div>
									<input type="text" name="OrgaoExpedidor"/>
								</div>
							</td>
						</tr>
						
						<!-- Campo data -->
						<tr>
							<th scope="row">
								<div>
									<label>data:</label>
								</div>
							</th>
							<td>
								<div>
									<input type="date" name="data"/>
								</div>
							</td>
						</tr>
							
							<!-- Campo Horário Chegada -->
						<tr>
							<th scope="row">
								<div>
									<label>Horário de Entrada:</label>
								</div>
							</th>
							<td>
								<div>
									<input type="time" name="HrEntrada"/>
								</div>
							</td>
						</tr>
						
							<!-- Campo Horário Saída -->
						<tr>
							<th scope="row">
								<div>
									<label>Horário de Saída:</label>
								</div>
							</th>
							<td >
								<div>
									<input type="time" name="HrSaida"/>
								</div>
							</td>
						</tr>
						<tr>
							<th scope="row">
								<div>
									<label>Destino:</label>
								</div>
							</th>
							<td >
								<div>
									<input type="text" name="destino"/>
								</div>
							</td>
						</tr>
						<tr>
							<th scope="row">
								<div>
									<label>Falar com:</label>
								</div>
							</th>
							<td >
								<div>
									<input type="text" name="FalarCom"/>
								</div>
							</td>
						</tr>
						<tr>
							<th>
								<a href="pages/CadastrosRecentesPessoasEstranhas.php" style="color: black; font-family: monospace;" target="_blank" class="CadastrosSvRecentes">Cadastros Recentes
							</a>
							 </th>
							<td>
								<input type="submit" name="CadastrarPessoasEstranhas" value="Cadastrar" id="BotaoCadastrar">
							</td>
						</tr>
					</form>
				</div>
			<th>
		</tr>
	</table>
</body>
</html>