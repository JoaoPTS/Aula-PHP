<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pagina Inicia</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<?php
	// Define the folders and their descriptions
	$folders = [
		"Aula1" => "Aula de revisão de HTML.",
		"Aula2" => "Exemplo de formularios em PHP."
	];
	?>
	<h1>Bem-vindo à Página Inicial</h1>
	<p>Esta página contém links para diferentes aulas e exemplos práticos em PHP.</p>

	<div class="container">
		<?php foreach ($folders as $folder => $description): ?>
			<div class="folder">
				<h2><?php echo $folder; ?></h2>
				<p><?php echo $description; ?></p>
				<a href="<?php echo $folder; ?>/index.php" class="button">Abrir <?php echo $folder; ?></a>
			</div>
		<?php endforeach; ?>
	</div>

</body>

</html>