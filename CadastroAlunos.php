<?php
require_once "Aluno.php";

class CadastroAlunos {
    private array $alunos = [];

    public function cadastrarAluno(Aluno $aluno): void {
        $this->alunos[] = $aluno;
    }

    public function listarAlunos(): array {
        return $this->alunos;
    }
}
?>
