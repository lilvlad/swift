<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="jquery.js" />
  <title>Criptomoedas</title>
</head>

<body>
<?php 
    session_start();
    if (isset($_SESSION['IDcliente']) && isset($_SESSION['email'])) {
      include "../../../components/header_connected.php";
    }else{
      include "../../../components/header.php"; 
    }
 ?>
  <section class="text-dark p-5 p-lg-0 pt-lg-5 text-center text-sm-start" id="CriptoBanner">
    <div class="container">
      <div class="d-sm-flex align-items-center justify-content-between">
        <div>
          <h1>Começe a investir na<span id="sublinhado"> Criptomoeda </span></h1>
          <p class="lead p-4">
            Compre, venda e envie moedas digitais com o toque de um botão, sem taxas ocultas.
            Não regulamentado e não protegido por esquemas de compensação de investidores.
          </p>
          <button onclick="window.location.href='http://localhost/dev/pages/franciscoassis/Pagina_TransacoesCripto/TransacoesCripto.php'" class="btn btn-lg">CryptoWallet</button>
        </div>
        <img class="img-fluid w-50 d-none d-md-block" src="img/Hero_Img.png" alt="" />
      </div>
    </div>
  </section>

  <section class="p-5 bg-light">
    <div class="container">
      <div class="row text-center g-5">
        <div class="col-lg">
          <div class="card text-light" id="card-bg">
            <div class="card-body text-center">
              <h3 class="card-title mb-3">Compre, venda ou envie instantaneamente</h3>
              <p class="card-text">
                Com um simples toque, sem taxas ocultas.Não regulamentado e não protegido por esquemas de compensação.
              </p>
              <button class="btn">Saber Mais</button>
            </div>
          </div>
        </div>

        <div class="col-lg">
          <div class="card text-light"  id="card-bg">
            <div class="card-body text-center">
              <h3 class="card-title mb-3">Fique por dentro dos movimentos do mercado</h3>
              <p class="card-text">
                Acompanhe as flutuações e movimentos do mercado de criptomoedas para tomar decisões informadas.
              </p>
              <button class="btn">Saber Mais</button>
            </div>
          </div>
        </div>

        <div class="col-lg">
          <div class="card text-light" id="card-bg">
            <div class="card-body text-center">
              <h3 class="card-title mb-3">Criptografia armazenada com segurança</h3>
              <p class="card-text">
                Armazene as suas criptomoedas com segurança, utilizando criptografia avançada e medidas de proteção.
              </p>
              <button class="btn">Saber Mais</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="p-5 bg-light text-secundary">
    <div class="container">
      <div class="row align-items-center justify-content-between">
        <div class="col-md">
          <table class="table table-striped text-sm-start">
            <tbody>
              <tr>
                <th><img src="img/bitcoin.png"> Bitcoin | BTC</th>
                <td class="text-success"><i class="fa-solid fa-arrow-up" style="color: #14a44d;"></i> 12 456.78€</td>
              </tr>
              <tr>
                <th><img src="img/ethereum.png"> Ethereum | ETH</th>
                <td class="text-success"><i class="fa-solid fa-arrow-up" style="color: #14a44d;"></i> 1051.98€</td>
              </tr>
              <tr>
                <th><img src="img/bitcoin-cash.png"> Bitcoin Cash | BCH</th>
                <td class="text-danger"><i class="fa-solid fa-arrow-down" style="color: #dc4c64;"></i> 2256.78€</td>
              </tr>
              <tr>
                <th><img src="img/ripple.png"> Ripple | XRP</th>
                <td class="text-success"><i class="fa-solid fa-arrow-up" style="color: #14a44d;"></i> 2.03€</td>
              </tr>
              <tr>
                <th><img src="img/litecoin.png"> Litecoin | LTC</th>
                <td class="text-success"><i class="fa-solid fa-arrow-up" style="color: #14a44d;"></i> 321.98€</td>
              </tr>
              <tr>
                <th><img src="img/cardano.png"> Cardano | ADA</th>
                <td class="text-success"><i class="fa-solid fa-arrow-up" style="color: #14a44d;"></i> 0.75€</td>
              </tr>
              <tr>
                <th><img src="img/nem.png"> NEM | XEM</th>
                <td class="text-success"><i class="fa-solid fa-arrow-up" style="color: #14a44d;"></i> 0.89€</td>
              </tr>
              <tr>
                <th><img src="img/neo.png"> NEO | NEO</th>
                <td class="text-danger"><i class="fa-solid fa-arrow-down" style="color: #dc4c64;"></i> 123.90€</td>
              </tr>
              <tr>
                <th><img src="img/stellar.png"> Stellar | XLM</th>
                <td class="text-success"><i class="fa-solid fa-arrow-up" style="color: #14a44d;"></i> $12 456.78</td>
              </tr>
              <tr>
                <th><img src="img/iota.png"> IOTA | IOT</th>
                <td class="text-success"><i class="fa-solid fa-arrow-up" style="color: #14a44d;"></i></i> $3.55</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-md p-5">
          <h2>Acompanha ao segundo todos os valores de mercado</h2>
          <p class="lead">
            Fique atualizado sobre os valores de mercado das criptomoedas em tempo real para tomar decisões informadas.
          </p>
          <p>
            Tenha acesso a informações detalhadas sobre cada criptomoeda e as suas alterações de preço, para que faça escolhas estratégicas.
          </p>
          <button class="btn btn-lg">Saber Mais</button>
        </div>
      </div>
    </div>
  </section>
   <?php include "../../../components/footer.php"?>
  <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/886bff6256.js" crossorigin="anonymous"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>