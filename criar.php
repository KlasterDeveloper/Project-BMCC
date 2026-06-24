<?php
require_once 'functions.php';

$erros = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty(trim($_POST['titulo']))) $erros[] = 'O título é obrigatório.';
    if (empty(trim($_POST['autor'])))  $erros[] = 'O autor é obrigatório.';

    if (empty($erros)) {
        criarLivro($_POST);
        header('Location: listar.php?msg=criado');
        exit;
    }
}

$cats = categorias();
$sts  = statuses();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Novo Livro — Biblioteca</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="wrapper">

  <?php include 'sidebar.php'; ?>

  <main class="main">
    <div class="page-header">
      <div>
        <h2>Novo Livro</h2>
        <p>Cadastre um novo livro no acervo</p>
      </div>
      <a href="listar.php" class="btn btn-outline">← Voltar</a>
    </div>

    <?php if ($erros): ?>
      <div class="alert alert-danger">
        <?php foreach ($erros as $e) echo "⚠️ $e<br>"; ?>
      </div>
    <?php endif; ?>

    <div class="card">
      <div class="card-body">
        <form method="POST" action="criar.php">
          <div class="form-grid">
            <div class="form-group form-full">
              <label>Título <span class="required">*</span></label>
              <input type="text" name="titulo" value="<?= e($_POST['titulo'] ?? '') ?>" placeholder="Ex: Dom Casmurro" required>
            </div>
            <div class="form-group">
              <label>Autor <span class="required">*</span></label>
              <input type="text" name="autor" value="<?= e($_POST['autor'] ?? '') ?>" placeholder="Ex: Machado de Assis" required>
            </div>
            <div class="form-group">
              <label>ISBN</label>
              <input type="text" name="isbn" value="<?= e($_POST['isbn'] ?? '') ?>" placeholder="Ex: 978-85-01-00201-3">
            </div>
            <div class="form-group">
              <label>Categoria</label>
              <select name="categoria">
                <?php foreach ($cats as $v => $l): ?>
                  <option value="<?= $v ?>" <?= (($_POST['categoria'] ?? '') === $v) ? 'selected' : '' ?>><?= $l ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label>Status</label>
              <select name="status">
                <?php foreach ($sts as $v => $d): ?>
                  <option value="<?= $v ?>" <?= (($_POST['status'] ?? 'available') === $v) ? 'selected' : '' ?>><?= $d['label'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label>Ano de Publicação</label>
              <input type="number" name="ano" value="<?= e($_POST['ano'] ?? '') ?>" placeholder="Ex: 1899" min="1000" max="<?= date('Y') ?>">
            </div>
            <div class="form-group">
              <label>Editora</label>
              <input type="text" name="editora" value="<?= e($_POST['editora'] ?? '') ?>" placeholder="Ex: Companhia das Letras">
            </div>
            <div class="form-group">
              <label>Número de Páginas</label>
              <input type="number" name="paginas" value="<?= e($_POST['paginas'] ?? '') ?>" placeholder="Ex: 256" min="1">
            </div>
            <div class="form-group">
              <label>Localização</label>
              <input type="text" name="localizacao" value="<?= e($_POST['localizacao'] ?? '') ?>" placeholder="Ex: Estante A, Prateleira 3">
            </div>
            <div class="form-group form-full">
              <label>URL da Capa</label>
              <input type="url" id="capa_url" name="capa_url" value="<?= e($_POST['capa_url'] ?? '') ?>" placeholder="https://...">
              <img id="capa-preview" style="max-height:120px;margin-top:8px;border-radius:8px;display:none" alt="Preview da capa">
            </div>
            <div class="form-group form-full">
              <label>Descrição</label>
              <textarea name="descricao" placeholder="Sinopse ou descrição do livro..."><?= e($_POST['descricao'] ?? '') ?></textarea>
            </div>
          </div>
          <div class="form-actions">
            <a href="listar.php" class="btn btn-outline">Cancelar</a>
            <button type="submit" class="btn btn-primary">💾 Cadastrar Livro</button>
          </div>
        </form>
      </div>
    </div>

  </main>
</div>
<script src="../js/main.js"></script>
</body>
</html>

