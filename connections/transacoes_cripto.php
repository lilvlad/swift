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

$nometabela = "transacoes_crypto";
$IDcrypto = $_SESSION['IDcrypto'];

$sql = "SELECT * FROM $nometabela WHERE IDcrypto = $IDcrypto";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $transacao = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $IDmoeda = $row['IDmoeda'];

        $sqlMoeda = "SELECT nome FROM criptomoeda WHERE IDmoeda = $IDmoeda";
        $resultMoeda = mysqli_query($conn, $sqlMoeda);
        $rowMoeda = mysqli_fetch_assoc($resultMoeda);
        $nomeMoeda = $rowMoeda['nome'];

        $transacoes = array(
            'id' => $row['id'],
            'quantidade' => $row['quantidade'],
            'data_transacao' => $row['data_transacao'],
            'tipo_transacao' => $row['tipo_transacao'],
            'IDcrypto' => $row['IDcrypto'],
            'IDmoeda' => $row['IDmoeda'],
            'nome' => $nomeMoeda
        );

        $transacao[] = $transacoes; 
    }

    $_SESSION['transacoes_crypto'] = $transacao; 
} else {
    
}

mysqli_close($conn);
?>