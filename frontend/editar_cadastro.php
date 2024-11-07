<?php
include '../backend/conexão.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];
    $cargo = $_POST['cargo'];

    $sql = "UPDATE funcionario SET fun_nome='$nome', fun_cargo='$cargo' WHERE fun_codigo=$codigo";

    if ($conn->query($sql) === TRUE) {
        echo "Cadastro atualizado com sucesso";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}
?>

<form method="post" action="editar_cadastro.php">
    Código do Funcionário: 
    <select name="codigo">
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
    Nome: <input type="text" name="nome"><br>
    Cargo: <input type="text" name="cargo"><br>
    <input type="submit" value="Atualizar">
</form>