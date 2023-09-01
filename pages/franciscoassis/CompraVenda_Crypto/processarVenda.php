<?php
session_start();

if (isset($_SESSION['IDcliente']) && isset($_SESSION['email'])) {
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['criptomoeda'], $_POST['quantidade'])) {
      $criptomoeda = $_POST['criptomoeda'];
      $quantidade = $_POST['quantidade'];

      $IDcrypto = $_SESSION['IDcrypto'];
      $conexao = mysqli_connect("localhost", "root", "", "swift");

      if (mysqli_connect_errno()) {
        die("Falha na conexão com a base de dados: " . mysqli_connect_error());
      }

      $query_moeda = "SELECT IDmoeda FROM criptomoeda WHERE valor = '$criptomoeda'";
      $result_moeda = mysqli_query($conexao, $query_moeda);

      if ($result_moeda && mysqli_num_rows($result_moeda) > 0) {
        $row_moeda = mysqli_fetch_assoc($result_moeda);
        $IDmoeda = $row_moeda['IDmoeda'];
        $tipo_transacao = 'Venda';
        $data_transacao = date('Y-m-d');

        $query_transacao = "INSERT INTO transacoes_crypto (quantidade, tipo_transacao, data_transacao, IDcrypto, IDmoeda) VALUES ('$quantidade', '$tipo_transacao', '$data_transacao', '$IDcrypto', '$IDmoeda')";
        $result_transacao = mysqli_query($conexao, $query_transacao);

        if ($result_transacao) {
          $valorTotal = $quantidade * $criptomoeda;

          $query_saldo = "UPDATE contacrypto SET saldo = saldo + $valorTotal WHERE IDcrypto = $IDcrypto";
          $result_saldo = mysqli_query($conexao, $query_saldo);

          if ($result_saldo) {
            echo "<script>alert('Venda realizada com sucesso!'); window.location.href = 'http://localhost/dev/pages/franciscoassis/Pagina_TransacoesCripto/TransacoesCripto.php';</script>";
          } else {
            echo "<script>alert('Erro ao atualizar o Saldo'); window.location.href = 'http://localhost/dev/pages/franciscoassis/CompraVenda_Crypto/criptoVenda.php';</script> " . mysqli_error($conexao);
          }
        } else {
          echo "<script>alert('Erro na transação!'); window.location.href = 'http://localhost/dev/pages/franciscoassis/CompraVenda_Crypto/criptoVenda.php';</script> " . mysqli_error($conexao);
        }
      } else {
        echo "<script>alert('Criptomoeda não encontrada'); window.location.href = 'http://localhost/dev/pages/franciscoassis/CompraVenda_Crypto/criptoVenda.php';</script> " . mysqli_error($conexao);
      }

      mysqli_close($conexao);
    } else {
      echo "Por favor, preencha todos os campos.";
    }
  }
} else {
  header("Location: http://localhost/dev/pages/valentimoryshchuk/entrar/index.php");
  exit();
}

?>

