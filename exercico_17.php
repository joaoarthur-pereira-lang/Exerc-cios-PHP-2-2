<?php

function limparEspacos($texto) {
    return preg_replace('/\s+/', ' ', trim($texto));
}

function contarCaracteres($texto) {
    return strlen($texto);
}
