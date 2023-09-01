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

$nometabela = "transacoes";
$IDconta = $_SESSION['IDconta'];

$sql = "SELECT * FROM $nometabela WHERE IDconta = $IDconta";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) >= 0) {
    $transacao = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $transacoes = array(
            'IDtransacao' => $row['IDtransacao'],
            'descricao' => $row['descricao'],
            'data_transacao' => $row['data_transacao'],
            'valor' => $row['valor'],
            'remetente' => $row['remetente'],
            'recetor' => $row['recetor'],
			'IDconta' => $row['IDconta']
        );

        $transacao[] = $transacoes;
    }

    $_SESSION[$nometabela] = $transacao;
} else {
    echo "Não foram encontrados cartões para o utilizador atual.";
    exit();
}

mysqli_close($conn);
?>
