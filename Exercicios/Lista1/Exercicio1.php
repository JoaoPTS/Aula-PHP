<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 1</title>
</head>
<body>
    <h1>Soma de 2 números:</h1>
    <form action="" method="post">
        <input type="num2" id="num1" name="num1" required>
        +
        <input type="number" id="num2" name="num2" required>
        <br><br>
        <button type="submit">Enviar</button>
    </form>
    <?php 
        $num1 = $_POST['num1'] ?? 0;
        $num2 = $_POST['num2'] ?? 0;

        $soma = $num1 + $num2;

        echo "<h2>Resultado: $num1 + $num2 = $soma</h2>";
    ?>
</body>
</html>