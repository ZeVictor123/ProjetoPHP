<!DOCTYPE html>
<html>
<head>
	<title>Entrar</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" type="image/x-png" href="_imagens/icone.png">
	<link rel="stylesheet" type="text/css" href="_css/index.css">
</head>
<body>
	<?php error_reporting(0); ?>
	<div id="titulo">
		<h1>Temperatura Local</h1>
	</div>

	<div id="login">
			<center><h1>Faça seu Login:</h1></center>
			<form action="index.php" method="POST">
				<p><label for="nome">Nome:</label></p>
				<p><input type="text" name="nnome" id="nnome" required="true" placeholder="Digite seu Nome"></p>
				<p><label for="senha">Senha:</label></p>
				<p><input type="password" name="nsenha" id="nsenha" required="true" placeholder="Digite sua Senha"></p>
				<center><input type="submit" value="Entrar"></center>
			</form>
	</div>

	<div id="rodape">
		<div></div>
	</div>
	<?php
		if(!empty($_POST)){
			$nom = $_POST["nnome"];
			$sen = $_POST["nsenha"];

			include_once("Conexao.php");
			$sql = "select * from usuario";
			$r = mysqli_query($con, $sql);
			if ($r) {
				while ($result = mysqli_fetch_array($r)) {
					if ($result["nick"] == $nom && $result["senha"] == $sen) {
						header("Location: temperaturas.php");
					}
				}
			}
		}
	?>
</body>
</html>
