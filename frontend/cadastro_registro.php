<?php
include '../backend/conexão.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = $_POST['data'];
    $hora = $_POST['hora'];
    $fun_codigo = $_POST['fun_codigo'];

    $sql = "INSERT INTO registro (reg_data, reg_hora, reg_fun) VALUES ('$data', '$hora', '$fun_codigo')";

    if ($conn->query($sql) === TRUE) {
        echo "Novo registro cadastrado com sucesso";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}
?>

<form method="post" action="cadastro_registro.php">
    Data: <input type="date" name="data"><br>
    Hora: <input type="time" name="hora"><br>
    Código do Funcionário: 
    <select name="fun_codigo">
        <?php
        $sql = "SELECT fun_codigo, fun_nome FROM funcionario";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['fun_codigo'] . "'>" . $row['fun_nome'] . "</option>";
            }
        } else {
            echo "<option value=''>Nenhum funcionário encontrado</option>";
        }
        ?>
    </select><br>
    <input type="submit" value="Cadastrar">
</form>