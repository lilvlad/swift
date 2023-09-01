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

if (isset($_SESSION['IDconta'])) {
    $IDconta = $_SESSION['IDconta'];
    
    $nometabela = "transacoes";

    $sql = "SELECT transacoes.*, conta.*
            FROM $nometabela
            INNER JOIN conta ON transacoes.IDconta = conta.IDconta
            WHERE transacoes.IDconta = '$IDconta'
            ORDER BY data_transacao DESC";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) >= 0) {
    $transacoes = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $transacao = array(
            'IDtransacao' => $row['IDtransacao'],
            'descricao' => $row['descricao'],
            'data_transacao' => $row['data_transacao'],
            'valor' => $row['valor'],
            'remetente' => $row['remetente'],
            'recetor' => $row['recetor'],
            'IDconta' => $row['IDconta'],
        );

        
        $transacoes[] = $transacao;
    }

        $_SESSION[$nometabela] = $transacoes;
    } else {
        echo "Não foi possível aceder à tabela transacoes.";
        exit();
    }
}

mysqli_close($conn);
?>
