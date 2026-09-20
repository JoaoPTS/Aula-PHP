<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Exercício 12</title>
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
		<h1 class="text-left" style="font-size: 20px;">Gerar uma senha aleatória:</h1>
    <form action="" method="post" class="mt-4">
      <button type="submit" class="btn btn-success" style="font-size: 20px;">Gerar</button>
	</div>
  <div class='container mt-3'>
    <h2 class='text-left' style='font-size: 20px;'>Resultado: </h2>
    <?php
      function gerarSenhaAleatoria() {
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_+-=';
        $senha = '';
        for ($i = 0; $i < 8; $i++) {
            $senha .= $caracteres[rand(0, strlen($caracteres) - 1)];
        }
        return $senha;
      }

      echo "<p class='text-left' style='font-size: 20px;'>Senha aleatória gerada: " . gerarSenhaAleatoria() . "</p>";
    ?>
  </div>
</body>

</html>