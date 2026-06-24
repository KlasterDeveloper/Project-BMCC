# Project-BMCC
O Project BMCC é um projeto em desenvolvimento, originou-se de um um projeto universitário que tem como objetivo adicionar material substancial para portfolio profissional a ser desenvolvido, ele é essencialmente um projeto C.R.U.D para gerenciamento de acervo bibliotecário municipal, privado ou de baixo orçamento.
# Project BMCC — Sistema de Biblioteca
---
[cite_start]O **Project BMCC** é uma aplicação web desenvolvida em PHP e MySQL focada no gerenciamento completo de um acervo bibliográfico (CRUD)[cite: 2]. [cite_start]O sistema conta com uma estrutura organizada separando as responsabilidades de configuração, funções globais, interface visual e controle de dados[cite: 3].

## 📂 Estrutura do Projeto

[cite_start]A organização dos arquivos contidos no "Project BMCC.zip" segue o mapeamento abaixo[cite: 5]:

* [cite_start]**`/css/style.css`**: Arquivo responsável por toda a estilização visual e responsividade do sistema[cite: 6].
* [cite_start]**`/js/main.js`**: Scripts em JavaScript para interações em tela, confirmação de exclusão e validações dinâmicas[cite: 7].
* [cite_start]**`/php/config.php`**: Arquivo de configuração de ambiente e conexão com o banco de dados MySQL utilizando PDO ou MySQLi[cite: 8].
* [cite_start]**`/php/functions.php`**: Biblioteca de funções auxiliares reutilizáveis (formatação de datas, sanitização, etc.)[cite: 9].
* [cite_start]**`/php/sidebar.php`**: Componente visual de navegação lateral reutilizado nas páginas do painel[cite: 10].
* [cite_start]**`/php/painel.php`**: Dashboard principal de controle após o acesso ao sistema[cite: 11].
* [cite_start]**`/sql/biblioteca.sql`**: Script de criação do banco de dados e suas respectivas tabelas[cite: 12].
* [cite_start]**`/index.php`**: Ponto de entrada do projeto (página inicial)[cite: 13].

---

## 🗄️ Modelo de Dados (CRUD)

[cite_start]Com base no arquivo `/sql/biblioteca.sql`, o banco de dados principal gerencia a entidade de livros/acervo com a seguinte estrutura lógica padrão[cite: 15]:

| Campo | Descrição |
| :--- | :--- |
| **`id`** | [cite_start]Identificador único (Chave Primária) [cite: 16] |
| **`titulo`** | [cite_start]Nome do livro/obra [cite: 16] |
| **`autor`** | [cite_start]Autor da obra [cite: 17] |
| **`ano_publicacao`** | [cite_start]Ano de lançamento [cite: 18] |
| **`categoria/genero`** | [cite_start]Gênero literário [cite: 18] |
| **`quantidade`** | [cite_start]Exemplares disponíveis [cite: 18] |

---

## ⚙️ Funcionamento dos Módulos do CRUD (`/php/`)

[cite_start]O fluxo operacional de manipulação dos dados está dividido de forma modular[cite: 20]:

### 1. Listar (`listar.php`)
* **Função**: Realiza uma consulta `SELECT` no banco de dados e renderiza uma tabela HTML contendo todos os registros salvos[cite: 22]. Inclui links diretos para visualizar detalhes, editar ou excluir cada item[cite: 23].

### 2. Criar (`criar.php`)
* [cite_start]**Função**: Apresenta um formulário HTML para inserção de novos registros[cite: 25]. [cite_start]Ao submeter, valida os campos e executa uma query `INSERT INTO` salvando as informações no banco de dados[cite: 26].

### 3. Detalhes (`detalhe.php`)
* **Função**: Captura o ID enviado via parâmetro na URL (ex: `detalhes.php?id=1`) e executa um `SELECT WHERE id = :id` para exibir de forma isolada todas as informações detalhadas daquele registro específico[cite: 28, 29].

### 4. Editar (`editar.php`)
* [cite_start]**Função**: Carrega os dados atuais do registro em um formulário pré-preenchido baseado no ID[cite: 31]. [cite_start]Ao salvar as alterações, submete uma query `UPDATE` para atualizar as informações no banco de dados[cite: 32].

### 5. Excluir (`excluir.php`)
* **Função**: Arquivo lógico que recebe o ID do registro a ser removido e executa a instrução `DELETE FROM WHERE id = :id`[cite: 34]. Após a remoção, redireciona o usuário de volta para a lista atualizada (`listar.php`)[cite: 35, 36].

---

## 🚀 Como Executar o Projeto

Para rodar o projeto contido em "Project BMCC.zip" localmente, siga estes passos[cite: 38]:

1. **Prepare o ambiente**: Certifique-se de ter um servidor local instalado (como XAMPP, WampServer ou Docker) com suporte a PHP 8.x e MySQL[cite: 39].
2. **Clone/Extraia os arquivos**: Coloque a pasta extraída do "Project BMCC.zip" dentro do diretório raiz do seu servidor local (ex: `htdocs` no XAMPP)[cite: 40, 41].
3. **Importe o Banco de Dados**:
    * [cite_start]Acesse o phpMyAdmin (geralmente em `localhost/phpmyadmin`)[cite: 43].
    * [cite_start]Crie um novo banco de dados chamado `biblioteca` (ou o nome definido no seu arquivo `config.php`)[cite: 43].
    * Vá na aba **Importar**, selecione o arquivo `/sql/biblioteca.sql` localizado no projeto e execute[cite: 44].
4. **Configure a Conexão**:
    * [cite_start]Se necessário, abra o arquivo `/php/config.php` e ajuste o usuário e a senha de conexão com o banco de dados MySQL de acordo com o seu ambiente local[cite: 46].
5. **Acesse no Navegador**:
    * [cite_start]Abra o navegador e digite: `http://localhost/Project BMCC/index.php`[cite: 48].
