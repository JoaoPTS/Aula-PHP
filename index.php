<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Página Inicial</title>
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
	<p></p>
	<?php

	$exerciseLists = [
		"Exercicios/Lista1",
		"Exercicios/Lista2",
		"Exercicios/Lista3"
	];
	?>
	<div class="container">
		<?php foreach ($exerciseLists as $list): ?>
			<div class="folder">
				<h2><?php echo basename($list); ?></h2>
				<?php
				$exerciseDir = __DIR__ . '/' . $list;
				if (is_dir($exerciseDir)) {
					$exerciseNumber = 1;
					while (file_exists($exerciseDir . '/Exercício' . $exerciseNumber . '.php')): ?>
						<a href="<?php echo $list . '/Exercício' . $exerciseNumber . '.php'; ?>" class="button">
							Abrir Exercício <?php echo $exerciseNumber; ?>
						</a>
						<?php $exerciseNumber++; ?>
					<?php endwhile;
				} ?>
			</div>
		<?php endforeach; ?>
	</div>

</body>

</html>