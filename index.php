<?php
require_once 'classes/Conexao.class.php';
require_once 'classes/Cadastro.class.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>Controle de Militares - CMF</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css" media="screen" />
	<script type="text/javascript" src="jquery.js"></script>
	<style type="text/css">
		.carregando{
			color:#ff0000;
			display:none;
		}
	</style>
</head>
<body>
	

	<header>
		<div id="BackgroundAzul">
			<div id="ControleMil"><b>CONTROLE DE MILITARES</b></div>
			<div id="TopoCMF">
				<div id="LogoCMF"><img src="imgs/logo_cmf.png"></div>
				<div id="textos">
					<div id="eb">EXÉRCITO BRASILEIRO</div>
					<div id="cmf"><b>Colégio Militar de Fortaleza</b></div>
					<div id="CasaEudoroCorrea">CASA DE EUDORO CORRÊA</div>
				</div>
			</div>
		</div>
		<div id="BackgroundVermelho">
			<div id="CadastrosSV">
		       	<a href="pages/CadastrosRecentes.php" target="_blank" class="CadastrosSvRecentes">Cadastros Recentes</a> 
		       	|
		       	<a href="pages/CadastrosSvAnterior.php" target="_blank" class="CadastrosSvAnterior">Cadastros SV Anterior</a>
			</div>
		</div>
	</header>
	

	<!-- Tipo de Cadastro -->
	<div id="formularios">
		<table id="formularios">
			<tr>
				<tr>
					<td>
						<div id="formularios">
								<?php echo "<a href='index.php?a=pages/ControleMil.php'/><button style='background: #067362; border-radius: 6px; padding: 7px; cursor: pointer; color: #fff; border: none; font-size: 16px;'>Militares</button></a>"; ?>
								
								<?php echo "<a href='index.php?a=pages/CadastroViaturasMil.php''><button style='background: #067362; border-radius: 6px; padding: 7px; cursor: pointer; color: #fff; border: none; font-size: 16px;'>Viaturas Militares</button></a>"; ?>
								
								
								<?php echo "<a href='index.php?a=pages/CadastroPessoasEstranhas.php''><button style='background: #067362; border-radius: 6px; padding: 7px; cursor: pointer; color: #fff; border: none; font-size: 16px;'>Pessoas Estranhas </button></a>"; ?>
								
								<?php echo "<a href='index.php?a=pages/CadastroViaturasCivis.php''><button style='background: #067362; border-radius: 6px; padding: 7px; cursor: pointer; color: #fff; border: none; font-size: 16px;'>Viaturas Civis</button></a>"; ?>
								
								
								<?php
									@$pagina = $_GET['a'];
									
									if (isset($pagina)) {
										include $pagina;
									}
									else {
										
									}
							?>
						</div>
					</td>
				</tr>
					
		</table>
					</th>
					<th id="BotoesTipoCadastro">
					</th >
					<th id="BotoesTipoCadastro">
					</th>
					<th id="BotoesTipoCadastro">
					</th>
			</tr>
		</table>
	</div>
	

	
<?php 
/*
<footer>
	<table id="FormularioRelatorio">
		<form id="RelatorioMilitares" method="POST" action="pages/RelatorioMilitares.php" target="_blank">
			<!--- Campo Nome de Guerra -->
			<div id="RelatorioMilitaresTitulo">
				<h2>Relatório de Militares</h2>
			</div>
			<!-- Campo DivSecao -->
			<tr>	
				<th data-label="DivSecao" scope="row">
					<div title="DivSecao">
						<label>Divisão/Seção:</label>
					</div>
				</th>
				<td>
					<div>
						<select name="DivSecao" id="DivSecaoRel">
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
							$("#DivSecaoRel").on("change",function(){

							$.ajax( {
								url: 'classes/NomeGuerraConsulta.php',
								type: 'POST',
								data:{id:$("#DivSecaoRel").val()},
							beforeSend: function() {
								$("#NomeGuerraRel").css({'display':'block'});
								$("#NomeGuerraRel").html("Carregando...");
							},
							success: function(data) {
								$("#NomeGuerraRel").css({'display':'block'});
								$("#NomeGuerraRel").html(data);
							},
							error: function(data) {
								$("#NomeGuerraRel").css({'display':'block'});
								$("#NomeGuerraRel").html("Houve um erro ao carregar");
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
					<div title="NomeGuerra">
						<label>Nome de Guerra:</label>
					</div>
				</th>
				<td>
					<div>
						<span name="" class="carregando">Aguarde, carregando...</span>
						<select name="NomeGuerra" id="NomeGuerraRel" size="1">
							<option name="" value="">Escolha o Nome de Guerra</option>	
						</select>
					</div>
				</td>
			</tr>
			<!-- Campo data -->
			<tr>
				<th scope="row">
					<div>
						<label>Data(mês):</label>
					</div>
				</th>
				<td>
					<div>
						<input type="date" name="data"/>
					</div>
				</td>
			</tr>
			<!-- Botão Consultar -->
			<tr>
				<th>
				</th>
				<td>
					<input type="submit" name="RelatorioMil" value="Consultar" class="ButtonRel">
				</td>
			</tr>
		</form>
	</table>
	</footer>  
	*/
	?>
</body>
</html>