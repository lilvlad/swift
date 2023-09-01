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

$numCartao = gerarNumeroAleatorio(16);
$pin = gerarNumeroAleatorio(4);
$cvv = gerarNumeroAleatorio(3);
$dataValidade = gerarDataValidade();
$IDconta = $_SESSION['IDconta'];

function gerarDataValidade() {
    $anoAtual = date('Y');
    $anoExpiracao = $anoAtual + 3;
    $dataValidade = date('Y-m-d', mktime(0, 0, 0, rand(1, 12), 1, $anoExpiracao));
    return $dataValidade;
}

function gerarNumeroAleatorio($comprimento) {
    $numeros = '0123456789';
    $numeroAleatorio = '';
    for ($i = 0; $i < $comprimento; $i++) {
        $numeroAleatorio .= $numeros[rand(0, strlen($numeros) - 1)];
    }
    return $numeroAleatorio;
}

$sql = "INSERT INTO cartao (num_cartao, pin, cvv, data_validade, IDconta) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ssssi', $numCartao, $pin, $cvv, $dataValidade, $IDconta);

$stmt->execute();

$stmt->close();
mysqli_close($conn);

header("Location: index.php");


?>