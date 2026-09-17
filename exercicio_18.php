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

function horariosDuplicados($agenda) {
    $horarios = [];

    foreach ($agenda as $consulta) {
        $horario = $consulta["horario"];

        if (isset($horarios[$horario])) {
            return true;
        }

        $horarios[$horario] = 1;
    }

    return false;
}

function organizarAgenda($agenda, $paciente) {
    $resultado = [];

    $resultado["total"] = quantidadeConsultas($agenda);
    $resultado["pacientes"] = pacientesDiferentes($agenda);
    $resultado["especialidades"] = contarEspecialidades($agenda);
    $resultado["primeiro"] = primeiroAtendimento($agenda);
    $resultado["ultimo"] = ultimoAtendimento($agenda);
    $resultado["agenda"] = ordenarAgenda($agenda);
    $resultado["pesquisa"] = pesquisarPaciente($agenda, $paciente);
    $resultado["duplicados"] = horariosDuplicados($agenda);

    return $resultado;
}

$agenda = [
    [
        "paciente" => "João",
        "especialidade" => "Cardiologia",
        "data" => "17/09/2026",
        "horario" => "08:00"
    ],
    [
        "paciente" => "Maria",
        "especialidade" => "Dermatologia",
        "data" => "17/09/2026",
        "horario" => "10:00"
    ],
    [
        "paciente" => "Pedro",
        "especialidade" => "Cardiologia",
        "data" => "17/09/2026",
        "horario" => "09:00"
    ],
    [
        "paciente" => "João",
        "especialidade" => "Ortopedia",
        "data" => "17/09/2026",
        "horario" => "11:00"
    ]
];

$nome = "João";

$resultado = organizarAgenda($agenda, $nome);

echo "Total de consultas: " . $resultado["total"] . "<br>";
echo "Pacientes diferentes: " . $resultado["pacientes"] . "<br>";

echo "<h3>Consultas por especialidade:</h3>";

foreach ($resultado["especialidades"] as $especialidade => $quantidade) {
    echo $especialidade . ": " . $quantidade . "<br>";
}

echo "<h3>Primeiro atendimento:</h3>";
echo $resultado["primeiro"]["paciente"] . " - ";
echo $resultado["primeiro"]["horario"] . "<br>";

echo "<h3>Último atendimento:</h3>";
echo $resultado["ultimo"]["paciente"] . " - ";
echo $resultado["ultimo"]["horario"] . "<br>";

echo "<h3>Agenda ordenada:</h3>";

foreach ($resultado["agenda"] as $consulta) {
    echo $consulta["horario"] . " - ";
    echo $consulta["paciente"] . " - ";
    echo $consulta["especialidade"] . "<br>";
}

echo "<h3>Pesquisa do paciente:</h3>";

foreach ($resultado["pesquisa"] as $consulta) {
    echo $consulta["paciente"] . " - ";
    echo $consulta["especialidade"] . " - ";
    echo $consulta["horario"] . "<br>";
}

echo "<h3>Horários duplicados:</h3>";

if ($resultado["duplicados"]) {
    echo "Existem horários duplicados.";
} else {
    echo "Não existem horários duplicados.";
}

?>