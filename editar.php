<?php
require_once 'functions.php';

$id   = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$livro = buscarLivro($id);
if (!$livro) { header('Location: listar.php'); exit; }

$erros = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty(trim($_POST['titulo']))) $erros[] = 'O título é obrigatório.';
    if (empty(trim($_POST['autor'])))  $erros[] = 'O autor é obrigatório.';

    if (empty($erros)) {
        atualizarLivro($id, $_POST);
        header('Location: listar.php?msg=editado');
        exit;
    }
    $livro = array_merge($livro, $_POST);
}

$cats = categorias();
$sts  = statuses();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Livro — Biblioteca</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="wrapper">

  <?php include 'sidebar.php'; ?>

  <main class="main">
    <div class="page-header">
      <div>
        <h2>Editar Livro</h2>
        <p><?= e($livro['titulo']) ?></p>
      </div>
      <a href="detalhe.php?id=<?= $id ?>" class="btn btn-outline">← Voltar</a>
    </div>

    <?php if ($erros): ?>
      <div class="alert alert-danger">
        <?php foreach ($erros as $e) echo "⚠️ $e<br>"; ?>
      </div>
    <?php endif; ?>

    <div class="card">
      <div class="card-body">
        <form method="POST" action="editar.php?id=<?= $id ?>">
          <div class="form-grid">
            <div class="form-group form-full">
              <label>Título <span class="required">*</span></label>
              <input type="text" name="titulo" value="<?= e($livro['titulo']) ?>" required>
            </div>
            <div class="form-group">
              <label>Autor <span class="required">*</span></label>
              <input type="text" name="autor" value="<?= e($livro['autor']) ?>" required>
            </div>
            <div class="form-group">
              <label>ISBN</label>
              <input type="text" name="isbn" value="<?= e($livro['isbn'] ?? '') ?>">
            </div>
            <div class="form-group">
              <label>Categoria</label>
              <select name="categoria">
                <?php foreach ($cats as $v => $l): ?>
                  <option value="<?= $v ?>" <?= ($livro['categoria'] === $v) ? 'selected' : '' ?>><?= $l ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label>Status</label>
              <select name="status">
                <?php foreach ($sts as $v => $d): ?>
                  <option value="<?= $v ?>" <?= ($livro['status'] === $v) ? 'selected' : '' ?>><?= $d['label'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label>Ano de Publicação</label>
              <input type="number" name="ano" value="<?= e($livro['ano'] ?? '') ?>" min="1000" max="<?= date('Y') ?>">
            </div>
            <div class="form-group">
              <label>Editora</label>
              <input type="text" name="editora" value="<?= e($livro['editora'] ?? '') ?>">
            </div>
            <div class="form-group">
              <label>Número de Páginas</label>
              <input type="number" name="paginas" value="<?= e($livro['paginas'] ?? '') ?>" min="1">
            </div>
            <div class="form-group">
              <label>Localização</label>
              <input type="text" name="localizacao" value="<?= e($livro['localizacao'] ?? '') ?>">
            </div>
            <div class="form-group form-full">
              <label>URL da Capa</label>
              <input type="url" id="capa_url" name="capa_url" value="<?= e($livro['capa_url'] ?? '') ?>" placeholder="https://...">
              <img id="capa-preview" style="max-height:120px;margin-top:8px;border-radius:8px;display:none" alt="Preview da capa">
            </div>
            <div class="form-group form-full">
              <label>Descrição</label>
              <textarea name="descricao"><?= e($livro['descricao'] ?? '') ?></textarea>
            </div>
          </div>
          <div class="form-actions">
            <a href="detalhe.php?id=<?= $id ?>" class="btn btn-outline">Cancelar</a>
            <button type="submit" class="btn btn-primary">💾 Atualizar Livro</button>
          </div>
        </form>
      </div>
    </div>

  </main>
</div>
<script src="../js/main.js"></script>
</body>
</html>

