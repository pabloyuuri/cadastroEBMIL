<?php
	require_once 'classes/Conexao.class.php';
	require_once 'classes/Cadastro.class.php';
	
	$objCadastro = new Cadastro();
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
					<form method="POST">					
						<!--- Campo DivSecao -->
						<tr>	
							<th scope="row">
								<div>
									<label>Divisão/Seção:</label>
								</div>
							</th>
							<td>
								<div>
									<select name="DivSecao" id="DivSecao">
										<option name="" value="">Escolha a Div/Seção </option>
										<?php
										require_once 'classes/Conexao.class.php';
										$conexao = new Conexao();
										$result = $conexao->conectar()->prepare("SELECT *FROM divsecao_post");
										$result->execute();
										while($ResultDados = $result->fetch(PDO::FETCH_ASSOC )) {
										echo '<option value="'.$ResultDados['id'].'">'.$ResultDados['DivSecao'].'</option>';
										}
										?>
									</select>
									<script>
									$("#DivSecao").on("change",function(){
									$.ajax({
										url: 'classes/NomeGuerraConsultaMil.php',
										type: 'POST',
										data:{id:$("#DivSecao").val()},
									beforeSend: function() {
										$("#NomeGuerra").css({'display':'block'});
										$("#NomeGuerra").html("Carregando...");
									},
									success: function(data) {
										$("#NomeGuerra").css({'display':'block'});
										$("#NomeGuerra").html(data);
									},	
									error: function(data) {
										$("#NomeGuerra").css({'display':'block'});
										$("#NomeGuerra").html("Houve um erro ao carregar");
									}
									});
									});
									</script>
								</div>
							</td>
						</tr>
							<!-- Campo Nome de Guerra -->
						<tr>
							<th scope="row">
								<div>
									<label>Nome de Guerra:</label>
								</div>
							</th>
							<td>
								<div>
									<span name="" class="carregando">Aguarde, carregando...</span>
									<select name="NomeGuerra" id="NomeGuerra" size="1">
										<option name="" value="">Escolha o Nome de Guerra</option>	
									</select>
								</div>
							</td>
						</tr>

						<!-- Campo Data -->
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
							<!-- Campo Horário Chegada -->
						<tr>
							<th scope="row">
								<div>
									<label>Horário de Chegada:</label>
								</div>
							</th>
							<td>
								<div>
									<input type="time" name="HrChegada"/>
								</div>
							</td>
						</tr>
						<!-- Campo Saída Almoço -->
						<tr>
							<th>
								<div>
									<label>Saída Almoço:</label>
								</div>
							</th>
							<td>
								<div>
									<input type="time" name="SaidaAlmoco"/>
								</div>
							</td>
						</tr>
							<!-- Campo Retorno Almoço -->
						<tr>
							<th scope="row">
								<div>
									<label>Retorno Almoço:</label>
								</div>
							</th>
							<td>
								<div>
									<input type="time" name="RetornoAlmoco"/>
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
							<!-- Botão Cadastrar -->
						<tr>
							<th> </th>
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