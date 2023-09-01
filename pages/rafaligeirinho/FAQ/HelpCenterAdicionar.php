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
                    <p class="card-text actived">Como posso adicionar dinheiro à minha conta Swift</p>
                    <p class="card-text">O meu carregamento com cartão falhou</p>
                    <p class="card-text">Que dados de conta devo de usar para transferir dinheiro para a minha conta Swift</p>
                    <p class="card-text">Problemas ao adicionar dinheiro com Apple/Google Pay</p>
                </div> ';
                }
              if($question === '2')
                {
                    echo '
                    <div class="card-body">
                    <p class="card-text">Como posso adicionar dinheiro à minha conta Swift</p>
                    <p class="card-text actived">O meu carregamento com cartão falhou</p>
                    <p class="card-text">Que dados de conta devo de usar para transferir dinheiro para a minha conta Swift</p>
                    <p class="card-text">Problemas ao adicionar dinheiro com Apple/Google Pay</p>
                </div> ';
                }
              if($question === '3')
                {
                    echo '
                    <div class="card-body">
                    <p class="card-text">Como posso adicionar dinheiro à minha conta Swift</p>
                    <p class="card-text">O meu carregamento com cartão falhou</p>
                    <p class="card-text actived">Que dados de conta devo de usar para transferir dinheiro para a minha conta Swift</p>
                    <p class="card-text">Problemas ao adicionar dinheiro com Apple/Google Pay</p>
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
                    <h2>Como posso adicionar dinheiro à minha conta Swift</h2>
                    <p><b>Na Swift, pode escolher entre vários métodos para adicionar dinheiro à sua conta:</b><br>

                    <li>Através de transferência bancária;</li>
                    <li>Através de um cartão;</li>
                    <li>Através do Apple Pay ou do Google Pay;</li>
                    <li>Com dinheiro de outros utilizadores Swift.</li>
                    </p>
                </div>
                <div class="answer">
                    <h2>O meu carregamento com cartão falhou</h2>
                    <p><b>Para verificar a razão da falha do carregamento, aceda à 
                    secção "Operações", abra a sua tentativa de carregamento, toque 
                    em "Obter ajuda" e selecione o problema para saber a razão exata.</b><br><br>

                    As razões mais comuns são:<br>
                    
                    <li><b>Devido à 3D Secure.</b> Certifique-se de que tem uma boa ligação à
                    Internet, que a sua app está atualizada para a versão mais recente e 
                    tente carregar novamente. Se falhar, contacte o departamento "Pagamento 
                    com cartão" do seu banco para saber se existem problemas na autenticação 
                    3D Secure e se a 3D Secure está ativada.</li>
                    <li><b>Devido a discrepância da morada AVS.</b> Certifique-se de que o código postal 
                    da morada de faturação do seu cartão no banco corresponde à fornecida na 
                    app Swift.</li>
                    <li><b>Devido a fundos insuficientes.</b> Se tiver fundos suficientes, contacte diretamente o 
                    seu banco para esclarecer esta questão, uma vez que esta não pode ser corrigida do 
                    nosso lado.</li>
                    <li>Devido a um cartão não suportado.<li>
                    <li><b>Devido ao banco ter recusado a operação.</b> Contacte o departamento "Pagamento com 
                    cartão" do seu banco e explique que autoriza operações para a Swift de forma a 
                    levantar os limites do seu cartão.</li></p>
                </div>
                <div class="answer">
                    <h2>Que dados de conta devo de usar para transferir dinheiro para a minha conta Swift</h2>
                    <p><b>Que dados devo utilizar para receber dinheiro na minha conta?</b><br>
                    Os <b>dados locais</b> devem ser utilizados quando quiser receber dinheiro de um 
                    banco onde a moeda nacional é a mesma que a selecionada nas etapas anteriores. 
                    Os dados <b>transfronteiriços/SWIFT</b> devem ser utilizados em todos os outros casos.<br>
                    
                    Recomendamos a utilização dos dados locais sempre que possível, uma vez que 
                    estas transferências são mais rápidas (e por vezes até gratuitas), certifique-se 
                    de que seleciona a moeda e os dados da conta corretos, uma vez que a utilização 
                    de informações erradas resultará em tempos de espera mais longos, taxas 
                    inesperadas, ou mesmo transferências falhadas.</p>
                    
                </div>';
                    }
                else if($question === '2')
                    {
                        echo '
                    <div class="answer">
                        <h2>Como posso adicionar dinheiro à minha conta Swift</h2>
                        <p><b>Na Swift, pode escolher entre vários métodos para adicionar dinheiro à sua conta:</b><br>

                        <li>Através de transferência bancária;</li>
                        <li>Através de um cartão;</li>
                        <li>Através do Apple Pay ou do Google Pay;</li>
                        <li>Com dinheiro de outros utilizadores Swift.</li>
                        </p>

                    </div>
                    <div class="answer active">
                        <h2>O meu carregamento com cartão falhou</h2>
                        <p><b>Para verificar a razão da falha do carregamento, aceda à 
                        secção "Operações", abra a sua tentativa de carregamento, toque 
                        em "Obter ajuda" e selecione o problema para saber a razão exata.</b><br><br>

                        As razões mais comuns são:<br>
                    
                        <li><b>Devido à 3D Secure.</b> Certifique-se de que tem uma boa ligação à
                        Internet, que a sua app está atualizada para a versão mais recente e 
                        tente carregar novamente. Se falhar, contacte o departamento "Pagamento 
                        com cartão" do seu banco para saber se existem problemas na autenticação 
                        3D Secure e se a 3D Secure está ativada.</li>
                        <li><b>Devido a discrepância da morada AVS.</b> Certifique-se de que o código postal 
                        da morada de faturação do seu cartão no banco corresponde à fornecida na 
                        app Swift.</li>
                        <li><b>Devido a fundos insuficientes.</b> Se tiver fundos suficientes, contacte diretamente o 
                        seu banco para esclarecer esta questão, uma vez que esta não pode ser corrigida do 
                        nosso lado.</li>
                        <li>Devido a um cartão não suportado.<li>
                        <li><b>Devido ao banco ter recusado a operação.</b> Contacte o departamento "Pagamento com 
                        cartão" do seu banco e explique que autoriza operações para a Swift de forma a 
                        levantar os limites do seu cartão.</li></p>
                    </div>
                    <div class="answer">
                        <h2>Que dados de conta devo de usar para transferir dinheiro para a minha conta Swift</h2>
                        <p><b>Que dados devo utilizar para receber dinheiro na minha conta?</b><br>
                        Os <b>dados locais</b> devem ser utilizados quando quiser receber dinheiro de um 
                        banco onde a moeda nacional é a mesma que a selecionada nas etapas anteriores. 
                        Os dados <b>transfronteiriços/SWIFT</b> devem ser utilizados em todos os outros casos.<br>
                    
                        Recomendamos a utilização dos dados locais sempre que possível, uma vez que 
                        estas transferências são mais rápidas (e por vezes até gratuitas), certifique-se 
                        de que seleciona a moeda e os dados da conta corretos, uma vez que a utilização 
                        de informações erradas resultará em tempos de espera mais longos, taxas 
                        inesperadas, ou mesmo transferências falhadas.</p>
                    </div>';
                    }
                else if($question === '3')
                    {
                        echo '
                    <div class="answer">
                        <h2>Como posso adicionar dinheiro à minha conta Swift</h2>
                        <p><b>Na Swift, pode escolher entre vários métodos para adicionar dinheiro à sua conta:</b><br>

                        <li>Através de transferência bancária;</li>
                        <li>Através de um cartão;</li>
                        <li>Através do Apple Pay ou do Google Pay;</li>
                        <li>Com dinheiro de outros utilizadores Swift.</li>
                        </p>
                    </div>
                    <div class="answer">
                        <h2>O meu carregamento com cartão falhou</h2>
                        <p><b>Para verificar a razão da falha do carregamento, aceda à 
                        secção "Operações", abra a sua tentativa de carregamento, toque 
                        em "Obter ajuda" e selecione o problema para saber a razão exata.</b><br><br>

                        As razões mais comuns são:<br>
                    
                        <li><b>Devido à 3D Secure.</b> Certifique-se de que tem uma boa ligação à
                        Internet, que a sua app está atualizada para a versão mais recente e 
                        tente carregar novamente. Se falhar, contacte o departamento "Pagamento 
                        com cartão" do seu banco para saber se existem problemas na autenticação 
                        3D Secure e se a 3D Secure está ativada.</li>
                        <li><b>Devido a discrepância da morada AVS.</b> Certifique-se de que o código postal 
                        da morada de faturação do seu cartão no banco corresponde à fornecida na 
                        app Swift.</li>
                        <li><b>Devido a fundos insuficientes.</b> Se tiver fundos suficientes, contacte diretamente o 
                        seu banco para esclarecer esta questão, uma vez que esta não pode ser corrigida do 
                        nosso lado.</li>
                        <li>Devido a um cartão não suportado.<li>
                        <li><b>Devido ao banco ter recusado a operação.</b> Contacte o departamento "Pagamento com 
                        cartão" do seu banco e explique que autoriza operações para a Swift de forma a 
                        levantar os limites do seu cartão.</li></p>
                    </div>
                    <div class="answer active">
                        <h2>Que dados de conta devo de usar para transferir dinheiro para a minha conta Swift</h2>
                        <p><b>Que dados devo utilizar para receber dinheiro na minha conta?</b><br>
                        Os <b>dados locais</b> devem ser utilizados quando quiser receber dinheiro de um 
                        banco onde a moeda nacional é a mesma que a selecionada nas etapas anteriores. 
                        Os dados <b>transfronteiriços/SWIFT</b> devem ser utilizados em todos os outros casos.<br>
                    
                        Recomendamos a utilização dos dados locais sempre que possível, uma vez que 
                        estas transferências são mais rápidas (e por vezes até gratuitas), certifique-se 
                        de que seleciona a moeda e os dados da conta corretos, uma vez que a utilização 
                        de informações erradas resultará em tempos de espera mais longos, taxas 
                        inesperadas, ou mesmo transferências falhadas.</p>
                    </div>';
                    }
                ?>


                <div class="answer">
                    <h2>Problemas ao adicionar dinheiro com Apple/Google Pay</h2>
                    <p>Motivos comuns para um depósito com cartão ser rejeitado pelo Apple ou 
                        Google Pay: <br>

                    <li><b>Efetuar um carregamento na sua conta Swift com um cartão Swift associado ao 
                    seu Apple ou Google Pay -</b> confira os últimos 4 dígitos do cartão que está a 
                    utilizar para fazer o carregamento e certifique-se de que os mesmos não 
                    correspondem aos últimos 4 dígitos do seu cartão Swift;</li>
                    <li><b>O cartão não é suportado para carregamentos.</b> Pode ler mais no artigo "Devido a 
                    um cartão não suportado";</li>
                    <li><b>Limites do cartão de carregamento -</b> verifique os seus limites do lado do banco 
                    emissor, que podem não ser visíveis no seu serviço bancário online;</li>
                    <li><b>Problemas do lado da Apple ou da Google -</b> pode entrar em contacto com o apoio ao 
                    cliente da Apple ou da Google para obter ajuda adicional de forma a garantir que 
                    não estão a bloquear os seus carregamentos.</li> </p>
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