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

if (isset($_GET['valor']) && isset($_GET['metodo']) ) {
  $novoSaldo = $_GET['valor'];
  $metodo = $_GET['metodo'];
  $descricao = 'Dinheiro adicionado via ' .$metodo;
  $remetente = 'Administração Swift';
  $IDconta = $_SESSION['IDconta'];
  $iban = $_SESSION['iban'];

  $adicionarDinheiro = $conn->prepare("UPDATE conta SET saldo = saldo + ? WHERE IDconta = ?");
  $adicionarDinheiro->bind_param("di", $novoSaldo, $IDconta);
  $adicionarDinheiro->execute();

  $adicionarTransacao = $conn->prepare("INSERT INTO transacoes (descricao, valor, remetente, recetor, IDconta) VALUES (?, ?, ?, ?, ?)");
  $adicionarTransacao->bind_param('sdssi', $descricao, $novoSaldo, $remetente, $iban, $IDconta);
  $adicionarTransacao->execute();

  $conn->close();

}

header("Location: index.php");
?>
