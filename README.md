<div align="center">

# 📚 Project BMCC

Sistema Web para gerenciamento de acervo bibliográfico desenvolvido com PHP e MySQL.

[Funcionalidades](#-funcionalidades) •
[Tecnologias](#-tecnologias) •
[Instalação](#-instalação) •
[Estrutura](#-estrutura-do-projeto) •
[Roadmap](#-roadmap)

</div>

<div align="center">
   
![PHP](https://img.shields.io/badge/PHP-8.0+-blue)
![MySQL](https://img.shields.io/badge/MySQL-8.0-orange)
![HTML5](https://img.shields.io/badge/HTML5-E34F26-red)
![CSS3](https://img.shields.io/badge/CSS3-1572B6-blue)
![License](https://img.shields.io/badge/License-MIT-green)

</div>

---
## 📖 Sobre o Projeto

O Biblioteca Municipal de Cristino Castro é uma aplicação web desenvolvida para modernizar o gerenciamento do acervo bibliográfico da biblioteca municipal.

A plataforma permite o controle completo dos livros cadastrados, oferecendo recursos para consulta, cadastro, edição, exclusão e visualização detalhada das obras.

O projeto foi desenvolvido como parte da disciplina de Desenvolvimento Web, aplicando conceitos de:

- Arquitetura CRUD
- Banco de Dados Relacional
- Programação PHP
- Integração com MySQL
- Desenvolvimento Front-end Responsivo

---

## ✨ Funcionalidades

### 📚 Gerenciamento de Livros

- Cadastro de novos livros
- Atualização de registros
- Exclusão de livros
- Consulta detalhada
- Pesquisa por título
- Pesquisa por autor
- Pesquisa por ISBN

### 📊 Dashboard

- Total de livros cadastrados
- Estatísticas do acervo
- Visualização rápida dos registros

### 🔍 Sistema de Busca

- Filtros dinâmicos
- Pesquisa em tempo real
- Organização dos resultados

### 🖼️ Catálogo Visual

- Exibição de capas
- Informações bibliográficas completas
- Status de disponibilidade

---

## 📸 Demonstração

### Dashboard

<img src="docs/images/dashboard.png" width="900">

### Catálogo

<img src="docs/images/catalogo.png" width="900">

### Cadastro de Livros

<img src="docs/images/cadastro.png" width="900">

### Detalhes

<img src="docs/images/detalhes.png" width="900">

---

## 🛠 Tecnologias

### Backend

- PHP 8+
- PDO

### Frontend

- HTML5
- CSS3
- JavaScript

### Banco de Dados

- MySQL

### Ambiente de Desenvolvimento

- XAMPP
- phpMyAdmin
- Visual Studio Code

---

## 🗂 Estrutura do Projeto

```bash
Project BMCC/
│
├── css/
│   └── style.css
│
├── js/
│   └── main.php
│
├── sql/
│   └── biblioteca.sql
│
├── php/
│   ├── config.php
│   ├── criar.php
│   ├── detalhe.php
│   ├── editar.php
│   ├── exluir.php
│   ├── funcions.php
│   ├── listar.phh
│   ├── painel.php
│   └──sidebar.php
│
│
├── index.php
│
└── README.md
```

---

## ⚙️ Instalação

### 1. Clone o repositório

```bash
git clone https://github.com/KlasterDeveloper/Project-BMCC.git
```

### 2. Acesse o diretório

```bash
cd Project BMCC
```

### 3. Mova para o htdocs

```bash
C:\xampp\htdocs\
```

### 4. Crie o banco

```sql
CREATE DATABASE biblioteca;
```

### 5. Importe o arquivo SQL

```text
database/biblioteca.sql
```

### 6. Configure a conexão

```php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "biblioteca";
```

### 7. Execute

```text
http://localhost/ProjectBMCC
```

---

## 🔒 Segurança

O sistema utiliza:

- Prepared Statements (PDO)
- Sanitização de entradas
- Escape de saídas HTML
- Validação de formulários
- Proteção contra SQL Injection

---

## 📈 Roadmap

### Versão 1.0

- [x] Cadastro de livros
- [x] Edição de livros
- [x] Exclusão de livros
- [x] Consulta de livros

### Versão 2.0

- [ ] Sistema de login
- [ ] Controle de usuários
- [ ] Controle de empréstimos
- [ ] Relatórios PDF
- [ ] Exportação Excel
- [ ] Dashboard analítico

### Versão 3.0

- [ ] API REST
- [ ] Aplicativo Mobile
- [ ] QR Code para livros
- [ ] Sistema de reservas

---

## 🏗 Arquitetura

```text
Usuário
   │
   ▼
Interface Web
   │
   ▼
PHP
   │
   ▼
MySQL
```

---

## 📄 Licença

Este projeto foi desenvolvido para fins acadêmicos e educacionais.

---
<br>
<br>
<br>
<br>
<br>
<br>

<div align="center">

<img src="https://readme-typing-svg.demolab.com?font=Fira+Code&pause=1000&center=true&width=500&lines=Daniel+Saraiva;Full+Stack+Developer;PHP+%7C+MySQL+%7C+JavaScript" />

</div>

<br>
<br>
<div align="center">

[![GitHub](https://img.shields.io/badge/GitHub-ChibaYato-181717?style=for-the-badge&logo=github&logoColor=white)](https://github.com/ChibaYato)
[![Discord](https://img.shields.io/badge/Discord-ChibaYato-5865F2?style=for-the-badge&logo=discord&logoColor=white)](https://discord.com/users/393069761375895562)
[![LinkedIn](https://img.shields.io/badge/LinkedIn-Perfil-0A66C2?style=for-the-badge&logo=linkedin&logoColor=white)](https://linkedin.com/in/SEU_PERFIL)

</div>




