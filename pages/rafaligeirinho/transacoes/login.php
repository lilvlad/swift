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

if (isset($_POST['email']) && isset($_POST['palavra_passe'])) {
  $email = $_POST['email'];
  $newPassword = $_POST['palavra_passe'];
  
  
  echo "Email: " . $email . "<br>";
  echo "New Password: " . $newPassword . "<br>"; 

  $sql = "SELECT * FROM cliente WHERE email = ?";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "s", $email);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  // ...

  if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    $storedUserID = $row['IDcliente'];
    $storedPassword = $row['palavra_passe'];

    if (password_verify($newPassword, $storedPassword)) {
      // If the new password is the same as the existing password
      header("Location: http://localhost/dev/pages/valentimoryshchuk/entrar/index.php?error=A palavra-passe tem de ser diferente");
      exit();
    } else {
      // Update the password in the database
      $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
      $updateSql = "UPDATE cliente SET palavra_passe = ? WHERE IDcliente = ?";
      $updateStmt = mysqli_prepare($conn, $updateSql);
      mysqli_stmt_bind_param($updateStmt, "si", $hashedPassword, $storedUserID);
      mysqli_stmt_execute($updateStmt);

      // If the update is successful
      header("Location: http://localhost/dev/pages/valentimoryshchuk/entrar/index.php?success=Password alterada com sucesso");
      exit();
    }
  } else {
    // User not found
    header("Location: http://localhost/dev/pages/rafaligeirinho/transacoes/passwordRecover.php?error=Utilizador não encontrado");
    exit();
  }

  mysqli_stmt_close($stmt);
  mysqli_close($conn);
} else {
  // Email or password not set
  header("Location: http://localhost/dev/pages/rafaligeirinho/transacoes/passwordRecover.php?error=Email ou palavra-passe não definidos");
  exit();
}
?>
