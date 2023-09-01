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

if (isset($_GET['valorD'])) {
  $deposito = $_GET['valorD'];
  $descricao = 'Para o Cofre';
  $recetor = 'Cofre Swift';
  $IDconta = $_SESSION['IDconta'];
  $iban = $_SESSION['iban'];

  $adicionarDinheiro = $conn->prepare("UPDATE plano_poupanca SET poupado = poupado + ? WHERE IDconta = ?");
  $adicionarDinheiro->bind_param("di", $deposito, $IDconta);
  $adicionarDinheiro->execute();

  $removerDinheiro = $conn->prepare("UPDATE conta SET saldo = saldo - ? WHERE IDconta = ?");
  $removerDinheiro->bind_param("di", $deposito, $IDconta);
  $removerDinheiro->execute();

  $adicionarTransacao = $conn->prepare("INSERT INTO transacoes (descricao, valor, remetente, recetor, IDconta) VALUES (?, ?, ?, ?, ?)");
  $adicionarTransacao->bind_param('sdssi', $descricao, $deposito, $iban, $recetor, $IDconta);
  $adicionarTransacao->execute();

  $conn->close();

}

header("Location: index.php");
?>
