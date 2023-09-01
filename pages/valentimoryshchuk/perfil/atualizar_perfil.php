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

/* ID Utilizador atual */
$IDcliente = $_SESSION['IDcliente'];
$email = $_POST['email'];
$primeiro = $_POST['primeiro'];
$apelido = $_POST['apelido'];
$telefone = $_POST['telefone'];
$genero = $_POST['genero'];
$pais = $_POST['pais'];
$endereco = $_POST['endereco'];
$localidade = $_POST['localidade'];
$codigo_postal = $_POST['codigo_postal'];
$data_nascimento = $_POST['data_nascimento'];
/* Password */
$palavra_passe = $_POST['palavra_passe'];
$nova_pass = $_POST['nova_pass'];
$confirm_pass = $_POST['confirm_pass'];

$sql_password = "SELECT palavra_passe FROM cliente WHERE IDcliente = $IDcliente";
$result_password = mysqli_query($conn, $sql_password);
$row_password = mysqli_fetch_assoc($result_password);
$storedPassword = $row_password['palavra_passe'];

/* Verificação de Email e Telefone repetido */
$sql_email_check = "SELECT * FROM cliente WHERE email = '$email' AND IDcliente != $IDcliente";
$result_email_check = mysqli_query($conn, $sql_email_check);

$sql_telefone_check = "SELECT * FROM cliente WHERE telefone = '$telefone' AND IDcliente != $IDcliente";
$result_telefone_check = mysqli_query($conn, $sql_telefone_check);

if (mysqli_num_rows($result_email_check) > 0 && mysqli_num_rows($result_telefone_check) > 0) {
    header("Location: index.php?error=O email e número de telefone já estão em uso");
    exit();
}

if (mysqli_num_rows($result_email_check) > 0) {
    header("Location: index.php?error=O email já está em uso");
    exit();
}

if (mysqli_num_rows($result_telefone_check) > 0) {
    header("Location: index.php?error=O número de telefone já está em uso");
    exit();
}

$sql = "UPDATE cliente SET
        email = '$email',
        primeiro = '$primeiro',
        apelido = '$apelido',
        telefone = '$telefone',
        genero = '$genero',
        pais = '$pais',
        endereco = '$endereco',
        localidade = '$localidade',
        codigo_postal = '$codigo_postal',
        data_nascimento = '$data_nascimento'
        WHERE IDcliente = $IDcliente";

if (!empty($_POST['nova_pass'])) {
    /* Caso palavra_passe for mudada */
    if (password_verify($palavra_passe, $storedPassword)) {
        if ($nova_pass === $confirm_pass) {
            $hashed_password = password_hash($nova_pass, PASSWORD_DEFAULT);
            $sql = "UPDATE cliente SET
                email = '$email',
                palavra_passe = '$hashed_password',
                primeiro = '$primeiro',
                apelido = '$apelido',
                telefone = '$telefone',
                genero = '$genero',
                pais = '$pais',
                endereco = '$endereco',
                localidade = '$localidade',
                codigo_postal = '$codigo_postal',
                data_nascimento = '$data_nascimento'
                WHERE IDcliente = $IDcliente";

            if (mysqli_query($conn, $sql)) {
                $_SESSION['email'] = $email;
                $_SESSION['primeiro'] = $primeiro;
                $_SESSION['apelido'] = $apelido;
                $_SESSION['telefone'] = $telefone;
                $_SESSION['genero'] = $genero;
                $_SESSION['pais'] = $pais;
                $_SESSION['endereco'] = $endereco;
                $_SESSION['localidade'] = $localidade;
                $_SESSION['codigo_postal'] = $codigo_postal;
                $_SESSION['data_nascimento'] = $data_nascimento;

                header("Location: index.php?success=Atualizou os dados com sucesso");
                exit();
            } else {
                header("Location: index.php?error=Ocorreu um erro ao atualizar: " . mysqli_error($conn));
                exit();
            }
        } else {
            header("Location: index.php?error=As palavra-passes não estão iguais");
            exit();
        }
    } else {
        header("Location: index.php?error=A palavra-passe atual está incorreta");
        exit();
    }
} else {
     /* Somente aleterações aos dados */
    if (password_verify($palavra_passe, $storedPassword)) {
        if (mysqli_query($conn, $sql)) {
            $_SESSION['email'] = $email;
            $_SESSION['primeiro'] = $primeiro;
            $_SESSION['apelido'] = $apelido;
            $_SESSION['telefone'] = $telefone;
            $_SESSION['genero'] = $genero;
            $_SESSION['pais'] = $pais;
            $_SESSION['endereco'] = $endereco;
            $_SESSION['localidade'] = $localidade;
            $_SESSION['codigo_postal'] = $codigo_postal;
            $_SESSION['data_nascimento'] = $data_nascimento;

            header("Location: index.php?success=Atualizou os dados com sucesso");
            exit();
        } else {
            header("Location: index.php?error=Ocorreu um erro ao atualizar: " . mysqli_error($conn));
            exit();
        }
    } else {
        header("Location: index.php?error=Palavra-passe incorreta");
        exit();
    }
}
?>
