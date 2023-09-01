<?php
session_start();
$sname = "localhost";
$uname = "root";
$password = "";
$db_name = "swift";
$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
    echo "Falha ao conectar!";
    exit();
}

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $idMoeda = validate($_GET["IDmoeda"]);
    $nome = validate($_GET["nome"]);
    $valor = validate($_GET["valor"]);


    $sql = "UPDATE criptomoeda SET
            nome = '$nome',
            valor = '$valor'WHERE IDmoeda = $idMoeda";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php?success=Atualizou os dados com sucesso da Criptomoeda (%23" . $idMoeda . " | Nome - " . $nome .")");
        exit();
    } else {
        header("Location: index.php?error=Ocorreu um erro ao atualizar: " . mysqli_error($conn));
        exit();
    }

?>
