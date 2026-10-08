<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cadatro de Alunos</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
		crossorigin="anonymous"></script>

	<?php
		require_once "../database/conexao.php";
	?>

	<div class="container py-3">
	<a href="../" class="btn btn-primary">Voltar</a>
		<h1>Cadastro de alunos</h1>
		<form action="" method="post">
			<div class="mb-3">
				<label for="nome">Nome:</label>
				<input type="text" name="nome" id="nome">
			</div>
			<br>
			<div class="mb-3">
				<label for="ra">RA:</label>
				<input type="number" name="ra" id="ra">
			</div>
			<br>
			<input type="submit" value="Cadastrar">
		</form>
		<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$nome = $_POST["nome"] != '' ? $_POST["nome"] : null;
			$ra = $_POST["ra"] != '' ? $_POST["ra"] : null;

			$sql = "INSERT INTO alunos (nome, ra) VALUES (:nome, :ra)";

			$resultado = $con->prepare($sql);
			$resultado->bindParam(':nome', $nome);
			$resultado->bindParam(':ra', $ra);

			if ($resultado->execute()) {
				echo "<p>Aluno cadastrado com sucesso!</p>";
			} else {
				echo "<p>Erro ao cadastrar aluno.</p>";
			}
		}
		?>
	</div>
</body>

</html>