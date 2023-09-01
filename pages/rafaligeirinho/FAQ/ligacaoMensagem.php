<?php
$sname = "localhost";
$uname = "root";
$password = "";
$db_name = "swift";
$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
    echo "Falha ao conectar!";
}

if (isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];
    
   
    $subquery = "SELECT IDcliente FROM cliente WHERE email = '$email'";

    $result = mysqli_query($conn, $subquery);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $IDcliente = $row['IDcliente'];

        $sql = "INSERT INTO mensagem (texto, email, nome, IDcliente)
            VALUES ('$mensagem', '$email', '$nome', $IDcliente)";

        $insertResult = mysqli_query($conn, $sql);

        if ($insertResult) {
            header("Location: http://localhost/dev/pages/rafaligeirinho/FAQ/HelpCenter.php?success=Mensagem enviada com sucesso!");
        } else {
            echo "Erro ao enviar mensagem: " . mysqli_error($conn);
        }
    } else {
        header("Location: http://localhost/dev/pages/rafaligeirinho/FAQ/contactUs.php?error=Este email não está registado");
    }
}

?>
