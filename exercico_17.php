<?php

function limparEspacos($texto) {
    return preg_replace('/\s+/', ' ', trim($texto));
}

function contarCaracteres($texto) {
    return strlen($texto);
}

function contarPalavras($texto) {
    $palavras = explode(" ", limparEspacos($texto));
    return count($palavras);
}

function contarFrases($texto) {
    $frases = explode(".", $texto);
    return count($frases) - 1;
}

function maiorPalavra($texto) {
    $palavras = explode(" ", limparEspacos($texto));
    $maior = "";

    foreach ($palavras as $palavra) {
        if (strlen($palavra) > strlen($maior)) {
            $maior = $palavra;
        }
    }

    return $maior;
}

function menorPalavra($texto) {
    $palavras = explode(" ", limparEspacos($texto));
    $menor = $palavras[0];

    foreach ($palavras as $palavra) {
        if (strlen($palavra) < strlen($menor)) {
            $menor = $palavra;
        }
    }

    return $menor;
}

function palavrasRepetidas($texto) {
    $palavras = explode(" ", limparEspacos(strtolower($texto)));
    $contagem = array_count_values($palavras);

    $total = 0;

    foreach ($contagem as $quantidade) {
        if ($quantidade > 1) {
            $total++;
        }
    }

    return $total;
}

function palavrasFrequentes($texto) {
    $palavras = explode(" ", limparEspacos(strtolower($texto)));
    $contagem = array_count_values($palavras);

    arsort($contagem);

    return array_slice($contagem, 0, 5);
}

function formatarTexto($texto) {
    return ucwords(strtolower(limparEspacos($texto)));
}

function processarTexto($texto) {
    $resultado = [];

    $resultado["caracteres"] = contarCaracteres($texto);
    $resultado["palavras"] = contarPalavras($texto);
    $resultado["frases"] = contarFrases($texto);
    $resultado["maior"] = maiorPalavra($texto);
    $resultado["menor"] = menorPalavra($texto);
    $resultado["repetidas"] = palavrasRepetidas($texto);
    $resultado["frequentes"] = palavrasFrequentes($texto);
    $resultado["sem_espacos"] = limparEspacos($texto);
    $resultado["formatado"] = formatarTexto($texto);

    return $resultado;
}

$texto = "o aluno estuda muito. o aluno gosta de estudar. estudar e importante.";

$resultado = processarTexto($texto);

echo "Caracteres: " . $resultado["caracteres"] . "<br>";
echo "Palavras: " . $resultado["palavras"] . "<br>";
echo "Frases: " . $resultado["frases"] . "<br>";
echo "Maior palavra: " . $resultado["maior"] . "<br>";
echo "Menor palavra: " . $resultado["menor"] . "<br>";
echo "Palavras repetidas: " . $resultado["repetidas"] . "<br>";

echo "Palavras mais frequentes:<br>";

foreach ($resultado["frequentes"] as $palavra => $quantidade) {
    echo $palavra . " = " . $quantidade . "<br>";
}

echo "Texto sem espaços duplicados: " . $resultado["sem_espacos"] . "<br>";
echo "Texto formatado: " . $resultado["formatado"];

?>