<!doctype html>
<html lang="pt-BR">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Exemplo de Funções em PHP</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
	<div class="container py-3">
		<h1>Exemplo de Funções em PHP</h1>
		<form method="post">
			<div class="mb-3">
				<label for="nome" class="form-label">Informe seu nome:</label>
				<input type="text" id="nome" name="nome" class="form-control" required="">
			</div>
			<div class="mb-3">
				<label for="idade" class="form-label">Informe a sua idade:</label>
				<input type="number" id="idade" name="idade" class="form-control" required="">
			</div>
			<button type="submit" class="btn btn-primary">Enviar</button>
		</form>

		<?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$nome = $_POST['nome'] ?? "";
			$idade = $_POST['idade'] ?? 0;
			if ($nome != "" && $idade != 0) {
				$qtde = strlen($nome);
				echo "<p>Qtde de caracteres do nome: $qtde</p>";
				echo "<p>Maiúsculo do nome: " . strtoupper($nome) . "</p>";
				$s = str_replace("a","4", $nome);
				echo "<p>Substituição de 'a' por '4': $s</p>";
				date_default_timezone_set('America/Sao_Paulo');
				$dia = date("d");
				echo "<p>Dia: $dia</p>";
				$mes = date("m");
				echo "<p>Mês: $mes</p>";
				$tempo = date("d/m/y H:i:s");
				echo "<p>Data e hora: $tempo</p>";

				$exp = pow($idade, 2);
				echo "<p>Exponencial: $exp</p>";
				$valor = rand(1, 10);
				echo "<p>Valor aleatório: $valor</p>";

				$resultado = 10.34 * 2.9;
				echo "<p>Resultado: $resultado</p>";
				$resultado = number_format($resultado,2,",",".");
				echo "<p>Resultado formatado: $resultado</p>";
			}
		}
		?>
</body>

</html>