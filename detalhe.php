<?php
require_once 'functions.php';

$id    = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$livro = buscarLivro($id);
if (!$livro) { header('Location: listar.php'); exit; }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= e($livro['titulo']) ?> — Biblioteca</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="wrapper">

  <?php include 'sidebar.php'; ?>

  <main class="main">
    <div class="page-header">
      <div style="display:flex;align-items:center;gap:14px">
        <a href="listar.php" class="btn btn-outline btn-sm btn-icon" title="Voltar">←</a>
        <h2>Detalhes do Livro</h2>
      </div>
      <div style="display:flex;gap:8px">
        <a href="editar.php?id=<?= $id ?>" class="btn btn-outline btn-sm">✏️ Editar</a>
        <a href="excluir.php?id=<?= $id ?>" class="btn btn-danger btn-sm"
           data-confirm="Tem certeza que deseja excluir &quot;<?= e($livro['titulo']) ?>&quot;?">🗑 Excluir</a>
      </div>
    </div>

    <div class="card" style="max-width:720px">
      <div class="book-detail-cover">
        <?php if ($livro['capa_url']): ?>
          <img src="<?= e($livro['capa_url']) ?>" alt="Capa">
        <?php else: ?>📚<?php endif; ?>
      </div>
      <div class="card-body">
        <div style="display:flex;justify-content:space-between;align-items:flex-start;gap:12px;margin-bottom:16px">
          <div>
            <?php if ($livro['categoria']): ?>
              <span style="font-size:11px;font-weight:700;color:var(--primary);text-transform:uppercase;letter-spacing:.06em">
                <?= e(labelCategoria($livro['categoria'])) ?>
              </span>
            <?php endif; ?>
            <h2 style="font-family:var(--font-heading);font-size:22px;font-weight:800;margin-top:4px"><?= e($livro['titulo']) ?></h2>
            <p style="color:var(--muted);margin-top:4px"><?= e($livro['autor']) ?></p>
          </div>
          <span class="badge <?= cssStatus($livro['status']) ?>"><?= labelStatus($livro['status']) ?></span>
        </div>

        <?php if ($livro['descricao']): ?>
          <div class="book-synopsis"><?= nl2br(e($livro['descricao'])) ?></div>
        <?php endif; ?>

        <div class="book-info-grid">
          <div class="book-info-item">
            <span class="info-label">ISBN</span>
            <span class="info-value"><?= e($livro['isbn'] ?? '—') ?></span>
          </div>
          <div class="book-info-item">
            <span class="info-label">Ano</span>
            <span class="info-value"><?= e($livro['ano'] ?? '—') ?></span>
          </div>
          <div class="book-info-item">
            <span class="info-label">Editora</span>
            <span class="info-value"><?= e($livro['editora'] ?? '—') ?></span>
          </div>
          <div class="book-info-item">
            <span class="info-label">Páginas</span>
            <span class="info-value"><?= e($livro['paginas'] ?? '—') ?></span>
          </div>
          <div class="book-info-item">
            <span class="info-label">Localização</span>
            <span class="info-value"><?= e($livro['localizacao'] ?? '—') ?></span>
          </div>
          <div class="book-info-item">
            <span class="info-label">Cadastrado em</span>
            <span class="info-value">
              <?= $livro['criado_em'] ? date('d/m/Y', strtotime($livro['criado_em'])) : '—' ?>
            </span>
          </div>
        </div>
      </div>
    </div>
  </main>
</div>
<script src="../js/main.js"></script>
</body>
</html>
