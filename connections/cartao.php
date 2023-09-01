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

$IDconta = $_SESSION['IDconta'];

$sql = "SELECT * FROM cartao WHERE IDconta = $IDconta";
$resultado = mysqli_query($conn, $sql);

if (mysqli_num_rows($resultado) > 0) {
    // Array para armazenar os cartões
    $cartoes = array();

    while ($row = mysqli_fetch_assoc($resultado)) {
        $cartao = array(
            'IDcartao' => $row['IDcartao'],
            'pin' => $row['pin'],
            'data_validade' => $row['data_validade'],
            'cvv' => $row['cvv'],
            'num_cartao' => $row['num_cartao'],
            'IDconta' => $row['IDconta']
        );
        // Adicionar o cartão ao array
        $cartoes[] = $cartao; 
    }
    // Armazenar o array de cartões na variável de sessão
    $_SESSION['cartoes'] = $cartoes; 
} else {
    echo "Não foram encontrados cartões para o utilizador atual.";
    exit();
}

mysqli_close($conn);
?>
