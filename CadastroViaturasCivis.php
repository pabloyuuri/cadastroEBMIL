<?php
	require_once 'classes/Conexao.class.php';
	require_once 'classes/CadastroViaturasCivis.class.php';
	
	$objCadastro = new CadastroVtrCivis();
	if(isset($_POST['Cadastrar'])) {
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
					<form action="" method="POST">					
							<!-- Campo Nome do Motorista -->
						<tr>
							<th scope="row">
								<div>
									<label>Motorista:</label>
								</div>
							</th>
							<td>
								<div>
									<input type="text" name="NomeMotorista">
								</div>
							</td>
						</tr>

						<!-- Campo rg -->
						<tr>
							<th scope="row">
								<div>
									<label>N° Identif:</label>
								</div>
							</th>
							<td>
								<div>
									<input type="number" name="rg"/>
								</div>
							</td>
						</tr>
							<!-- Campo Orgão Expedidor -->
						<tr>
							<th scope="row">
								<div>
									<label>Orgão Expedidor:</label>
								</div>
							</th>
							<td>
								<div>
									<input type="text" name="OrgaoExpedidor"/>
								</div>
							</td>
						</tr>

						<tr>
							<th scope="row">
								<div>
									<label>Data:</label>
								</div>
							</th>
							<td>
								<div>
									<input type="date" name="data"/>
								</div>
							</td>
						</tr>


						<!-- Campo Veículo -->
						<tr>
							<th>
								<div>
									<label>Veículo:</label>
								</div>
							</th>
							<td>
								<div>
									<input type="text" name="veiculo"/>
								</div>
							</td>
						</tr>
							<!-- Campo Placa do Veículo -->
						<tr>
							<th scope="row">
								<div>
									<label>Placa:</label>
								</div>
							</th>
							<td>
								<div>
									<input type="text" name="placa"/>
								</div>
							</td>
						</tr>
							<!-- Campo Horário Entrada -->
						<tr>
							<th scope="row">
								<div>
									<label>Horário de Entrada:</label>
								</div>
							</th>
							<td >
								<div>
									<input type="time" name="HrEntrada"/>
								</div>
							</td>
						</tr>

							<!-- Campo Horário de Saída -->
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

							<!-- Campo destino -->

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

							<!-- Botão Cadastrar -->
						<tr>
							<th>
								<a href="pages/CadastrosRecentesViaCivis.php" style="color: black; font-family: monospace;" target="_blank" class="CadastrosSvRecentes">Cadastros Recentes
								</a> 
							</th> 
							<td>
								<input type="submit" name="Cadastrar" value="Cadastrar" id="BotaoCadastrar">
							</td>
						</tr>
					</form>
				</div>
			<th>
		</tr>
	</table>
</body>
</html>