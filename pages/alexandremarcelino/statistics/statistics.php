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
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="statistics.css">
  <link rel="icon" href="../img/icon.png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
    integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous" />

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
    integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <title>Estatisticas</title>
</head>
<body>
<?php include "../../../connections/conta.php" ?>  
<?php include "../../../connections/cartao.php" ?>
<?php include "../../../connections/plano_poupanca.php" ?>
<?php include "../../../components/header_connected.php" ?>
<?php include "../../../components/banner.php" ?>

  <div class="container">
    <div class="title pb-5 pt-5">
      <h1>Estatísticas</h1>
    </div>
    <div class="box_details">
      <div class="box_title pb-5">Detalhes do cartão</div>
      <div class="box_content">
        <div class="box1">
          <div class="title">Cartão</div>
          <div class="sub_title space"><?php echo $_SESSION['plano'] ?></div>
          <div class="title">Validade do cartão</div>
          <div class="sub_title"><?php echo date("m/y", strtotime($cartao['data_validade'])); ?></div>
        </div>
        <div class="box2">
          <div class="title">Nome</div>
          <div class="sub_title space"><?php echo $_SESSION['primeiro'].' '.$_SESSION['apelido']; ?></div>
          <div class="title">Número do cartão</div>
          <div class="sub_title"><?php echo $_SESSION['cartoes'][0]['num_cartao']; ?></div>
        </div>
        <div class="box3">
          <div class="title">Património</div>
          <div class="circles d-flex">
            <div class="circle_1 d-flex flex-column pr-5">
              <div class="circle-wrap">
                <div class="circle">
                  <div class="mask full-1">
                    <div class="fill-1"></div>
                  </div>
                  <div class="mask half">
                    <div class="fill-1"></div>
                  </div>
                  <div class="inside-circle"> 85% </div>
                </div>
              </div>
              <div class="sub_title text-center pt-3">Saldo à ordem</div>
              <div class="title text-center"><?php echo number_format($_SESSION['saldo'], 2, ',', '.'); ?><span>€</span></div>
            </div>
            <div class="circle2">
              <div class="circle-wrap">
                <div class="circle">
                  <div class="mask full-2">
                    <div class="fill-2"></div>
                  </div>
                  <div class="mask half">
                    <div class="fill-2"></div>
                  </div>
                  <div class="inside-circle"> 65% </div>
                </div>
              </div>
              <div class="sub_title text-center pt-3">Saldo Poupança</div>
              <?php $cashpoupadototal = 0; if (count($_SESSION['plano_poupanca']) > 0) { ?>
                <?php foreach (array_slice($_SESSION['plano_poupanca'], 0, 8) as $plano_poupanca): ?>
                <?php $cashpoupado = $plano_poupanca['poupado']; $cashpoupadototal = $cashpoupadototal + $cashpoupado ?>
              <?php endforeach; ?>
              <div class="title text-center"><?php echo number_format($cashpoupadototal, 2, ',', '.'); ?><span>€</span></div>
              <?php } else { ?>
                <div class="title text-center">0,00<span>€</span></div>
              <?php } ?>
            </div>
          </div>
        </div>
        <div class="box4 d-flex">
          <div class="pie"></div>
          <div class="expenses d-flex flex-column ml-3 justify-content-evenly">
            <div class="small_title d-flex flex-row">
              <div class="color_r mr-2"></div>Comida
            </div>
            <div class="small_title d-flex flex-row">
              <div class="color_b mr-2"></div>Renda
            </div>
            <div class="small_title d-flex flex-row">
              <div class="color_p mr-2"></div>Investimentos
            </div>
            <div class="small_title d-flex flex-row">
              <div class="color_y mr-2"></div>Restaurantes
            </div>
            <div class="small_title d-flex flex-row">
              <div class="color_g mr-2"></div>Lojas
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-principal">
            <div class="box">
              <div class="container-titulo">
                <p class="box-titulo">Estatísticas de Poupança</p>
              </div>
              <div>
              <?php if (count($_SESSION['plano_poupanca']) > 0) { ?>
              <div class="table-responsive">
                  <table id="clientesTable" class="table">
                    <thead>
                      <tr>
                      <th>Total Poupado</th>
                      <th>Descrição</th>
                      <th>Objetivo de Poupança</th>
                        <th class="flutuante">Ações</th>
                      </tr>
                    </thead>
                    <tbody class="dados-input">
                    <?php foreach ($_SESSION['plano_poupanca'] as $plano_poupanca) { ?>
                    <tr class="dados-input">
                      <td>
                        <input
                          type="text"
                          id="poupado-<?php echo $plano_poupanca['IDpoupanca']; ?>"
                          value="<?php echo number_format($plano_poupanca['poupado'], 2, ',', '.'); ?> €"
                    
                          disabled
                        />
                      </td>
                      <td>
                        <input
                          type="text"
                          id="descricao-<?php echo $plano_poupanca['IDpoupanca']; ?>"
                          value="<?php echo $plano_poupanca['descricao'] ?>"
                          disabled
                        />
                      </td>
                      <td>
                        <input
                          type="text"
                          id="objetivo-<?php echo $plano_poupanca['IDpoupanca']; ?>"
                          value="<?php echo number_format($plano_poupanca['objetivo'], 2, ',', '.'); ?> €"
                          disabled
                        />
                      </td>
              
                        <td class="acoes flutuante">
                          <button
                            class="btn btn-primary editar"
                            id="editar-<?php echo $plano_poupanca['IDpoupanca']; ?>"
                            onclick="editarD(<?php echo $plano_poupanca['IDpoupanca']; ?>)"
                          >
                            <img src="img/Lapis.svg" alt="" />
                          </button>
                          <button
                            class="btn btn-primary atualizar"
                            id="atualizar-<?php echo $plano_poupanca['IDpoupanca']; ?>"
                            onclick="concluirD(<?php echo $plano_poupanca['IDpoupanca']; ?>)"
                          >
                            <img src="img/Certo.svg" alt="" />
                          </button>
                          <button
                            class="btn btn-danger eliminar"
                            value="delete"
                            onclick="eliminarD(<?php echo $plano_poupanca['IDpoupanca']; ?>)"
                          >
                            <img src="img/Lixo.svg" alt="" />
                          </button>
                        </td>
                      </tr>
                      <dialog class="modal-confirmar">
          <div class="box">
              <h4 style="font-weight: 600">Eliminar Utilizador</h4>
              <p class="text-primary">A eliminação do utilizador é irreversível. <br> Tem a certeza que pretende eliminar o utilizador?</p>
              <hr>
              <div class="botoes-modal">
              <button class="btn btn-primary" onclick="confirmarEliminar(true)">Eliminar</button>
              <button class="btn btn-danger" onclick="confirmarEliminar(false)">Cancelar</button>
              </div>
          </div>
      </dialog>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
                <?php } else { ?>
                  <div class="tabelamov">
                    <table>
                    <tr>
                    <th>Total Poupado</th>
                      <th>Descrição</th>
                      <th>Objetivo de Poupança</th>
                        <th class="flutuante">Ações</th>
                      </tr>
                    </table>
                            <div class="sem-movimentos">
                              <img height="80px" draggable="false" src="img/EmojiTriste.svg" alt="">
                              <p style="color:#757575">Ainda sem planos de poupança</p>
                            </div>
                  </div>
                <?php } ?>
              </div>
            </div>
            </div>
          </div>

  <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
    crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/886bff6256.js" crossorigin="anonymous"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js'></script>
  <script>
    $(document).ready(function () {
      var ctx = $("#chart-line");
      var myLineChart = new Chart(ctx, {
        type: 'pie',
        data: {
          labels: ["Renda", "Investimentos", "Comida", "Lojas"],
          datasets: [{
            data: [1000, 1700, 800, 200],
            backgroundColor: ["rgba(255, 0, 0, 0.5)", "rgba(100, 255, 0, 0.5)", "rgba(200, 50, 255, 0.5)", "rgba(0, 100, 255, 0.5)"]
          }]
        },
      });
    });

    function editarD(poupancaId) {
      var descInput = document.getElementById("descricao-" + poupancaId);
        var concluirBtn = document.getElementById("concluir-" + poupancaId);

        descInput.disabled = !descInput.disabled;
        concluirBtn.disabled = !concluirBtn.disabled;
      }

      function concluirD(poupancaId) {
    var descricaoInput = document.getElementById("descricao-" + poupancaId);
    var descricao = descricaoInput.value;

    var xhr = new XMLHttpRequest();
    var url = 'update.php?id=' + poupancaId + '&descricao=' + encodeURIComponent(descricao);
    xhr.open('GET', url, true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            console.log('Descrição mudada com sucesso!');
            descricaoInput.disabled = true;
            document.getElementById("concluir-" + poupancaId).disabled = true;
        } else {
            console.error('Erro.');
        }
    };
    xhr.send();

    // Aguardar 3 segundos (3000 milissegundos)
    setTimeout(function() {
        // Recarregar a página
        location.reload();
    }, 500);
}

var modalConfirmar = document.querySelector(".modal-confirmar")
      var clienteDelete;

      window.onclick = function(event) {
      var modal = document.querySelector("dialog");
      if (event.target == modal) {
          modal.close();
          document.body.classList.remove('modal-scroll');
      }
      }

  </script>

  <?php include "../../../components/footer.php"?>

</body>
</html>
<?php 
}else{
     header("Location: http://localhost/dev/pages/valentimoryshchuk/entrar/index.php");
     exit();
}
 ?>
