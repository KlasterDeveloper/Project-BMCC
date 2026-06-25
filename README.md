# Project-BMCC
O Project BMCC é um projeto em desenvolvimento, originou-se de um um projeto universitário que tem como objetivo adicionar material substancial para portfolio profissional a ser desenvolvido, ele é essencialmente um projeto C.R.U.D para gerenciamento de acervo bibliotecário municipal, privado ou de baixo orçamento.

# Project BMCC — Library Management System

Sistema Web desenvolvido para gerenciamento do acervo da Biblioteca Municipal de Cristino Castro, permitindo o cadastro, consulta, edição e exclusão de livros através de uma interface moderna e intuitiva.

![PHP](https://img.shields.io/badge/PHP-8.0+-blue)
![MySQL](https://img.shields.io/badge/MySQL-8.0-orange)
![HTML5](https://img.shields.io/badge/HTML5-E34F26-red)
![CSS3](https://img.shields.io/badge/CSS3-1572B6-blue)
![License](https://img.shields.io/badge/License-MIT-green)

---

# 📖 Sobre o Projeto

O Sistema de Biblioteca Municipal foi desenvolvido com o objetivo de facilitar o gerenciamento do acervo bibliográfico da biblioteca, oferecendo recursos para cadastro, pesquisa, atualização e exclusão de livros.

O projeto foi criado utilizando PHP, MySQL, HTML, CSS e JavaScript, seguindo o padrão CRUD (Create, Read, Update e Delete).

---

# 🎯 Objetivos

- Organizar o acervo da biblioteca.
- Facilitar a consulta de livros.
- Centralizar informações bibliográficas.
- Melhorar o controle dos exemplares disponíveis.
- Disponibilizar uma interface simples e moderna para os usuários.

---

# 🚀 Funcionalidades

## 📊 Dashboard

- Visualização geral do sistema.
- Total de livros cadastrados.
- Livros disponíveis.
- Livros emprestados.
- Livros em manutenção.

**(IMG_DASHBOARD)**

---

## 📚 Gestão de Livros

### Cadastro

Permite cadastrar novos livros contendo:

- Título
- Autor
- ISBN
- Categoria
- Ano de publicação
- Editora
- Número de páginas
- Status
- Localização
- Descrição
- URL da capa

**(IMG_CADASTRO)**

---

### Consulta

- Listagem completa dos livros cadastrados.
- Busca por título.
- Busca por autor.
- Busca por ISBN.
- Filtro por categoria.
- Filtro por status.

**(IMG_LISTAGEM)**

---

### Edição

Permite atualizar todas as informações do livro.

**(IMG_EDICAO)**

---

### Exclusão

Permite remover registros do sistema.

**(IMG_EXCLUSAO)**

---

### Visualização Detalhada

Exibe:

- Dados completos do livro.
- Categoria.
- Informações bibliográficas.
- Status atual.
- Descrição.
- Capa do livro.

**(IMG_DETALHES)**

---

# 🛠 Tecnologias Utilizadas

### Backend

- PHP 8+
- PDO

### Banco de Dados

- MySQL

### Frontend

- HTML5
- CSS3
- JavaScript

### Ferramentas

- XAMPP
- phpMyAdmin
- VS Code

---

# 📂 Estrutura do Projeto

```text
Project BMCC/
│
├── css/
│   └── style.css
│
├── js/
│   └── main.js
│
├── php/
│   ├── config.php
│   ├── functions.php
│   ├── painel.php
│   ├── listar.php
│   ├── criar.php
│   ├── editar.php
│   ├── detalhe.php
│   ├── excluir.php
│   └── sidebar.php
│
├── sql/
│   └── biblioteca.sql
│
├── index.php
│
└── README.md
```

---

# 🗄 Banco de Dados

O sistema utiliza um banco chamado:

```sql
biblioteca
```

Tabela principal:

```sql
livros
```

Campos:

| Campo | Tipo |
|---------|---------|
| id | INT |
| titulo | VARCHAR(255) |
| autor | VARCHAR(255) |
| isbn | VARCHAR(20) |
| categoria | ENUM |
| ano | YEAR |
| editora | VARCHAR(150) |
| paginas | INT |
| status | ENUM |
| localizacao | VARCHAR(100) |
| descricao | TEXT |
| capa_url | VARCHAR(500) |
| criado_em | DATETIME |
| atualizado_em | DATETIME |

---

# ⚙️ Instalação

## 1. Clonar o repositório

```bash
git clone https://github.com/seuusuario/biblioteca-municipal.git
```

---

## 2. Mover para o XAMPP

Copie a pasta para:

```text
xampp/htdocs/
```

---

## 3. Criar banco de dados

Abra:

```text
http://localhost/phpmyadmin
```

Crie o banco:

```sql
biblioteca
```

---

## 4. Importar Script SQL

Importe o arquivo:

```text
sql/biblioteca.sql
```

---

## 5. Configurar conexão

Arquivo:

```php
php/config.php
```

```php
define('DB_HOST', 'localhost');
define('DB_NAME', 'biblioteca');
define('DB_USER', 'root');
define('DB_PASS', '');
```

---

## 6. Executar

Acesse:

```text
http://localhost/Project%20BMCC
```

---

# 🔒 Segurança Implementada

- PDO Prepared Statements
- Proteção contra SQL Injection
- Escape de saída HTML
- Validação de formulários
- Sanitização de dados

---

# 📈 Melhorias Futuras

- Sistema de login.
- Controle de empréstimos.
- Controle de usuários.
- Histórico de movimentações.
- Geração de relatórios PDF.
- Dashboard com gráficos.
- Exportação para Excel.
- Controle de multas.

---

# 📸 Capturas de Tela

## Dashboard

(IMG_DASHBOARD)

---

## Acervo

(IMG_LISTAGEM)

---

## Cadastro

(IMG_CADASTRO)

---

## Detalhes do Livro

(IMG_DETALHES)

---

# 👨‍💻 Autor

**Daniel Saraiva**

Projeto desenvolvido para a disciplina de Desenvolvimento Web.

---

# 📄 Licença

Este projeto é disponibilizado para fins acadêmicos e educacionais.
