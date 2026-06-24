-- ============================================
--  SISTEMA DE BIBLIOTECA - Script SQL
--  Disciplina: Desenvolvimento Web
--  Autor: Daniel Saraiva
--  Banco: MySQL
-- ============================================

CREATE DATABASE IF NOT EXISTS biblioteca
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE biblioteca;

CREATE TABLE IF NOT EXISTS livros (
  id          INT AUTO_INCREMENT PRIMARY KEY,
  titulo      VARCHAR(255) NOT NULL,
  autor       VARCHAR(255) NOT NULL,
  isbn        VARCHAR(20)  DEFAULT NULL,
  categoria   ENUM('fiction','non_fiction','science','technology',
                   'history','philosophy','art','biography',
                   'education','other') DEFAULT 'other',
  ano         YEAR         DEFAULT NULL,
  editora     VARCHAR(150) DEFAULT NULL,
  paginas     INT          DEFAULT NULL,
  status      ENUM('available','borrowed','reserved','maintenance')
              NOT NULL DEFAULT 'available',
  localizacao VARCHAR(100) DEFAULT NULL,
  descricao   TEXT         DEFAULT NULL,
  capa_url    VARCHAR(500) DEFAULT NULL,
  criado_em   DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
  atualizado_em DATETIME   NOT NULL DEFAULT CURRENT_TIMESTAMP
              ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO livros (titulo, autor, isbn, categoria, ano, editora, paginas, status, localizacao, descricao) VALUES
('Dom Casmurro',            'Machado de Assis',      '978-85-01-00201-3', 'fiction',     1899, 'Companhia das Letras', 256, 'available',   'Estante A, Prateleira 1', 'Romance narrado em primeira pessoa por Bento Santiago.'),
('O Alquimista',            'Paulo Coelho',           '978-85-325-0010-1', 'fiction',     1988, 'HarperCollins',        208, 'borrowed',    'Estante A, Prateleira 2', 'A história de Santiago, um jovem pastor em busca de um tesouro.'),
('Sapiens',                 'Yuval Noah Harari',      '978-85-250-5960-1', 'history',     2014, 'L&PM Editores',        464, 'available',   'Estante B, Prateleira 1', 'Uma breve história da humanidade.'),
('Clean Code',              'Robert C. Martin',       '978-01-323-5088-4', 'technology',  2008, 'Prentice Hall',        464, 'available',   'Estante C, Prateleira 2', 'Manual de boas práticas para escrever código limpo.'),
('Cosmos',                  'Carl Sagan',             '978-85-359-0154-1', 'science',     1980, 'Ballantine Books',     432, 'reserved',    'Estante D, Prateleira 1', 'Uma jornada pelo universo e pela civilização humana.'),
('A Arte da Guerra',        'Sun Tzu',                '978-85-254-0615-2', 'philosophy',  NULL, 'Penguin',              112, 'available',   'Estante E, Prateleira 3', 'Tratado militar clássico com estratégias atemporais.'),
('Steve Jobs',              'Walter Isaacson',        '978-85-359-2050-4', 'biography',   2011, 'Simon & Schuster',     656, 'maintenance', 'Estante F, Prateleira 1', 'Biografia autorizada do cofundador da Apple.'),
('O Pequeno Príncipe',      'Antoine de Saint-Exupéry','978-85-220-0561-6','fiction',     1943, 'Agir',                  96, 'borrowed',    'Estante A, Prateleira 3', 'História poética de um pequeno príncipe que viaja entre planetas.');
