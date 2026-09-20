<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Exercício 3</title>
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
		<h1 class="text-left" style="font-size: 20px;">Reajuste de preços:</h1>
		<form action="" method="post" class="mt-4">
			<div class="d-flex flex-column align-items-start gap-2 mb-3">
        <div class="d-flex align-items-center gap-2">
          <label for="preco">Preço:</label>
				  <input type="number" step="0.01" min="0" id="preco" name="preco" class="form-control me-2" style="width: 100px;" required>
        </div>
			</div>
			<button type="submit" class="btn btn-success" style="font-size: 20px;">Calcular</button>
		</form>
	</div>
	<?php
	$preco = $_POST['preco'] ?? 0;
	$reajuste = $preco * 0.15; // 15% de reajuste
  if ($preco > 100) {
	  $preco_reajustado = $preco + $reajuste;
  } else {
	  $preco_reajustado = $preco;
  }
	?>
	<div class="container mt-3">
		<h2 class="text-left" style="font-size: 20px;">Resultado: R$ <?php echo number_format($preco_reajustado, 2, ',', '.'); ?></h2>
	</div>
</body>

</html>