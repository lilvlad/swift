<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>
    <link rel="stylesheet" href="HelpCenterCompleteStyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>
<?php 
    session_start();
    if (isset($_SESSION['IDcliente']) && isset($_SESSION['email'])) {
        /* navbar para utilizadores COM conta */
    include "../../../components/header_connected.php";
    }else{
        /* navbar para utilizadores SEM conta */
        include "../../../components/header.php"; 
    }
    include "HelpBanner.php";
    ?>

       <div class="mainThings">
            <div class="lateralQuestions">
                
                <?php
              $question = $_GET['question'] ?? '';
              if($question === '1')
                {
                    echo '
                    <div class="card-body">
                    <p class="card-text actived">Câmbios</p>
                    <p class="card-text">Ações</p>
                    <p class="card-text">Criptomoedas</p>
                    <p class="card-text">Existe algum limite para câmbios de moeda?</p>
                </div> ';
                }
              if($question === '2')
                {
                    echo '
                    <div class="card-body">
                    <p class="card-text">Câmbios</p>
                    <p class="card-text actived">Ações</p>
                    <p class="card-text">Criptomoedas</p>
                    <p class="card-text">Existe algum limite para câmbios de moeda?</p>
                </div> ';
                }
              if($question === '3')
                {
                    echo '
                    <div class="card-body">
                    <p class="card-text">Câmbios</p>
                    <p class="card-text">Ações</p>
                    <p class="card-text actived">Criptomoedas</p>
                    <p class="card-text">Existe algum limite para câmbios de moeda?</p>
                </div> ';
                }
              ?>
              <button class="goBackbtn" onclick="window.location.href='HelpCenter.php';">Página inicial</button>
            </div>

            <div class="answer-section">
                <?php
                $question = $_GET['question'] ?? '';
                if($question === '1')
                    {
                        echo '
                <div class="answer active">
                    <h2>Câmbios</h2>
                    <p>Com a Swift, pode deter e efetuar câmbios de várias moedas. 
                    De momento, as moedas suportadas são:<br>

                    AED, AUD, BGN, CAD, CHF, CLP, COP, CZK, DKK, EGP, EUR, GBP, HKD, 
                    HUF, ILS, INR, ISK, JPY, KRW, KZT, MAD, MXN, NOK, NZD, PHP, PLN, 
                    QAR, RON, RSD, SAR, SEK, SGD, THB, TRY, USD, ZAR.<br>
                    
                    Em breve, serão adicionadas mais moedas. Por isso, mantenha-se a par das novidades!
                    </p>
                </div>
                <div class="answer">
                    <h2>Ações</h2>
                    <p>Para abrir uma conta de trading com a Swift 
                    Securities Europe UAB, terá de começar por abrir uma conta 
                    com o Swift Bank UAB, validar a sua identidade e cumprir com 
                    os seguintes requisitos:<br>

                    <li>Ter pelo menos 18 anos;</li>
                    <li>Ter um Número de Identificação nacional válido;</li>
                    <li>Ter pelo menos a versão 7.3 da app Swift.</li></p>
                </div>
                <div class="answer">
                    <h2>Criptomoedas</h2>
                    <p>Pode comprar e vender mais de 80 tokens com a Swift, 
                    incluindo Bitcoin, Ethereum, Polygon, Solana, Dogecoin, e mais. 
                    Consulte a lista completa na app ao visitar a secção de Cripto.</p> 
                </div>';
                    }
                else if($question === '2')
                    {
                        echo '
                    <div class="answer">
                        <h2>Câmbios</h2>
                        <p>Com a Swift, pode deter e efetuar câmbios de várias moedas. 
                        De momento, as moedas suportadas são:<br>

                        AED, AUD, BGN, CAD, CHF, CLP, COP, CZK, DKK, EGP, EUR, GBP, HKD, 
                        HUF, ILS, INR, ISK, JPY, KRW, KZT, MAD, MXN, NOK, NZD, PHP, PLN, 
                        QAR, RON, RSD, SAR, SEK, SGD, THB, TRY, USD, ZAR.<br>
                    
                        Em breve, serão adicionadas mais moedas. Por isso, mantenha-se a par das novidades!
                        </p>

                    </div>
                    <div class="answer active">
                        <h2>Ações</h2>
                        <p>Para abrir uma conta de trading com a Swift 
                        Securities Europe UAB, terá de começar por abrir uma conta 
                        com o Swift Bank UAB, validar a sua identidade e cumprir com 
                        os seguintes requisitos:<br>

                        <li>Ter pelo menos 18 anos;</li>
                        <li>Ter um Número de Identificação nacional válido;</li>
                        <li>Ter pelo menos a versão 7.3 da app Swift.</li></p>
                    </div>
                    <div class="answer">
                        <h2>Criptomoedas</h2>
                        <p>Pode comprar e vender mais de 80 tokens com a Swift, 
                        incluindo Bitcoin, Ethereum, Polygon, Solana, Dogecoin, e mais. 
                        Consulte a lista completa na app ao visitar a secção de Cripto.</p> 
                    </div>';
                    }
                else if($question === '3')
                    {
                        echo '
                    <div class="answer">
                        <h2>Câmbios</h2>
                        <p>Com a Swift, pode deter e efetuar câmbios de várias moedas. 
                        De momento, as moedas suportadas são:<br>

                        AED, AUD, BGN, CAD, CHF, CLP, COP, CZK, DKK, EGP, EUR, GBP, HKD, 
                        HUF, ILS, INR, ISK, JPY, KRW, KZT, MAD, MXN, NOK, NZD, PHP, PLN, 
                        QAR, RON, RSD, SAR, SEK, SGD, THB, TRY, USD, ZAR.<br>
                    
                        Em breve, serão adicionadas mais moedas. Por isso, mantenha-se a par das novidades!
                        </p>
                    </div>
                    <div class="answer">
                        <h2>Ações</h2>
                        <p>Para abrir uma conta de trading com a Swift 
                        Securities Europe UAB, terá de começar por abrir uma conta 
                        com o Swift Bank UAB, validar a sua identidade e cumprir com 
                        os seguintes requisitos:<br>

                        <li>Ter pelo menos 18 anos;</li>
                        <li>Ter um Número de Identificação nacional válido;</li>
                        <li>Ter pelo menos a versão 7.3 da app Swift.</li></p>
                    </div>
                    <div class="answer active">
                        <h2>Criptomoedas</h2>
                        <p>Pode comprar e vender mais de 80 tokens com a Swift, 
                        incluindo Bitcoin, Ethereum, Polygon, Solana, Dogecoin, e mais. 
                        Consulte a lista completa na app ao visitar a secção de Cripto.</p> 
                    </div>';
                    }
                ?>


                <div class="answer">
                    <h2>Existe algum limite para câmbios de moeda?</h2>
                    <p>Pode efetuar 100 câmbios (incluindo câmbios automáticos) num período 
                        de 24 horas. Não existe um montante máximo para operações de câmbio 
                        de uma moeda fiduciária para outra através de uma operação única 
                        (aplicável a todos os tipos de conta: Standard, Plus, Premium e Metal).
                        No entanto, os utilizadores Standard deverão ter em atenção a taxa de 
                        utilização. Caso o plafond gratuito seja excedido, poderão ser 
                        aplicadas taxas adicionais.
                    </p>
                </div>
            </div>
       </div>
       <?php include "../../../components/footer.php"?>             
       <script>
    // JavaScript code
    document.addEventListener('DOMContentLoaded', function() {
      const questions = document.querySelectorAll('.card-text');
      const answers = document.querySelectorAll('.answer');

      questions.forEach(function(question, index) {
        question.addEventListener('click', function(e) {
          e.preventDefault();

          // Hide all answers
          answers.forEach(function(answer) {
            answer.classList.remove('active');
          });

          // Show the clicked answer
          answers[index].classList.add('active');

          // O selecionado tem cor diferente
          questions.forEach(function(question) {
            question.classList.remove('actived');
          });

          // O selecionado tem cor diferente
          questions[index].classList.add('actived');

        });
        
      });
    });
  </script>

      <script src="https://kit.fontawesome.com/168ae3293e.js" crossorigin="anonymous"></script>

</body>
</html>