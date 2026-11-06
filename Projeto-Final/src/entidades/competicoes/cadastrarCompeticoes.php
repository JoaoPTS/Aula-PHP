<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Competições</title>
    <link rel="stylesheet" href="../../../estilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="../../../index.php">Página inicial</a>
            <ul class="navbar-nav flex-row">
                <li class="nav-item dropdown entity-dropdown">
                    <a class="nav-link dropdown-toggle active" aria-current="page" href="index.php">Competições</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="consultarCompeticoes.php">Consultar</a></li>
                        <li><a class="dropdown-item active disabled" aria-current="page" aria-disabled="true" tabindex="-1" href="cadastrarCompeticoes.php">Cadastrar</a></li>
                        <li><a class="dropdown-item" href="excluirCompeticoes.php">Excluir</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown entity-dropdown">
                    <a class="nav-link dropdown-toggle" href="../equipes/index.php">Equipes</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../equipes/consultarEquipes.php">Consultar</a></li>
                        <li><a class="dropdown-item" href="../equipes/cadastrarEquipes.php">Cadastrar</a></li>
                        <li><a class="dropdown-item" href="../equipes/excluirEquipes.php">Excluir</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown entity-dropdown">
                    <a class="nav-link dropdown-toggle" href="../jogadores/index.php">Jogadores</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../jogadores/consultarJogadores.php">Consultar</a></li>
                        <li><a class="dropdown-item" href="../jogadores/cadastrarJogadores.php">Cadastrar</a></li>
                        <li><a class="dropdown-item" href="../jogadores/excluirJogadores.php">Excluir</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <main class="container mt-4"><h1>Cadastrar Competições</h1></main>
</body>
</html>