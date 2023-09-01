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

if (isset($_SESSION['IDcliente'])) {
    $IDcliente = $_SESSION['IDcliente'];

    $sql = "SELECT conta.*, cliente.*
            FROM conta
            INNER JOIN cliente ON conta.IDcliente = cliente.IDcliente
            WHERE conta.IDcliente = '$IDcliente'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $_SESSION['IDconta'] = $row['IDconta'];
        $_SESSION['plano'] = $row['plano'];
        $_SESSION['saldo'] = $row['saldo'];
        $_SESSION['iban'] = $row['iban'];
        $_SESSION['nib'] = $row['nib'];
        $_SESSION['IDcliente'] = $row['IDcliente'];
    } else {
        echo "A tabela conta precisa de ter dados inseridos.";
        exit();
    }
}
?>
