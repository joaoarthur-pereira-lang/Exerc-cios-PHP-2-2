<?php 

function contarMaiusculas(senha) {
    let total = 0;

    for (let i = 0; i < senha.length; i++) {
        if (senha[i] >= "A" && senha[i] <= "Z") {
            total++;
        }
    }

    return total;
}

function contarMinusculas(senha) {
    let total = 0;

    for (let i = 0; i < senha.length; i++) {
        if (senha[i] >= "a" && senha[i] <= "z") {
            total++;
        }
    }

    return total;
}

function contarNumeros(senha) {
    let total = 0;

    for (let i = 0; i < senha.length; i++) {
        if (senha[i] >= "0" && senha[i] <= "9") {
            total++;
        }
    }

    return total;
}

function contarEspeciais(senha) {
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