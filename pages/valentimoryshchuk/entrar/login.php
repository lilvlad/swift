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

if (isset($_POST['email']) && isset($_POST['palavra_passe'])) {

    $email = $_POST['email'];
    $pass = $_POST['palavra_passe'];

    $sql = "SELECT * FROM cliente WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $storedPassword = $row['palavra_passe'];

        if (password_verify($pass, $storedPassword)) {
            /* Pass correta */
            $_SESSION['email'] = $row['email'];
            $_SESSION['palavra_passe'] = $row['palavra_passe'];
            $_SESSION['primeiro'] = $row['primeiro'];
            $_SESSION['apelido'] = $row['apelido'];
            $_SESSION['telefone'] = $row['telefone'];
            $_SESSION['genero'] = $row['genero'];
            $_SESSION['nif'] = $row['nif'];
            $_SESSION['pais'] = $row['pais'];
            $_SESSION['endereco'] = $row['endereco'];
            $_SESSION['localidade'] = $row['localidade'];
            $_SESSION['codigo_postal'] = $row['codigo_postal'];
            $_SESSION['data_nascimento'] = $row['data_nascimento'];
            $_SESSION['IDcliente'] = $row['IDcliente'];

            header("Location: http://localhost/dev/pages/rubenteixeira/dashboard/index.php");
            exit();
        } else {
            /* Pass incorreta */
            header("Location: http://localhost/dev/pages/valentimoryshchuk/entrar/index.php?error=Email ou Palavra Passe Incorreta");
            exit();
        }
    } else {
        header("Location: http://localhost/dev/pages/valentimoryshchuk/entrar/index.php?error=Utilizador não encontrado");
        exit();
    }
} else {
    header("Location: http://localhost/dev/pages/valentimoryshchuk/entrar/index.php");
    exit();
}
