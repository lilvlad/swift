<?php
session_start();

if (isset($_GET['IDmoeda'])) {
  $IDmoeda = $_GET['IDmoeda'];

  $sname = "localhost";
  $unmae = "root";
  $password = "";
  $db_name = "swift";
  $conn = mysqli_connect($sname, $unmae, $password, $db_name);

  if (!$conn) {
    echo "Falha ao conectar!";
    exit();
  }

  $transacoes = $conn->prepare("SELECT IDmoeda FROM transacoes_crypto WHERE IDmoeda = ?");
  $transacoes->bind_param("i", $IDmoeda);
  $transacoes->execute();
  $transacoes->store_result();

  if ($transacoes->num_rows > 0) {
    $sql_transacoes = $conn->prepare("DELETE FROM transacoes_crypto WHERE IDmoeda = ?");
    $sql_transacoes->bind_param("i", $IDmoeda);
    $sql_transacoes->execute();

    if (mysqli_stmt_affected_rows($sql_transacoes) > 0) {
      $sql_cripto = $conn->prepare("DELETE FROM criptomoeda WHERE IDmoeda = ?");
      $sql_cripto->bind_param("i", $IDmoeda);
      $sql_cripto->execute();

      if (mysqli_stmt_affected_rows($sql_cripto) > 0) {
        header("Location: index.php?success=A criptomoeda (%23".$IDmoeda.") foi eliminada com sucesso da base de dados");
      } else {
        header("Location: index.php?error=Erro ao eliminar a criptomoeda da base de dados" . mysqli_error($conn));
      }
    } else {
      header("Location: index.php?error=Erro ao eliminar as transações relacionadas da base de dados" . mysqli_error($conn));
    }
  } else {
    $sql_cripto = $conn->prepare("DELETE FROM criptomoeda WHERE IDmoeda = ?");
    $sql_cripto->bind_param("i", $IDmoeda);
    $sql_cripto->execute();

    if (mysqli_stmt_affected_rows($sql_cripto) > 0) {
      header("Location: index.php?success=A criptomoeda (%23".$IDmoeda.") foi eliminada com sucesso da base de dados");
    } else {
      header("Location: index.php?error=Erro ao eliminar a criptomoeda da base de dados" . mysqli_error($conn));
    }
  }

  $conn->close();
}
?>
