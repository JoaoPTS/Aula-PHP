<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Exercício 2</title>
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
		<h1 class="text-left" style="font-size: 20px;">Ordenação de 2 números:</h1>
		<form action="" method="post" class="mt-4">
			<div class="d-flex flex-column align-items-start gap-2 mb-3">
        <div class="d-flex align-items-center gap-2">
          <label for="num1">Número 1:</label>
				  <input type="number" id="num1" name="num1" class="form-control me-2" style="width: 100px;" required>
        </div>
        <div class="d-flex align-items-center gap-2">
          <label for="num2">Número 2:</label>
				<input type="number" id="num2" name="num2" class="form-control" style="width: 100px;" required>
        </div>
			</div>
			<button type="submit" class="btn btn-success" style="font-size: 20px;">Calcular</button>
		</form>
	</div>
	<?php
	$num1 = $_POST['num1'] ?? 0;
	$num2 = $_POST['num2'] ?? 0;

	?>
	<div class="container mt-3">
		<h2 class="text-left" style="font-size: 20px;">Resultado: <?php if ($num1 > $num2) { echo " $num1, $num2 "; } else if ($num2 > $num1) { echo " $num2, $num1 "; } else { echo " Números iguais($num1) "; } ?></h2>
	</div>
</body>

</html>