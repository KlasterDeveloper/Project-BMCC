<?php
require_once 'config.php';

function categorias(): array {
    return [
        'fiction'     => 'Ficção',
        'non_fiction' => 'Não-Ficção',
        'science'     => 'Ciência',
        'technology'  => 'Tecnologia',
        'history'     => 'História',
        'philosophy'  => 'Filosofia',
        'art'         => 'Arte',
        'biography'   => 'Biografia',
        'education'   => 'Educação',
        'other'       => 'Outros',
    ];
}

function statuses(): array {
    return [
        'available'   => ['label' => 'Disponível',  'css' => 'badge-available'],
        'borrowed'    => ['label' => 'Emprestado',  'css' => 'badge-borrowed'],
        'reserved'    => ['label' => 'Reservado',   'css' => 'badge-reserved'],
        'maintenance' => ['label' => 'Manutenção',  'css' => 'badge-maintenance'],
    ];
}

function labelStatus(string $status): string {
    return statuses()[$status]['label'] ?? $status;
}

function cssStatus(string $status): string {
    return statuses()[$status]['css'] ?? 'badge-available';
}

function labelCategoria(string $cat): string {
    return categorias()[$cat] ?? $cat;
}

function listarLivros(string $busca = '', string $categoria = '', string $status = ''): array {
    $pdo    = getConnection();
    $where  = [];
    $params = [];

    if ($busca !== '') {
        $where[]        = '(titulo LIKE :busca OR autor LIKE :busca OR isbn LIKE :busca)';
        $params['busca'] = "%$busca%";
    }
    if ($categoria !== '') {
        $where[]            = 'categoria = :categoria';
        $params['categoria'] = $categoria;
    }
    if ($status !== '') {
        $where[]         = 'status = :status';
        $params['status'] = $status;
    }

    $sql = 'SELECT * FROM livros';
    if ($where) {
        $sql .= ' WHERE ' . implode(' AND ', $where);
    }
    $sql .= ' ORDER BY criado_em DESC';

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll();
}

function buscarLivro(int $id): array|false {
    $pdo  = getConnection();
    $stmt = $pdo->prepare('SELECT * FROM livros WHERE id = :id');
    $stmt->execute(['id' => $id]);
    return $stmt->fetch();
}

function criarLivro(array $dados): int {
    $pdo  = getConnection();
    $stmt = $pdo->prepare(
        'INSERT INTO livros
         (titulo, autor, isbn, categoria, ano, editora, paginas, status, localizacao, descricao, capa_url)
         VALUES
         (:titulo,:autor,:isbn,:categoria,:ano,:editora,:paginas,:status,:localizacao,:descricao,:capa_url)'
    );
    $stmt->execute(sanitize($dados));
    return (int) $pdo->lastInsertId();
}

function atualizarLivro(int $id, array $dados): void {
    $pdo  = getConnection();
    $stmt = $pdo->prepare(
        'UPDATE livros SET
         titulo=:titulo, autor=:autor, isbn=:isbn, categoria=:categoria,
         ano=:ano, editora=:editora, paginas=:paginas, status=:status,
         localizacao=:localizacao, descricao=:descricao, capa_url=:capa_url
         WHERE id=:id'
    );
    $stmt->execute(array_merge(sanitize($dados), ['id' => $id]));
}


function excluirLivro(int $id): void {
    $pdo  = getConnection();
    $stmt = $pdo->prepare('DELETE FROM livros WHERE id = :id');
    $stmt->execute(['id' => $id]);
}


function estatisticas(): array {
    $pdo  = getConnection();
    $rows = $pdo->query(
        "SELECT
           COUNT(*) AS total,
           SUM(status = 'available')   AS disponiveis,
           SUM(status = 'borrowed')    AS emprestados,
           SUM(status = 'maintenance') AS manutencao
         FROM livros"
    )->fetch();
    return $rows;
}


function sanitize(array $d): array {
    return [
        'titulo'       => trim($d['titulo']       ?? ''),
        'autor'        => trim($d['autor']        ?? ''),
        'isbn'         => trim($d['isbn']         ?? '') ?: null,
        'categoria'    => $d['categoria']         ?? 'other',
        'ano'          => !empty($d['ano'])  ? (int)$d['ano']    : null,
        'editora'      => trim($d['editora']      ?? '') ?: null,
        'paginas'      => !empty($d['paginas']) ? (int)$d['paginas'] : null,
        'status'       => $d['status']            ?? 'available',
        'localizacao'  => trim($d['localizacao']  ?? '') ?: null,
        'descricao'    => trim($d['descricao']    ?? '') ?: null,
        'capa_url'     => trim($d['capa_url']     ?? '') ?: null,
    ];
}

function e(mixed $v): string {
    return htmlspecialchars((string)($v ?? ''), ENT_QUOTES, 'UTF-8');
}