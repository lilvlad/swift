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
                    <p class="card-text actived">Como posso pedir um cartão físico?</p>
                    <p class="card-text">Não recebi o meu cartão. Quando é que este será entregue?</p>
                    <p class="card-text">Saber o PIN do meu cartão</p>
                    <p class="card-text">O meu cartão está bloqueado?</p>
                </div> ';
                }
              if($question === '2')
                {
                    echo '
                    <div class="card-body">
                    <p class="card-text">Como posso pedir um cartão físico?</p>
                    <p class="card-text actived">Não recebi o meu cartão. Quando é que este será entregue?</p>
                    <p class="card-text">Saber o PIN do meu cartão</p>
                    <p class="card-text">O meu cartão está bloqueado?</p>
                </div> ';
                }
              if($question === '3')
                {
                    echo '
                    <div class="card-body">
                    <p class="card-text">Como posso pedir um cartão físico?</p>
                    <p class="card-text">Não recebi o meu cartão. Quando é que este será entregue?</p>
                    <p class="card-text actived">Saber o PIN do meu cartão</p>
                    <p class="card-text">O meu cartão está bloqueado?</p>
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
                    <h2>Como posso pedir um cartão físico?</h2>
                    <p><b>Para pedir um cartão físico:</b><br>
                    <li>Aceda ao separador "Cartões" da app;</li>
                    <li>Toque no botão "Adicionar cartão";</li>
                    <li>Selecione "Cartão de débito" e conclua o pedido;
                    <li>Defina um código PIN;</li>
                    <li>Escolha o design do seu cartão, e personalize-o, se a 
                    personalização estiver disponível. Ao encomendar qualquer 
                    cartão que não o cartão standard, fará um upgrade automático 
                    para um plano pago;</li>
                    <li>Faculte a morada de entrega e submeta o pedido.
                    O custo do cartão e/ou da entrega será apresentado antes de 
                    efetuar o pagamento.</li>
                    
                    <b>Certifique-se de que a morada de entrega está correta e que indicou 
                    todos os dados, como o número do apartamento ou do prédio.</b>
                    </p>
                </div>
                <div class="answer">
                    <h2>Não recebi o meu cartão. Quando é que este será entregue?</h2>
                    <p>Se ainda não recebeu o seu cartão, siga estes passos:<br>

                    <li>Aceda a “Cartões”; Toque no cartão; Selecione “Rastrear entrega” para 
                    uma data de entrega estimada.</li>
                    <li>Se já passou o prazo de entrega, selecione <b>“Encomendar cartão novamente” </b>
                    para receber um cartão de substituição.</li>
                    Para não ter problemas com a entrega, verifique a sua morada antes de 
                    encomendar.<br>
                    
                    Em caso de problemas com um envelope aberto, <b>volte a efetuar o pedido.</b> 
                    O tempo da entrega poderá aumentar durante os feriados.</p>
                </div>
                <div class="answer">
                    <h2>Saber o PIN do meu cartão</h2>
                    <p><b>Para ver o seu PIN:</b>
                    <li>Aceda ao separador "Cartões" da app;</li>
                    <li>Procure o cartão relevante e toque em "Definições";</li>
                    <li>Selecione "Ver PIN".</li>
                    Lembramos que os cartões virtuais não possuem PIN, 
                    e não existe a opção de adicionar um.</p>
                    
                </div>';
                    }
                else if($question === '2')
                    {
                        echo '
                    <div class="answer">
                        <h2>Como posso pedir um cartão físico?</h2>
                        <p><b>Para pedir um cartão físico:</b><br>
                        <li>Aceda ao separador "Cartões" da app;</li>
                        <li>Toque no botão "Adicionar cartão";</li>
                        <li>Selecione "Cartão de débito" e conclua o pedido;
                        <li>Defina um código PIN;</li>
                        <li>Escolha o design do seu cartão, e personalize-o, se a 
                        personalização estiver disponível. Ao encomendar qualquer 
                        cartão que não o cartão standard, fará um upgrade automático 
                        para um plano pago;</li>
                        <li>Faculte a morada de entrega e submeta o pedido.
                        O custo do cartão e/ou da entrega será apresentado antes de 
                        efetuar o pagamento.</li>
                    
                        <b>Certifique-se de que a morada de entrega está correta e que indicou 
                        todos os dados, como o número do apartamento ou do prédio.</b>
                        </p>

                    </div>
                    <div class="answer active">
                        <h2>Não recebi o meu cartão. Quando é que este será entregue?</h2>
                        <p>Se ainda não recebeu o seu cartão, siga estes passos:<br>

                        <li>Aceda a “Cartões”; Toque no cartão; Selecione “Rastrear entrega” para 
                        uma data de entrega estimada.</li>
                        <li>Se já passou o prazo de entrega, selecione <b>“Encomendar cartão novamente” </b>
                        para receber um cartão de substituição.</li>
                        Para não ter problemas com a entrega, verifique a sua morada antes de 
                        encomendar.<br>
                    
                        Em caso de problemas com um envelope aberto, <b>volte a efetuar o pedido.</b> 
                        O tempo da entrega poderá aumentar durante os feriados.</p>
                    </div>
                    <div class="answer">
                        <h2>Saber o PIN do meu cartão</h2>
                        <p><p><b>Para ver o seu PIN:</b>
                        <li>Aceda ao separador "Cartões" da app;</li>
                        <li>Procure o cartão relevante e toque em "Definições";</li>
                        <li>Selecione "Ver PIN".</li>
                        Lembramos que os cartões virtuais não possuem PIN, 
                        e não existe a opção de adicionar um.</p>
                    </div>';
                    }
                else if($question === '3')
                    {
                        echo '
                    <div class="answer">
                        <h2>Como posso pedir um cartão físico?</h2>
                        <p><b>Para pedir um cartão físico:</b><br>
                        <li>Aceda ao separador "Cartões" da app;</li>
                        <li>Toque no botão "Adicionar cartão";</li>
                        <li>Selecione "Cartão de débito" e conclua o pedido;
                        <li>Defina um código PIN;</li>
                        <li>Escolha o design do seu cartão, e personalize-o, se a 
                        personalização estiver disponível. Ao encomendar qualquer 
                        cartão que não o cartão standard, fará um upgrade automático 
                        para um plano pago;</li>
                        <li>Faculte a morada de entrega e submeta o pedido.
                        O custo do cartão e/ou da entrega será apresentado antes de 
                        efetuar o pagamento.</li>
                    
                        <b>Certifique-se de que a morada de entrega está correta e que indicou 
                        todos os dados, como o número do apartamento ou do prédio.</b>
                    </p>
                    </div>
                    <div class="answer">
                        <h2>Não recebi o meu cartão. Quando é que este será entregue?</h2>
                        <p>Se ainda não recebeu o seu cartão, siga estes passos:<br>

                        <li>Aceda a “Cartões”; Toque no cartão; Selecione “Rastrear entrega” para 
                        uma data de entrega estimada.</li>
                        <li>Se já passou o prazo de entrega, selecione <b>“Encomendar cartão novamente” </b>
                        para receber um cartão de substituição.</li>
                        Para não ter problemas com a entrega, verifique a sua morada antes de 
                        encomendar.<br>
                    
                        Em caso de problemas com um envelope aberto, <b>volte a efetuar o pedido.</b> 
                        O tempo da entrega poderá aumentar durante os feriados.</p>
                    </div>
                    <div class="answer active">
                        <h2>Saber o PIN do meu cartão</h2>
                        <p><p><b>Para ver o seu PIN:</b>
                        <li>Aceda ao separador "Cartões" da app;</li>
                        <li>Procure o cartão relevante e toque em "Definições";</li>
                        <li>Selecione "Ver PIN".</li>
                        Lembramos que os cartões virtuais não possuem PIN, 
                        e não existe a opção de adicionar um.</p>
                    </div>';
                    }
                ?>


                <div class="answer">
                    <h2>O meu cartão está bloqueado?</h2>
                    <p>Se tiver problemas com os seus pagamentos com cartão, verifique 
                        se o seu cartão está ativo na app. Para o fazer: <br>

                        <li>Aceda à secção Cartões;</li>
                        <li>Toque no cartão com o qual está a ter problemas;</li>
                        <li>Se conseguir ver a opção para desbloquear o cartão acima da lista 
                        de transações, significa que o cartão foi bloqueado. Pode ativá-lo 
                        facilmente na mesma secção da app, ao tocar em "Desbloquear".</li>
                        <b>Por que motivo foi bloqueado o meu cartão?</b><br>
                        Por vezes, o seu cartão pode ser bloqueado porque o nosso sistema 
                        de segurança automático detetou uma transação que poderia ser de 
                        natureza fraudulenta. <br>

                        Caso isto aconteça, deve receber uma notificação com o pedido para 
                        rever o pagamento que fez com que o seu cartão fosse bloqueado e 
                        ativar ou cancelar o cartão, consoante reconheça o pagamento ou não.
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