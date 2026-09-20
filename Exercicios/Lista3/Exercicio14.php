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
		<h1 class="text-left" style="font-size: 20px;">Verificar se uma palavra é um palíndromo:</h1>
		<form action="" method="post" class="mt-4">
			<div class="d-flex flex-column align-items-start gap-2 mb-3">
				<div class="d-flex align-items-center gap-2">
					<label for="palavra">Palavra:</label>
					<input type="text" id="palavra" name="palavra" class="form-control me-2" style="width: 200px;" required>
				</div>
			</div>
			<button type="submit" class="btn btn-success" style="font-size: 20px;">Calcular</button>
		</form>
	</div>
  <div class='container mt-3'>
    <h2 class='text-left' style='font-size: 20px;'>Resultado: </h2>
      <?php
      $palavra = $_POST['palavra'] ?? '';
      $palavraInvertida = strrev($palavra);
      $ehPalindromo = $palavra === $palavraInvertida;

      echo "<p class='text-left' style='font-size: 20px;'>Palavra original: '$palavra'</p>";
      echo "<p class='text-left' style='font-size: 20px;'>Palavra invertida: '$palavraInvertida'</p>";
      echo "<p class='text-left' style='font-size: 20px;'>É palíndromo: " . ($ehPalindromo ? 'Sim' : 'Não') . "</p>";
      ?>
  </div>
</body>

</html>