<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Alunos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Cadastro de Alunos</h2>
    <h3>Bruno e Nathaly Atividade 03 - Web mobile</h3>
    <form action="cadastro.php" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>
        <br>
        
        <label for="matricula">Matrícula:</label>
        <input type="text" name="matricula" required>
        <br>
        
        <label for="curso">Curso:</label>
        <input type="text" name="curso" required>
        <br>

        <button type="submit">Cadastrar</button>
    </form>

    <h2>Lista de Alunos</h2>
    <ul>
        
        // puxa as funçoes do cadastro php e aplica no formulario html 
        <?php
        require "cadastro.php";
        foreach ($alunos as $aluno) {
            echo "<li>Nome: {$aluno->getNome()} - Matrícula: {$aluno->getMatricula()} - Curso: {$aluno->getCurso()}</li>";
        }
        ?>
    </ul>


    
</body>
   
</html>
