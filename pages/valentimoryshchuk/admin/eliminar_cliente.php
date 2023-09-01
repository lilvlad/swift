<?php
/* include "../../../connections/cliente.php";
include "../../../connections/conta.php"; */

session_start();

if (isset($_GET['IDcliente'])) {
  $IDcliente = $_GET['IDcliente'];

  $sname = "localhost";
  $unmae = "root";
  $password = "";
  $db_name = "swift";
  $conn = mysqli_connect($sname, $unmae, $password, $db_name);

  if (!$conn) {
    echo "Falha ao conectar!";
    exit();
  }


  if(isset($_SESSION['IDcliente']) && $_SESSION['IDcliente'] == $IDcliente){
    header("Location: index.php?error=Não será possível eliminar os seus dados durante esta sessão");
    exit();
  }else{
    $sql_transacoes_crypto = $conn->prepare("DELETE FROM transacoes_crypto WHERE IDcrypto IN (SELECT IDcrypto FROM contacrypto WHERE IDconta IN (SELECT IDconta FROM conta WHERE IDcliente = ?) )");
    $sql_transacoes_crypto->bind_param("i", $IDcliente);
    $sql_transacoes_crypto->execute();

    $sql_contacrypto = $conn->prepare("DELETE FROM contacrypto WHERE IDconta IN (SELECT IDconta FROM conta WHERE IDcliente = ?)");
    $sql_contacrypto->bind_param("i", $IDcliente);
    $sql_contacrypto->execute();
   
    $sql_plano_poupanca = $conn->prepare("DELETE FROM plano_poupanca WHERE IDconta IN (SELECT IDconta FROM conta WHERE IDcliente = ?)");
    $sql_plano_poupanca->bind_param("i", $IDcliente);
    $sql_plano_poupanca->execute();

    $sql_transacoes = $conn->prepare("DELETE FROM transacoes WHERE IDconta IN (SELECT IDconta FROM conta WHERE IDcliente = ?)");
    $sql_transacoes->bind_param("i", $IDcliente);
    $sql_transacoes->execute();

    $sql_cartao = $conn->prepare("DELETE FROM cartao WHERE IDconta IN (SELECT IDconta FROM conta WHERE IDcliente = ?)");
    $sql_cartao->bind_param("i", $IDcliente);
    $sql_cartao->execute();
  
    $sql_conta = $conn->prepare("DELETE FROM conta WHERE IDcliente = ?");
    $sql_conta->bind_param("i", $IDcliente);
    $sql_conta->execute();

    $sql_funcionarios = $conn->prepare("DELETE FROM funcionarios WHERE IDcliente = ?");
    $sql_funcionarios->bind_param("i", $IDcliente);
    $sql_funcionarios->execute();
  
    $sql_cliente = $conn->prepare("DELETE FROM cliente WHERE IDcliente = ?");
    $sql_cliente->bind_param("i", $IDcliente);
    $sql_cliente->execute();
  
    if (mysqli_stmt_affected_rows($sql_cliente) > 0) {
      header("Location: index.php?success=O Cliente (%23".$IDcliente.") foi eliminado com sucesso da base de dados");
    } else {
      header("Location: index.php?error=Erro ao eliminar o cliente da base de dados" . mysqli_error($conn));
    }
  }

  $conn->close();
}
?>
