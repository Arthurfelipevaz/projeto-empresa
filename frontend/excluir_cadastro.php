<?php
include '../backend/conexão.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo = $_POST['codigo'];

    // Primeiro, exclua os registros associados ao funcionário
    $sql_registros = "DELETE FROM registro WHERE reg_fun=$codigo";
    if ($conn->query($sql_registros) === TRUE) {
        // Agora, exclua o funcionário
        $sql_funcionario = "DELETE FROM funcionario WHERE fun_codigo=$codigo";
        if ($conn->query($sql_funcionario) === TRUE) {
            echo "Cadastro excluído com sucesso";
        } else {
            echo "Erro ao excluir funcionário: " . $sql_funcionario . "<br>" . $conn->error;
        }
    } else {
        echo "Erro ao excluir registros associados: " . $sql_registros . "<br>" . $conn->error;
    }
}
?>

<form method="post" action="excluir_cadastro.php">
    Código: <input type="number" name="codigo"><br>
    <input type="submit" value="Excluir">
</form>