# Project-BMCC
O Project BMCC é um projeto em desenvolvimento, originou-se de um um projeto universitário que tem como objetivo adicionar material substancial para portfolio profissional a ser desenvolvido, ele é essencialmente um projeto C.R.U.D para gerenciamento de acervo bibliotecário municipal, privado ou de baixo orçamento.

# Project BMCC — Library Management System

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-00000F?style=for-the-badge&logo=mysql&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)

O **Project BMCC** é uma aplicação web monolítica voltada para o gerenciamento e controle de acervos bibliográficos. Desenvolvido em PHP estruturado e integrado a uma base de dados relacional MySQL, o ecossistema abstrai as operações fundamentais de persistência de dados através de uma interface limpa, modular e de fácil manutenção.

---

## 📂 Arquitetura de Diretórios

O projeto adota uma abordagem modular de separação de escopos para isolar a camada de apresentação da lógica de manipulação de dados:

```text
Project BMCC/
├── css/
│   └── style.css          # Folha de estilo global e especificações de responsividade
├── js/
│   └── main.js            # Manipulação do DOM, requisições assíncronas e triggers de segurança
├── php/
│   ├── config.php         # Abstração da conexão com o SGBD (PDO/MySQLi) e variáveis de ambiente
│   ├── functions.php      # Helpers globais, helpers de sanitização e segurança de dados
│   ├── sidebar.php        # Fragmento de interface injetável para navegação lateral
│   ├── painel.php         # Dashboard consolidado com métricas do sistema
│   ├── criar.php          # Controladora e view para inserção de registros (Create)
│   ├── listar.php         # Engine de renderização de dados relacionais (Read)
│   ├── detalhe.php        # View isolada para checagem pontual de entidades (Read Specific)
│   ├── editar.php         # Controladora e view de modificação de estados (Update)
│   └── excluir.php        # Rotina lógica para deleção física/lógica de dados (Delete)
├── sql/
│   └── biblioteca.sql     # DDL (Data Definition Language) do banco de dados relacional
└── index.php              # Entrypoint da aplicação e gateway de autenticação

📊 Modelo de Entidade Relacional (Eixo CRUD)
A persistência estruturada mapeada via /sql/biblioteca.sql processa a entidade principal do acervo com as seguintes constraints e tipos primitivos padrão de mercado:

Atributo	Tipo de Dado	Restrições / Indexação	Descrição
id	INT / UUID	PRIMARY KEY, AUTO_INCREMENT	Identificador único do registro
titulo	VARCHAR(255)	NOT NULL	Título oficial da obra literária
autor	VARCHAR(150)	NOT NULL	Nome do autor/responsável
ano_publicacao	INT(4)	NOT NULL	Ano de lançamento da edição
categoria	VARCHAR(100)	—	Segmentação ou gênero literário
quantidade	INT	DEFAULT 0	Volume de cópias físicas disponíveis
🛠️ Ciclo de Vida Operacional (Módulos Core)
📥 Inserção (Create) — criar.php
Camada Visual: Formulário tipado aplicando regras nativas de validação no front-end.

Camada Lógica: Sanitização de inputs contra vetores de ataque (XSS/SQL Injection) e execução de instruções preparadas (Prepared Statements) via INSERT INTO.

🔍 Leitura e Filtros (Read) — listar.php & detalhe.php
Visão Geral: Consumo direto do banco de dados via queries otimizadas (SELECT), traduzindo o set de dados em tabelas interativas.

Visão Detalhada: Captura de chaves primárias via parâmetros na query string HTTP (ex: ?id=uuid) para isolamento de dados de um único objeto.

🔄 Atualização (Update) — editar.php
Mecanismo: Recuperação de estado prévio populando os campos do formulário através do ID selecionado, seguido pelo reprocessamento de dados utilizando o método UPDATE.

🗑️ Remoção (Delete) — excluir.php
Fluxo de Segurança: Interceptação via script JavaScript (main.js) solicitando a confirmação do operador para evitar exclusões acidentais, disparando a query de remoção de dados (DELETE FROM) com posterior redirecionamento de cabeçalho (header("Location: ...")).

⚙️ Deploy Local e Configuração do Ambiente
Siga as diretrizes abaixo para instanciar o ecossistema em ambiente de desenvolvimento local:

Pré-requisitos
Servidor Web (Apache/Nginx) integrado ao ecossistema PHP 8.x.

SGBD MySQL ou MariaDB.

Gerenciador de ambiente local recomendado: XAMPP, Laragon ou Docker.

Passo a Passo
Clonagem e Alocação do Código
Mova a pasta extraída do repositório para o diretório de leitura do seu servidor web (ex: C:/xampp/htdocs/ no Windows ou /var/www/html/ no Linux).

Inicialização do Banco de Dados

Acesse a ferramenta de gerenciamento do banco (ex: phpMyAdmin em localhost/phpmyadmin).

Crie um novo Schema (Banco de dados) sob a colação de caracteres UTF-8 (utf8mb4_general_ci).

Navegue até a ferramenta de importação e execute o script SQL localizado em /sql/biblioteca.sql.

Parametrização de Credenciais
Abra o arquivo /php/config.php no seu editor de código e adeque as constantes de conexão conforme suas propriedades de infraestrutura local:

PHP
   define('DB_HOST', 'localhost');
   define('DB_NAME', 'nome_do_banco_criado');
   define('DB_USER', 'seu_usuario');
   define('DB_PASS', 'sua_senha');
Execução
Inicialize os módulos do Apache e MySQL no seu painel de controle e acesse a aplicação em seu navegador através do endereço:

Plaintext
   http://localhost/Project BMCC/index.php
