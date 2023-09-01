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
                    <p class="card-text actived">Como posso enviar dinheiro para uma conta bancária?</p>
                    <p class="card-text">O beneficiário não recebeu a minha transferência bancária. O que posso fazer?</p>
                    <p class="card-text">Quero cancelar a minha transferência para uma conta bancária</p>
                    <p class="card-text">Quando é que a transferência bancária fica disponível na minha conta Swift?</p>
                    <p class="card-text">Porque é que a transferência bancária que realizei falhou?</p>
                    <p class="card-text">O que devo fazer se for vítima de uma fraude por transferência?</p>
                </div> ';
                }
              if($question === '2')
                {
                    echo '
                    <div class="card-body">
                    <p class="card-text">Como posso enviar dinheiro para uma conta bancária?</p>
                    <p class="card-text actived">O beneficiário não recebeu a minha transferência bancária. O que posso fazer?</p>
                    <p class="card-text">Quero cancelar a minha transferência para uma conta bancária</p>
                    <p class="card-text">Quando é que a transferência bancária fica disponível na minha conta Swift?</p>
                    <p class="card-text">Porque é que a transferência bancária que realizei falhou?</p>
                    <p class="card-text">O que devo fazer se for vítima de uma fraude por transferência?</p>
                </div> ';
                }
               if($question === '3')
                {
                    echo '
                    <div class="card-body">
                    <p class="card-text">Como posso enviar dinheiro para uma conta bancária?</p>
                    <p class="card-text">O beneficiário não recebeu a minha transferência bancária. O que posso fazer?</p>
                    <p class="card-text actived">Quero cancelar a minha transferência para uma conta bancária</p>
                    <p class="card-text">Quando é que a transferência bancária fica disponível na minha conta Swift?</p>
                    <p class="card-text">Porque é que a transferência bancária que realizei falhou?</p>
                    <p class="card-text">O que devo fazer se for vítima de uma fraude por transferência?</p>
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
                    <h2>Como posso enviar dinheiro para uma conta bancária?</h2>
                    <p>Para enviar dinheiro para outro banco, siga estes passos para uma transferência segura e sem problemas: <br><br>

                       <b>Passo 1: Adicione o beneficiário</b> <br>
                       Se o beneficiário ainda não estiver guardado como tal, 
                       é necessário adicioná-lo primeiro. No ecrã das contas, 
                       prima "Transferência" → "Novo" → Destinatário bancário. 
                       Acrescente o país e a moeda do destinatário, seguido dos 
                       seus dados de conta, que podem ser o IBAN, ou outros dados 
                       de conta local. Uma vez adicionadas todas as informações necessárias, 
                       clique em "Adicionar destinatário". <br><br>

                      <b>Passo 2: Inicie a transferência</b> <br>
                      Depois de ter adicionado o beneficiário, navegue até 
                      à secção "Transferência" e clique na barra de pesquisa. 
                      A seguir, selecione "Contas" para ver a lista dos seus 
                      beneficiários. Escolha o beneficiário para quem pretende 
                      transferir fundos e clique em "Enviar". Introduza o montante 
                      que pretende transferir, juntamente com uma referência (se necessário) 
                      e clique em "Continuar". <br><br>

                      <b>Passo 3: Reveja a transferência</b> <br>
                      Antes de completar a transferência, reserve um 
                      momento para rever todos os dados. A página de 
                      revisão incluirá uma estimativa das taxas, e a 
                      hora prevista de chegada. Verifique se todos os 
                      dados estão corretos, e se está tudo em ordem, prima "Enviar". <br><br>

                      <b>Passo 4: Transferência submetida</b> <br>
                      Concluído! Navegue até à Página inicial e 
                      selecione a transferência quando pretender 
                      verificar o seu estado.</p>
                </div>
                <div class="answer">
                    <h2>O beneficiário não recebeu a minha transferência bancária. O que posso fazer?</h2>
                    <p>Se o seu beneficiário não tiver recebido a transferência, o primeiro passo a tomar é 
                        determinar se o prazo já passou. <br><br>

                        <b>Como posso verificar os prazos?</b> <br>
                        Os prazos são determinados pelo montante, a moeda e o país para onde pretende 
                        enviar a transferência. <br>

                        Os prazos mais comuns são: <br>

                        <li>Transferências nacionais em Euro (EUR): até 2 dias úteis para chegar até si. 
                        Se o seu banco suportar transferências SEPA instantâneas, deve chegar em segundos</li>
                        <li>Transferências nacionais em Libra Esterlina britânica (GBP): até 1 dia útil 
                        para transferências normais</li>
                        <li>Transferências Swift nacionais: entre 2 e 5 dias úteis</li>
                        <li>Transferências internacionais: até 5 dias úteis.</li><br>
                        
                        Uma vez determinado o período de tempo correto, verifique o estado da transferência.
                        Se não tiver sido excedido, infelizmente, não há nada que possa ser feito para 
                        acelerar a transferência.
                    </p>
                </div>
                <div class="answer">
                    <h2>Quero cancelar a minha transferência para uma conta bancária</h2>
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
                        <h2>Como posso enviar dinheiro para uma conta bancária?</h2>
                        <p>Para enviar dinheiro para outro banco, siga estes passos para uma transferência segura e sem problemas: <br><br>
    
                           <b>Passo 1: Adicione o beneficiário</b> <br>
                           Se o beneficiário ainda não estiver guardado como tal, 
                           é necessário adicioná-lo primeiro. No ecrã das contas, 
                           prima "Transferência" → "Novo" → Destinatário bancário. 
                           Acrescente o país e a moeda do destinatário, seguido dos 
                           seus dados de conta, que podem ser o IBAN, ou outros dados 
                           de conta local. Uma vez adicionadas todas as informações necessárias, 
                           clique em "Adicionar destinatário". <br><br>
    
                          <b>Passo 2: Inicie a transferência</b> <br>
                          Depois de ter adicionado o beneficiário, navegue até 
                          à secção "Transferência" e clique na barra de pesquisa. 
                          A seguir, selecione "Contas" para ver a lista dos seus 
                          beneficiários. Escolha o beneficiário para quem pretende 
                          transferir fundos e clique em "Enviar". Introduza o montante 
                          que pretende transferir, juntamente com uma referência (se necessário) 
                          e clique em "Continuar". <br><br>
    
                          <b>Passo 3: Reveja a transferência</b> <br>
                          Antes de completar a transferência, reserve um 
                          momento para rever todos os dados. A página de 
                          revisão incluirá uma estimativa das taxas, e a 
                          hora prevista de chegada. Verifique se todos os 
                          dados estão corretos, e se está tudo em ordem, prima "Enviar". <br><br>
    
                          <b>Passo 4: Transferência submetida</b> <br>
                          Concluído! Navegue até à Página inicial e 
                          selecione a transferência quando pretender 
                          verificar o seu estado.</p>
                    </div>
                    <div class="answer active">
                        <h2>O beneficiário não recebeu a minha transferência bancária. O que posso fazer?</h2>
                        <p>Se o seu beneficiário não tiver recebido a transferência, o primeiro passo a tomar é 
                            determinar se o prazo já passou. <br><br>
    
                            <b>Como posso verificar os prazos?</b> <br>
                            Os prazos são determinados pelo montante, a moeda e o país para onde pretende 
                            enviar a transferência. <br>
    
                            Os prazos mais comuns são: <br>
    
                            <li>Transferências nacionais em Euro (EUR): até 2 dias úteis para chegar até si. 
                            Se o seu banco suportar transferências SEPA instantâneas, deve chegar em segundos</li>
                            <li>Transferências nacionais em Libra Esterlina britânica (GBP): até 1 dia útil 
                            para transferências normais</li>
                            <li>Transferências Swift nacionais: entre 2 e 5 dias úteis</li>
                            <li>Transferências internacionais: até 5 dias úteis.</li><br>
                            
                            Uma vez determinado o período de tempo correto, verifique o estado da transferência.
                            Se não tiver sido excedido, infelizmente, não há nada que possa ser feito para 
                            acelerar a transferência.
                        </p>
                    </div>
                    <div class="answer">
                        <h2>Quero cancelar a minha transferência para uma conta bancária</h2>
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
                else if($question === '3')
                    {
                        echo '
                        <div class="answer">
                        <h2>Como posso enviar dinheiro para uma conta bancária?</h2>
                        <p>Para enviar dinheiro para outro banco, siga estes passos para uma transferência segura e sem problemas: <br><br>
    
                           <b>Passo 1: Adicione o beneficiário</b> <br>
                           Se o beneficiário ainda não estiver guardado como tal, 
                           é necessário adicioná-lo primeiro. No ecrã das contas, 
                           prima "Transferência" → "Novo" → Destinatário bancário. 
                           Acrescente o país e a moeda do destinatário, seguido dos 
                           seus dados de conta, que podem ser o IBAN, ou outros dados 
                           de conta local. Uma vez adicionadas todas as informações necessárias, 
                           clique em "Adicionar destinatário". <br><br>
    
                          <b>Passo 2: Inicie a transferência</b> <br>
                          Depois de ter adicionado o beneficiário, navegue até 
                          à secção "Transferência" e clique na barra de pesquisa. 
                          A seguir, selecione "Contas" para ver a lista dos seus 
                          beneficiários. Escolha o beneficiário para quem pretende 
                          transferir fundos e clique em "Enviar". Introduza o montante 
                          que pretende transferir, juntamente com uma referência (se necessário) 
                          e clique em "Continuar". <br><br>
    
                          <b>Passo 3: Reveja a transferência</b> <br>
                          Antes de completar a transferência, reserve um 
                          momento para rever todos os dados. A página de 
                          revisão incluirá uma estimativa das taxas, e a 
                          hora prevista de chegada. Verifique se todos os 
                          dados estão corretos, e se está tudo em ordem, prima "Enviar". <br><br>
    
                          <b>Passo 4: Transferência submetida</b> <br>
                          Concluído! Navegue até à Página inicial e 
                          selecione a transferência quando pretender 
                          verificar o seu estado.</p>
                    </div>
                    <div class="answer">
                        <h2>O beneficiário não recebeu a minha transferência bancária. O que posso fazer?</h2>
                        <p>Se o seu beneficiário não tiver recebido a transferência, o primeiro passo a tomar é 
                            determinar se o prazo já passou. <br><br>
    
                            <b>Como posso verificar os prazos?</b> <br>
                            Os prazos são determinados pelo montante, a moeda e o país para onde pretende 
                            enviar a transferência. <br>
    
                            Os prazos mais comuns são: <br>
    
                            <li>Transferências nacionais em Euro (EUR): até 2 dias úteis para chegar até si. 
                            Se o seu banco suportar transferências SEPA instantâneas, deve chegar em segundos</li>
                            <li>Transferências nacionais em Libra Esterlina britânica (GBP): até 1 dia útil 
                            para transferências normais</li>
                            <li>Transferências Swift nacionais: entre 2 e 5 dias úteis</li>
                            <li>Transferências internacionais: até 5 dias úteis.</li><br>
                            
                            Uma vez determinado o período de tempo correto, verifique o estado da transferência.
                            Se não tiver sido excedido, infelizmente, não há nada que possa ser feito para 
                            acelerar a transferência.
                        </p>
                    </div>
                    <div class="answer active">
                        <h2>Quero cancelar a minha transferência para uma conta bancária</h2>
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
                ?>


                <div class="answer">
                    <h2>Quando é que a transferência bancária fica disponível na minha conta Swift?</h2>
                    <p>Diferentes tipos de transferências têm tempos de processamento variáveis, 
                        dependendo do local e da moeda envolvida. Para garantir que tem o prazo correto, 
                        é crucial conhecer o tipo de transferência apropriado. Aqui estão os prazos de 
                        transferência para várias moedas: <br><br>

                        <b>Dados locais Euro (EUR):</b> <br>
                        Os dados locais só podem receber transferências SEPA em euros a partir de contas 
                        bancárias dentro da zona SEPA (a lista completa de países pode ser encontrada <a href="https://www.ecb.europa.eu/paym/integration/retail/sepa/html/index.en.html">aqui</a>). 
                        As transferências SEPA regulares podem demorar até 2 dias úteis a chegar. Se o seu 
                        banco suportar transferências instantâneas SEPA, deverá chegar em segundos, quer a 
                        transferência seja ou não enviada com a SEPA, dependerá do banco emissor. <br><br>

                        <b>Dados locais Libra esterlina (GBP):</b> <br>
                        Os dados locais podem receber três tipos de transferências em libras esterlinas 
                        enviadas de contas bancárias no Reino Unido. As transferências Faster Payments 
                        chegam normalmente de imediato, mas podem demorar até algumas horas. As 
                        transferências CHAPS chegam no mesmo dia útil, ou no dia útil seguinte. As 
                        transferênciasBACS demoram até 3 dias úteis a chegar até si. <br><br>

                        <b>Para transferências internacionais (transfronteiriças)</b> <br><br>
                        As transferências SWIFT podem demorar até 5 dias úteis para chegar até si. 
                        Embora possam ser lentas, e incorrer em taxas por parte dos bancos de 
                        processamento, podem ser enviadas de quase todos os bancos do mundo.</p>    
                </div>
                <div class="answer">
                    <h2>Porque é que a transferência bancária que realizei falhou?</h2>
                    <p>Podem existir vários motivos para esta situação, mas alguns dos mais 
                        comuns incluem: <br><br>

                        <b>Ultrapassar os limites de transferências</b> <br>
                        Consoante o tipo de transferência que estiver a fazer, podem aplicar-se 
                        alguns limites.<br><br>

                        <b>Dados do destinatário incorretos</b> <br>
                        O banco beneficiário poderá ter rejeitado a transferência caso os dados 
                        da conta do destinatário não coincidam. De forma semelhante aos limites, 
                        se recebermos informações adicionais sobre a falha, irá ver a respetiva 
                        mensagem na app a informar sobre a situação.

                        <b>Conta do destinatário encerrada</b> <br>
                        A conta para a qual está a transferir pode não conseguir receber determinados 
                        tipos de transferências (por exemplo, SWIFT ou SEPA) ou pode ter sido encerrada 
                        pelo banco beneficiário. Certifique-se de que mantém os dados da conta do 
                        destinatário atualizados para evitar esta situação. <br><br>

                        <b>Fundos insuficientes</b> <br>
                        Este é um motivo bastante comum em ordens permanentes (transferências 
                        recorrentes). Caso não tenha fundos suficientes para concluir uma 
                        transferência, iremos enviar uma notificação com 24 horas de antecedência 
                        para que possa ter tempo de adicionar dinheiro à conta e, assim, concluir 
                        a transferência.<br>

                        As transferências também podem ser recusadas se estiver a tentar enviar 
                        dinheiro para um comerciante não suportado, como câmbios de criptomoedas. 
                        Se continuar a ter problemas a fazer uma transferência, <a href="">fale connosco</a>. <br><br>

                        <b>Atualmente, a Swift não suporta transferências de ou para a Rússia e 
                        Bielorrússia.</b></p>
                </div>
                <div class="answer">
                    <h2>O que devo fazer se for vítima de uma fraude por transferência?</h2>
                    <p>Se acreditar ter feito uma transferência fraudulenta ou se suspeitar que a sua conta está em risco:

                        <li>Se ainda estiver em contacto com o suspeito/burlão, ponha imediatamente termo a qualquer tipo de comunicação;</li>
                        <li>Contacte a instituição financeira envolvida. Se for a Swift, <a href="">entre em contacto connosco;</a></li>
                        <li>Comunique o incidente à Polícia.</li></p>
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