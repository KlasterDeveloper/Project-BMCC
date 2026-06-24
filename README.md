# Project-BMCC
O Project BMCC é um projeto em desenvolvimento, originou-se de um um projeto universitário que tem como objetivo adicionar material substancial para portfolio profissional a ser desenvolvido, ele é essencialmente um projeto C.R.U.D para gerenciamento de acervo bibliotecário municipal, privado ou de baixo orçamento.
# Project BMCC — Sistema de Biblioteca

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
