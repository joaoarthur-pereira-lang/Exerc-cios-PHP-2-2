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