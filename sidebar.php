<?php
$pagina = basename($_SERVER['PHP_SELF']);
?>
<aside class="sidebar">
  <div class="sidebar-brand">
    <div class="sidebar-brand-icon">
      <img src="https://i.ibb.co/5gkZ8PRJ/189f4d12f-imagem-2026-06-15-013654858.png" alt="Logo Biblioteca">
    </div>
    <div class="sidebar-brand-text">
      <h1>Biblioteca Municipal de Cristino Castro</h1>
      <p>Sistema de Gestão e Controle</p>
    </div>
  </div>
  <nav class="sidebar-nav">
    <a href="painel.php"  class="<?= $pagina === 'painel.php'  ? 'active' : '' ?>"><span class="icon">🏠</span> Painel</a>
    <a href="listar.php"  class="<?= $pagina === 'listar.php'  ? 'active' : '' ?>"><span class="icon">📖</span> Acervo</a>
    <a href="criar.php"   class="<?= $pagina === 'criar.php'   ? 'active' : '' ?>"><span class="icon">➕</span> Novo Livro</a>
  </nav>
  <div class="sidebar-footer">
    <a href="../index.php"><span class="icon">🚪</span> Sair</a>
  </div>
</aside>
