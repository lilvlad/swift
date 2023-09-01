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

if (isset($_GET['valorL'])) {
  $deposito = $_GET['valorL'];
  $descricao = 'Do Cofre';
  $remetente = 'Cofre Swift';
  $IDconta = $_SESSION['IDconta'];
  $iban = $_SESSION['iban'];

  $removerDinheiro = $conn->prepare("UPDATE plano_poupanca SET poupado = poupado - ? WHERE IDconta = ?");
  $removerDinheiro->bind_param("di", $deposito, $IDconta);
  $removerDinheiro->execute();

  $adicionarDinheiro = $conn->prepare("UPDATE conta SET saldo = saldo + ? WHERE IDconta = ?");
  $adicionarDinheiro->bind_param("di", $deposito, $IDconta);
  $adicionarDinheiro->execute();

  $adicionarTransacao = $conn->prepare("INSERT INTO transacoes (descricao, valor, remetente, recetor, IDconta) VALUES (?, ?, ?, ?, ?)");
  $adicionarTransacao->bind_param('sdssi', $descricao, $deposito, $remetente, $iban, $IDconta);
  $adicionarTransacao->execute();

  $conn->close();

}

header("Location: index.php");
?>
