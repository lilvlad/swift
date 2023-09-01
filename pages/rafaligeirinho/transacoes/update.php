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

$IDtransacao = $_GET['id']; 
$descricao = $_GET['descricao'];

$sql = "UPDATE transacoes SET descricao = '$descricao' WHERE IDtransacao = $IDtransacao";

if (mysqli_query($conn, $sql)) {
    $_SESSION['descricao'] = $descricao;
    header("Location: index.php?success=Atualizou os dados com sucesso");
    exit();
} else {
    header("Location: index.php?error=Ocorreu um erro ao atualizar: " . mysqli_error($conn));
    exit();
}
?>
