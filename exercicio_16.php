<?php 

function contarMaiusculas($senha) {
    $total = 0;

    for ($i = 0; $i < strlen($senha); $i++) {
        if ($senha[$i] >= "A" && $senha[$i] <= "Z") {
            $total++;
        }
    }

    return $total;
}

function contarMinusculas($senha) {
    $total = 0;

    for ($i = 0; $i < strlen($senha); $i++) {
        if ($senha[$i] >= "a" && $senha[$i] <= "z") {
            $total++;
        }
    }

    return $total;
}

function contarNumeros($senha) {
    $total = 0;

    for ($i = 0; $i < strlen($senha); $i++) {
        if ($senha[$i] >= "0" && $senha[$i] <= "9") {
            $total++;
        }
    }

    return $total;
}

function contarEspeciais($senha) {
    $total = 0;

    for ($i = 0; $i < strlen($senha); $i++) {
        if (
            !($senha[$i] >= "A" && $senha[$i] <= "Z") &&
            !($senha[$i] >= "a" && $senha[$i] <= "z") &&
            !($senha[$i] >= "0" && $senha[$i] <= "9")
        ) {
            $total++;
        }
    }

    return $total;
}

function classificarSenha($senha) {
    $pontos = 0;

    if (strlen($senha) >= 8) {
        $pontos++;
    }

    if (contarMaiusculas($senha) > 0) {
        $pontos++;
    }

    if (contarMinusculas($senha) > 0) {
        $pontos++;
    }

    if (contarNumeros($senha) > 0) {
        $pontos++;
    }

    if (contarEspeciais($senha) > 0) {
        $pontos++;
    }

    if ($pontos <= 2) {
        return "Fraca";
    } elseif ($pontos == 3) {
        return "Média";
    } elseif ($pontos == 4) {
        return "Forte";
    } else {
        return "Muito Forte";
    }
}

function analisarSenha($senha) {
    $resultado = [];

    $resultado[] = contarMaiusculas($senha);
    $resultado[] = contarMinusculas($senha);
    $resultado[] = contarNumeros($senha);
    $resultado[] = contarEspeciais($senha);
    $resultado[] = strlen($senha);
    $resultado[] = classificarSenha($senha);

    return $resultado;
}

$senha = "Senha@123";

$resultado = analisarSenha($senha);

echo "Maiúsculas: " . $resultado[0] . "<br>";
echo "Minúsculas: " . $resultado[1] . "<br>";
echo "Números: " . $resultado[2] . "<br>";
echo "Caracteres especiais: " . $resultado[3] . "<br>";
echo "Tamanho: " . $resultado[4] . "<br>";
echo "Segurança: " . $resultado[5];

?>

