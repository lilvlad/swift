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

if (isset($_GET['objetivo'])) {
  $objetivo = $_GET['objetivo'];

  $alterarObjetivo = $conn->prepare("UPDATE plano_poupanca SET objetivo = ? WHERE IDconta = ?");
  $alterarObjetivo->bind_param("di", $objetivo, $_SESSION['IDconta']);
  $alterarObjetivo->execute();

  $conn->close();

}

header("Location: index.php");
?>
