<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade</title>
</head>
<body>
    <h3>Atividade</h3>
    
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <label for="texto">Texto:</label>
        <input type="text" id="texto" name="texto" required>
        <br><br>

        <label for="numero">Número:</label>
        <input type="number" id="numero" name="numero" required>
        <br><br>

        <input type="submit" value="Enviar"/> 
    </form>

    <?php 
    function substituirVogais($mensagem) {
        return preg_replace('/[aeiouAEIOU]/', '*', $mensagem);
    }

    function ehPrimo($num) {
        if ($num < 2) return false;
        for ($i = 2; $i <= sqrt($num); $i++) {
            if ($num % $i == 0) return false;
        }
        return true;
    }

    function ehPalindromo($texto) {
       $texto = strtolower(str_replace(' ', '', $texto));
       $invertido = inverterString($texto);
       return $texto === $invertido;
    }

    function inverterString($str) {
        $invertida = ""; 
        for ($i = strlen($str) - 1; $i >= 0; $i--) {
            $invertida .= $str[$i]; 
        }
        return $invertida;
    }

    function contarPalavras($frase) {
        $palavras = explode(" ", trim($frase));
        $quantidade = count($palavras); 
        $resultado = "<p><strong>Total de palavras:</strong> $quantidade</p>";
        foreach ($palavras as $palavra) {
            $resultado .= "$palavra <br>";
        }
        return $resultado;
    }

    function substituirMultiplosDeTres() {
        $resultado = "";
        for ($i = 1; $i <= 20; $i++) {
            $resultado .= ($i % 3 == 0) ? "x " : "$i ";
        }
        return trim($resultado);
    }

    function somaDigitos($num) {
        $soma = 0;
        $numStr = (string)$num; 
        for ($i = 0; $i < strlen($numStr); $i++) {
            $soma += intval($numStr[$i]); 
        }
        return $soma;
    }

    function ehPerfeito($num) {
        if ($num < 2) return false;
        $soma = 0;
        for ($i = 1; $i < $num; $i++) {
            if ($num % $i == 0) {
                $soma += $i;
            }
        }
        return $soma === $num;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $texto = $_POST["texto"]; 
        $numero = intval($_POST["numero"]); 

        $contagemPalavras = contarPalavras($texto);
        $textoInvertido = inverterString($texto);
        $textoModificado = substituirVogais($texto);

        $ehPrimo = ehPrimo($numero) ? "Sim, é um número primo." : "Não, não é um número primo.";
        $ehPalindromo = ehPalindromo($texto) ? "Sim, é um palíndromo." : "Não, não é um palíndromo.";
        $numerosSubstituidos = substituirMultiplosDeTres();
        $somaDosDigitos = somaDigitos($numero);
        $ehPerfeito = ehPerfeito($numero) ? "Sim, eh um número perfeito." : "Não, não eh um número perfeito.";

        echo "<h3>Resultados:</h3>";
        echo "<p><strong>Texto com *:</strong> " . htmlspecialchars($textoModificado) . "</p>";
        echo "<p><strong>Texto invertido:</strong> " . htmlspecialchars($textoInvertido) . "</p>";
        echo "<p><strong>Contagem de palavras:</strong></p>" . $contagemPalavras;
        echo "<p><strong>eh primo?</strong> " . $ehPrimo . "</p>";
        echo "<p><strong>eh palíndromo?</strong> " . $ehPalindromo . "</p>";
        echo "<p><strong>Números de 1 a 20 (múltiplos de 3 como 'x'):</strong> $numerosSubstituidos</p>";
        echo "<p><strong>Soma dos dígitos do número:</strong> $somaDosDigitos</p>";
        echo "<p><strong>eh um número perfeito?</strong> " . $ehPerfeito . "</p>";
    }
    ?>
</body>
</html>
