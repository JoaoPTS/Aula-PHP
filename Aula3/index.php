<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Lista de Alunos</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
		crossorigin="anonymous"></script>

	<?php
		require_once "database/conexao.php";
	?>

	<div class="container py-3"></div>
    <h1>Lista de alunos</h1>
    <?php      
        $sql = "SELECT * FROM alunos";
        $resultado = $con->query($sql);
        $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);

        if (count($dados) > 0) {
            echo "<table class='table'>";
            echo "<thead><tr><th>ID</th><th>Nome</th><th>RA</th></tr></thead>";
            echo "<tbody>";
            foreach ($dados as $aluno) {
                echo "<tr>";
                echo "<td>" . $aluno['id'] . "</td>";
                echo "<td>" . $aluno['nome'] . "</td>";
                echo "<td>" . $aluno['ra'] . "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p>Nenhum aluno cadastrado.</p>";
        }
    ?>
  </div>
</body>
</html>