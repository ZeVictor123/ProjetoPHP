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
				<li><a href="temperaturas.php">Temperaturas</a></li>
				<li><a href="cadastro.php">Adicionar Temperatura</a></li>
				<li><a href="participantes.php">Participantes</a></li>
                <li id="nesta"><a href="#" id="neste">Dados do Projeto</a></li>
			</ul>
		</center>
		<img id="sair" src="_imagens/sair.png" onclick="sair()">
		<img id="org" src="_imagens/eeep.png">
	</nav>

	<main>
		<h2>Resultados Práticos do Projeto</h2>
		<center>
			<h3>Manhã</h3>
			<table>
				<tr id="man">
					<td>Média</td>
					<td>Maior Temperatura</td>
					<td>Menor Temperatura</td>
					<td>Amplitude Geral</td>
                    <td>Quantidade de dias</td>
				</tr>

				<?php
					include_once("Conexao.php");
					$sql = 'select avg(tManha) as media, max(tManha) as maxima, min(tManha) as minima, max(tManha) -  min(tManha) as amplitude from tempo';
					$sql2 = ' select count(dia) as dias from tempo where tManha <> ""';
					$r = mysqli_query($con, $sql);
					$r2 = mysqli_query($con, $sql2);
					if ($r) {
						if ($result = mysqli_fetch_array($r)) {
							if ($result2 = mysqli_fetch_array($r2)) {
				?>
								<tr>
									<td class="pri"><?php echo round($result["media"], 2) . " °C"; ?></td>
									<td class="se"><?php echo $result["maxima"] . " °C"; ?></td>
									<td class="pri"><?php echo $result["minima"] . " °C"; ?></td>
									<td class="se"><?php echo $result["amplitude"] . " °C"; ?></td>
	                                <td class="pri"><?php echo $result2["dias"] ?></td>
								</tr>			 
				<?php
							}
						}
					}
				?>

			</table>

			<h3>Meio Dia</h3>
			<table>
				<tr id="meio">
					<td>Média</td>
					<td>Maior Temperatura</td>
					<td>Menor Temperatura</td>
					<td>Amplitude Geral</td>
                    <td>Quantidade de dias</td>
				</tr>

				<?php
					include_once("Conexao.php");
					$sql = 'select avg(tMeioDia) as media, max(tMeioDia) as maxima, min(tMeioDia) as minima, max(tMeioDia) -  min(tMeioDia) as amplitude from tempo';
					$sql2 = 'select count(dia) as dias from tempo where tMeioDia <> ""';
					$r = mysqli_query($con, $sql);
					$r2 = mysqli_query($con, $sql2);
					if ($r) {
						if ($result = mysqli_fetch_array($r)) {
							if ($result2 = mysqli_fetch_array($r2)) {
				?>
								<tr>
									<td class="pri"><?php echo round($result["media"], 2) . ' °C'; ?></td>
									<td class="se"><?php echo $result["maxima"] . ' °C'; ?></td>
									<td class="pri"><?php echo $result["minima"] . ' °C'; ?></td>
									<td class="se"><?php echo $result["amplitude"] . ' °C'; ?></td>
	                                <td class="pri"><?php echo $result2["dias"] ?></td>
								</tr>			 
				<?php
							}
						}
					}
				?>

			</table>

			<h3>Tarde</h3>
			<table>
				<tr id="tar">
					<td>Média</td>
					<td>Maior Temperatura</td>
					<td>Menor Temperatura</td>
					<td>Amplitude Geral</td>
                    <td>Quantidade de dias</td>
				</tr>

				<?php
					include_once("Conexao.php");
					$sql = 'select avg(tTarde) as media, max(tTarde) as maxima, min(tTarde) as minima, max(tTarde) -  min(tTarde) as amplitude from tempo';
					$sql2 = ' select count(dia) as dias from tempo where tTarde <> ""';
					$r = mysqli_query($con, $sql);
					$r2 = mysqli_query($con, $sql2);
					if ($r) {
						if ($result = mysqli_fetch_array($r)) {
							if ($result2 = mysqli_fetch_array($r2)) {
				?>
								<tr>
									<td class="pri"><?php echo round($result["media"], 2) . " °C"; ?></td>
									<td class="se"><?php echo $result["maxima"] . " °C"; ?></td>
									<td class="pri"><?php echo $result["minima"] . " °C"; ?></td>
									<td class="se"><?php echo $result["amplitude"] . " °C"; ?></td>
	                                <td class="pri"><?php echo $result2["dias"] ?></td>
								</tr>			 
				<?php
							}
						}
					}
				?>

			</table>
		</center>
	</main>
	<script type="text/javascript">
		function sair() {
			window.location.href = "http://localhost/temperatura/index.php";
		}
	</script>
</body>
</html>