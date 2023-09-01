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
    <link rel="stylesheet" href="styleCompraVenda.css" />
    <title>Vender Cripto</title>
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
        <h2 class="mt-5">Saldo</h2>
        <h1 id="saldo">
            <?php
          echo $_SESSION['saldo']." €";
        ?>
        </h1>
    </div>
    <div class="card-body">
        <form method="POST" action="processarCompra.php">
            <div class="form-group row mb-5 ">
                <div class="col-5">
                    <h3>Escolha a Criptomoeda</h3>
                    <select class="form-control" id="criptomoeda" name="criptomoeda">
                    <?php
                    $conexao = mysqli_connect("localhost", "root", "", "swift");
                    if (mysqli_connect_errno()) {
                        die("Falha na conexão com a base de daos: " . mysqli_connect_error());
                    }
                    $consulta = mysqli_query($conexao, "SELECT * FROM criptomoeda");
                    while ($row = mysqli_fetch_assoc($consulta)) {
                        echo "<option value='" . $row['valor'] . "'>" . $row['nome'] . "</option>";
                    }
                    mysqli_close($conexao);
                    ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-5">
                    <h3>Quantidade</h3>
                    <input type="number" class="form-control" id="quantidade" name="quantidade" step="0.00001" required>
                </div>
                <div class="col-5">
                    <h3>Valor</h3>
                    <input type="text" class="form-control" id="valor" name="valor" readonly>
                </div>        
            </div>
            <div class="button-container">
                <button type="submit" class="btn btn-primary mt-3" data-toggle="modal" data-target="#exampleModalCenter">Comprar</button>
                <button onclick="window.location.href='http://localhost/dev/pages/franciscoassis/Pagina_TransacoesCripto/TransacoesCripto.php'" class="btn btn-primary mt-3">Cancelar</button>
            </div>  
        </form>
    </div>
    <?php include "../../../components/footer.php"?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/886bff6256.js" crossorigin="anonymous"></script>

    <script>
    $(document).ready(function() {
        $(document).ready(function() {
            $('form').submit(function(event) {
                event.preventDefault();

                var quantidade = parseFloat($('#quantidade').val());
                var criptomoeda = $('#criptomoeda').val();

                if (isNaN(quantidade) || quantidade <= 0 || criptomoeda === '') {
                    alert('A quantidade não pode ser negativa!');
                    resetCampos();
                    return;
                }
                this.submit();
            });

            $('#quantidade').on('input', function() {
                var quantidade = parseFloat($(this).val());
                var valorUnitario = parseFloat($('#criptomoeda').val());
                var valorTotal = quantidade * valorUnitario;
                $('#valor').val(valorTotal.toFixed(2));
            });

            function resetCampos() {
                document.getElementById('quantidade').value = '';
                document.getElementById('valor').value = '';
            }

            window.onload = resetCampos;
            window.onpageshow = function(event) {
                if (event.persisted) {
                    resetCampos();
                }
            };
        });
    });
    </script>
</body>

</html>
<?php 
}else{
  header("Location: http://localhost/dev/pages/valentimoryshchuk/entrar/index.php");
  exit();
}
?>