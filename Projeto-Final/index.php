<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Página inicial</a>
            <ul class="navbar-nav flex-row">
                <li class="nav-item dropdown entity-dropdown">
                    <a class="nav-link dropdown-toggle" href="src/entidades/competicoes/index.php">Competições</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="src/entidades/competicoes/consultarCompeticoes.php">Consultar</a></li>
                        <li><a class="dropdown-item" href="src/entidades/competicoes/cadastrarCompeticoes.php">Cadastrar</a></li>
                        <li><a class="dropdown-item" href="src/entidades/competicoes/excluirCompeticoes.php">Excluir</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown entity-dropdown">
                    <a class="nav-link dropdown-toggle" href="src/entidades/equipes/index.php">Equipes</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="src/entidades/equipes/consultarEquipes.php">Consultar</a></li>
                        <li><a class="dropdown-item" href="src/entidades/equipes/cadastrarEquipes.php">Cadastrar</a></li>
                        <li><a class="dropdown-item" href="src/entidades/equipes/excluirEquipes.php">Excluir</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown entity-dropdown">
                    <a class="nav-link dropdown-toggle" href="src/entidades/jogadores/index.php">Jogadores</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="src/entidades/jogadores/consultarJogadores.php">Consultar</a></li>
                        <li><a class="dropdown-item" href="src/entidades/jogadores/cadastrarJogadores.php">Cadastrar</a></li>
                        <li><a class="dropdown-item" href="src/entidades/jogadores/excluirJogadores.php">Excluir</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <main class="home-page">
        <section class="home-intro">
            <p class="home-eyebrow">Gestão de eventos esportivos</p>
            <h1>Gerencie seus cadastros em um só lugar</h1>
            <p class="home-description">
                Consulte, cadastre ou exclua competições, equipes e jogadores.
                Escolha uma entidade para acessar as operações disponíveis.
            </p>
        </section>

        <section class="crud-section" aria-labelledby="crud-title">
            <div class="crud-section-heading">
                <div>
                    <p class="home-eyebrow">Operações do sistema</p>
                    <h2 id="crud-title">Gerenciamento CRUD</h2>
                </div>
                <p>Selecione uma ação para começar.</p>
            </div>

            <div class="crud-grid">
                <article class="crud-card">
                    <h3>Competições</h3>
                    <p>Gerencie as competições e eventos esportivos.</p>
                    <div class="crud-actions">
                        <a class="crud-action" href="src/entidades/competicoes/consultarCompeticoes.php">Consultar</a>
                        <a class="crud-action" href="src/entidades/competicoes/cadastrarCompeticoes.php">Cadastrar</a>
                        <a class="crud-action" href="src/entidades/competicoes/excluirCompeticoes.php">Excluir</a>
                    </div>
                </article>

                <article class="crud-card">
                    <h3>Equipes</h3>
                    <p>Acesse os cadastros das equipes participantes.</p>
                    <div class="crud-actions">
                        <a class="crud-action" href="src/entidades/equipes/consultarEquipes.php">Consultar</a>
                        <a class="crud-action" href="src/entidades/equipes/cadastrarEquipes.php">Cadastrar</a>
                        <a class="crud-action" href="src/entidades/equipes/excluirEquipes.php">Excluir</a>
                    </div>
                </article>

                <article class="crud-card">
                    <h3>Jogadores</h3>
                    <p>Mantenha os registros dos jogadores participantes.</p>
                    <div class="crud-actions">
                        <a class="crud-action" href="src/entidades/jogadores/consultarJogadores.php">Consultar</a>
                        <a class="crud-action" href="src/entidades/jogadores/cadastrarJogadores.php">Cadastrar</a>
                        <a class="crud-action" href="src/entidades/jogadores/excluirJogadores.php">Excluir</a>
                    </div>
                </article>
            </div>
        </section>
    </main>
</body>
</html>