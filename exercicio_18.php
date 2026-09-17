<?php

function quantidadeConsultas($agenda) {
    return count($agenda);
}

function pacientesDiferentes($agenda) {
    $pacientes = [];

    foreach ($agenda as $consulta) {
        if (!in_array($consulta["paciente"], $pacientes)) {
            $pacientes[] = $consulta["paciente"];
        }
    }

    return count($pacientes);
}

function contarEspecialidades($agenda) {
    $especialidades = [];

    foreach ($agenda as $consulta) {
        $especialidade = $consulta["especialidade"];

        if (isset($especialidades[$especialidade])) {
            $especialidades[$especialidade]++;
        } else {
            $especialidades[$especialidade] = 1;
        }
    }

    return $especialidades;
}
