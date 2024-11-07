<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "empresa";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
// Comente ou remova a linha abaixo para não exibir a mensagem
// echo "Conexão bem-sucedida";
?>