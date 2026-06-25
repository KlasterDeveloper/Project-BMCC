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
biblioteca-municipal/
│
├── assets/
│   ├── css/
│   ├── js/
│   └── images/
│
├── includes/
│   ├── config.php
│   ├── database.php
│   └── functions.php
│
├── pages/
│   ├── dashboard.php
│   ├── livros.php
│   ├── cadastrar.php
│   ├── editar.php
│   └── visualizar.php
│
├── database/
│   └── biblioteca.sql
│
├── index.php
│
└── README.md
```

---

## ⚙️ Instalação

### 1. Clone o repositório

```bash
git clone https://github.com/seuusuario/biblioteca-municipal.git
```

### 2. Acesse o diretório

```bash
cd biblioteca-municipal
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
http://localhost/biblioteca-municipal
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

## 👨‍💻 Autor

Daniel Saraiva

Desenvolvedor Full Stack em formação.

<svg viewBox="0 0 24 24" width="32" height="32" fill="currentColor">
  <path d="M10.226 17.284c-2.965-.36-5.054-2.493-5.054-5.256 0-1.123.404-2.336 1.078-3.144-.292-.741-.247-2.314.09-2.965.898-.112 2.111.36 2.83 1.01.853-.269 1.752-.404 2.853-.404 1.1 0 1.999.135 2.807.382.696-.629 1.932-1.1 2.83-.988.315.606.36 2.179.067 2.942.72.854 1.101 2 1.101 3.167 0 2.763-2.089 4.852-5.098 5.234.763.494 1.28 1.572 1.28 2.807v2.336c0 .674.561 1.056 1.235.786 4.066-1.55 7.255-5.615 7.255-10.646C23.5 6.188 18.334 1 11.978 1 5.62 1 .5 6.188.5 12.545c0 4.986 3.167 9.12 7.435 10.669.606.225 1.19-.18 1.19-.786V20.63a2.9 2.9 0 0 1-1.078.224c-1.483 0-2.359-.808-2.987-2.313-.247-.607-.517-.966-1.034-1.033-.27-.023-.359-.135-.359-.27 0-.27.45-.471.898-.471.652 0 1.213.404 1.797 1.235.45.651.921.943 1.483.943.561 0 .92-.202 1.437-.719.382-.381.674-.718.944-.943"></path>
</svg>



[Discord](https://discordapp.com/users/)
---

# 📄 Licença

Este projeto é disponibilizado para fins acadêmicos e educacionais.
