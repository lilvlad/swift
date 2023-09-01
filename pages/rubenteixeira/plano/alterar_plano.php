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

if (isset($_GET['plano']) && isset($_GET['preco'])) {
  $novoPlano = $_GET['plano'];
  $precoPlano = $_GET['preco'];
  $descricao = 'Subscrição plano ' . $novoPlano;
  $iban = $_SESSION['iban'];
  $recetor = 'Administração Swift';
  $IDconta = $_SESSION['IDconta'];

  $consulta = $conn->prepare("UPDATE conta SET plano = ? WHERE IDconta = ?");
  $consulta->bind_param("si", $novoPlano, $IDconta);
  $consulta->execute();

  $removerDinheiro = $conn->prepare("UPDATE conta SET saldo = saldo - ? WHERE IDconta = ?");
  $removerDinheiro->bind_param("di", $precoPlano, $IDconta);
  $removerDinheiro->execute();

  $adicionarTransacao = $conn->prepare("INSERT INTO transacoes (descricao, valor, remetente, recetor, IDconta) VALUES (?, ?, ?, ?, ?)");
  $adicionarTransacao->bind_param('sdssi', $descricao, $precoPlano, $iban, $recetor, $IDconta);
  $adicionarTransacao->execute();

  $conn->close();

}

header("Location: ../dashboard/index.php");
?>
