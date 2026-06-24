<?php
require_once 'functions.php';
$stats  = estatisticas();
$livros = listarLivros('', '', '');
$recentes = array_slice($livros, 0, 5);

$cats = categorias();
$catCount = [];
foreach ($livros as $l) {
    $c = $l['categoria'] ?? 'other';
    $catCount[$c] = ($catCount[$c] ?? 0) + 1;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Painel — Biblioteca</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="wrapper">

  <?php include 'sidebar.php'; ?>

  <main class="main">
    <div class="page-header">
      <div>
        <h2>Painel</h2>
        <p>Visão geral do acervo da biblioteca</p>
      </div>
    </div>

    
    <div class="stats-grid">
      <div class="stat-card">
        <div class="stat-icon green">📚</div>
        <div class="stat-info">
          <div class="value"><?= $stats['total'] ?></div>
          <div class="label">Total de Livros</div>
        </div>
      </div>
      <div class="stat-card">
        <div class="stat-icon green">✅</div>
        <div class="stat-info">
          <div class="value"><?= $stats['disponiveis'] ?></div>
          <div class="label">Disponíveis</div>
        </div>
      </div>
      <div class="stat-card">
        <div class="stat-icon amber">🔖</div>
        <div class="stat-info">
          <div class="value"><?= $stats['emprestados'] ?></div>
          <div class="label">Emprestados</div>
        </div>
      </div>
      <div class="stat-card">
        <div class="stat-icon red">🔧</div>
        <div class="stat-info">
          <div class="value"><?= $stats['manutencao'] ?></div>
          <div class="label">Manutenção</div>
        </div>
      </div>
    </div>

    <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px">

      
      <div class="card">
        <div class="card-header" style="display:flex;justify-content:space-between;align-items:center">
          <h3>Livros Recentes</h3>
          <a href="listar.php" style="font-size:13px;color:var(--primary);font-weight:600">Ver todos</a>
        </div>
        <div class="card-body" style="padding:0">
          <?php if (empty($recentes)): ?>
            <div class="empty"><div class="empty-icon">📚</div><p>Nenhum livro cadastrado</p></div>
          <?php else: ?>
            <?php foreach ($recentes as $l): ?>
            <a href="detalhe.php?id=<?= $l['id'] ?>" style="display:flex;align-items:center;gap:14px;padding:12px 20px;border-bottom:1px solid var(--border);transition:background .15s" onmouseover="this.style.background='#f6faf7'" onmouseout="this.style.background=''">
              <div class="book-thumb">
                <?php if ($l['capa_url']): ?>
                  <img src="<?= e($l['capa_url']) ?>" alt="">
                <?php else: ?>📗<?php endif; ?>
              </div>
              <div style="flex:1;min-width:0">
                <div class="book-title" style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis"><?= e($l['titulo']) ?></div>
                <div class="book-author"><?= e($l['autor']) ?></div>
              </div>
              <span class="badge <?= cssStatus($l['status']) ?>"><?= labelStatus($l['status']) ?></span>
            </a>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>

      
      <div class="card">
        <div class="card-header"><h3>Por Categoria</h3></div>
        <div class="card-body">
          <?php foreach ($catCount as $key => $n): ?>
          <div style="margin-bottom:12px">
            <div style="display:flex;justify-content:space-between;font-size:13px;margin-bottom:4px">
              <span><?= e(labelCategoria($key)) ?></span>
              <span style="font-weight:700"><?= $n ?></span>
            </div>
            <div style="height:8px;background:#e8f5ed;border-radius:99px;overflow:hidden">
              <div style="height:100%;width:<?= ($stats['total'] > 0 ? round($n / $stats['total'] * 100) : 0) ?>%;background:var(--primary);border-radius:99px;transition:width .5s"></div>
            </div>
          </div>
          <?php endforeach; ?>
          <?php if (empty($catCount)): ?>
            <p style="color:var(--muted);font-size:14px;text-align:center;padding:20px 0">Sem dados disponíveis</p>
          <?php endif; ?>
        </div>
      </div>

    </div>
  </main>
</div>
<script src="../js/main.js"></script>
</body>
</html>