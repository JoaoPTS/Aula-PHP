<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Revisão HTML e CSS</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    * {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    p {
      font-size: 20px;
    }

    .classe {
      color: red;
    }

    #nome {
      color: green;
    }
  </style>
</head>

<body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
		crossorigin="anonymous"></script>
  <nav class="navbar navbar-light bg-light">
    <a class="btn btn-primary ms-3" href="/index.php">Voltar para a Página Principal</a>
  </nav>
  <p>Esse é um parágrafo</p>
  <h1>Titulo 1</h1>
  <h2>Titulo 2</h2>
  <ol>
    <li class="classe">Posição 1</li>
    <li class="classe">Posição 2</li>
    <li>Posição 3</li>
  </ol>
  <ul>
    <li>Item</li>
    <li>Item</li>
    <li>Item</li>
  </ul>
  <a href="https://google.com.br">Hiperlink</a>
  <img src="imagem.png" alt="Imagem" />
  <nav>
    <ul>
      <li>Item</li>
    </ul>
  </nav>
  <main>
    <p>Texto</p>
  </main>
  <div>
    <p>Texto</p>
    <p>Texto + <span>Texto</span></p>
  </div>
  <table>
    <thead>
      <tr>
        <th class="classe">Coluna 1</th>
        <th class="classe">Coluna 2</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Linha 1</td>
        <td>Linha 2</td>
      </tr>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="2">Rodapé</td>
      </tr>
    </tfoot>
  </table>
  <form action="" method="">
    <label for="nome">Informe o nome:</label>
    <input type="text" name="nome" id="nome" />
    <label for="desc">Descrição:</label>
    <textarea name="desc" id="desc"></textarea>
    <label for="opc">Opção:</label>
    <select name="opc" id="opc">
      <option value="1">Opção 1</option>
      <option value="2">Opção 2</option>
      <option value="3">Opção 3</option>
    </select>
    <button type="submit">Enviar</button>
  </form>
</body>

</html>