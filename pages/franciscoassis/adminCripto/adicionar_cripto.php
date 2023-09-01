<?php
session_start();

$sname = "localhost";
$unmae = "root";
$password = "";
$db_name = "swift";

$conn = new mysqli($sname, $unmae, $password, $db_name);

if ($conn->connect_error) {
    echo "Falha ao conectar: " . $conn->connect_error;
    exit();
}

$nome = $_GET["nome"];
$valor = $_GET["valor"];

$sql_nome = "SELECT * FROM criptomoeda WHERE nome = '$nome'";
$result_nome = $conn->query($sql_nome);

if ($result_nome->num_rows > 0) {
    header("Location: index.php?error=A Criptomoeda já existe");
    exit();
}

$sql = "INSERT INTO criptomoeda(nome, valor) VALUES(?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $nome, $valor);

if ($stmt->execute()) {
    header("Location: index.php?success=Criptomoeda inserida com sucesso!");
} else {
    header("Location: index.php?error=Ocorreu um erro desconhecido.");
    exit();
}
?>
