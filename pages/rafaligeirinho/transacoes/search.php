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

if (isset($_SESSION['IDconta'])) {
    $IDconta = $_SESSION['IDconta'];
    $searchTerm = isset($_POST['search']) ? $_POST['search'] : '';

    $nometabela = "transacoes";

    $sql = "SELECT transacoes.*, conta.*
            FROM $nometabela
            INNER JOIN conta ON transacoes.IDconta = conta.IDconta
            WHERE transacoes.IDconta = '$IDconta'
            AND (transacoes.descricao LIKE '%$searchTerm%' OR transacoes.remetente LIKE '%$searchTerm%' OR transacoes.recetor LIKE '%$searchTerm%')
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

        // Return the search results as JSON
        header('Content-Type: application/json');
        echo json_encode($transacoes);
        exit();
    } else {
        echo "Não foi possível aceder à tabela transacoes.";
        exit();
    }
} else {
    echo "<div class='sem-movimentos'>
    <p class='SemMoves' style='color:#757575'>Transação não encontrada</p>
</div>";
}

mysqli_close($conn);
?>
