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

function ordenarAgenda($agenda) {
    for ($i = 0; $i < count($agenda); $i++) {
        for ($j = $i + 1; $j < count($agenda); $j++) {
            if ($agenda[$i]["horario"] > $agenda[$j]["horario"]) {
                $temp = $agenda[$i];
                $agenda[$i] = $agenda[$j];
                $agenda[$j] = $temp;
            }
        }
    }

    return $agenda;
}

function primeiroAtendimento($agenda) {
    $agenda = ordenarAgenda($agenda);
    return $agenda[0];
}

function ultimoAtendimento($agenda) {
    $agenda = ordenarAgenda($agenda);
    return $agenda[count($agenda) - 1];
}

function pesquisarPaciente($agenda, $nome) {
    $resultado = [];

    foreach ($agenda as $consulta) {
        if (strtolower($consulta["paciente"]) == strtolower($nome)) {
            $resultado[] = $consulta;
        }
    }

    return $resultado;
}

function primeiroAtendimento($agenda) {
    $agenda = ordenarAgenda($agenda);
    return $agenda[0];
}

function ultimoAtendimento($agenda) {
    $agenda = ordenarAgenda($agenda);
    return $agenda[count($agenda) - 1];
}

function pesquisarPaciente($agenda, $nome) {
    $resultado = [];

    foreach ($agenda as $consulta) {
        if (strtolower($consulta["paciente"]) == strtolower($nome)) {
            $resultado[] = $consulta;
        }
    }

    return $resultado;
}
