<?php
include '../backend/conexão.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $cargo = $_POST['cargo'];

    $sql = "INSERT INTO funcionario (fun_nome, fun_cargo) VALUES ('$nome', '$cargo')";

    if ($conn->query($sql) === TRUE) {
        echo "Novo funcionário cadastrado com sucesso";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}
?>

<form method="post" action="cadastro_funcionario.php">
    Nome: <input type="text" name="nome"><br>
    Cargo: <input type="text" name="cargo"><br>
    <input type="submit" value="Cadastrar">
</form>