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

$nometabela = "plano_poupanca";
$IDconta = $_SESSION['IDconta'];

$sql = "SELECT * FROM $nometabela WHERE IDconta = $IDconta";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) >= 0) {
    $poupanca = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $poupancas = array(
            'IDpoupanca' => $row['IDpoupanca'],
            'titulo' => $row['titulo'],
            'descricao' => $row['descricao'],
            'poupado' => $row['poupado'],
            'objetivo' => $row['objetivo'],
            'IDconta' => $row['IDconta']
        );

        $poupanca[] = $poupancas;
    }

    $_SESSION[$nometabela] = $poupanca;
} else {
    echo "Não foram encontrados cartões para o utilizador atual.";
    exit();
}

mysqli_close($conn);
?>
