<?php
	require_once 'classes/Conexao.class.php';
	require_once 'classes/CadastroViaturasMil.class.php';
	
	$objCadastro = new CadastroVtrMil();
	if(isset($_POST['CadastrarViaturaMil'])) {
	   	if($objCadastro->QueryInsertOrUpdate($_POST) == 'ok') {
	      
	        	
	    }
	}
	else {
		
	}
  
?>
<!DOCTYPE html>
<head>
	<title>Controle de Militares - CMF</title>
	<link rel="stylesheet" type="text/css" href="css/formularios.css" media="screen" />
</head>
<body>
	<table id="formularios">
		<form method="POST">
			<tr>
				<th>
					Motorista:
				</th>
				<td>
					<select name="NomeGuerraMotorista" id="NomeGuerraMotorista">
								<option name="" value="">Escolha o Motorista </option>
								<?php
									require_once 'classes/Conexao.class.php';
									$conexao = new Conexao();
									$result = $conexao->conectar()->prepare("SELECT NomeGuerraMotorista FROM motoristas_post");
									$result->execute();
									while($ResultDados = $result->fetch(PDO::FETCH_ASSOC )) {
										echo '<option value="'.$ResultDados['NomeGuerraMotorista'].'">'.$ResultDados['NomeGuerraMotorista'].'</option>';
									}
								?>
					</select>	
				</td>
			</tr>
			


			<tr>
				<th>
					Chefe de Viatura:
				</th>
				<td>
					<input type="text" name="NomeGuerraCHVtr">	
				</td>
			</tr>
			<tr>
				<th>
					Viatura:
				</th>
				<td>
					<input type="text" name="Viatura">	
				</td>
			</tr>
			<tr>
				<th>
					Data:
				</th>
				<td>
					<input type="date" name="data">	
				</td>
			</tr>

			<tr>
				<th>
				Odometro Saída:
				</th>
				<td>
					<input type="number" name="OdometroSaida"/> <br> 
				</td>
			</tr>

			<tr>
				<th>
				Odometro Entrada:
				</th>
				<td>
					<input type="number" name="OdometroEntrada"/> <br> 
				</td>
			</tr>
			<tr>
				<th>
				Horário Saída:
				</th>
				<td>
					<input type="time" name="HrSaida"></br>
				</td>
			</tr>
			<tr>
				<th>
				Horário Entrada:
				</th>
				<td>
					<input type="time" name="HrEntrada">
				</td>
			</tr>

			<tr>
				<th>
				Destino:
				</th>
				<td>
					<input type="text" name="destino">
				</td>
			</tr>
			<tr>
				<th>
					<a href="pages/CadastrosRecentesViaMil.php" style="color: black; font-family: monospace;" target="_blank" class="CadastrosSvRecentes">Cadastros Recentes
					</a> 
				</th> 
				<td>
					<input type="submit" value="Cadastrar" name="CadastrarViaturaMil">
				</td>
			</tr>
		</form>
	</table>
</body>
</html>