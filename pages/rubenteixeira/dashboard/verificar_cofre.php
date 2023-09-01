<?php


$sname = "localhost";
$unmae = "root";
$password = "";
$db_name = "swift";
$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
  echo "Falha ao conectar!";
  exit();
}

$IDconta = $_SESSION['IDconta'];

$verificarCofre = $conn->prepare("SELECT IDconta FROM plano_poupanca WHERE IDconta = ?");
$verificarCofre->bind_param("i", $IDconta);
$verificarCofre->execute();
$verificarCofre->store_result();

if ($verificarCofre->num_rows > 0) {

} else {
    $titulo = "Cofre";
    $descricao = "Cofre Poupança Swift";
    $poupado = 0.0;
    $objetivo = 100.0;

    $criarCofre = $conn->prepare("INSERT INTO plano_poupanca (titulo, descricao, poupado, objetivo, IDconta) VALUES (?, ?, ?, ?, ?)");
    $criarCofre->bind_param('ssddi', $titulo, $descricao, $poupado, $objetivo, $IDconta);
    $criarCofre->execute();

}

$verificarCofre->close();
$conn->close();

?>
