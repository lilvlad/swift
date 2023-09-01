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

$nometabela = "cliente";

$sql = "SELECT * FROM $nometabela";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) >= 0) {
    $clientes = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $cliente = array(
            'IDcliente' => $row['IDcliente'],
            'primeiro' => $row['primeiro'],
            'apelido' => $row['apelido'],
            'nif' => $row['nif'],
            'email' => $row['email'],
            'telefone' => $row['telefone'],
            'genero' => $row['genero'],
            'data_nascimento' => $row['data_nascimento'],
            'pais' => $row['pais'],
            'localidade' => $row['localidade'],
            'endereco' => $row['endereco'],
            'codigo_postal' => $row['codigo_postal'],
        );

        $clientes[] = $cliente;
    }

    $_SESSION[$nometabela] = $clientes;
} else {
    echo "Não foi possível aceder à tabela clientes.";
    exit();
}

mysqli_close($conn);
?>
