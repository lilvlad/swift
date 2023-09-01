<?php
session_start();
if (!isset($_SESSION['authenticated'])) {
    header('Location: login.php');
    exit(0);
}

$email = array_key_exists('email', $_POST) ? $_POST['email'] : "";
$nome = array_key_exists('nome', $_POST) ? $_POST['nome'] : "";
$pass = array_key_exists('pass', $_POST) ? $_POST['pass'] : "";
$foto = array_key_exists('foto', $_FILES) ? $_FILES['foto']['name'] : "";

$msg_erro = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($email == "" || $pass == "" || $nome == "")
        $msg_erro = "ERRO: email, nome e password são campos obrigatórios!";
    else {
        require_once "db_config.php";
        $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
        if ($conn->connect_errno) {
            $code = $conn->connect_errno;
            $message = $conn->connect_error;
            $msg_erro = "ERRO: Falha na ligação à BD ($code $message)!";
        } else {
            $email = $conn->real_escape_string($email);
            $nome = $conn->real_escape_string($nome);
            $pass_hash = hash('sha512', $pass);

            $query = "INSERT INTO `utilizador` (`email`, `nome`, `pass`) VALUES ('$email', '$nome', '$pass_hash')";

            if ($foto != "" && getimagesize($_FILES['foto']['tmp_name']) ) {
                $diretoria_upload = "uploads/";
                $extensao = pathinfo($foto, PATHINFO_EXTENSION);
                $novo_ficheiro = $diretoria_upload . sha1(microtime()) . "." . $extensao;
                
                if (move_uploaded_file($_FILES['foto']['tmp_name'], $novo_ficheiro)) {
                    $query = "INSERT INTO `utilizador` (`email`, `nome`, `pass`, `foto`) VALUES ('$email', '$nome', '$pass_hash', '$novo_ficheiro')";
                }
            }

            $sucesso_query = $conn->query($query);
            if ($sucesso_query) {
                header("Location: listUser.php");
                exit(0);
            } else {
                $code = $conn->errno;
                $message = $conn->error;
                $msg_erro = "ERRO: Falha na query! ($code $message)";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir Novo Utilizador</title>
	<link href="css/estilos.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
    require_once 'header.php';
?>
<section>
<h1>Inserir Novo Utilizador</h1>

<?php if ($msg_erro != "") { ?>
    <p id="erro"><?= $msg_erro ?></p>
<?php } ?>

<form action="insertUser.php" id="insertUser" method="post" enctype="multipart/form-data">
    <label for="idEmail">E-mail:</label><input type="text" id="idEmail" name="email" value="<?= $email ?>"><br>
    <label for="idNome">Nome:</label><input type="text" id="idNome" name="nome" value="<?= $nome ?>"><br>
    <label for="idPass">Password:</label><input type="password" id="idPass" name="pass" value="<?= $pass ?>"><br>
    <label for="idFoto">Foto:</label><input type="file" id="idFoto" name="foto"><br><br>
    <input type="submit" value="Registar"><br>
</form>
<br>
</section>
<?php
  require_once 'footer.php';
?>
</body>

</html>