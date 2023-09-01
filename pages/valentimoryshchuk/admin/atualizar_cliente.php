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
    $IDcliente = $_GET['IDcliente'];
    $nif = validate($_GET['nif']);
    $email = validate($_GET['email']);
    $primeiro = validate($_GET['primeiro']);
    $apelido = validate($_GET['apelido']);
    $telefone = validate($_GET['telefone']);
    $genero = validate($_GET['genero']);
    $data_nascimento = validate($_GET['data_nascimento']);
    $pais = validate($_GET['pais']);
    $endereco = validate($_GET['endereco']);
    $localidade = validate($_GET['localidade']);
    $codigo_postal = validate($_GET['codigo_postal']);

    /* Verificação de NIF, Email e Telefone repetido */
    $sql_nif = "SELECT * FROM cliente WHERE nif = '$nif' AND IDcliente != $IDcliente";
    $result_nif = mysqli_query($conn, $sql_nif);

    $sql_email = "SELECT * FROM cliente WHERE email = '$email' AND IDcliente != $IDcliente";
    $result_email = mysqli_query($conn, $sql_email);

    $sql_telefone = "SELECT * FROM cliente WHERE telefone = '$telefone' AND IDcliente != $IDcliente";
    $result_telefone = mysqli_query($conn, $sql_telefone);

    if (mysqli_num_rows($result_email) > 0 && mysqli_num_rows($result_telefone) > 0 && mysqli_num_rows($result_nif)>0) {
        header("Location: index.php?error=O NIF, email e número de telefone já estão em uso");
        exit();
    }

    if(mysqli_num_rows($result_nif)>0){
        header("Location: index.php?error=O NIF já está em uso");
        exit();
    }

    if (mysqli_num_rows($result_email) > 0) {
        header("Location: index.php?error=O email já está em uso");
        exit();
    }

    if (mysqli_num_rows($result_telefone) > 0) {
        header("Location: index.php?error=O número de telefone já está em uso");
        exit();
    }

    $sql = "UPDATE cliente SET
            nif = '$nif',
            email = '$email',
            primeiro = '$primeiro',
            apelido = '$apelido',
            telefone = '$telefone',
            genero = '$genero',
            pais = '$pais',
            endereco = '$endereco',
            localidade = '$localidade',
            codigo_postal = '$codigo_postal',
            data_nascimento = '$data_nascimento' WHERE IDcliente = $IDcliente";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php?success=Atualizou os dados com sucesso do utilizador (%23" . $IDcliente . " | NIF - " . $nif .")");
        exit();
    } else {
        header("Location: index.php?error=Ocorreu um erro ao atualizar: " . mysqli_error($conn));
        exit();
    }

?>
