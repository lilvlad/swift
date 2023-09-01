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

if (isset($_SESSION['IDcliente'])) {
    $IDcliente = $_SESSION['IDcliente'];

    $sql = "SELECT detalhes_cartao.*
            FROM detalhes_cartao
            WHERE detalhes_cartao.IDcliente = '$IDcliente'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $_SESSION['plano'] = $row['plano'];
        $_SESSION['saldo'] = $row['saldo'];
        $_SESSION['data_validade'] = $row['data_validade'];
        $_SESSION['primeiro'] = $row['primeiro'];
        $_SESSION['apelido'] = $row['apelido'];
        $_SESSION['poupado'] = $row['poupado'];
    } else {
        exit();
    }
}
?>
