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

if (isset($_GET['iban']) && isset($_GET['valor'])) {
    $ibanRecetor = $_GET['iban'];
    $ibanRemetente = $_SESSION['iban'];
    $IDcontaRemetente = $_SESSION['IDconta'];
    $valor = $_GET['valor'];

    $IDcontaRecetor = $conn->prepare("SELECT IDconta FROM conta WHERE iban = ?");
    $IDcontaRecetor->bind_param("s", $ibanRecetor);
    $IDcontaRecetor->execute();
    $IDcontaRecetor->store_result();
    $IDcontaRecetor->bind_result($IDcontaRecetor);
    $IDcontaRecetor->fetch();

    $IDclienteRecetor = $conn->prepare("SELECT IDcliente FROM conta WHERE iban = ?");
    $IDclienteRecetor->bind_param("s", $ibanRecetor);
    $IDclienteRecetor->execute();
    $IDclienteRecetor->store_result();
    $IDclienteRecetor->bind_result($IDclienteRecetor);
    $IDclienteRecetor->fetch();

    $nomeRecetor = $conn->prepare("SELECT primeiro FROM cliente WHERE IDcliente = ?");
    $nomeRecetor->bind_param("i", $IDclienteRecetor);
    $nomeRecetor->execute();
    $nomeRecetor->store_result();
    $nomeRecetor->bind_result($primeiroNome);
    $nomeRecetor->fetch();

    $adicionarDinheiro = $conn->prepare("UPDATE conta SET saldo = saldo + ? WHERE iban = ?");
    $adicionarDinheiro->bind_param("ds", $valor, $ibanRecetor);
    $adicionarDinheiro->execute();

    $removerDinheiro = $conn->prepare("UPDATE conta SET saldo = saldo - ? WHERE iban = ?");
    $removerDinheiro->bind_param("ds", $valor, $ibanRemetente);
    $removerDinheiro->execute();

    $descricaoRecetor = 'Transferência de ' . $_SESSION['primeiro'];
    $descricaoRemetente = 'Transferência para ' . $primeiroNome;

    $adicionarTransacao1 = $conn->prepare("INSERT INTO transacoes (descricao, valor, remetente, recetor, IDconta) VALUES (?, ?, ?, ?, ?)");
    $adicionarTransacao1->bind_param('sdssi', $descricaoRecetor, $valor, $ibanRemetente, $ibanRecetor, $IDcontaRecetor);
    $adicionarTransacao1->execute();

    $adicionarTransacao2 = $conn->prepare("INSERT INTO transacoes (descricao, valor, remetente, recetor, IDconta) VALUES (?, ?, ?, ?, ?)");
    $adicionarTransacao2->bind_param('sdssi', $descricaoRemetente, $valor, $ibanRemetente, $ibanRecetor, $IDcontaRemetente);
    $adicionarTransacao2->execute();

    $conn->close();
}

header("Location: index.php");

?>
