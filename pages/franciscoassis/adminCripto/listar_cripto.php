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

$nometabela = "criptomoeda";

$sql = "SELECT * FROM $nometabela";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) >= 0) {
    $Criptomoedas = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $criptomoeda = array(
            'IDmoeda' => $row['IDmoeda'],
            'nome' => $row['nome'],
            'valor' => $row['valor'],
        );

        $Criptomoedas[] = $criptomoeda;
    }

    $_SESSION[$nometabela] = $Criptomoedas;
} else {
    echo "Não foi possível aceder à tabela Criptomoedas.";
    exit();
}

mysqli_close($conn);
?>
