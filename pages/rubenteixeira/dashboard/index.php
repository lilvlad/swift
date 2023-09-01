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
        <title>Resumo Swift</title>
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
                            <p class="box-titulo">Saldo Total</p>
                            <!-- <div style="margin-left: -2rem">
                                <img draggable="false" src="img/mastercardicon.svg" alt="mastercard" class="mastercard">
                                <p>**** <?php echo substr($_SESSION['cartoes'][0]['num_cartao'], -4); ?></p>
                            </div> -->
                        </div>
                        <h1 class="meu-saldo"><?php echo number_format($_SESSION['saldo'], 2, ',', '.'); ?><span>€</span></h1>
                        <!-- <p>Euro</p> -->
                        <p class="copiarIBAN" style="color: #696b69" onclick="copiarIBAN()"><u>Copiar IBAN</u> <img height="14px" src="img/CopiarIconPreto.svg" alt="copiar"></p>
                        <div class="botoes">
                            <button class="adicionar" onclick="abrirModalAdicionarDinheiro()"><img height="20px" src="img/Adicionar.svg" alt="transferir">  Adicionar</button>
                            <button class="transferir" onclick="abrirModalTransferirDinheiro()"><img height="18px" src="img/Transferir.svg" alt="transferir">  Transferir</button>
                        </div>
                    </div>

                    <div class="box-rendimentos">
                        <p class="box-titulo">Rendimentos</p>
                        <?php $rendimentos = 0; foreach ($_SESSION['transacoes'] as $transacao) {
                            if ($transacao['recetor'] == $_SESSION['iban']) {
                                $data_transacao = new DateTime($transacao['data_transacao']);
                                $data_atual = new DateTime();

                                if ($data_transacao->format('Ym') == $data_atual->format('Ym')) {
                                    $rendimentos = $rendimentos + $transacao['valor'];
                                }
                            }
                        } ?>
                        <h1 class="meus-rendimentos"><?php echo number_format($rendimentos, 2, ',', '.'); ?><span>€</span></h1>
                        <p>Euro</p>
                        <?php if ($_SESSION['saldo'] != 0) {
                            $porcentagem = ($rendimentos / $_SESSION['saldo']) * 100;
                        } else {
                            $porcentagem = 0; 
                        } ?>
                        <button class="btn-porcentagem"><?php echo number_format($porcentagem, 2, ',', '.'); ?>%</button>
                        <p>Rendimentos totais este mês</p>
                    </div>

                    <div class="box-plano">
                        <p class="box-titulo">Plano</p>
                        <h1 class="meu-plano"><?php echo $_SESSION['plano'] ?></h1>
                        <p>O seu plano atual</p>
                        <button class="alterar-plano"><img height="18px" src="img/Plano.svg" alt="transferir"><a href="../plano/index.php">  Alterar Plano</a></button>
                    </div>
                </div>

                <div class="linha2">
                    <div class="box1">
                        <p class="box-titulo">Movimentos Recentes</p>
                        <div>
                        <?php if (count($_SESSION['transacoes']) > 0) { ?>
                                <div class="tabelamov">
                                <table>
                                    <tr>
                                        <th>Movimento</th>
                                        <th>Data</th>
                                        <th>Hora</th>
                                        <th>Valor</th>
                                    </tr>
                                    <?php 
                                    function compararPorData($transacao1, $transacao2) {
                                        $data1 = strtotime($transacao1['data_transacao']);
                                        $data2 = strtotime($transacao2['data_transacao']);
                                        return $data2 - $data1;
                                    }

                                    usort($_SESSION['transacoes'], 'compararPorData');

                                    foreach (array_slice($_SESSION['transacoes'], 0, 6) as $transacao) { 
                                    ?>
                                        <?php if ($transacao['recetor'] == $_SESSION['iban']) { ?>
                                        <tr>
                                            <td class="movimento"><?php echo $transacao['descricao'] ?></td>
                                            <td><?php echo date("d/m/Y", strtotime($transacao['data_transacao'])); ?></td>
                                            <td><?php echo date("H:i", strtotime($transacao['data_transacao'])); ?></td>
                                            <td><button class="valor-transacao-positivo" type="button">+<?php echo number_format($transacao['valor'], 2, ',', '.'); ?>€</button></td>
                                        </tr>
                                        <?php } else if ($transacao['remetente'] == $_SESSION['iban']) { ?>
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
                                    <a href="../../rafaligeirinho/transacoes/transacao.php" class="ver-mais">Ver mais</a>
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
                    <div class="box2">
                        <p class="box-titulo">Mercado Financeiro</p>
                        <div class="empresa">
                            <div class="img-p">
                                <img draggable="false" height="25px" src="img/AppleLogo.svg" alt="apple" class="logo">
                                <p>Apple Inc.<br> <span>AAPL</span></p>
                            </div>
                            <button class="btn-vermelho">-12,23%</button>
                        </div>

                        <div class="empresa">
                            <div class="img-p">
                                <img draggable="false" height="25px" src="img/GoogleLogo.svg" alt="google" class="logo">
                                <p>Alphabet Inc.<br> <span>GOOGL</span></p>
                            </div>
                            <button class="btn-verde">+4,23%</button>
                        </div>

                        <div class="empresa">
                            <div class="img-p">
                                <img draggable="false" height="25px" src="img/MicrosoftLogo.svg" alt="microsoft" class="logo">
                                <p>Microsoft<br> <span>MSFT</span></p>
                            </div>
                            <button class="btn-verde">+0,64%</button>
                        </div>

                        <div class="empresa">
                            <div class="img-p">
                                <img draggable="false" height="25px" src="img/MetaLogo.svg" alt="meta" class="logo">
                                <p>Meta<br> <span>META</span></p>
                            </div>
                            <button class="btn-verde">+3,16%</button>
                        </div>

                        <div class="empresa">
                            <div class="img-p">
                                <img draggable="false" height="25px" src="img/AdobeLogo.svg" alt="adobe" class="logo">
                                <p>Adobe Inc.<br> <span>ADBE</span></p>
                            </div>
                            <button class="btn-vermelho">-1,18%</button>
                        </div>

                        <div class="empresa">
                            <div class="img-p">
                                <img draggable="false" height="25px" src="img/SpotifyLogo.svg" alt="spotify" class="logo">
                                <p>Spotify<br> <span>S1PO34</span></p>
                            </div>
                            <button class="btn-verde">+10,85%</button>
                        </div>

                        <div class="empresa">
                            <div class="img-p">
                                <img draggable="false" height="25px" src="img/UnityLogo.svg" alt="unity" class="logo">
                                <p>Unity Inc.<br> <span>UNT</span></p>
                            </div>
                            <button class="btn-vermelho">-9,24%</button>
                        </div>

                        <a href="https://www.tradingview.com/markets/" class="ver-mais">Ver Mais</a>
                    </div>
                </div>

                <div class="linha3">
                    <div class="box1">
                        <div class="titulo">
                            <p class="box-titulo">Os Meus Cartões</p>
                            <?php
                            if (count($cartoes) > 1) { ?>
                                <button class="btn-editar-cartoes" onclick="mostrarDiv()">Eliminar <img height="18px" src="img/Lixo.svg" alt="eliminar"></button>
                            <?php } 
                            else { ?>
                            <?php } ?>
                        </div>
                        <div class="cartoes">
                            <?php 
                                if (count($cartoes) > 1) {
                                    $i = 0;
                                    foreach (count($cartoes) > 2 ? array_slice($cartoes, 0, 2) : $cartoes as $index => $cartao): 
                                    $cards[$i++] = $cartao['IDcartao'] ?>
                                    
                                    <div id="cartao-<?php echo $cartao['IDcartao']?>" class="cartao <?php echo ($index === 1) ? 'cartao2' : ''; ?>">
                                        <div class="frente" >
                                            <div class="cartao-titulo">
                                                <div class="titulo">Swift</div>
                                                <div class="tipo-cartao"><?php echo $_SESSION['plano'] ?></div>
                                            </div>
                                       
                                            <p class="num-cartao">**** **** **** <?php echo substr($cartao['num_cartao'], -4); ?></p>
                                            <p class="nome-cartao"><?php echo $_SESSION['primeiro'].' '.$_SESSION['apelido']; ?></p>
                                            <div class="validade-foto">
                                                <div class="esquerda">
                                                    <p class="validade">Válido<br>Até </p>
                                                    <p class="data"><?php echo date("m/y", strtotime($cartao['data_validade'])); ?></p>
                                                </div>
                                            <div>
                                                <img height="30px" src="img/mastercardicon.svg" alt="mastercard" class="card-logo">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="verso">
                                        <div class="imagens-cartao">
                                            <img height="30px" src="img/Contactless.svg" alt="">
                                        </div>
                                        <p class="verso-num-cartao" onclick="copiarTexto('<?php echo chunk_split($cartao['num_cartao'], 4, ' '); ?>')"><?php echo chunk_split($cartao['num_cartao'], 4, ' '); ?><img height="16px" src="img/CopiarIcon.svg" alt="copiar"></p>
                                        <div class="validade-cvv">
                                            <p class="verso-validade" onclick="copiarTexto('<?php echo date('m/y', strtotime($cartao['data_validade'])); ?>')"><span>Válido Até</span><br><?php echo date("m/y", strtotime($cartao['data_validade'])); ?><img height="16px" src="img/CopiarIcon.svg" alt="copiar"></p>
                                            <p class="verso-cvv" onclick="copiarTexto('<?php echo $cartao['cvv']; ?>')"><span>CVV</span><br><?php echo $cartao['cvv']; ?><img height="16px" src="img/CopiarIcon.svg" alt="copiar"></p>
                                        </div>
                                            <div class="linha-preta"></div>
                                        </div>
                                    </div>
                                <?php endforeach;
                                } else { ?>
                                <div class="cartao">
                                    <div class="frente">
                                        <div class="cartao-titulo">
                                        <div class="titulo">Swift</div>
                                        <div class="tipo-cartao"><?php echo $_SESSION['plano'] ?></div>
                                        </div>
                                        <p class="num-cartao">**** **** **** <?php echo substr($cartao['num_cartao'], -4); ?></p>
                                        <p class="nome-cartao"><?php echo $_SESSION['primeiro'].' '.$_SESSION['apelido']; ?></p>
                                        <div class="validade-foto">
                                        <div class="esquerda">
                                            <p class="validade">Válido<br>Até </p>
                                            <p class="data"><?php echo date("m/y", strtotime($cartao['data_validade'])); ?></p>
                                        </div>
                                        <div>
                                            <img height="30px" src="img/mastercardicon.svg" alt="mastercard" class="card-logo">
                                        </div>
                                        </div>
                                    </div>
                                    <div class="verso">
                                        <div class="imagens-cartao">
                                            <img height="30px" src="img/Contactless.svg" alt="">
                                        </div>
                                        <p class="verso-num-cartao" onclick="copiarTexto('<?php echo chunk_split($cartao['num_cartao'], 4, ' '); ?>')"><?php echo chunk_split($cartao['num_cartao'], 4, ' '); ?><img height="16px" src="img/CopiarIcon.svg" alt="copiar"></p>
                                        <div class="validade-cvv">
                                            <p class="verso-validade" onclick="copiarTexto('<?php echo date('m/y', strtotime($cartao['data_validade'])); ?>')"><span>Válido Até</span><br><?php echo date("m/y", strtotime($cartao['data_validade'])); ?><img height="16px" src="img/CopiarIcon.svg" alt="copiar"></p>
                                            <p clas+s="verso-cvv" onclick="copiarTexto('<?php echo $cartao['cvv']; ?>')"><span>CVV</span><br><?php echo $cartao['cvv']; ?><img height="16px" src="img/CopiarIcon.svg" alt="copiar"></p>
                                        </div>
                                        <div class="linha-preta"></div>
                                    </div>
                                </div>
                                <div class="novocartao" onclick="criarCartao()">
                                    <img height="40px" src="img/mais.svg" alt="">
                                    <p>Adicionar Cartão</p>
                                </div>
                            <?php } ?>
                        </div>
                        <?php
                        if (count($cartoes) > 1) { ?>
                            <div class="eliminar-cartoes">
                                <button onclick="excluirCartao(<?php echo $cards[0]; ?>)" class="btn-cartao1"><img height="18px" src="img/LixoBranco.svg" alt="eliminar"></button>
                                <button onclick="excluirCartao(<?php echo $cards[1]; ?>)" class="btn-cartao2"><img height="18px" src="img/LixoBranco.svg" alt="eliminar"></button>
                            </div>
                        <?php } else { ?>
                        <?php } ?>
                    </div>

                    <!-- VERIFICAR SE O COFRE FOI CRIADO -->
                    <?php if (count($_SESSION['plano_poupanca']) == 0) { ?>
                        <script> location.reload() </script>
                    <?php } else { ?>
                    <div class="box2">
                        <p class="box-titulo">Cofre</p>
                        <h1 class="saldo-cofre"><?php 
                        foreach ($_SESSION['plano_poupanca'] as $plano_poupanca) {
                            echo number_format($plano_poupanca['poupado'], 2, ',', '.');
                        }
                        ?><span>€</span></h1>
                        <p>Saldo no Cofre</p>
                        <?php
                        $ultimaTransacaoCofre = null;

                        foreach ($_SESSION['transacoes'] as $transacao) {
                            if ($transacao['recetor'] == "Cofre Swift" || $transacao['remetente'] == "Cofre Swift") {
                                if ($ultimaTransacaoCofre === null || $transacao['data_transacao'] > $ultimaTransacaoCofre['data_transacao']) {
                                    $ultimaTransacaoCofre = $transacao;
                                }
                            }
                        }

                        if ($ultimaTransacaoCofre !== null) {
                            ?>
                            <p class="texto-ultimo">Último Movimento</p>
                            <div class="ultimos-movimentos">
                                <?php if ($ultimaTransacaoCofre['recetor'] == "Cofre Swift") { ?>
                                    <div class="movimento-cofre">
                                        <p><?php echo $ultimaTransacaoCofre['descricao'] ?></p>
                                        <button class="valor-transacao-positivo" type="button">+<?php echo number_format($ultimaTransacaoCofre['valor'], 2, ',', '.'); ?>€</button>
                                    </div>
                                <?php } else if ($ultimaTransacaoCofre['remetente'] == "Cofre Swift") { ?>
                                    <div class="movimento-cofre">
                                        <p><?php echo $ultimaTransacaoCofre['descricao'] ?></p>
                                        <button class="valor-transacao-negativo" type="button">-<?php echo number_format($ultimaTransacaoCofre['valor'], 2, ',', '.'); ?>€</button>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } else { ?>
                            <div class="sem-movimentos-cofre">
                                <img height="40px" draggable="false" src="img/EmojiTriste.svg" alt="">
                                <p>Ainda sem movimentos</p>
                            </div>
                        <?php } ?>


                            <button class="btn-detalhes" onclick="abrirPagina('../cofre/index.php')"><img height="22px" src="img/Lapis.svg" alt="ver detalhes">  Ver Detalhes</button>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        

                <dialog class="modal-adicionar-dinheiro">
                    <div class="box">
                        <h4 style="font-weight: 600">Adicionar Dinheiro</h4>
                        <p class="texto-protegido"><img src="img/Escudo.svg" alt="" height="15px">O depósito do seu dinheiro está protegido pela garantia do banco central de Portugal</p>
                        <div class="pagamentos">
                            <div class="pagamento1" id="paypal" onclick="metodoAdicionarDinheiro('paypal')">
                                <img src="img/Paypal.svg" alt="" height="30px">
                            </div>
                            <div class="pagamento1" id="applepay" onclick="metodoAdicionarDinheiro('applepay')">
                                <img src="img/ApplePay.svg" alt="" height="30px">
                            </div>
                            <div class="pagamento1" id="googlepay" onclick="metodoAdicionarDinheiro('googlepay')">
                                <img src="img/GooglePay.svg" alt="" height="26px">
                            </div>
                        </div>
                        <hr>
                        <div class="adicionar-dinheiro">
                            <div class="eur-input">
                                <h5 style="margin-bottom: 0">EUR</h5>
                                <div style="display: flex">
                                    <input class="input-dinheiro" type="number" min="10" max="350000" autocomplete="off" placeholder="0" step="any" oninput="verificarAdicionarDinheiro()">
                                    <p style="margin-top: .3px; color: ">€</p>
                                </div>
                            </div>
                            <div class="texto-input" style="display: flex; justify-content: space-between;">
                                <p>Saldo: <?php echo number_format($_SESSION['saldo'], 2, ',', '.'); ?>€</p>
                                <p>Deposito mínimo de 10€</p>
                            </div>
                        </div>
                        <button class="btn-adicionar-dinheiro" onclick="fecharModalAdicionarDinheiro()" disabled>Adicionar Dinheiro</button>
                    </div>
                </dialog>

                <dialog class="modal-transferir-dinheiro">
                    <div class="box">
                        <h4 style="font-weight: 600">Transferir Dinheiro</h4>
                        <p class="texto-protegido"><img src="img/Escudo.svg" alt="" height="15px">O transferência do seu dinheiro está protegido pela garantia do banco central de Portugal</p>
                        <p style="margin-top: 1rem">O meu IBAN: <?php echo $_SESSION['iban']; ?></p>
                        <div class="transferir-dinheiro">
                            <div class="iban-input">
                                <h5 style="margin-bottom: 0">IBAN</h5>
                                <div style="display: flex">
                                    <input class="input-iban" autocomplete="off" placeholder="<?php echo $_SESSION['iban']; ?>">
                                    <p style="margin-top: .3px; color: "></p>
                                </div>
                            </div>
                            <div class="texto-input" style="display: flex; justify-content: space-between;">
                                <p>Apenas IBAN Swift</p>
                                <p>Introduza o IBAN do destinatário</p>
                            </div>
                        </div>
                        <div class="transferir-dinheiro" style="margin-top: 1rem">
                            <div class="eur-input">
                                <h5 style="margin-bottom: 0">Montante</h5>
                                <div style="display: flex">
                                    <input class="input-montante" type="number" min="1" max="1000" autocomplete="off" placeholder="0" step="any" oninput="verificarMontante()">
                                    <p style="margin-top: .3px; color: ">€</p>
                                </div>
                            </div>
                            <div class="texto-input" style="display: flex; justify-content: space-between;">
                                <p>Saldo: <?php echo number_format($_SESSION['saldo'], 2, ',', '.'); ?>€</p>
                                <p>Transferência mínima de 1€</p>
                            </div>
                        </div>
                        <button class="btn-transferir-dinheiro" onclick="fecharModaltransferirDinheiro()" disabled>Transferir Dinheiro</button>
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

                $('.alterar-plano').hover(
                    function() {
                        $(this).css({"background-color": "#18A86B"})
                    },
                    function() {
                        $(this).css({"background-color": "#1f1f1f"})
                    },
                )

                $('.btn-detalhes').hover(
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

            //COPIAR IBAN

            function copiarIBAN() {
                iban = "<?php echo $_SESSION['iban'] ?>"
                navigator.clipboard.writeText(iban)
                alert("IBAN copiado com sucesso! (" + iban + ")")
            }


            //TUDO SOBRE MODAL ADICIONAR DINHEIRO

            function abrirModalAdicionarDinheiro() {
                var modalAdicionarDinheiro = document.querySelector(".modal-adicionar-dinheiro")
                modalAdicionarDinheiro.showModal();
            }

            function fecharModalAdicionarDinheiro() {
                let saldoInput = document.querySelector(".input-dinheiro");
                let saldo = parseFloat(saldoInput.value);
                if (!isNaN(saldo) && saldo >= 10 && saldo <= 350000) {
                    adicionarDinheiro(saldo);
                    modalAdicionarDinheiro.close();
                } 
            }

            function adicionarDinheiro(valor) {
                window.location.href = "adicionar_dinheiro.php?valor=" + valor + "&metodo=" + metodoDinheiro;
            }

            var verificar1 = false;
            var verificar2 = false;
            var metodoDinheiro = "";

            function metodoAdicionarDinheiro(metodo) {
                let paypal = document.getElementById("paypal");
                let applepay = document.getElementById("applepay");
                let googlepay = document.getElementById("googlepay");
                if (metodo == "paypal") {
                    paypal.style.border = "3px solid #2287f4";
                    applepay.style.border = "none";
                    googlepay.style.border = "none";
                    verificar1 = true;
                    metodoDinheiro = "Paypal";
                    ativarBotaoDinheiro();
                } else if (metodo == "applepay") {
                    paypal.style.border = "none";
                    applepay.style.border = "3px solid #2287f4";
                    googlepay.style.border = "none";
                    verificar1 = true;
                    metodoDinheiro = "Apple Pay";
                    ativarBotaoDinheiro();
                } else if (metodo == "googlepay"){
                    paypal.style.border = "none";
                    applepay.style.border = "none";
                    googlepay.style.border = "3px solid #2287f4";
                    verificar1 = true;
                    metodoDinheiro = "Google Pay";
                    ativarBotaoDinheiro();
                }
            }

            function verificarAdicionarDinheiro() {
                let saldoInput = document.querySelector(".input-dinheiro").value;
                if (!isNaN(saldoInput) && saldoInput >= 10 && saldoInput <= 350000) {
                    verificar2 = true;
                    ativarBotaoDinheiro();
                } else {
                    verificar2 = false;
                    desativarBotaoDinheiro();
                }
            }

            function ativarBotaoDinheiro() {
                if (verificar1 == true && verificar2 == true) {
                    document.querySelector(".btn-adicionar-dinheiro").disabled = false;
                }
            }

            function desativarBotaoDinheiro() {
                document.querySelector(".btn-adicionar-dinheiro").disabled = true;
            }

            // MODAL TRANSFERIR DINHEIRO

            function abrirModalTransferirDinheiro() {
                var modalTransferirDinheiro = document.querySelector(".modal-transferir-dinheiro")
                modalTransferirDinheiro.showModal();
            }

            function verificarMontante() {
                let montanteInput = document.querySelector(".input-montante").value;
                if (!isNaN(montanteInput) && montanteInput >= 1 && montanteInput <= 1000) {
                    document.querySelector(".btn-transferir-dinheiro").disabled = false;
                } else {
                    document.querySelector(".btn-transferir-dinheiro").disabled = true;
                }
            }

            function fecharModaltransferirDinheiro() {
                var ibanInput = document.querySelector(".input-iban").value;
                if (ibanInput.length == 22) {
                    var url = 'verificar_iban.php?iban=' + ibanInput;

                    fetch(url)
                        .then(function(response) {
                            if (response.ok) {
                                return response.text();
                            } else {
                                throw new Error('Erro na requisição. Status: ' + response.status);
                            }
                        })
                        .then(function(data) {
                            var response = data;
                            var sessionIban = '<?php echo $_SESSION['iban']; ?>';
                            var saldo = <?php echo $_SESSION['saldo']; ?>;
                            
                            if (response === 'existe') {
                                if (sessionIban == ibanInput) {
                                    alert('Não podes enviar dinheiro para ti mesmo!');
                                } else {
                                    var montanteInput = document.querySelector(".input-montante").value;
                                    if (saldo < montanteInput) {
                                        alert('Saldo insuficiente!');
                                    } else {
                                        transferirDinheiro(ibanInput);
                                    }
                                }
                            } else if (response === 'nao_existe') {
                                alert('IBAN inexistente!');
                            }
                        })
                        .catch(function(error) {
                            console.error('Erro:', error);
                        });
                } else {
                    alert("O IBAN deve ter 22 caracteres!");
                }
        
            }


            function transferirDinheiro(iban) {
                let montanteInput = document.querySelector(".input-montante").value;
                window.location.href = "transferir_dinheiro.php?iban=" + iban + "&valor=" + montanteInput;
            }


            // FECHAR MODALS QUANDO CLICAMOS FORA DELES

            window.onclick = function(event) {
                var modalDepositar = document.querySelector(".modal-adicionar-dinheiro");
                var modalTransferir = document.querySelector(".modal-transferir-dinheiro");
                if (event.target == modalDepositar ||  event.target == modalTransferir) {
                    modalDepositar.close();
                    modalTransferir.close();
                }
            }
   

            //MOSTRAR DIV DE APAGAR CARTOES

            function mostrarDiv() {
                var div = document.querySelector(".eliminar-cartoes");
                var botao = document.querySelector(".btn-editar-cartoes");
                var cartao = document.querySelector(".cartao");
                var cartao2 = document.querySelector(".cartao2"); 

                var computedStyle = window.getComputedStyle(div);

                if (computedStyle.display === "none") {
                    div.style.display = "flex";
                    botao.innerHTML = "Concluído <img height='18px' src='img/Certo.svg' alt='concluir'>";
                    botao.style.backgroundColor = "var(--verde)";
                    botao.style.color = "white";
                    cartao.style.animation = "tilt-shaking2 0.3s infinite";
                    cartao2.style.animation = "tilt-shaking2 0.3s infinite";
                } else {
                    div.style.display = "none";
                    botao.innerHTML = "Eliminar <img height='18px' src='img/Lixo.svg' alt='eliminar'>";
                    botao.style.backgroundColor = "#eaeaea";
                    botao.style.color = "#1f1f1f";
                    cartao.style.animation = "";
                    cartao2.style.animation = "";
                }
            }

            // COPIAR TEXTO

            function copiarTexto(texto) {
                event.stopPropagation();
                navigator.clipboard.writeText(texto)
                alert("Copiado com sucesso! (" + texto + ")")
            }


            //VIRAR CARTÃO

            var cartao = document.querySelector('.cartao');

            cartao.addEventListener('click', function() {
                cartao.classList.toggle('virado');
            });

            var cartao2 = document.querySelector('.cartao2');

            cartao2.addEventListener('click', function() {
                cartao2.classList.toggle('virado');
            });


            //CRIAR CARTÃO

            function criarCartao() {
                window.location.href = "criar_cartao.php";
            }

            function excluirCartao(idcartao) {
                window.location.href = "excluir_cartao.php?id=" + idcartao;
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