<?php
require_once 'functions.php';

$busca     = trim($_GET['busca']     ?? '');
$categoria = $_GET['categoria']      ?? '';
$status    = $_GET['status']         ?? '';

$livros = listarLivros($busca, $categoria, $status);
$cats   = categorias();
$sts    = statuses();

$msg = $_GET['msg'] ?? '';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Acervo — Biblioteca</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="wrapper">

  <?php include 'sidebar.php'; ?>

  <main class="main">
    <div class="page-header">
      <div>
        <h2>Acervo</h2>
        <p><?= count($livros) ?> livro(s) encontrado(s)</p>
      </div>
      <a href="criar.php" class="btn btn-primary">➕ Novo Livro</a>
    </div>

    <?php if ($msg === 'criado'):   echo '<div class="alert alert-success">✅ Livro cadastrado com sucesso!</div>'; endif; ?>
    <?php if ($msg === 'editado'):  echo '<div class="alert alert-success">✅ Livro atualizado com sucesso!</div>'; endif; ?>
    <?php if ($msg === 'excluido'): echo '<div class="alert alert-success">🗑️ Livro excluído com sucesso!</div>'; endif; ?>

    <form method="GET" action="listar.php">
      <div class="filters">
        <div class="search-wrap">
          <span class="search-icon">🔍</span>
          <input type="text" name="busca" value="<?= e($busca) ?>" placeholder="Buscar por título, autor ou ISBN...">
        </div>
        <select name="categoria">
          <option value="">Todas as Categorias</option>
          <?php foreach ($cats as $v => $l): ?>
            <option value="<?= $v ?>" <?= $categoria === $v ? 'selected' : '' ?>><?= $l ?></option>
          <?php endforeach; ?>
        </select>
        <select name="status">
          <option value="">Todos os Status</option>
          <?php foreach ($sts as $v => $d): ?>
            <option value="<?= $v ?>" <?= $status === $v ? 'selected' : '' ?>><?= $d['label'] ?></option>
          <?php endforeach; ?>
        </select>
        <button type="submit" class="btn btn-primary">Filtrar</button>
        <?php if ($busca || $categoria || $status): ?>
          <a href="listar.php" class="btn btn-outline">Limpar</a>
        <?php endif; ?>
      </div>
    </form>

    <div class="card">
      <div class="table-wrap">
        <table>
          <thead>
            <tr>
              <th>Livro</th>
              <th>Categoria</th>
              <th>Status</th>
              <th>Ano</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($livros)): ?>
              <tr><td colspan="5">
                <div class="empty">
                  <div class="empty-icon">🔍</div>
                  <p>Nenhum livro encontrado</p>
                </div>
              </td></tr>
            <?php else: ?>
              <?php foreach ($livros as $l): ?>
              <tr>
                <td>
                  <div class="book-cell">
                    <div class="book-thumb">
                      <?php if ($l['capa_url']): ?>
                        <img src="<?= e($l['capa_url']) ?>" alt="">
                      <?php else: ?>📗<?php endif; ?>
                    </div>
                    <div>
                      <div class="book-title"><?= e($l['titulo']) ?></div>
                      <div class="book-author"><?= e($l['autor']) ?></div>
                    </div>
                  </div>
                </td>
                <td><?= e(labelCategoria($l['categoria'] ?? '')) ?></td>
                <td><span class="badge <?= cssStatus($l['status']) ?>"><?= labelStatus($l['status']) ?></span></td>
                <td><?= e($l['ano'] ?? '—') ?></td>
                <td>
                  <div class="actions">
                    <a href="detalhe.php?id=<?= $l['id'] ?>" class="btn btn-outline btn-sm btn-icon" title="Ver">👁</a>
                    <a href="editar.php?id=<?= $l['id'] ?>"  class="btn btn-outline btn-sm btn-icon" title="Editar">✏️</a>
                    <a href="excluir.php?id=<?= $l['id'] ?>" class="btn btn-danger  btn-sm btn-icon" title="Excluir"
                       data-confirm="Tem certeza que deseja excluir &quot;<?= e($l['titulo']) ?>&quot;? Esta ação não pode ser desfeita.">🗑</a>
                  </div>
                </td>
              </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>

  </main>
</div>
<script src="../js/main.js"></script>
</body>
</html>
