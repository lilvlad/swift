    <?php 
    session_start();

    if (isset($_SESSION['IDcliente']) && isset($_SESSION['email'])) {
    ?>

    <?php if (count($_SESSION['plano_poupanca']) == 0) { ?>
        <script> location.reload() </script>
    <?php }  ?>

    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cofre Swift</title>
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
        include "verificar_cofre.php"; 
    ?>
    
        <div class="container-principal">      
            <div class="container-sec">
                <div class="linha1">
                    <div class="box-saldo">
                        <div class="line1">
                            <p class="box-titulo">Cofre</p>
                        </div>
                        <h1 class="meu-saldo"><?php 
                        foreach ($_SESSION['plano_poupanca'] as $plano_poupanca) {
                            echo number_format($plano_poupanca['poupado'], 2, ',', '.');
                        }
                        ?><span>€</span></h1>
                        <p>Saldo no Cofre</p>
                        <div class="botoes">
                            <button class="adicionar" onclick="abrirModalFinanciar()"><img height="20px" src="img/Adicionar.svg" alt="Financiar">  Financiar</button>
                            <button class="transferir" onclick="abrirModalLevantar()"><img height="18px" src="img/Transferir.svg" alt="Levantar">  Levantar</button>
                        </div>
                    </div>

                    <div class="box-objetivo">
                        <p class="box-titulo">Objetivo</p>
                        <?php if ($plano_poupanca['objetivo'] <= $plano_poupanca['poupado']) { ?>
                        <h1 class="objetivo" style="color: #3b8d3e"><?php echo number_format($plano_poupanca['objetivo'], 2, ',', '.') ?><span>€</span></h1>
                        <p>Objetivo completo</p>
                        <?php } else { ?>
                        <h1 class="objetivo"><?php echo number_format($plano_poupanca['objetivo'], 2, ',', '.') ?><span>€</span></h1>
                        <p>Objetivo por completar</p>
                        <?php } ?>
                        
                        <div class="botoes">
                            <button class="editar" onclick="abrirModalObjetivo()"><img height="20px" src="img/Lapis.svg" alt="editar-objetivo">  Editar Objetivo</button>
                        </div>
                    </div>

                    <div class="box-descricao">
                        <p class="box-titulo">Descrição</p>
                        <h1 class="descricao"><?php echo $plano_poupanca['descricao'] ?></h1>
                        <p>Descrição opcional personlizável</p>
                        <div class="botoes">
                            <button class="editar" onclick="abrirPagina('http://localhost/dev/pages/alexandremarcelino/statistics/statistics.php')"><img height="20px" src="img/Lapis.svg" alt="editar-descricao">  Editar Descrição</button>
                        </div>
                    </div>
                </div>

                <div class="linha2">
                    <div class="box1">
                        <p class="box-titulo">Operações do Cofre</p>
                        <div>
                            <?php
                            $verificarTransacoes = 0;
                            foreach ($_SESSION['transacoes'] as $transacao) {
                                if ($transacao['recetor'] == "Cofre Swift" || $transacao['remetente'] == "Cofre Swift") {
                                    $verificarTransacoes++;
                                }
                            }
                            if ($verificarTransacoes > 0) {
                                ?>
                                <div class="tabelamov">
                                    <table>
                                        <tr>
                                            <th>Movimento</th>
                                            <th>Data</th>
                                            <th>Hora</th>
                                            <th>Valor</th>
                                        </tr>
                                        <?php
                                        function compararPorData($transacao1, $transacao2)
                                        {
                                            $data1 = strtotime($transacao1['data_transacao']);
                                            $data2 = strtotime($transacao2['data_transacao']);
                                            return $data2 - $data1;
                                        }

                                        usort($_SESSION['transacoes'], 'compararPorData');

                                        foreach ($_SESSION['transacoes'] as $transacao) {
                                            ?>
                                            <?php if ($transacao['recetor'] == "Cofre Swift") { ?>
                                                <tr>
                                                    <td class="movimento"><?php echo $transacao['descricao'] ?></td>
                                                    <td><?php echo date("d/m/Y", strtotime($transacao['data_transacao'])); ?></td>
                                                    <td><?php echo date("H:i", strtotime($transacao['data_transacao'])); ?></td>
                                                    <td><button class="valor-transacao-positivo" type="button">+<?php echo number_format($transacao['valor'], 2, ',', '.'); ?>€</button></td>
                                                </tr>
                                            <?php } else if ($transacao['remetente'] == "Cofre Swift") { ?>
                                                <tr>
                                                    <td class="movimento"><?php echo $transacao['descricao'] ?></td>
                                                    <td><?php echo date("d/m/Y", strtotime($transacao['data_transacao'])); ?></td>
                                                    <td><?php echo date("H:i", strtotime($transacao['data_transacao'])); ?></td>
                                                    <?php if ($transacao['valor'] == 0) { ?>
                                                        <td><button class="valor-transacao-positivo" type="button">Gratuito</button></td>
                                                    <?php } else { ?>
                                                        <td><button class="valor-transacao-negativo" type="button">-<?php echo number_format($transacao['valor'], 2, ',', '.'); ?>€</button></td>
                                                    <?php } ?>
                                                </tr>
                                            <?php } ?>
                                        <?php } ?>
                                    </table>
                                </div>
                            <?php } else { ?>
                                <div class="tabelamov">
                                    <table>
                                        <tr>
                                            <th>Movimento</th>
                                            <th>Data</th>
                                            <th>Hora</th>
                                            <th>Valor</th>
                                        </tr>
                                    </table>
                                    <div class="sem-movimentos">
                                        <img height="80px" draggable="false" src="img/EmojiTriste.svg" alt="">
                                        <p style="color:#757575">Ainda sem movimentos</p>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

             </div>
        </div>
        
                <dialog class="modal-financiar">
                    <div class="modal-financiar-levantar">
                        <div class="box">
                            <h4 style="font-weight: 600">Financiar Cofre</h4>
                            <p class="texto-protegido"><img src="img/Info.svg" alt="" height="18px">Não são aplicadas taxas ao deposito no cofre e o dinheiro poderá ser levantado a qualquer instante</p>
                            <div class="financiar-levantar-cofre" style="margin-top: 1rem">
                                <div class="eur-input">
                                    <h5 style="margin-bottom: 0">Montante</h5>
                                    <div style="display: flex">
                                        <input class="input-montante-financiar" type="number" min="1" max="1000" autocomplete="off" placeholder="0" step="any" oninput="verificarMontanteFinanciar()">
                                        <p style="margin-top: .3px; color: ">€</p>
                                    </div>
                                </div>
                                <div class="texto-input" style="display: flex; justify-content: space-between;">
                                    <p>Saldo: <?php echo number_format($_SESSION['saldo'], 2, ',', '.'); ?>€</p>
                                    <p>Mínimo de 10 cêntimos</p>
                                </div>
                            </div>
                            <button class="btn-cofre-financiar" onclick="fecharModalFinanciar()" disabled>Enviar para o Cofre</button>
                        </div>
                    </div>
                </dialog>


                    <dialog class="modal-levantar">
                        <div class="modal-financiar-levantar">
                            <div class="box">
                                <h4 style="font-weight: 600">Levantar do Cofre</h4>
                                <p class="texto-protegido"><img src="img/Info.svg" alt="" height="18px">Não são aplicadas taxas no levantamento de dinheiro no cofre</p>
                                <div class="financiar-levantar-cofre" style="margin-top: 1rem">
                                    <div class="eur-input">
                                        <h5 style="margin-bottom: 0">Montante</h5>
                                        <div style="display: flex">
                                            <input class="input-montante-levantar" type="number" min="1" max="1000" autocomplete="off" placeholder="0" step="any" oninput="verificarMontanteLevantar()">
                                            <p style="margin-top: .3px; color: ">€</p>
                                        </div>
                                    </div>
                                    <div class="texto-input" style="display: flex; justify-content: space-between;">
                                        <p>Cofre: <?php echo number_format($plano_poupanca['poupado'], 2, ',', '.'); ?>€</p>
                                        <p>Mínimo de 1 cêntimo</p>
                                    </div>
                                </div>
                                <button class="btn-cofre-levantar" onclick="fecharModalLevantar()" disabled>Retirar do Cofre</button>
                            </div>
                        </div>
                    </dialog>


                    <dialog class="modal-objetivo">
                            <div class="box">
                                <h4 style="font-weight: 600">Editar Objetivo</h4>
                                <p class="texto-protegido"><img src="img/Info.svg" alt="" height="18px">O objetivo deverá ser de no mínimo 10€ e no máximo de 1.000.000,00€</p>
                                <div class="editar-objetivo" style="margin-top: 1rem">
                                    <div class="objetivo-input">
                                        <h5 style="margin-bottom: 0">Objetivo</h5>
                                        <div style="display: flex">
                                            <input class="input-objetivo" type="number" min="1" max="1000" autocomplete="off" placeholder="0" step="any" oninput="verificarObjetivo()">
                                            <p style="margin-top: .3px; color: ">€</p>
                                        </div>
                                    </div>
                                    <div class="texto-input" style="display: flex; justify-content: space-between;">
                                        <p>Cofre: <?php echo number_format($plano_poupanca['poupado'], 2, ',', '.'); ?>€</p>
                                        <p>Mínimo de 10€</p>
                                    </div>
                                </div>
                                <button class="btn-editar-objetivo" onclick="fecharModalObjetivo()" disabled>Editar Objetivo</button>
                            </div>
                    </dialog>

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

                $('.editar').hover(
                    function() {
                        $(this).css({"background-color": "#757373"})
                    },
                    function() {
                        $(this).css({"background-color": "#1f1f1f"})
                    },
                )
            })

            //ABRIR PAGINA / REDIRECIONAR

            function abrirPagina(link) {
                window.location.href = link;
            }


            //TUDO SOBRE MODALS

            // MODAL DEPOSITAR SALDO COFRE

            function abrirModalFinanciar() {
                var modalFinanciar = document.querySelector(".modal-financiar")
                modalFinanciar.showModal();
            }

            function verificarMontanteFinanciar() {
                let montanteFinanciarInput = document.querySelector(".input-montante-financiar").value;
                if (!isNaN(montanteFinanciarInput) && montanteFinanciarInput >= 0.1 && montanteFinanciarInput <= <?php echo $_SESSION['saldo']; ?>) {
                    document.querySelector(".btn-cofre-financiar").disabled = false;
                } else {
                    document.querySelector(".btn-cofre-financiar").disabled = true;
                }
            }

            function fecharModalFinanciar() {
                let montanteFinanciarInput = document.querySelector(".input-montante-financiar").value;
                window.location.href = "depositar.php?valorD=" + montanteFinanciarInput;
            }


            // MODAL LEVANTAR SALDO COFRE

            function abrirModalLevantar() {
                var modalLevantar = document.querySelector(".modal-levantar")
                modalLevantar.showModal();
            }

            function verificarMontanteLevantar() {
                let montanteLevantarInput = document.querySelector(".input-montante-levantar").value;
                if (!isNaN(montanteLevantarInput) && montanteLevantarInput >= 0.01 && montanteLevantarInput <= <?php echo $plano_poupanca['poupado']; ?>) {
                    document.querySelector(".btn-cofre-levantar").disabled = false;
                } else {
                    document.querySelector(".btn-cofre-levantar").disabled = true;
                }
            }

            function fecharModalLevantar() {
                let montanteLevantarInput = document.querySelector(".input-montante-levantar").value;
                window.location.href = "levantar.php?valorL=" + montanteLevantarInput;
            }



            function abrirModalObjetivo() {
                var modalObjetivo = document.querySelector(".modal-objetivo")
                modalObjetivo.showModal();
            }

            function verificarObjetivo() {
                let montanteObjetivo = document.querySelector(".input-objetivo").value;
                if (!isNaN(montanteObjetivo) && montanteObjetivo >= 10 && montanteObjetivo <= 1000000) {
                    document.querySelector(".btn-editar-objetivo").disabled = false;
                } else {
                    document.querySelector(".btn-editar-objetivo").disabled = true;
                }
            }

            function fecharModalObjetivo() {
                let montanteObjetivo = document.querySelector(".input-objetivo").value;
                window.location.href = "editar-objetivo.php?objetivo=" + montanteObjetivo;
            }



            // FECHAR MODALS QUANDO CLICAMOS FORA DELES

            window.onclick = function(event) {
                var modalDepositar = document.querySelector(".modal-financiar");
                var modalTransferir = document.querySelector(".modal-levantar");
                var modalObjetivo = document.querySelector(".modal-objetivo");
                if (event.target == modalDepositar ||  event.target == modalTransferir || event.target == modalObjetivo) {
                    modalDepositar.close();
                    modalTransferir.close();
                    modalObjetivo.close();
                }
            }

            function refreshPagina() {
                setTimeout(function() {
                location.reload();
                }, 500);
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