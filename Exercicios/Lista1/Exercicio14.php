<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Exercício 14</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
		crossorigin="anonymous"></script>
	<nav class="navbar navbar-light bg-light">
		<a class="btn btn-primary ms-3" href="/index.php">Voltar para a Página Principal</a>
	</nav>
	<div class="container mt-5">
		<h1 class="text-left" style="font-size: 20px;">Cálculo do IMC:</h1>
		<form action="" method="post" class="mt-4">
			<div class="d-flex flex-column align-items-start gap-2 mb-3">
				<div class="d-flex align-items-center gap-2">
					<label for="peso">Peso (kg):</label>
					<input type="number" step="0.01" min="0.01" id="peso" name="peso" class="form-control" style="width: 100px;" required>
				</div>
				<div class="d-flex align-items-center gap-2">
					<label for="altura">Altura (m):</label>
					<input type="number" step="0.01" min="0.01" id="altura" name="altura" class="form-control" style="width: 100px;" required>
				</div>
			</div>
			<button type="submit" class="btn btn-success" style="font-size: 20px;">Calcular</button>
		</form>
	</div>
	<?php
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$peso = (float) $_POST['peso'];
		$altura = (float) $_POST['altura'];
		$imc = $peso / ($altura ** 2);

		$classificacoes = [];
		foreach ([
			'Homens' => [20, 25, 30, 35, 40],
			'Mulheres' => [19, 24, 29, 34, 39]
		] as $genero => $limites) {
			if ($imc < $limites[0]) {
				$classificacoes[$genero] = 'Abaixo do peso';
			} elseif ($imc < $limites[1]) {
				$classificacoes[$genero] = 'Peso normal';
			} elseif ($imc < $limites[2]) {
				$classificacoes[$genero] = 'Sobrepeso';
			} elseif ($imc < $limites[3]) {
				$classificacoes[$genero] = 'Obesidade grau I';
			} elseif ($imc < $limites[4]) {
				$classificacoes[$genero] = 'Obesidade grau II';
			} else {
				$classificacoes[$genero] = 'Obesidade grau III';
			}
		}
	?>
	<div class="container mt-3">
		<h2 class="text-left" style="font-size: 20px;">Resultado: <?php echo 'IMC = ' . number_format($imc, 2, ',', '.'); ?></h2>
		<?php foreach ($classificacoes as $genero => $classificacao): ?>
			<p>Classificação para <?php echo $genero; ?>: <strong><?php echo $classificacao; ?></strong></p>
		<?php endforeach; ?>
	</div>
	<?php } ?>
</body>

</html>