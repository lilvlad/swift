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

   /* Verificar Cargo do cliente */
   $sql_cargo = "SELECT * FROM funcionarios WHERE IDcliente = ?";
   $stmt_cargo = $conn->prepare($sql_cargo);
   $stmt_cargo->bind_param('i', $_SESSION['IDcliente']);
   $stmt_cargo->execute();
   $result_cargo = $stmt_cargo->get_result();

    if ($result_cargo->num_rows > 0) {
        $row = $result_cargo->fetch_assoc();
        $_SESSION['IDfuncionario'] = $row['IDfuncionario'];
        $_SESSION['cargo'] = $row['cargo'];
    } else {
        $_SESSION['IDfuncionario'] = null;
        $_SESSION['cargo'] = null;
        header("Location: http://localhost/dev/pages/valentimoryshchuk/perfil/index.php?error=Não tem acesso ao painel de administrador.");
        exit();
    }
 



    

