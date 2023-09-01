<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="HelpCenter2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    
    <title>Apoio ao cliente</title>
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


        <?php if (isset($_GET['success'])) { ?>
          <div class="alert alert-success alert-dismissible mt-3 fade show mensagemSucesso" role="alert" align="center">
          <p class="Mensagem"><?php echo $_GET['success']; ?></p>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <?php } ?>

      <div class="container-main">
          <div class="container1">
      <div class="row">
        <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-body">
            <h2 class="card-title">Segurança e fraude</h2>
             <a href="HelpCenterSeguranca.php?question=1"><p class="card-text">Como denunciar uma operação fradulenta?</p></a>
             <a href="HelpCenterSeguranca.php?question=2"><p class="card-text">Como reconhecer uma fraude?</p></a>
             <a href="HelpCenterSeguranca.php?question=3"><p class="card-text">Estou a ser cobrado por uma subscrição que cancelei ou que não sabia que tinha sido subscrito</p></a>
              <a href="HelpCenterSeguranca.php?question=1" class="botao">Ver todos</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-body">
              <h2 class="card-title">A minha conta e perfil</h2>
              <a href="HelpCenterConta.php?question=1"><p class="card-text">Como posso alterar o meu nome?</p></a>
              <a href="HelpCenterConta.php?question=2"><p class="card-text">Como posso alterar o meu número de telemóvel?</p></a>
              <a href="HelpCenterConta.php?question=3"><p class="card-text">Como é que valido a minha identidade?</p></a>
              <a href="HelpCenterSeguranca.php?question=1" class="botao" >Ver todos</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-body">
              <h2 class="card-title">Adicionar e receber dinheiro</h2>
              <a href="HelpCenterAdicionar.php?question=1"><p class="card-text">Como posso adicionar dinheiro à minha conta Swift</p></a>
              <a href="HelpCenterAdicionar.php?question=2"><p class="card-text">Como posso adicionar dinheiro com uma transferência bancária?</p></a>
              <a href="HelpCenterAdicionar.php?question=3"><p class="card-text">Que dados de conta devo de usar para transferir dinheiro para a minha conta Swift</p></a>
              <a href="HelpCenterSeguranca.php?question=1" class="botao" >Ver todos</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-body">  
              <h2 class="card-title">Transferências</h2>
              <a href="HelpCenterTransferencias.php?question=1"><p class="card-text">Como posso enviar dinheiro para uma conta bancária?</p></a>
              <a href="HelpCenterTransferencias.php?question=2"><p class="card-text">O beneficiário não recebeu a minha transferência bancária. O que posso fazer?</p></a>
              <a href="HelpCenterTransferencias.php?question=3"><p class="card-text">Quero cancelar a minha transferência para uma conta bancária</p></a>
              <a href="HelpCenterSeguranca.php?question=1" class="botao" >Ver todos</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-body">
              <h2 class="card-title">Cartões Swift</h2>
              <a href="HelpCenterCartao.php?question=1"><p class="card-text">Como posso pedir um cartão físico?</p></a>
              <a href="HelpCenterCartao.php?question=2"><p class="card-text">Não recebi o meu cartão. Quando é que este será entregue?</p></a>
              <a href="HelpCenterCartao.php?question=3"><p class="card-text">Como posso ativar um cartão?</p></a>
              <a href="HelpCenterSeguranca.php?question=1" class="botao" >Ver todos</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-body">
              <h2 class="card-title">Moedas e trading</h2>
              <a href="HelpCenterTrading.php?question=1"><p class="card-text">Câmbios</p></a>
              <a href="HelpCenterTrading.php?question=2"><p class="card-text">Ações</p></a>
              <a href="HelpCenterTrading.php?question=3"><p class="card-text">Criptomoedas</p></a>
              <a href="HelpCenterSeguranca.php?question=1" class="botao" >Ver todos</a>
            </div>
          </div>
        </div>
      </div>
    </div>    
      </div>
    
      
      <div class="Container2">
        <div class="bubble">
        <h3>Ainda tens perguntas?</h3>
        <h2>Não encontras a resposta que procuras? Entra em contacto com a nossa equipa.</h2>
        </div>
        <button onclick="window.location.href='contactUs.php';">Entre em contacto</button>
      </div>


      <?php include "../../../components/footer.php"?>
      
      <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <script>
        $(document).ready(function(){
           $('.botao').hover(
            function(){
            $(this).css({"border":"0", "background-color":"#2FB383", "color":"white", "transition": "background-color 0.5s easy-in-out"});
            },
            function(){
              $(this).addClass('.botao').css({"border":"1px solid black", "background-color":"transparent", "color":"#232323"});
            }
          ); 

        $('.card-text').hover(
        function() {
        $(this).css({"color": "black", "transition": "color 0.3s ease-in-out", "cursor": "pointer"});
        },
        function() {
        $(this).css({"color": "rgb(128, 128, 128)", "cursor": "pointer"});
        }
        );
        });

        $(window).scroll(function() {
        var scrollTop = $(this).scrollTop();
        $(".Container::before").css("transform", "translateY(" + scrollTop / 2 + "px)");
        });



        $(document).ready(function() {
        var questions = [];

 
  $('.card-text').each(function() {
    var question = $(this).text().trim();
    var url = $(this).closest('a').attr('href');
    questions.push({ question: question, url: url });
  });

  $('.search-input').autocomplete({
    source: function(request, response) {
      var term = $.ui.autocomplete.escapeRegex(request.term);
      var matcher = new RegExp("\\b" + term, "i");

      var filteredQuestions = questions.filter(function(item) {
        return matcher.test(item.question);
      });

      response(filteredQuestions.map(function(item) {
        return item.question;
      }));
    },
    minLength: 1,
    select: function(event, ui) {
      var selectedQuestion = ui.item.value;
      var selectedQuestionObj = questions.find(function(item) {
        return item.question === selectedQuestion;
      });

      if (selectedQuestionObj) {
        window.location.href = selectedQuestionObj.url;
      }
    }
  }).autocomplete("widget").addClass("autocomplete-dropdown");
});


      </script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
      <script src="https://kit.fontawesome.com/168ae3293e.js" crossorigin="anonymous"></script>
</body>
</html>