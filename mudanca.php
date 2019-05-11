<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Atualizar</title>
	<link rel="shortcut icon" type="image/x-png" href="_imagens/icone.png">
	<link rel="stylesheet" type="text/css" href="_css/cadastross.css">
	<link rel="stylesheet" type="text/css" href="_css/estiloss.css">
	<style type="text/css">
		body{
			background: none;
		}
		fieldset{
			width: 30%;
			margin-left: 35%;
		}
		input[type="submit"], input[type="reset"]{
			width: 7%;
		}
		h2{
			color: rgb(41, 115, 210);
		}
		img{
			position: fixed;
			top: .5%;
			left: .5%;
			width: 3%;
			opacity: .5;
			transition: all;
		}
		img:hover{
			opacity: 1;
		}
	</style>
</head>
<body>
	<?php error_reporting(0); ?>
	<a href="temperaturas.php"><img src="_imagens/seta-volta.png"></a>
	<center>
		<h2>Atualizador do Clima</h2>
		<?php
			
				$data = $_GET['dia'];
				include_once("Conexao.php");
				$sql = "SELECT * FROM tempo WHERE dia = '$data'";
				$r = mysqli_query($con, $sql);
				$result	= mysqli_fetch_array($r);
			
					
		?>
		<form action="mudanca.php" method="GET" id="form">
				<p><label for="data">Data: </label><input type="date" name="data" id="data" value="<?php echo $result["dia"] ?>" readonly="true"></p>
				<p><label for="tmanha">Temperatura da Manhã: </label><input type="text" name="tmanha" id="tmanha" placeholder="Digite uma Temperatura" value="<?php echo $result['tManha'] ?>"></p>
				<p><label for="tMeioDia">Temperatura do Meio Dia: </label><input type="text" name="tmeioDia" id="tmeioDia" placeholder="Digite uma Temperatura" value="<?php echo $result['tMeioDia'] ?>"></p>
				<p><label for="ttarde">Temperatura da Tarde: </label><input type="text" name="ttarde" id="ttarde" placeholder="Digite uma Temperatura" value="<?php echo $result['tTarde'] ?>"></p>	
				<textarea maxlength="100" id="descricao" name="descricao" cols="50" rows="10" placeholder="Digite o Comentário, este é Opcional"><?php echo $result['descricao'] ?></textarea>
				<p><input type="submit" value="Atualizar" onclick="acao()"><input type="reset" value="Resetar"></p>
		</form>

		<?php 
			if (isset($_GET["submit"])) {
				$data = $_GET["dia"];
				$tt = $_GET["ttarde"];
				$tmd = $_GET["tmeioDia"];
				$tm = $_GET["tmanha"];
				$des = $_GET["descricao"];
				if (!empty($tt) && !empty($tm) && !empty($tmd)) {
					$sql = "UPDATE tempo SET tManha = $tm, tMeioDia = $tmd, tTarde = $tt, descricao = '$des' WHERE dia = '$data'";
				}elseif (!empty($tt) && !empty($tm) && empty($tmd)) {
					$sql = "UPDATE tempo SET tManha = $tm, tTarde = $tt, descricao = '$des' WHERE dia = '$data'";
				}elseif (!empty($tt) && empty($tm) && !empty($tmd)) {
					$sql = "UPDATE tempo SET tMeioDia = $tmd, tTarde = $tt, descricao = '$des' WHERE dia = '$data'";
				}elseif (empty($tt) && !empty($tm) && !empty($tmd)) {
					$sql = "UPDATE tempo SET tManha = $tm, tMeioDia = $tmd, descricao = '$des' WHERE dia = '$data'";
				}elseif (empty($tt) && empty($tm) && !empty($tmd)) {
					$sql = "UPDATE tempo SET tMeioDia = $tmd, descricao = '$des' WHERE dia = '$data'";
				}elseif (empty($tt) && !empty($tm) && empty($tmd)) {
					$sql = "UPDATE tempo SET tManha = $tm, descricao = '$des' WHERE dia = '$data'";
				}elseif (!empty($tt) && empty($tm) && empty($tmd)) {
					$sql = "UPDATE tempo SET tTarde = $tt, descricao = '$des' WHERE dia = '$data'";
				}
				
				$r = mysqli_query($con, $sql);

				header('Location: temperaturas.php');
			}
		?>
	</center>
</body>
</html>