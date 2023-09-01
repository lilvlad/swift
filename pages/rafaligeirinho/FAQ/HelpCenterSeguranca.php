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
                    <p class="card-text actived">Como denunciar uma operação fradulenta</p>
                    <p class="card-text">Como reconhecer uma fraude?</p>
                    <p class="card-text">Estou a ser cobrado por uma subscrição que cancelei ou que não sabia que tinha sido subscrito</p>
                    <p class="card-text">Fui vítima de pirataria</p>
                    <p class="card-text">O nome e a localização do comerciante estão diferentes</p>
                    <p class="card-text">Não reconheço um levantamento de dinheiro no multibanco</p>
                </div> ';
                }
              if($question === '2')
                {
                    echo '
                    <div class="card-body">
                    <p class="card-text">Como denunciar uma operação fradulenta</p>
                    <p class="card-text actived">Como reconhecer uma fraude?</p>
                    <p class="card-text">Estou a ser cobrado por uma subscrição que cancelei ou que não sabia que tinha sido subscrito</p>
                    <p class="card-text">Fui vítima de pirataria</p>
                    <p class="card-text">O nome e a localização do comerciante estão diferentes</p>
                    <p class="card-text">Não reconheço um levantamento de dinheiro no multibanco</p>
                </div> ';
                }
               if($question === '3')
                {
                    echo '
                    <div class="card-body">
                    <p class="card-text">Como denunciar uma operação fradulenta</p>
                    <p class="card-text">Como reconhecer uma fraude?</p>
                    <p class="card-text actived">Estou a ser cobrado por uma subscrição que cancelei ou que não sabia que tinha sido subscrito</p>
                    <p class="card-text">Fui vítima de pirataria</p>
                    <p class="card-text">O nome e a localização do comerciante estão diferentes</p>
                    <p class="card-text">Não reconheço um levantamento de dinheiro no multibanco</p>
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
                    <h2>Como denunciar uma operação fradulenta</h2>
                    <p>Se tem preocupações acerca da segurança do seu cartão, bloqueie-o de imediato para impedir quaisquer pagamentos indevidos.

                    <b>Para bloquear o seu cartão:</b> <br>

                    <li>Aceda ao separador "Cartões" na app ou no website;</li>
                    <li>Encontre o seu cartão e selecione "Bloquear".</li> <br><br>
                    
                    Se acredita que o seu cartão foi utilizado de forma fraudulenta, preencha o nosso formulário de estorno para que possamos ajudar com este problema.<br>

                    Para submeter um formulário de estorno, aceda ao histórico de transações na app, selecione a transação que gostaria de reportar e toque em "Reportar um problema". Poderá submeter um formulário de estorno a partir daí. <br>

                    Apresentar queixa à polícia pode ajudar a agilizar o processo.</p>
   
                </div>

                <div class="answer">
                    <h2>Como reconhecer uma fraude?</h2>
                    <p>Aqui estão algumas dicas de como deve estar atento para que possa manter o seu dinheiro seguro:<br>

                        <li>Nunca ignore os avisos da app, em especial se alguém exercer pressão sobre si, dizendo que tem de fazer algo com urgência ou recomendando que ignore os avisos;</li>
                        <li>Suspeite sempre de preços ou ofertas que são "demasiado bons para ser verdade";</li>
                        <li>Compre junto de retalhistas com reputação e que sejam de confiança. Em regra, os URLs destes sites devem começar por https e não http. Procure um ícone de cadeado antes do nome do site, o que indica que o mesmo está protegido por um certificado digital;</li>
                        <li>Consulte análises online para verificar se os sites e vendedores são genuínos e peça para ver artigos de valor significativo em pessoa ou por vídeo, bem como cópias da respetiva documentação para garantir que o vendedor é, de facto, o proprietário do artigo;</li>
                        <li>Aceda sempre ao site onde pretende efetuar compras ao introduzir o nome diretamente no browser. Não siga ligações de e-mails ou textos não solicitados;</li>
                        <li>Lembre-se que os vigaristas poderão pedir que pague por transferência bancária, ao invés de pagamento com cartão;</li>
                        <li>Se receber uma mensagem da Revolut a dizer que o beneficiário não corresponde, interrompa a operação e investigue a mesma.</li>
                    </p>
                </div>
                <div class="answer">
                    <h2>Estou a ser cobrado por uma subscrição que cancelei ou que não sabia que tinha sido subscrito</h2>
                    <p>Caso a sua transferência tenha sido processada pela Swift, 
                       não será possível cancelá-la, visto que o dinheiro já estará 
                       a caminho do beneficiário. <br><br>

                      <b>Como é que o estado das minhas transferências enviadas muda e 
                      quando é que posso cancelar a minha transferência?</b> <br>

                      Quando envia uma transferência, geramos uma instrução de pagamento 
                      e passamo-la a um dos nossos parceiros de pagamento (estado de criação). 
                      Depois, o parceiro informa-nos que começaram a processar a instrução de 
                      pagamento (estado de conclusão). Isto significa que há uma janela de 
                      oportunidade muito reduzida para cancelar a transferência com sucesso 
                      ainda durante o estado de criação. Uma vez que a transferência chegue 
                      ao estado de conclusão, não teremos a possibilidade de a cancelar. Nestes 
                      casos, a única opção viável é iniciar uma recuperação dos fundos. Nem 
                      todas as transferências são elegíveis para uma recuperação, e as recuperações 
                      nem sempre têm sucesso. Se for possível no seu caso, iremos contactar o 
                      processador de pagamentos e tentar recuperar os fundos. <br><br>

                      <b>Situações mais comuns para cancelamento de transferências e procedimentos:</b> <br>
                      <li><b>A conta beneficiária está fechada ou os dados de conta estão incorretos — </b>a 
                      transferência deverá automaticamente voltar para a sua conta, dentro de 5 
                      dias úteis, a não ser que o banco recetor tenha dificuldades técnicas. No 
                      entanto, se estes dados de conta pertencerem a uma pessoa diferente, o processo 
                      de recuperação pode demorar mais tempo. O beneficiário que deveria ter recebido 
                      a transferência terá de contactar o respetivo banco;</li>
                      <li><b>Transferência duplicada por erro — </b> a forma mais simples de recuperar os 
                      fundos é pedir ao beneficiário que lhe transfira de volta a transferência duplicada.
                      </li> <br><br>
                      Caso deseja cancelar ou recuperar uma transferência, <a href="">fale connosco</a>, e iremos dar-lhe 
                      informação acerca do seu pedido.
                      </p>
                </div>';
                }
                else if($question === '2')
                    {
                        echo '
                        <div class="answer">
                        <h2>Como denunciar uma operação fradulenta</h2>
                        <p>Se tem preocupações acerca da segurança do seu cartão, bloqueie-o de imediato para impedir quaisquer pagamentos indevidos.
    
                        <b>Para bloquear o seu cartão:</b> <br>
    
                        <li>Aceda ao separador "Cartões" na app ou no website;</li>
                        <li>Encontre o seu cartão e selecione "Bloquear".</li> <br><br>
                        
                        Se acredita que o seu cartão foi utilizado de forma fraudulenta, preencha o nosso formulário de estorno para que possamos ajudar com este problema.<br>
    
                        Para submeter um formulário de estorno, aceda ao histórico de transações na app, selecione a transação que gostaria de reportar e toque em "Reportar um problema". Poderá submeter um formulário de estorno a partir daí. <br>
    
                        Apresentar queixa à polícia pode ajudar a agilizar o processo.</p>                           
                    </div>
                    <div class="answer active">
                    <h2>Como reconhecer uma fraude?</h2>
                    <p>Aqui estão algumas dicas de como deve estar atento para que possa manter o seu dinheiro seguro:<br>

                        <li>Nunca ignore os avisos da app, em especial se alguém exercer pressão sobre si, dizendo que tem de fazer algo com urgência ou recomendando que ignore os avisos;</li>
                        <li>Suspeite sempre de preços ou ofertas que são "demasiado bons para ser verdade";</li>
                        <li>Compre junto de retalhistas com reputação e que sejam de confiança. Em regra, os URLs destes sites devem começar por https e não http. Procure um ícone de cadeado antes do nome do site, o que indica que o mesmo está protegido por um certificado digital;</li>
                        <li>Consulte análises online para verificar se os sites e vendedores são genuínos e peça para ver artigos de valor significativo em pessoa ou por vídeo, bem como cópias da respetiva documentação para garantir que o vendedor é, de facto, o proprietário do artigo;</li>
                        <li>Aceda sempre ao site onde pretende efetuar compras ao introduzir o nome diretamente no browser. Não siga ligações de e-mails ou textos não solicitados;</li>
                        <li>Lembre-se que os vigaristas poderão pedir que pague por transferência bancária, ao invés de pagamento com cartão;</li>
                        <li>Se receber uma mensagem da Revolut a dizer que o beneficiário não corresponde, interrompa a operação e investigue a mesma.</li>
                    </p>
                    </div>
                    <div class="answer">
                        <h2>Estou a ser cobrado por uma subscrição que cancelei ou que não sabia que tinha sido subscrito</h2>
                        <p><b>Aceda a Operações futuras:</b> <br><br>
                        ✅ Se a subscrição estiver visível, selecione o pagamento futuro → clique em "Bloquear pagamentos futuros"<br>

                        Bloquear a subscrição na Revolut só impede que um <b>valor específico da subscrição</b> seja cobrado.<br>

                        <b>Não faz o seguinte:</b><br>
                        <li>Não cancela o seu acordo com o comerciante;</li>
                        <li>Não impede que o comerciante cobre um valor diferente;</li>
                        <li>Não impede que o comerciante aplique a cobrança a um método de pagamento diferente que tenhas guardado junto do comerciante.</li>
                        Entre em contato com o comerciante para garantir que a subscrição é cancelada.</p>
                    </div>';
                    }
                else if($question === '3')
                    {
                        echo '
                        <div class="answer">
                        <h2>Como denunciar uma operação fradulenta</h2>
                        <p>Se tem preocupações acerca da segurança do seu cartão, bloqueie-o de imediato para impedir quaisquer pagamentos indevidos.
    
                        <b>Para bloquear o seu cartão:</b> <br>
    
                        <li>Aceda ao separador "Cartões" na app ou no website;</li>
                        <li>Encontre o seu cartão e selecione "Bloquear".</li> <br><br>
                        
                        Se acredita que o seu cartão foi utilizado de forma fraudulenta, preencha o nosso formulário de estorno para que possamos ajudar com este problema.<br>
    
                        Para submeter um formulário de estorno, aceda ao histórico de transações na app, selecione a transação que gostaria de reportar e toque em "Reportar um problema". Poderá submeter um formulário de estorno a partir daí. <br>
    
                        Apresentar queixa à polícia pode ajudar a agilizar o processo.</p>                           
                    </div>
                    <div class="answer">
                    <h2>Como reconhecer uma fraude?</h2>
                    <p>Aqui estão algumas dicas de como deve estar atento para que possa manter o seu dinheiro seguro:<br>

                        <li>Nunca ignore os avisos da app, em especial se alguém exercer pressão sobre si, dizendo que tem de fazer algo com urgência ou recomendando que ignore os avisos;</li>
                        <li>Suspeite sempre de preços ou ofertas que são "demasiado bons para ser verdade";</li>
                        <li>Compre junto de retalhistas com reputação e que sejam de confiança. Em regra, os URLs destes sites devem começar por https e não http. Procure um ícone de cadeado antes do nome do site, o que indica que o mesmo está protegido por um certificado digital;</li>
                        <li>Consulte análises online para verificar se os sites e vendedores são genuínos e peça para ver artigos de valor significativo em pessoa ou por vídeo, bem como cópias da respetiva documentação para garantir que o vendedor é, de facto, o proprietário do artigo;</li>
                        <li>Aceda sempre ao site onde pretende efetuar compras ao introduzir o nome diretamente no browser. Não siga ligações de e-mails ou textos não solicitados;</li>
                        <li>Lembre-se que os vigaristas poderão pedir que pague por transferência bancária, ao invés de pagamento com cartão;</li>
                        <li>Se receber uma mensagem da Revolut a dizer que o beneficiário não corresponde, interrompa a operação e investigue a mesma.</li>
                    </p>
                    </div>
                    <div class="answer active">
                        <h2>Estou a ser cobrado por uma subscrição que cancelei ou que não sabia que tinha sido subscrito</h2>
                        <p><b>Aceda a Operações futuras:</b> <br><br>
                        ✅ Se a subscrição estiver visível, selecione o pagamento futuro → clique em "Bloquear pagamentos futuros"<br>

                        Bloquear a subscrição na Revolut só impede que um <b>valor específico da subscrição</b> seja cobrado.<br>

                        <b>Não faz o seguinte:</b><br>
                        <li>Não cancela o seu acordo com o comerciante;</li>
                        <li>Não impede que o comerciante cobre um valor diferente;</li>
                        <li>Não impede que o comerciante aplique a cobrança a um método de pagamento diferente que tenhas guardado junto do comerciante.</li>
                        Entre em contato com o comerciante para garantir que a subscrição é cancelada.</p>
                    </div>';
                    }
                ?>


                <div class="answer">
                    <h2>Fui vítima de pirataria</h2>
                    <p>Se reparar na existência de uma operação que não reconhece na sua conta, 
                    contacte-nos através do chat. A equipa de conformidade relevante irá 
                    tratar do seu caso. <br>

                    Caso tenha recebido um SMS ou um e-mail suspeito, preencha o formulário 
                    abaixo para denunciar.</p>   
                </div>
                <div class="answer">
                    <h2>O nome e a localização do comerciante estão diferentes</h2>
                   <p>O nome do comerciante apresentado na app pode diferir do seu nome 
                    real e a localização apresentada pode ser a sua sede. A app apenas apresenta as 
                    informações que o comerciante escolhe fornecer. Verifique os detalhes com uma
                    pesquisa rápida no Google.</p> 
                </div>
                <div class="answer">
                    <h2>Não reconheço um levantamento de dinheiro no multibanco</h2>
                        <p>Se suspeitar que o pagamento é fraudulento, bloqueie o seu cartão 
                        para evitar mais levantamentos fraudulentos. <br>

                        Verifique se já fez um levantamento na mesma caixa no multibanco anteriormente: <br>

                        <li>Aceda ao seu histórico de operações</li>
                        <li>Digite "multibanco" na barra de pesquisa.</li></p>
                </div>
            </div>
       </div>
       <?php include "../../../components/footer.php"?>
       <script>
    document.addEventListener('DOMContentLoaded', function() {
      const questions = document.querySelectorAll('.card-text');
      const answers = document.querySelectorAll('.answer');

      questions.forEach(function(question, index) {
        question.addEventListener('click', function(e) {
          e.preventDefault();

          // esconde respostas
          answers.forEach(function(answer) {
            answer.classList.remove('active');
          });

          // mostra a pergunta que cliquei
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