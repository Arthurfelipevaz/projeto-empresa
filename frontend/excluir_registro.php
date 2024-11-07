<?php
include '../backend/conexão.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo = $_POST['codigo'];

    $sql = "DELETE FROM registro WHERE reg_codigo=$codigo";

    if ($conn->query($sql) === TRUE) {
        echo "Registro excluído com sucesso";
    } else {
        echo "Erro ao excluir registro: " . $conn->error;
    }
}
?>

<form method="post" action="excluir_registro.php">
    Código do Registro: <input type="number" name="codigo"><br>
    <input type="submit" value="Excluir">
</form>