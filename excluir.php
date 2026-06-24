<?php
require_once 'functions.php';

$id    = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$livro = buscarLivro($id);

if (!$livro) {
    header('Location: listar.php');
    exit;
}

excluirLivro($id);
header('Location: listar.php?msg=excluido');
exit;