<!DOCTYPE html>
<html>
<head>
	<title>Temperaturas</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" type="image/x-png" href="_imagens/icone.png">
	<link rel="stylesheet" type="text/css" href="_css/estiloss.css">
	<link rel="stylesheet" type="text/css" href="_css/participantes.css">
</head>
<body>
	<?php error_reporting(0) ?>
	<nav>
		<center>
			<ul>
				<li><a href="temperaturas.php">Temperaturas</a></li>
				<li><a href="cadastro.php">Adicionar Temperatura</a></li>
				<li id="nesta"><a id="neste" href="#">Participantes</a></li>
                <li><a href="dados.php">Dados do Projeto</a></li>
			</ul>
		</center>
		<img id="sair" src="_imagens/sair.png" onclick="sair()">
		<img id="org" src="_imagens/eeep.png">
	</nav>

	<main>
		<?php
			include_once("Conexao.php");
			$sql = "select * from participantes";
			$r = mysqli_query($con, $sql);
			if (!empty($r)) {
		?>
				<h2>Participaram do Projeto:</h2>
		<?php		
				while ($result = mysqli_fetch_array($r)) {
		?>
					<table>
						<tr>
							<td class="nome"><?php echo $result["nome"] . ' ' . $result["sobreNome"]; ?></td>
							<td class="matricula"><?php echo $result["matricula"]; ?></td>
						</tr>
			            <tr>
			                <td colspan = "2" class="desc"><i><?php echo '"' . $result["descricao"] .'"'; ?></i></td>
			            </tr>
					</table>
		<?php
				}
			}
		?>
		
		
	


		<h2>Cadastre-se no Projeto:</h2>
		<form method="POST" action="participantes.php">
			<fieldset><center><h3>Formulário</h3></center>
				<p>
					<label for="nome">Nome:</label>
					<input type="text" name="nome" id="nome" placeholder="Digite sue Nome" maxlength="20" minlength="1">
				</p>
				<p>
					<label for="sobre">Sobrenome:</label>
					<input type="text" name="sobreNome" id="sobre" placeholder="Digite seu Sobrenome" maxlength="20" minlength="1">
				</p>
				<p>
					<label for="matricula">Matricula:</label>
					<input type="number" name="matricula" id="matricula" maxlength="7" minlength="7">
				</p>
				<center><textarea maxlength="100" id="descricao" name="descricao" cols="50" rows="10" placeholder="Digite uma Descrição de sua Participação"></textarea></center>
				<center><p><input type="submit" onclick="acao()"><input type="reset" value="Resetar"></p></center>
			</fieldset>	
		</form>

	</main>

	<?php
		if (!empty($_POST)){
			$nome = $_POST["nome"];
			$sobren = $_POST["sobreNome"];
			$mat = $_POST["matricula"];
			$des = $_POST["descricao"];
			include_once("Conexao.php");
			$sql = "INSERT INTO participantes VALUE ('$mat', '$nome', '$sobren', '$des')";
			mysqli_query($con, $sql);
			header("Location: participantes.php");
		}		
	?>

	<script type="text/javascript">
		function sair() {
			window.location.href = "http://localhost/temperatura/index.php";
		}
	</script>
</body>
</html>