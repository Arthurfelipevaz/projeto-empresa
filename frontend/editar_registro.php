<?php
include '../backend/conexão.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo = $_POST['codigo'];
    $data = $_POST['data'];
    $hora = $_POST['hora'];
    $fun_codigo = $_POST['fun_codigo'];

    $sql = "UPDATE registro SET reg_data='$data', reg_hora='$hora', reg_fun='$fun_codigo' WHERE reg_codigo=$codigo";

    if ($conn->query($sql) === TRUE) {
        echo "Registro atualizado com sucesso";
    } else {
        echo "Erro ao atualizar registro: " . $conn->error;
    }
}
?>

<form method="post" action="editar_registro.php">
    Código do Registro: 
    <select name="codigo">
        <?php
        $sql = "SELECT reg_codigo, reg_data, reg_hora FROM registro";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['reg_codigo'] . "'>Registro " . $row['reg_codigo'] . " - " . $row['reg_data'] . " " . $row['reg_hora'] . "</option>";
            }
        } else {
            echo "<option value=''>Nenhum registro encontrado</option>";
        }
        ?>
    </select><br>
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
    <input type="submit" value="Atualizar">
</form>