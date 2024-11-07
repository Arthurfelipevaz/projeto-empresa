<?php
include '../backend/conexão.php';

echo "<h2>Funcionários</h2>";

$sql_funcionarios = "SELECT * FROM funcionario";
$result_funcionarios = $conn->query($sql_funcionarios);

if ($result_funcionarios->num_rows > 0) {
    while($row = $result_funcionarios->fetch_assoc()) {
        echo "Código: " . $row["fun_codigo"]. " - Nome: " . $row["fun_nome"]. " - Cargo: " . $row["fun_cargo"]. "<br>";
    }
} else {
    echo "Nenhum funcionário encontrado.<br>";
}

echo "<h2>Registros</h2>";

$sql_registros = "SELECT r.reg_codigo, r.reg_data, r.reg_hora, f.fun_nome FROM registro r INNER JOIN funcionario f ON r.reg_fun = f.fun_codigo";
$result_registros = $conn->query($sql_registros);

if ($result_registros->num_rows > 0) {
    while($row = $result_registros->fetch_assoc()) {
        echo "Código do Registro: " . $row["reg_codigo"] . " - Data: " . $row["reg_data"] . " - Hora: " . $row["reg_hora"] . " - Funcionário: " . $row["fun_nome"] . "<br>";
    }
} else {
    echo "Nenhum registro encontrado.";
}
?>