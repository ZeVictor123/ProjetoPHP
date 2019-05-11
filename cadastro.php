<!DOCTYPE html>
<html>
<head>
	<title>Temperaturas</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" type="image/x-png" href="_imagens/icone.png">
	<link rel="stylesheet" type="text/css" href="_css/estiloss.css">
	<link rel="stylesheet" type="text/css" href="_css/cadastross.css">
</head>
<body>
	<?php error_reporting(0); ?>
	<nav>
		<center>
			<ul>
				<li><a href="temperaturas.php">Temperaturas</a></li>
				<li id="nesta"><a href="#" id="neste">Adicionar Temperatura</a></li>
				<li><a href="participantes.php">Participantes</a></li>
                <li><a href="dados.php">Dados do Projeto</a></li>
			</ul>
		</center>
		<img id="sair" src="_imagens/sair.png" onclick="sair()">
		<img id="org" src="_imagens/eeep.png">
	</nav>

	<main>

		<h2>Cadastro de Temperatura:</h2>
		<form action="cadastro.php" method="POST">
			<fieldset><legend>Informações</legend>
				<p><label for="data">Data: </label><input type="date" name="data" id="data"></p>
				<p><label for="tmanha">Temperatura da Manhã: </label><input type="text" name="tmanha" id="tmanha" placeholder="Digite uma Temperatura"></p>
				<p><label for="tMeioDia">Temperatura do Meio Dia: </label><input type="text" name="tMeioDia" id="tMeioDia" placeholder="Digite uma Temperatura"></p>
				<p><label for="ttarde">Temperatura da Tarde: </label><input type="text" name="ttarde" id="ttarde" placeholder="Digite uma Temperatura"></p>	
				<p><label for="descricao">Digite uma breve descrição (Exemplo: chuva, nublado, etc)</label></p>
				<center><textarea maxlength="100" id="descricao" name="descricao" cols="50" rows="10" placeholder="Digite o Comentário, este é Opcional"></textarea></center>
				<p id="obs">OBS: Não é necessário preeencher todos os campos</p>
				<center><p><input type="submit" onclick="acao()"><input type="reset" value="Resetar"></p></center>

			</fieldset>
		</form>
	</main>

	<?php
		if (!empty($_POST)){
			$data = $_POST["data"];
			$tt = $_POST["ttarde"];
			$tmd = $_POST["tMeioDia"];
			$tm = $_POST["tmanha"];
			$des = $_POST["descricao"];
			

			include_once("Conexao.php");
			if (!empty($tt) && !empty($tm) && !empty($tmd)) {
				$sql = "INSERT INTO tempo VALUES ('$data', $tm, $tmd, $tt, '$des')";
			}elseif (!empty($tt) && !empty($tm) && empty($tmd)) {
				$sql = "INSERT INTO tempo(dia, tManha, tTarde, descricao) VALUES ('$data', $tm, $tt, '$des')";
			}elseif (!empty($tt) && empty($tm) && !empty($tmd)) {
				$sql = "INSERT INTO tempo(dia, tTarde, tMeioDia, descricao) VALUES ('$data', $tt, $tmd, '$des')";
			}elseif (empty($tt) && !empty($tm) && !empty($tmd)) {
				$sql = "INSERT INTO tempo(dia, tManha, tMeioDia, descricao) VALUES ('$data', $tm, $tmd, '$des')";
			}elseif (empty($tt) && empty($tm) && !empty($tmd)) {
				$sql = "INSERT INTO tempo(dia, tMeioDia, descricao) VALUES ('$data', $tmd, '$des')";
			}elseif (empty($tt) && !empty($tm) && empty($tmd)) {
				$sql = "INSERT INTO tempo(dia, tManha, descricao) VALUES ('$data', $tm, '$des')";
			}elseif (!empty($tt) && empty($tm) && empty($tmd)) {
				$sql = "INSERT INTO tempo(dia, tTarde, descricao) VALUES ('$data', $tt, '$des')";
			}
			mysqli_query($con, $sql);
			reset($_POST);
		}		
	?>
	<script type="text/javascript">
		function sair() {
			window.location.href = "http://localhost/temperatura/index.php";
		}
	</script>
</body>
</html>