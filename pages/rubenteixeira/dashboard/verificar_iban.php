<?php
session_start();

$sname = "localhost";
$unmae = "root";
$password = "";
$db_name = "swift";
$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
  echo "Falha ao conectar!";
  exit();
}

$iban = $_GET['iban'];

$verificarIban = $conn->prepare("SELECT iban FROM conta WHERE iban = ?");
$verificarIban->bind_param("s", $iban);
$verificarIban->execute();
$verificarIban->store_result();

if ($verificarIban->num_rows > 0) {
    echo "existe";
} else {
    echo "nao_existe";
}

$verificarIban->close();
$conn->close();
?>
