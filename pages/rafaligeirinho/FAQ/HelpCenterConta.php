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
                    <p class="card-text actived">Como posso alterar o meu nome?</p>
                    <p class="card-text">Como posso alterar o meu número de telemóvel?</p>
                    <p class="card-text">Como é que valido a minha identidade?</p>
                    <p class="card-text">Por que motivo está a minha conta bloqueada?</p>
                    <p class="card-text">Efetuar o downgrade do meu plano</p>
                    <p class="card-text">Não consigo iniciar sessão</p>
                </div> ';
                }
              if($question === '2')
                {
                    echo '
                    <div class="card-body">
                    <p class="card-text">Como posso alterar o meu nome?</p>
                    <p class="card-text actived">Como posso alterar o meu número de telemóvel?</p>
                    <p class="card-text">Como é que valido a minha identidade?</p>
                    <p class="card-text">Por que motivo está a minha conta bloqueada?</p>
                    <p class="card-text">Efetuar o downgrade do meu plano</p>
                    <p class="card-text">Não consigo iniciar sessão</p>
                </div> ';
                }
               if($question === '3')
                {
                    echo '
                    <div class="card-body">
                    <p class="card-text">Como posso alterar o meu nome?</p>
                    <p class="card-text">Como posso alterar o meu número de telemóvel?</p>
                    <p class="card-text actived">Como é que valido a minha identidade?</p>
                    <p class="card-text">Por que motivo está a minha conta bloqueada?</p>
                    <p class="card-text">Efetuar o downgrade do meu plano</p>
                    <p class="card-text">Não consigo iniciar sessão</p>
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
                    <h2>Como posso alterar o meu nome?</h2>
                    <p>Se a sua conta ainda não tiver sido verificada, pode atualizar 
                    o nome na secção Dados pessoais.<br>

                    Se a sua conta estiver validada, fale connosco no chat para solicitar 
                    uma alteração do nome. Irá necessitar de nos fornecer o seu nome legal 
                    completo e de enviar o seu documento. Um agente de apoio irá analisar 
                    os documentos e aplicar as alterações.<br>
                    
                    Certifique-se de que tem um documento válido consigo (não pode estar 
                    expirado), no qual o seu novo nome está indicado (Passaporte / Documento 
                    de identificação nacional / certidão de casamento impressa).</p>

                </div>
                <div class="answer">
                    <h2>Como posso alterar o meu número de telemóvel?</h2>
                        <p>Altere o seu número na secção Dados pessoais. <br><br>

                        <b>Se iniciou sessão com acesso ao número de telemóvel antigo:</b> <br>

                        <li>Introduza o novo número de telemóvel;</li>
                        <li>Introduza o código de verificação único (código de 6 dígitos);</li>
                        <li>Introduza o código de acesso;</li>
                        <li>Introduza o código de 6 dígitos recebido no seu novo número.</li>
                        
                        <b>Se iniciou sessão sem acesso ao número de telefone antigo:</b> <br>

                        <li>Introduza o novo número de telemóvel; </li>
                        <li>Aguarde que o tempo de "Reenviar código" expire e selecione "Reenviar código";</li>
                        <li>Selecione receber o código de verificação por e-mail;</li>
                        <li>Verifique a sua caixa de entrada no e-mail (incluindo o spam).</li>
                        
                        <b>Se não iniciou sessão:</b><br>

                        <li>Toque em"Perdi o acesso ao meu número" na página de início de sessão; </li>
                        <li>Introduza o seu número de telemóvel antigo e o código de acesso; </li>
                        <li>Forneça o seu endereço de e-mail; </li>
                        <li>Introduza o seu código de acesso e siga as instruções; </li>
                        <li>Se falhar mais de três vezes, será direcionado para o apoio ao cliente 
                        <li>no chat na app. </li></p>
                </div>
                <div class="answer">
                    <h2>Como é que valido a minha identidade?</h2>
                    <p>Para validar a sua identidade, poderemos pedir uma cópia de um 
                    documento que comprove o seu direito legal de estadia no seu país (p.ex. um visto). <br><br>

                    <b>Algumas dicas para se certificar de que a verificação de identidade 
                    corre bem:</b> <br>

                    <li>Tire uma fotografia nítida do seu documento de identidade, garanta que 
                    todos os detalhes estão legíveis e sem áreas desfocadas</li>
                    <li>Tire as fotografias num local bem iluminado</li>
                    <li>Desligue o flash para evitar áreas com demasiada iluminação nos seus 
                    documentos</li>
                    <li>Certifique-se de que os dados do seu perfil Swift correspondem aos
                    dados do seu documento legal</li>
                    <li>Não tire uma fotografia de uma fotografia</li></p>
                    
                </div>';
                    }
                else if($question === '2')
                    {
                        echo '
                    <div class="answer">
                        <h2>Como posso alterar o meu nome?</h2>
                        <p>Se a sua conta ainda não tiver sido verificada, pode atualizar 
                        o nome na secção Dados pessoais.<br>

                        Se a sua conta estiver validada, fale connosco no chat para solicitar 
                        uma alteração do nome. Irá necessitar de nos fornecer o seu nome legal 
                        completo e de enviar o seu documento. Um agente de apoio irá analisar 
                        os documentos e aplicar as alterações.<br>
                    
                        Certifique-se de que tem um documento válido consigo (não pode estar 
                        expirado), no qual o seu novo nome está indicado (Passaporte / Documento 
                        de identificação nacional / certidão de casamento impressa).</p>

                    </div>
                    <div class="answer active">
                        <h2>Como posso alterar o meu número de telemóvel?</h2>
                        <p>Altere o seu número na secção Dados pessoais. <br><br>

                        <b>Se iniciou sessão com acesso ao número de telemóvel antigo:</b> <br>

                        <li>Introduza o novo número de telemóvel;</li>
                        <li>Introduza o código de verificação único (código de 6 dígitos);</li>
                        <li>Introduza o código de acesso;</li>
                        <li>Introduza o código de 6 dígitos recebido no seu novo número.</li>
                        
                        <b>Se iniciou sessão sem acesso ao número de telefone antigo:</b> <br>

                        <li>Introduza o novo número de telemóvel; </li>
                        <li>Aguarde que o tempo de "Reenviar código" expire e selecione "Reenviar código";</li>
                        <li>Selecione receber o código de verificação por e-mail;</li>
                        <li>Verifique a sua caixa de entrada no e-mail (incluindo o spam).</li>
                        
                        <b>Se não iniciou sessão:</b><br>

                        <li>Toque em"Perdi o acesso ao meu número" na página de início de sessão; </li>
                        <li>Introduza o seu número de telemóvel antigo e o código de acesso; </li>
                        <li>Forneça o seu endereço de e-mail; </li>
                        <li>Introduza o seu código de acesso e siga as instruções; </li>
                        <li>Se falhar mais de três vezes, será direcionado para o apoio ao cliente 
                        <li>no chat na app. </li></p>
                    </div>
                    <div class="answer">
                    <h2>Como é que valido a minha identidade?</h2>
                    <p>Para validar a sua identidade, poderemos pedir uma cópia de um 
                    documento que comprove o seu direito legal de estadia no seu país (p.ex. um visto). <br><br>

                    <b>Algumas dicas para se certificar de que a verificação de identidade 
                    corre bem:</b> <br>

                    <li>Tire uma fotografia nítida do seu documento de identidade, garanta que 
                    todos os detalhes estão legíveis e sem áreas desfocadas</li>
                    <li>Tire as fotografias num local bem iluminado</li>
                    <li>Desligue o flash para evitar áreas com demasiada iluminação nos seus 
                    documentos</li>
                    <li>Certifique-se de que os dados do seu perfil Swift correspondem aos
                    dados do seu documento legal</li>
                    <li>Não tire uma fotografia de uma fotografia</li></p>
                    </div>';
                    }
                else if($question === '3')
                    {
                        echo '
                    <div class="answer">
                        <h2>Como posso alterar o meu nome?</h2>
                        <p>Se a sua conta ainda não tiver sido verificada, pode atualizar 
                        o nome na secção Dados pessoais.<br>

                        Se a sua conta estiver validada, fale connosco no chat para solicitar 
                        uma alteração do nome. Irá necessitar de nos fornecer o seu nome legal 
                        completo e de enviar o seu documento. Um agente de apoio irá analisar 
                        os documentos e aplicar as alterações.<br>
                    
                        Certifique-se de que tem um documento válido consigo (não pode estar 
                        expirado), no qual o seu novo nome está indicado (Passaporte / Documento 
                        de identificação nacional / certidão de casamento impressa).</p>
                    </div>
                    <div class="answer">
                        <h2>Como posso alterar o meu número de telemóvel?</h2>
                        <p>Altere o seu número na secção Dados pessoais. <br><br>

                        <b>Se iniciou sessão com acesso ao número de telemóvel antigo:</b> <br>

                        <li>Introduza o novo número de telemóvel;</li>
                        <li>Introduza o código de verificação único (código de 6 dígitos);</li>
                        <li>Introduza o código de acesso;</li>
                        <li>Introduza o código de 6 dígitos recebido no seu novo número.</li>
                        
                        <b>Se iniciou sessão sem acesso ao número de telefone antigo:</b> <br>

                        <li>Introduza o novo número de telemóvel; </li>
                        <li>Aguarde que o tempo de "Reenviar código" expire e selecione "Reenviar código";</li>
                        <li>Selecione receber o código de verificação por e-mail;</li>
                        <li>Verifique a sua caixa de entrada no e-mail (incluindo o spam).</li>
                        
                        <b>Se não iniciou sessão:</b><br>

                        <li>Toque em"Perdi o acesso ao meu número" na página de início de sessão; </li>
                        <li>Introduza o seu número de telemóvel antigo e o código de acesso; </li>
                        <li>Forneça o seu endereço de e-mail; </li>
                        <li>Introduza o seu código de acesso e siga as instruções; </li>
                        <li>Se falhar mais de três vezes, será direcionado para o apoio ao cliente 
                        <li>no chat na app. </li></p>
                    </div>
                    <div class="answer active">
                    <h2>Como é que valido a minha identidade?</h2>
                    <p>Para validar a sua identidade, poderemos pedir uma cópia de um 
                    documento que comprove o seu direito legal de estadia no seu país (p.ex. um visto). <br><br>

                    <b>Algumas dicas para se certificar de que a verificação de identidade 
                    corre bem:</b> <br>

                    <li>Tire uma fotografia nítida do seu documento de identidade, garanta que 
                    todos os detalhes estão legíveis e sem áreas desfocadas</li>
                    <li>Tire as fotografias num local bem iluminado</li>
                    <li>Desligue o flash para evitar áreas com demasiada iluminação nos seus 
                    documentos</li>
                    <li>Certifique-se de que os dados do seu perfil Swift correspondem aos
                    dados do seu documento legal</li>
                    <li>Não tire uma fotografia de uma fotografia</li></p>
                    </div>';
                    }
                ?>


                <div class="answer">
                    <h2>Por que motivo está a minha conta bloqueada?</h2>
                    <p>Sabemos que pode ser frustrante ter o acesso aos seus fundos negado. 
                    Estamos a fazer tudo para concluir as verificações necessárias e restabelecer 
                    a sua conta o mais rapidamente possível. Não podemos fornecer um prazo fixo, 
                    pois cada caso depende de circunstâncias específicas. <br><br>

                    <b>O que posso fazer se a minha conta for restringida?</b><br>

                    <li>Siga as instruções da app para validar a sua identidade ou confirmar as informações financeiras.</li>
                    <li>Certifique-se de que são carregados documentos legíveis, válidos e não expirados.</li>
                    <li>Prepare documentos para operações recentes, caso seja necessário verificá-los.</li>
                    
                    <b>Razões mais comuns pelas quais pode estar a ter limitações:</b><br>

                    <li>A sua conta está temporariamente restrita. Consulte a secção Validação de 
                    documentos de identificação na sua app para quaisquer atualizações de documentos necessárias.</li>
                    <li>Foi-nos pedido que verificássemos os seus fundos. Siga os passos descritos 
                    nesta pergunta frequente.</li></p>   
                </div>
                <div class="answer">
                    <h2>Efetuar o downgrade do meu plano</h2>
                    <p><b>Posso efetuar o downgrade da minha subscrição no prazo de 
                    14 dias após a atualização?</b><br>
                    <li>Se não tiver utilizado nenhum dos serviços Plus, Premium ou 
                    Metal fornecidos (conforme listados aqui), será efetuado um downgrade 
                    da sua conta gratuitamente;</li>
                    <li>e tiver utilizado qualquer serviço exclusivo destes planos, iremos 
                    emitir um reembolso parcial com base na sua utilização desses serviços;</li>
                    <li>Se encomendou um cartão Swift físico e efetuar um downgrade da sua subscrição 
                        Plus ou Premium, uma taxa de cartão de 10 € no Swift Plus e Swift 
                        Premium mais uma taxa de entrega prioritária de 
                        £19.99 (o preço da taxa de entrega prioritária é fornecido em GBP, o 
                        equivalente na moeda local será visível durante o downgrade) serão deduzidas 
                        da sua conta Swift, para cobrir os custos incorridos na produção e envio do 
                        seu cartão.</li>
                    <b>Posso efetuar o downgrade do meu plano após o período de 14 dias?</b><br>
                    <li>Se tiver um plano anual, cancelaremos a sua renovação automática por mais um ano, 
                    desde que efetue o downgrade pelo menos um mês antes do término do contrato de 12 
                    meses. Poderá utilizar o seu plano até ao final do período de subscrição de um ano.</li>
                    <li>Se tiver um plano mensal, terá a opção de rescindir antecipadamente o seu plano a 
                    qualquer momento nos primeiros 10 meses por uma taxa de rescisão de 6 € no caso do 
                    Swift Plus, 16 € no caso do Swift Premium ou 28 € no caso do Swift Metal. Se 
                    cancelar o plano no 11.º mês, a sua subscrição não será renovada automaticamente no 
                    ano seguinte</li>
                    <li>Se tiver um plano mensal, quando efetua o downgrade do plano e uma taxa de 
                    encerramento antecipado for cobrada, a sua conta permanecerá no plano Plus, 
                    Premium ou Metal até ao final do mês corrente.
                    Por exemplo, imaginemos que fez o upgrade do plano para o Premium no dia 25 de 
                    novembro e o downgrade no dia 12 de março. A taxa de encerramento do plano é 
                    cobrada no dia em que efetuou o downgrade (dia 12), mas a sua conta permanece no 
                    plano Premium até 25 de março.</li>
                    </p>
                </div>
                <div class="answer">
                    <h2>Não consigo iniciar sessão</h2>
                    <p>Se está a ter dificuldades a iniciar sessão ou a recuperar a 
                        sua conta, consulte a página de estado da Swift para 
                        verificar se há alguma quebra no serviço, ou manutenção 
                        planeada, que possa estar a causar-lhe impacto. <br><br>

                        Se continuar a ter dificuldades a iniciar sessão, assegure-se do seguinte: <br>

                        <li>A sua ligação à internet é suficiente e estável;</li>
                        <li>Tem a versão mais recente da app Swift instalada no seu 
                        telemóvel (disponível na App Store e na Google Play Store);</li>
                        <li>Se se esqueceu do seu código de acesso ou número de telefone, 
                        só pode recuperar a sua conta com um dispositivo móvel. Não 
                        pode recuperá-la com um tablet ou computador.</li></p>
                </div>
            </div>
       </div>

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
    <?php include "../../../components/footer.php"?>
      <script src="https://kit.fontawesome.com/168ae3293e.js" crossorigin="anonymous"></script>

</body>
</html>