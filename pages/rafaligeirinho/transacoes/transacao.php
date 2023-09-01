<?php 
session_start();

if (isset($_SESSION['IDcliente']) && isset($_SESSION['email'])) {

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="shortcut icon"
      href="../../../assets/icon.png"
      type="image/x-icon"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
      integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="transacao.css" />
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
      integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <title>Perfil</title>
  </head>
  <body>
    <?php include "../../../components/header_connected.php" ?>
    <?php include "../../../components/banner.php" ?>
    <?php include "editar_movimentos.php" ?>

    <div class="info">
        <div class="container">
          <?php if (isset($_GET['error'])) { ?>
          <div class="alert alert-danger mt-3" align="center">
            <?php echo $_GET['error']; ?>
          </div>
          <?php } ?>
          <?php if (isset($_GET['success'])) { ?>
          <div class="alert alert-success mt-3" align="center">
            <?php echo $_GET['success']; ?>
          </div>
          <?php } ?>



          <div class="container-principal">
            <div class="box">
              <div class="container-titulo">
                <p class="box-titulo">Movimentos</p>
                <div class="search-box">
                  <button class="btn-search"><i class="fas fa-search"></i></button>
                  <input type="text" id="searchInput" class="searchInput" placeholder="Pesquisar transação..">
                </div>
              </div>
              <div>
              <?php if (count($_SESSION['transacoes']) > 0) { ?>
    <div class="table-responsive">
        <table id="clientesTable" class="table">
            <thead>
                <tr>
                    <th>Descrição</th>
                    <th>Data Transação</th>
                    <th>Valor</th>
                    <th>Remetente</th>
                    <th>Recetor</th>
                    <th class="flutuante">Ações</th>
                </tr>
            </thead>
            <tbody class="dados-input">
                <?php foreach ($_SESSION['transacoes'] as $transacao) {
                          // Determine the CSS class for the valor field based on remetente and recetor
                          $valorClass = '';
                          $iban = $_SESSION['iban'];
                          $remetente = $transacao['remetente'];
                          $recetor = $transacao['recetor'];

                          if ($iban == $remetente) {
                            $valorClass = 'negative';
                          } else if ($iban == $recetor) {
                            $valorClass = 'positive';
                          }
                        ?>
                        <tr>
                          <td>
                            <div class="scroll">
                                <textarea class="descricao-input" type="text" id="descricao-<?php echo $transacao['IDtransacao']; ?>" disabled><?php echo $transacao['descricao']; ?></textarea>
                            </div>
                          </td>
                          <td>
                            <input class="form-control" type="text" id="data_transacao-<?php echo $transacao['IDtransacao']; ?>" value="<?php echo $transacao['data_transacao']; ?>" disabled>
                          </td>
                          <td>
                            <input class="form-control <?php echo $valorClass; ?>" type="text" id="valor-<?php echo $transacao['IDtransacao']; ?>" value="<?php echo number_format($transacao['valor'], 2, ',', '.'); ?>€" disabled>
                          </td>
                          <td>
                            <input class="form-control" type="text" id="remetente-<?php echo $transacao['IDtransacao']; ?>" value="<?php echo $transacao['remetente']; ?>" disabled>
                          </td>
                          <td>
                            <input class="form-control" type="text" id="recetor-<?php echo $transacao['IDtransacao']; ?>" value="<?php echo $transacao['recetor']; ?>" disabled>
                          </td>
                          <td class="acoes flutuante">
                            <button class="btn btn-primary editar" id="editar-<?php echo $transacao['IDtransacao']; ?>" onclick="editarTransacao(<?php echo $transacao['IDtransacao']; ?>)">
                                <img src="img/Lapis.svg" alt="">
                            </button>
                            <button class="btn btn-primary atualizar" id="atualizar-<?php echo $transacao['IDtransacao']; ?>" onclick="concluirTransacao(<?php echo $transacao['IDtransacao']; ?>)">
                                <img src="img/Certo.svg" alt="">
                            </button>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
                <?php } else { ?>
                <div class="tabelamov">
                  <table>
                    <tr>
                      <th>Descrição</th>
                      <th>Data Transação</th>
                      <th>Valor</th>
                      <th>Remetente</th>
                      <th>Recetor</th>
                      <th class="flutuante">Ações</th>
                    </tr>
                    <tr>
                      <td colspan="6">No transactions found.</td>
                    </tr>
                  </table>
                </div>
              <?php } ?>
              </div>
            </div>
          </div>
        </div>
        </div>

      <?php include "../../../components/footer.php" ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    
    <script>
      var editarButton;
      var atualizarButton;
      
      // Botao fica no editar
      function editarTransacao(transacaoID) {
      var descricaoInput = document.getElementById("descricao-" + transacaoID);
      editarButton = document.getElementById("editar-" + transacaoID);
      atualizarButton = document.getElementById("atualizar-" + transacaoID);
      

      descricaoInput.disabled = !descricaoInput.disabled;

      if (descricaoInput.disabled) {
      editarButton.style.display = "flex";
      atualizarButton.style.display = "none";
      } else {
      editarButton.style.display = "none";
      atualizarButton.style.display = "flex";
      }

      }

// mudança da descrição na base de dados
function concluirTransacao(transacaoId) {
  var descricaoInput = document.getElementById("descricao-" + transacaoId);
  var descricao = descricaoInput.value;

  var xhr = new XMLHttpRequest();
  var url = 'update.php?id=' + transacaoId + '&descricao=' + encodeURIComponent(descricao);
  xhr.open('GET', url, true);
  xhr.onload = function () {
    if (xhr.status === 200) {
      editarButton.style.display = "flex";
      atualizarButton.style.display = "none";
      console.log("Atualização de dados com sucesso");
    } else {
      console.log("Erro na atualização de dados");
    }
  };
  xhr.send();
  setTimeout(function () {
    location.reload();
  }, 100);
}

// sistema de busca por keyup
function editarTransacao2(transacaoID) {
  var descricaoInput = document.getElementById("descricao-" + transacaoID);
  var editarButton = document.getElementById("editar-" + transacaoID);
  var atualizarButton = document.getElementById("atualizar-" + transacaoID);

  descricaoInput.disabled = !descricaoInput.disabled;

  if (descricaoInput.disabled) {
    editarButton.style.display = "flex";
    atualizarButton.style.display = "none";
  } else {
    editarButton.style.display = "none";
    atualizarButton.style.display = "flex";
  }
}


function concluirTransacao2(transacaoId) {
  var descricaoInput = document.getElementById("descricao-" + transacaoId);
  var editarButton = document.getElementById("editar-" + transacaoId);
  var atualizarButton = document.getElementById("atualizar-" + transacaoId);
  var descricao = descricaoInput.value;

  var xhr = new XMLHttpRequest();
  var url = 'update.php?id=' + transacaoId + '&descricao=' + encodeURIComponent(descricao);
  xhr.open('GET', url, true);
  xhr.onload = function () {
    if (xhr.status === 200) {
      editarButton.style.display = "flex";
      atualizarButton.style.display = "none";
      console.log("Atualização de dados com sucesso");
    } else {
      console.log("Erro na atualização de dados");
    }
  };
  xhr.send();
  setTimeout(function () {
    location.reload();
  }, 100);
}

$(document).ready(function () {
  $('#searchInput').on('keyup', function () {
    var searchTerm = $(this).val();
    $.ajax({
      url: 'search.php',
      method: 'POST',
      data: { search: searchTerm },
      success: function (data) {
        // Limpar a tabela
        $('#clientesTable').empty();

        // Construir tabela se ajax for sucedido
        var table = $('<table>'); // criar novo elemento table

        // declaração do thead, tr's e th's tais como o estilo dos botões (Ações flutuante)
        var headers = $('<thead>').appendTo(table);
        var headerRow = $('<tr>').appendTo(headers);
        $('<th>').text('Descrição').appendTo(headerRow);
        $('<th>').text('Data Transação').appendTo(headerRow);
        $('<th>').text('Valor').appendTo(headerRow);
        $('<th>').text('Remetente').appendTo(headerRow);
        $('<th>').text('Recetor').appendTo(headerRow);
        $('<th>').addClass('flutuante').text('Ações').appendTo(headerRow);

        // criar uma row para cada transação diferente
        var body = $('<tbody>').addClass('dados-input').appendTo(table);
        $.each(data, function (index, transacao) {
          var row = $('<tr>');

          // criar td's
          var descricaoInput = $('<textarea>').attr('class', 'descricao-input').attr('id', 'descricao-' + transacao.IDtransacao).prop('disabled', true).text(transacao.descricao);
          var editarButton = $('<button>').addClass('btn btn-primary editar')
            .attr('id', 'editar-' + transacao.IDtransacao)
            .append($('<img>').attr('src', 'img/Lapis.svg').attr('alt', ''));

          var atualizarButton = $('<button>').addClass('btn btn-primary atualizar')
            .attr('id', 'atualizar-' + transacao.IDtransacao)
            .data('descricao-', transacao.IDtransacao)
            .append($('<img>').attr('src', 'img/Certo.svg').attr('alt', ''));


            var valorClass = '';
            var iban = '<?php echo $_SESSION['iban']; ?>';
            var remetente = transacao.remetente;
            var recetor = transacao.recetor;

            if (iban == remetente) {
              valorClass = 'negative';
            } else if (iban == recetor) {
              valorClass = 'positive';
            }

          $('<td>').append(descricaoInput).appendTo(row);
          $('<td>').append($('<input>').prop('disabled', true).val(transacao.data_transacao).addClass("form-control")).appendTo(row);
          $('<td>').append($('<input>').prop('disabled', true).val(new Intl.NumberFormat('pt-PT', { minimumFractionDigits: 2, maximumFractionDigits: 2 }).format(transacao.valor) + '€').addClass("form-control " + valorClass)).appendTo(row);
          $('<td>').append($('<input>').prop('disabled', true).val(transacao.remetente).addClass("form-control")).appendTo(row);
          $('<td>').append($('<input>').prop('disabled', true).val(transacao.recetor).addClass("form-control")).appendTo(row);
          $('<td>').addClass('acoes flutuante').append(editarButton, atualizarButton).appendTo(row);

          row.appendTo(table);
        });

        table.appendTo('#clientesTable');

        // Event delegation for editar and atualizar buttons
        table.on('click', '.editar', function () {
          var transacaoID = this.id.replace('editar-', '');
          editarTransacao2(transacaoID);
        });

        table.on('click', '.atualizar', function () {
          var transacaoID = $(this).data('descricao-');
          concluirTransacao2(transacaoID);
        });

      }
    });
  });
});






    </script>
    <script
      src="https://kit.fontawesome.com/886bff6256.js"
      crossorigin="anonymous"
    ></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

<?php 
}else{
     header("Location: http://localhost/dev/pages/valentimoryshchuk/entrar/index.php?error=Precisa de entrar na sua conta primeiro ou registar uma conta.");
     exit();
}
 ?>
