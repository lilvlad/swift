<?php
session_start();
$sname = "localhost";
$uname = "root";
$password = "";
$db_name = "swift";
$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
    echo "Falha ao conectar!";
    exit();
}

$IDpoupanca = $_GET['id']; // Retrieve the transacaoId from the URL parameter
$descricao = $_GET['descricao']; // Retrieve the descricao value from the URL parameter

$sql = "UPDATE plano_poupanca SET descricao = '$descricao' WHERE IDpoupanca = $IDpoupanca";

if (mysqli_query($conn, $sql)) {
    $_SESSION['descricao'] = $descricao;
    header("Location: index.php?success=Atualizou os dados com sucesso");
    exit();
} else {
    header("Location: index.php?error=Ocorreu um erro ao atualizar: " . mysqli_error($conn));
    exit();
}
?>
