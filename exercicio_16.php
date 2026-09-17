<?php 

function contarMaiusculas($senha) {
    let total = 0;

    for (let i = 0; i < senha.length; i++) {
        if (senha[i] >= "A" && senha[i] <= "Z") {
            total++;
        }
    }

    return total;
}

function contarMinusculas($senha) {
    let total = 0;

    for (let i = 0; i < senha.length; i++) {
        if (senha[i] >= "a" && senha[i] <= "z") {
            total++;
        }
    }

    return total;
}

function contarNumeros($senha) {
    let total = 0;

    for (let i = 0; i < senha.length; i++) {
        if (senha[i] >= "0" && senha[i] <= "9") {
            total++;
        }
    }

    return total;
}

function contarEspeciais($senha) {
    let total = 0;

    for (let i = 0; i < senha.length; i++) {
        if (
            !(senha[i] >= "A" && senha[i] <= "Z") &&
            !(senha[i] >= "a" && senha[i] <= "z") &&
            !(senha[i] >= "0" && senha[i] <= "9")
        ) {
            total++;
        }
    }

    return total;
}

function classificarSenha($senha) {
    let pontos = 0;

    if ($senha.length >= 8) {
        pontos++;
    }

    if (contarMaiusculas($senha) > 0) {
        pontos++;
    }

    if (contarMinusculas(senha) > 0) {
        pontos++;
    }

    if (contarNumeros($senha) > 0) {
        pontos++;
    }

    if (contarEspeciais($senha) > 0) {
        pontos++;
    }

    if (pontos <= 2) {
        return "Fraca";

    } else if (pontos == 3) {
        return "Média";

    } else if (pontos == 4) {
        return "Forte";

    } else {
        return "Muito Forte";
    }
}

function analisarSenha($senha) {
    let resultado = [];

    resultado.push(contarMaiusculas(senha));
    resultado.push(contarMinusculas(senha));
    resultado.push(contarNumeros(senha));
    resultado.push(contarEspeciais(senha));
    resultado.push(senha.length);
    resultado.push(classificarSenha(senha));

    return resultado;
}

console.log(analisarSenha("Senha@123"));


?>

