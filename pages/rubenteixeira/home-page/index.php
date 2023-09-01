<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swift, Juntos pelo seu sucesso financeiro</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" href="img/icon.png" />
    
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
 ?>

  
    <div class="container-principal">
        <div class="banner">
            <div class="conteudo">
                <h1>Juntos pelo seu <br> <span>sucesso</span> financeiro</h1>
                <p>Abra a sua conta rapidamente e desfrute de uma gestão <br> fácil do seu dinheiro, vantagens nas suas viagens e investimentos</p>
                <button class="btnAbrirconta"><a href="../../valentimoryshchuk/registar/index.php">Abrir conta gratuitamente</a></button>
            </div>
            <div class="imagem">
                <img src="img/Cartões.png" alt="cartoes">
            </div>
        </div>
        
        <div class="container-sec">
            <div class="linha1">
                <div class="box1">
                    <div class="imagem">
                        <img class="cartaopreto" src="img/CartõesCarteira.png" alt="cartaopreto">
                    </div>
                    <div class="conteudo">
                        <h2>Conecte o seu cartão virtual <br> à Apple Pay e ao Google Pay</h2>
                        <p>Não espere que o seu cartão físico <br> chegue e use o seu telemóvel para <br> efetuar pagamentos seguros.</p>
                        <a class="btnsabermais" target="_blank" href="https://www.apple.com/wallet/">Saber Mais</a>
                    </div>
                </div>
                <div class="box2">
                    <div class="conteudo">
                        <h2>Faça compras online em segurança com cartões únicos</h2>
                    </div>
                    <img src="img/applepay.png" alt="applepay">
                </div>
            </div>

            <div class="linha2">
                <div class="box1">
                    <div class="conteudo">
                        <h2>Conheça os nossos planos premium</h2>
                    </div>
                    <img src="img/CartãoGold.png" alt="cartaogold">
                    <a class="btnverplanos" target="_blank" href="../../alexandremarcelino/services_bank.php">Ver planos premium</a>
                </div>
                <div class="box2">
                    <div class="conteudo">
                        <h2>Receba notificações <br> de pagamento imediatas</h2>
                        <p>Fique a par de tudo com as notificações detalhadas imediatas de quaisquer movimentos nos seus cartões.</p>
                        <button class="btnazul">Começar</button>
                    </div>
                    <div class="imagem">
                        <img src="img/notificacão.png" alt="">
                    </div>
                </div>
            </div>

            <div class="linha3">
                <div class="conteudo">
                    <h2>Envie e receba dinheiro de qualquer canto <br> do mundo sem complicações</h2>
                    <p>Fique a par de tudo com as notificações detalhadas imediatas de quaisquer movimentos nos seus cartões.</p>
                    <button class="btnazul">Explorar pagamentos</button>
                </div>

                <img src="img/pagamentos.png" alt="">
            </div>

            <div class="linha4">
                <h2>Escolha o seu plano</h2>
                <div class="planos">
                    <div class="boxbranca">
                        <div class="content">
                            <p>Standard</p>
                            <h1>Grátis<span></span></h1>
                            <p>Comece agora o seu plano gratuito do Swift para tirar mais partido do seu dinheiro.</p>
                        </div>
                        <button class="btncinza">Começar</button>
                    </div>
                    <div class="boxgold">
                        <div class="content">
                            <p>Premium</p>
                            <h1>€7,99<span>/mês</span></h1>
                            <p>Viva um estilo de vida global. Ganhe confiança para gastar, investir e poupar de maneira inteligente.</p> 
                        </div>
                        <button class="btnpreto">Começar</button>
                    </div>
                    <div class="boxbranca">
                        <div class="content">
                            <p>Plus</p>
                            <h1>€2,99<span>/mês</span></h1>
                            <p>Dê impulso às suas finanças diárias. Tire mais partido do seu dinheiro a um custo inferior.</p>
                        </div>
                        <button class="btncinza">Começar</button>
                    </div>
                </div>
            </div>
            <div class="linha5">
                <h2>Vídeo Promocional</h2>
                <div class="prom-video">
                   <video src="./swift-video.mp4" controls id="swift-video"></video>
                </div>
            </div>
        </div>
    </div>

    <h3 class="div"></h3>
    <?php include "../../../components/footer.php"?>

    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script>
        let vid = document.getElementById("swift-video");
        vid.volume = 0.2;
        
        $(document).ready(function(){
            $('.btnAbrirconta').hover(
                function() {
                    $(this).css({"background-color": "#18A86B"})
                },
                function() {
                    $(this).css({"background-color": "#1F1F1F"})
                },
            )

            $('.btnsabermais').hover(
                function() {
                    $(this).css({"color": "#1F1F1F"})
                },
                function() {
                    $(this).css({"color": "#458CF6"})
                },
            )

            $('.btnverplanos').hover(
                function() {
                    $(this).css({"color": "#FFFFFF"})
                },
                function() {
                    $(this).css({"color": "#D4AF37"})
                },
            )

            $('.btnazul').hover(
                function() {
                    $(this).css({"background-color": "#1855b1"})
                },
                function() {
                    $(this).css({"background-color": "#458CF6"})
                },
            )
        })
    </script>
    <script src="https://kit.fontawesome.com/886bff6256.js" crossorigin="anonymous"></script>
</body>

</html>