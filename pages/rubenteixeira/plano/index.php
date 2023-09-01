    <?php 
    session_start();

    if (isset($_SESSION['IDcliente']) && isset($_SESSION['email'])) {

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar Plano</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
        <link rel="stylesheet" href="css/style.css">
        <link rel="icon" href="img/icon.png" />  
    </head>
    <body>
    <?php 
    include "../../../connections/conta.php";
    include "../../../connections/cartao.php";
    include "../../../connections/transacoes.php";
    include "../../../connections/plano_poupanca.php";
    include "../../../components/header_connected.php";
    include "../../../components/banner.php"; 
    ?>
    
        <div class="container-principal">      
            <div class="container-sec">
                <div class="linha1">

                    <?php if (isset($_SESSION['plano']) && $_SESSION['plano'] == "Standard" ) {?>
                    <div class="box-plano-atual">
                    <?php } else { ?>
                    <div class="box-plano">
                    <?php } ?>
                        <div class="line1">
                            <p class="box-titulo">Standard</p>
                        </div>
                        <h1 class="plano-preco">Gratuito</h1>
                        <?php if (isset($_SESSION['plano']) && $_SESSION['plano'] == "Standard" ) {?>
                            <button class="box-btn-plano">Plano Atual</button>
                        <?php } else { ?>
                            <button class="box-btn-plano-desativado">Plano Base Gratuito</button>
                        <?php } ?>
                        <div class="botoes">
                            <?php if (isset($_SESSION['plano']) && $_SESSION['plano'] == "Standard" ) {?>
                                <button class="btn-mudar-plano-desativado" style="cursor: not-allowed"><img height="20px" src="" alt="">Plano Atual</button>
                            <?php } else { ?>
                                <button class="btn-mudar-plano" onclick="abrirModal('Standard', 0)"><img height="20px" src="" alt="">Voltar para Standard</button>
                            <?php } ?>
                        </div>
                        <div class="box-vantagens-plano">
                            <p class="titulo-vantagens">Para iniciantes</p>
                            <div class="vantagem">
                                <img src="img/Certo.svg" alt="vantagem">
                                <p>Levantamentos em caixas eletrónicas sem taxas até 250€/mês</p>
                            </div>
                            <div class="vantagem">
                                <img src="img/Certo.svg" alt="vantagem">
                                <p>Cash com qualquer pagamento efetuado com cartão até 0.1%</p>
                            </div>
                            <div class="vantagem">
                                <img src="img/Certo.svg" alt="vantagem">
                                <p>Taxas de câmbio de criptomoedas de 1,99% por transação</p>
                            </div>
                        </div>
                    </div>


                    <?php if (isset($_SESSION['plano']) && $_SESSION['plano'] == "Plus" ) {?>
                    <div class="box-plano-atual">
                    <?php } else { ?>
                    <div class="box-plano">
                    <?php } ?>
                        <div class="line1">
                            <p class="box-titulo">Plus</p>
                        </div>
                        <h1 class="plano-preco">€2,99<span>/mês</span> </h1>
                        <?php if (isset($_SESSION['plano']) && $_SESSION['plano'] == "Plus" ) {?>
                            <button class="box-btn-plano">Plano Atual</button>
                        <?php } else { ?>
                            <button class="box-btn-plano-desativado">7% de Desconto</button>
                        <?php } ?>
                        <div class="botoes">
                            <?php if (isset($_SESSION['plano']) && $_SESSION['plano'] == "Plus" ) {?>
                                <button class="btn-mudar-plano-desativado" style="cursor: not-allowed"><img height="20px" src="" alt="">Plano Atual</button>
                            <?php } else if (isset($_SESSION['plano']) && $_SESSION['plano'] == "Premium" ) { ?>
                                <button class="btn-mudar-plano" onclick="abrirModal('Plus', 2.99)"><img height="20px" src="" alt="">Voltar para Plus</button>
                            <?php } else { ?>
                                <button class="btn-mudar-plano" onclick="abrirModal('Plus', 2.99)"><img height="20px" src="" alt="">Mudar para Plus</button>
                            <?php } ?>
                        </div>
                        <div class="box-vantagens-plano">
                            <p class="titulo-vantagens">Para experientes</p>
                            <div class="vantagem">
                                <img src="img/Certo.svg" alt="vantagem">
                                <p>Levantamentos em caixas eletrónicas sem taxas até 400€/mês</p>
                            </div>
                            <div class="vantagem">
                                <img src="img/Certo.svg" alt="vantagem">
                                <p>Cash com qualquer pagamento efetuado com cartão até 0.5%</p>
                            </div>
                            <div class="vantagem">
                                <img src="img/Certo.svg" alt="vantagem">
                                <p>Taxas de câmbio de criptomoedas de 1,49% por transação</p>
                            </div>
                        </div>
                    </div>

                    <?php if (isset($_SESSION['plano']) && $_SESSION['plano'] == "Premium" ) {?>
                    <div class="box-plano-atual">
                    <?php } else { ?>
                    <div class="box-plano">
                    <?php } ?>
                        <div class="line1">
                            <p class="box-titulo">Premium</p>
                        </div>
                        <h1 class="plano-preco">€7,99<span>/mês</span> </h1>
                        <?php if (isset($_SESSION['plano']) && $_SESSION['plano'] == "Premium" ) {?>
                            <button class="box-btn-plano">Plano Atual</button>
                        <?php } else { ?>
                            <button class="box-btn-plano-desativado">15% de Desconto</button>
                        <?php } ?>
                        <div class="botoes">
                            <?php if (isset($_SESSION['plano']) && $_SESSION['plano'] == "Premium" ) {?>
                                <button class="btn-mudar-plano-desativado" style="cursor: not-allowed"><img height="20px" src="" alt="">Plano Atual</button>
                            <?php } else { ?>
                                <button class="btn-mudar-plano" onclick="abrirModal('Premium', 7.99)"><img height="20px" src="" alt="">Mudar para Premium</button>
                            <?php } ?>
                        </div>
                        <div class="box-vantagens-plano">
                            <p class="titulo-vantagens">Para profissionais</p>
                            <div class="vantagem">
                                <img src="img/Certo.svg" alt="vantagem">
                                <p>Levantamentos em caixas eletrónicas sem taxas até 800€/mês</p>
                            </div>
                            <div class="vantagem">
                                <img src="img/Certo.svg" alt="vantagem">
                                <p>Cash com qualquer pagamento efetuado com cartão até 1%</p>
                            </div>
                            <div class="vantagem">
                                <img src="img/Certo.svg" alt="vantagem">
                                <p>Taxas de câmbio de criptomoedas de 0,8% por transação</p>
                            </div>
                        </div>
                    </div>
                </div>

                <dialog>
                    <div class="box">
                        <h4 style="font-weight: 600">Alterar Plano</h4>
                        <p class="texto-protegido"><img src="img/Aviso.svg" alt="" height="20px">A alteração de plano não é revertivel assim como o valor debitado não é reembolsável</p>
                        <hr class="divisoria">
                        <div class="plano-preco-checkout">
                            <h6 class="modal-plano">Plano Standard</h6>
                            <h6 class="modal-sem-iva">0,00€</h6>
                        </div>
                        <div class="iva-preco-checkout">
                            <h6>IVA 23%</h6>
                            <h6 class="modal-preco-iva">0,00€</h6>
                        </div>
                        <div class="total-a-pagar">
                            <h5>Total a pagar</h5>
                            <h5 style="font-weight: 600" class="modal-preco-final">7,99€</h5>
                        </div>
                        <p class="pagamento-info">O pagamento será efetuado em nome de <?php echo $_SESSION['primeiro'].' '.$_SESSION['apelido']; ?></p>
                        <p class="saldo">Saldo: <?php echo number_format($_SESSION['saldo'], 2, ',', '.'); ?>€</p>
                        <button class="finalizar-compra" disabled="true" onclick="finalizarCompra()">Finalizar Compra</button>
                        <!-- <button class="cancelar-modal" onclick="fecharModal()">Cancelar</button> -->
                    </div>
                </dialog>              
            </div>
        </div>

        <h3 class="div"></h3>
        <?php include "../../../components/footer.php"?>
        

        <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
        <script>
            //MUDAR COR DOS BOTÕES COM HOVER

            $(document).ready(function(){
                $('.adicionar').hover(
                    function() {
                        $(this).css({"background-color": "#2ecd8b"})
                    },
                    function() {
                        $(this).css({"background-color": "#18A86B"})
                    },
                )

                $('.transferir').hover(
                    function() {
                        $(this).css({"background-color": "#757373"})
                    },
                    function() {
                        $(this).css({"background-color": "#1f1f1f"})
                    },
                )

                $('.alterar-plano').hover(
                    function() {
                        $(this).css({"background-color": "#18A86B"})
                    },
                    function() {
                        $(this).css({"background-color": "#1f1f1f"})
                    },
                )
            })

            function alterarPlano(plano, preco) {
                window.location.href = 'alterar_plano.php?plano=' + plano + '&preco=' + preco;
            }

            var modal = document.querySelector("dialog");  
            let planoFinal;
            let precoFinal;
            var saldo = <?php echo $_SESSION['saldo']; ?>;

            function abrirModal(plano, preco) {
                modal.showModal();

                const modalPlano = document.querySelector(".modal-plano");
                const modalSemIVA = document.querySelector(".modal-sem-iva");
                const modalIVA = document.querySelector(".modal-preco-iva");
                const modalTotal = document.querySelector(".modal-preco-final");
                
                const IVA = preco * 0.23;
                const SemIVA = preco - IVA;

                modalPlano.textContent = 'Plano ' + plano;
                modalSemIVA.textContent = SemIVA.toFixed(2) + '€';
                modalIVA.textContent = IVA.toFixed(2) + '€';
                modalTotal.textContent = preco + '€';
                planoFinal = plano;
                precoFinal = preco;

                if (saldo < precoFinal) {
                    document.querySelector(".finalizar-compra").disabled = true;
                    document.querySelector(".finalizar-compra").textContent = "Saldo Insuficiente";
                } else {
                    document.querySelector(".finalizar-compra").disabled = false;
                }
            }

            function finalizarCompra() {
                alterarPlano(planoFinal, precoFinal);
                fecharModal();
            }

            function fecharModal() {
                modal.close();
            }

            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.close();
                }
            }



        </script>
        <script src="https://kit.fontawesome.com/886bff6256.js" crossorigin="anonymous"></script>
    </body>

    </html>

    <?php 
    }else{
        header("Location: http://localhost/dev/pages/valentimoryshchuk/entrar/index.php");
        exit();
    }
    ?>