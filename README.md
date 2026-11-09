

# 📚 Sistema de Cadastro de Alunos (CRUD PHP)

Sistema web desenvolvido em **PHP puro** com **PDO (PHP Data Objects)** e **MySQL** para gerenciar o cadastro de alunos, permitindo listar, cadastrar, editar e excluir registros de forma simples e segura.

---

## 🚀 Tecnologias Utilizadas

* **PHP** (>= 8.0)
* **MySQL** (Banco de Dados Relacional)
* **PDO** (Conexão e segurança contra SQL Injection via Prepared Statements)
* **HTML5**

---

## ⚙️ Funcionalidades

* **Listagem de Alunos:** Visualização de todos os alunos cadastrados em formato de tabela[cite: 4].
* **Cadastro de Alunos:** Formulário com validação de campos obrigatórios, formato de e-mail e seleção de cursos pré-definidos.
* **Edição de Alunos:** Atualização de dados existentes no sistema.
* **Exclusão de Alunos:** Remoção de registros do banco de dados via ID validado.

---

## 📂 Estrutura do Projeto

```text
├── conexao.php    # Arquivo de configuração e conexão com o banco de dados via PDO
├── index.php      # Página principal com a listagem de alunos[cite: 4]
├── cadastrar.php  # Lógica e formulário para cadastro de novos alunos
├── editar.php     # Lógica e formulário para edição de alunos
└── excluir.php    # Script responsável por remover o aluno do banco[cite: 3]
