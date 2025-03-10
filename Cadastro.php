<?php
require_once "CadastroAlunos.php";

session_start();

if (!isset($_SESSION['cadastro'])) {
    $_SESSION['cadastro'] = new CadastroAlunos();
}

$cadastro = $_SESSION['cadastro'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"] ?? "";
    $matricula = $_POST["matricula"] ?? "";
    $curso = $_POST["curso"] ?? "";

    if (!empty($nome) && !empty($matricula) && !empty($curso)) {
        $aluno = new Aluno($nome, $matricula, $curso);
        $cadastro->cadastrarAluno($aluno);
    }
}

$alunos = $cadastro->listarAlunos();
?>
