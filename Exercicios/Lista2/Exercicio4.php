<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Exercício 4</title>
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
		<h1 class="text-left" style="font-size: 20px;">Mês por extenso:</h1>
		<form action="" method="post" class="mt-4">
			<div class="d-flex flex-column align-items-start gap-2 mb-3">
        <div class="d-flex align-items-center gap-2">
          <label for="mes">Mês:</label>
				  <input type="number" min="1" max="12" id="mes" name="mes" class="form-control me-2" style="width: 100px;" required>
        </div>
			</div>
			<button type="submit" class="btn btn-success" style="font-size: 20px;">Calcular</button>
		</form>
	</div>
	<?php
	$mes = $_POST['mes'] ?? 1;
  switch ($mes) {
    case 1:
      $nome_mes = "Janeiro";
      break;
     case 2:
      $nome_mes = "Fevereiro";
      break;
     case 3:
      $nome_mes = "Março";
      break;
     case 4:
      $nome_mes = "Abril";
      break;
     case 5:
      $nome_mes = "Maio";
      break;
     case 6:
      $nome_mes = "Junho";
      break;
     case 7:
      $nome_mes = "Julho";
      break;
     case 8:
      $nome_mes = "Agosto";
      break;
     case 9:
      $nome_mes = "Setembro";
      break;
     case 10:
      $nome_mes = "Outubro";
      break;
     case 11:
      $nome_mes = "Novembro";
      break;
     case 12:
      $nome_mes = "Dezembro";
      break;
    default:
      $nome_mes = "Mês inválido";
  }
	?>
	<div class="container mt-3">
		<h2 class="text-left" style="font-size: 20px;">Resultado: <?php echo $nome_mes; ?></h2>
	</div>
</body>

</html>