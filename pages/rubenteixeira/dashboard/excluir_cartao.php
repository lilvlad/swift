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
  
if (isset($_GET['id'])) {
  $IDcartao = $_GET['id'];

  $consulta = $conn->prepare("DELETE FROM cartao WHERE IDcartao = ?");
  $consulta->bind_param("i", $IDcartao);
  $consulta->execute();

  $conn->close();
}

header("Location: index.php");
?>
