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