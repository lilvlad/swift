<?php 
session_start();

if (isset($_SESSION['IDcliente']) && isset($_SESSION['email'])) {
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style_transacoesCriptos.css" />
    <title>Transações Cripto</title>
</head>

<body>
    <?php
    include "../../../components/header_connected.php"
  ?>
    <?php include "../../../connections/conta.php" ?>
    <?php include "../../../connections/contacrypto.php" ?>
    <?php include "../../../connections/transacoes_cripto.php" ?>
    <?php include "../../../connections/criptomoeda.php" ?>

    <div class="container1">
        <h1 class="m-2" id="title">A Minha<span id="sublinhado"> CriptoWallet </span></h1>
        <div class="hr-container-inicio">
            <hr class="custom-hr-inicio">
        </div>
        <h2 class="text-center mt-5">Saldo</h2>
        <h1 id="saldo">
            <?php
          echo $_SESSION['saldo']." €";
        ?>
        </h1>
        <div class="button-container">
          <button onclick="window.location.href='http://localhost/dev/pages/franciscoassis/CompraVenda_Crypto/criptoCompra.php'" class="btn btn-primary btn-lg">Comprar</button>
          <button onclick="window.location.href='http://localhost/dev/pages/franciscoassis/CompraVenda_Crypto/criptoVenda.php'" class="btn btn-primary btn-lg">Vender</button>
        </div>

    </div>
    <div class="card-body">
        <h1 class="text-center mb-5 mt-5">Transações</h1>
        <div class="table-responsive p-2">
                <?php
                if(isset($_SESSION['transacoes_crypto'])) {
                  echo "<table class='table table-stripped'>
                        <thead>
                        <tr>
                          <th>Transação</th>
                          <th>Data</th>
                          <th>Quantidade</th>
                          <th>Moeda</th>
                        </tr>
                        </thead>
                        <tbody>";
                $transacoes = $_SESSION['transacoes_crypto'];
                foreach($transacoes as $transacao) {
                    echo "<tr>
                            <td>".$transacao['tipo_transacao']."</td>
                            <td>".$transacao['data_transacao']."</td>
                            <td>".$transacao['quantidade']."</td>
                            <td>".$transacao['nome']."</td>
                          </tr>";
                }
                echo "</table>
                      </tbody>
                      </table>";
            } else{
              echo"<div class='alert alert-danger' role='alert'.>Não existem transações!</div>";
            }
              ?>


        </div>
    </div>
    </div>
    </div>
    <?php include "../../../components/footer.php"?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/886bff6256.js" crossorigin="anonymous"></script>
</body>

</html>
<?php 
}else{
  header("Location: http://localhost/dev/pages/valentimoryshchuk/entrar/index.php");
  exit();
}
?>