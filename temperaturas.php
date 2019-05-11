<!DOCTYPE html>
<html>
<head>
	<title>Temperaturas</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" type="image/x-png" href="_imagens/icone.png">
	<link rel="stylesheet" type="text/css" href="_css/estiloss.css">
</head>
<body>
	<nav>
		<center>
			<ul>
				<li id="nesta"><a id="neste" href="#">Temperaturas</a></li>
				<li><a href="cadastro.php">Adicionar Temperatura</a></li>
				<li><a href="participantes.php">Participantes</a></li>
                <li><a href="dados.php">Dados do Projeto</a></li>
			</ul>
		</center>
		<img id="sair" src="_imagens/sair.png" onclick="sair()">
		<img id="org" src="_imagens/eeep.png">
	</nav>

	<main>
		<h2>Tabela Termométrica da E.E.E.P Padre João Bosco de Lima</h2>
		<table>
			<tr>
				<td class="data">Data</td>
				<td class="manha">Manhã</td>
				<td class="meio">Meio Dia</td>
				<td class="tarde">Tarde</td>
				<td class="descricao">Descrição</td>
                <td class="up" colspan="2">Atualizações</td>
			</tr>

			<?php
				include_once("Conexao.php");
				$sql = "select * from tempo";
				$r = mysqli_query($con, $sql);
				if ($r) {
					while ($result = mysqli_fetch_array($r)) {
			?>
						<tr>
							<td class="pri"><?php echo $result["dia"]; ?></td>
							<td class="se"><?php echo $result["tManha"] . " °C"; ?></td>
							<td class="se"><?php echo $result["tMeioDia"] . " °C"; ?></td>
							<td class="se"><?php echo $result["tTarde"] . " °C"; ?></td>
							<td class="pri"><?php echo $result["descricao"]; ?></td>
                            <td class="editar"><a href="mudanca.php?dia=<?php echo $result["dia"] ?>"><img src="_imagens/lapis.png"></a></td>
                            <td class="excluir"><a href="temperaturas.php?dia=<?php echo $result["dia"] ?>"><img src="_imagens/lixeira.png"></a></td>
						</tr>			
			<?php
					}
				}
			?>

		</table>
	</main>
	<?php
		if (!empty($_GET["dia"])) {
			$d = $_GET["dia"];
			$sql = "DELETE FROM tempo WHERE dia = '$d'";
			$r = mysqli_query($con, $sql);
			reset($_GET);
		}
	?>

	<script type="text/javascript">
		function sair() {
			window.location.href = "http://localhost/temperatura/index.php";
		}
	</script>
</body>
</html>