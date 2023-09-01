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
    <link rel="stylesheet" href="css/style.css" />
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
      integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <title>Painel Administrador</title>
  </head>
  <body>
    <?php include "cargo.php" ?>
    <?php include "listar_clientes.php" ?>
    <?php include "../../../components/header_connected.php" ?>

    <div class="pag-container">
      <div class="banner-utilizador">
        <div class="conteudo-banner">
          <div class="banner-photos">
            <div class="banner-imagens">
            <img
              <?php 
                $sname = "localhost";
                $unmae = "root";
                $password = "";
                $db_name = "swift";
                $conn = mysqli_connect($sname, $unmae, $password, $db_name);

                $fotoPerfil = $conn->prepare("SELECT foto FROM conta WHERE IDconta = ?");
                $fotoPerfil->bind_param("s", $_SESSION['IDconta']);
                $fotoPerfil->execute();
                $fotoPerfil->store_result();
                $fotoPerfil->bind_result($fotoPerfil);
                $fotoPerfil->fetch();
            ?>
                class="banner-perfil"
                src="<?php echo $fotoPerfil; ?>"
                alt="Foto de perfil"
              />
              <div class="round">
                <input type="file" />
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="16"
                  height="16"
                  fill="#fff"
                  class="bi bi-pencil-fill"
                  viewBox="0 0 16 16"
                >
                  <path
                    d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"
                  />
                </svg>
              </div>
            </div>
            <h1 class="bem-vindo">
              <span
                >Painel de Administrador |
                <?php echo $_SESSION['cargo'].' (#'.$_SESSION['IDfuncionario'].')'; ?><br
              /></span>
              <?php echo $_SESSION['primeiro'].' '.$_SESSION['apelido'] ?>
              (#<?php echo $_SESSION['IDcliente']; ?>)
            </h1>
          </div>
        </div>
      </div>
      <div class="info">
        <div class="container">
          <?php if (isset($_GET['error'])) { ?>
          <div class="alert alert-danger alert-dismissible mt-3 fade show" role="alert" align="center">
            <?php echo $_GET['error']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <?php } ?>
          <?php if (isset($_GET['success'])) { ?>
          <div class="alert alert-success alert-dismissible mt-3 fade show" role="alert" align="center">
            <?php echo $_GET['success']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <?php } ?>


          <!-- Utilizadores -->

          <div class="container-principal">
            <div class="box">
              <div class="container-titulo">
                <!-- <input
                  type="text"
                  name="search"
                  id="searchInput"
                  placeholder=" Pesquisar Cliente"
                  value="<?php echo $searchTerm; ?>"
                  oninput="searchTransactions()"
                /> -->
                <div class="titulos">
                <p class="box-titulo active">Utilizadores Swift</p>
                <a href="../../franciscoassis/adminCripto/index.php"><p class="box-titulo">Criptomoedas</p></a>
                </div>
                <button
                  class="btn btn-info criar"
                  onclick="criarTabela()"
                >
                  Adicionar
                  <img src="img/Adicionar.svg" alt="" />
                </button>
              </div>
              <div>
                <div class="table-responsive">
                  <table id="clientesTable" class="table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>NIF</th>
                        <th>Nome</th>
                        <th>Apelido</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Data Nascimento</th>
                        <th>Género</th>
                        <th>País</th>
                        <th>Endereço</th>
                        <th>C.Postal</th>
                        <th>Localidade</th>
                        <th class="flutuante">Ações</th>
                      </tr>
                    </thead>
                    <tbody class="dados-input">
                      <?php foreach ($_SESSION['cliente'] as $clientes) { ?>
                      <tr id="linha-<?php echo $clientes['IDcliente']?>">
                        <td>
                          <input
                            type="text"
                            id="idcliente-<?php echo $clientes['IDcliente']; ?>"
                            value="<?php echo $clientes['IDcliente'] ?>"
                            disabled
                            class="form-control"
                          />
                        </td>
                        <td>
                          <input
                            type="text"
                            maxlength="9"
                            id="nif-<?php echo $clientes['IDcliente']; ?>"
                            value="<?php echo $clientes['nif'] ?>"
                            disabled
                            class="form-control"
                            required
                            placeholder="279999927"
                          />
                        </td>
                        <td>
                          <input
                            type="text"
                            id="primeiro-<?php echo $clientes['IDcliente']; ?>"
                            value="<?php echo $clientes['primeiro'] ?>"
                            disabled
                            class="form-control"
                            required
                            minlength="2"
                            maxlength="50"
                            placeholder="Vlad"
                          />
                        </td>
                        <td>
                          <input
                            type="text"
                            id="apelido-<?php echo $clientes['IDcliente']; ?>"
                            value="<?php echo $clientes['apelido'] ?>"
                            disabled
                            class="form-control"
                            required
                            minlength="2"
                            maxlength="50"
                            placeholder="Oryshchuk"
                          />
                        </td>
                        <td>
                          <input
                            type="email"
                            id="email-<?php echo $clientes['IDcliente']; ?>"
                            value="<?php echo $clientes['email'] ?>"
                            disabled
                            class="form-control"
                            required
                            minlength="2"
                            maxlength="100"
                            placeholder="vlad@swift.com"
                          />
                        </td>
                        <td>
                          <input
                            type="tel"
                            max="9"
                            id="telefone-<?php echo $clientes['IDcliente']; ?>"
                            value="<?php echo $clientes['telefone'] ?>"
                            disabled
                            class="form-control"
                            required
                            maxlength="9"
                            placeholder="911180000"
                          />
                        </td>
                        <td>
                          <input
                            type="date"
                            data-relmax="-18"
                            format="yyyy-mm-dd"
                            id="data_nascimento-<?php echo $clientes['IDcliente']; ?>"
                            value="<?php echo $clientes['data_nascimento'] ?>"
                            disabled
                            class="form-control"
                            required
                          />
                        </td>
                        <td>
                          <select class="form-select" id="genero-<?php echo $clientes['IDcliente']; ?>" disabled>
                            <option <?php if ($clientes['genero'] === 'Masculino') echo 'selected'; ?>>Masculino</option>
                            <option <?php if ($clientes['genero'] === 'Feminino') echo 'selected'; ?>>Feminino</option>
                            <option <?php if ($clientes['genero'] === 'Não Indicado') echo 'selected'; ?>>Não Indicado</option>
                          </select>
                        </td>
                        <td>
                          <input
                            type="text"
                            id="pais-<?php echo $clientes['IDcliente']; ?>"
                            value="<?php echo $clientes['pais'] ?>"
                            disabled
                            class="form-control"
                            required
                            maxlength="50"
                            placeholder="Portugal"
                          />
                        </td>
                        <td>
                          <input
                            type="text"
                            id="endereco-<?php echo $clientes['IDcliente']; ?>"
                            value="<?php echo $clientes['endereco'] ?>"
                            disabled
                            class="form-control"
                            required
                            maxlength="150"
                            placeholder="Rua Principal Algures"
                          />
                        </td>
                        <td>
                          <input
                            type="text"
                            id="codigo_postal-<?php echo $clientes['IDcliente']; ?>"
                            value="<?php echo $clientes['codigo_postal'] ?>"
                            disabled
                            class="form-control"
                            required
                            maxlength="8"
                            placeholder="2444-111"
                          />
                        </td>
                        <td>
                          <input
                            type="text"
                            id="localidade-<?php echo $clientes['IDcliente']; ?>"
                            value="<?php echo $clientes['localidade'] ?>"
                            disabled
                            class="form-control"
                            required
                            maxlength="50"
                            placeholder="Leiria"
                          />
                        </td>
                        <td class="acoes flutuante">
                          <button
                            class="btn btn-primary editar"
                            id="editar-<?php echo $clientes['IDcliente']; ?>"
                            onclick="editarCliente(<?php echo $clientes['IDcliente']; ?>)"
                          >
                            <img src="img/Lapis.svg" alt="" />
                          </button>
                          <button
                            class="btn btn-primary atualizar"
                            id="atualizar-<?php echo $clientes['IDcliente']; ?>"
                            onclick="atualizarCliente(<?php echo $clientes['IDcliente']; ?>)"
                          >
                            <img src="img/Certo.svg" alt="" />
                          </button>
                          <button
                            class="btn btn-danger eliminar"
                            value="delete"
                            onclick="eliminarCliente(<?php echo $clientes['IDcliente']; ?>)"
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
                <!-- <div class="div-ver-mais"><a href="" class="ver-mais" id="vermais">Ver mais</a></div> -->
              </div>
            </div>
          </div>
        </div>
      </div>

      

      <?php include "../../../components/footer.php" ?>
    </div>
    <script
      src="https://kit.fontawesome.com/886bff6256.js"
      crossorigin="anonymous"
    ></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var closeButtons = document.querySelectorAll('button[data-bs-dismiss="alert"]');
        closeButtons.forEach(function(button) {
          button.addEventListener('click', function() {
            limparURL('success');
            limparURL('error');
          });
        });

        function limparURL(parameter) {
          var url = new URL(window.location.href);
          url.searchParams.delete(parameter);
          window.history.replaceState({}, document.title, url.href);
        }
      });

      $(function () {
        /* Vaildar +18anos */
        $("input[data-relmax]").each(function () {
          var oldVal = $(this).prop("value");
          var relmax = $(this).data("relmax");
          var max = new Date();
          max.setFullYear(max.getFullYear() + relmax);
          $.prop(this, "max", $(this).prop("valueAsDate", max).val());
          $.prop(this, "value", oldVal);
        });
      });

      function editarCliente(clienteId) {
        var idInput = document.getElementById("idcliente-" + clienteId);
        var nifInput = document.getElementById("nif-" + clienteId);
        var primeiroInput = document.getElementById("primeiro-" + clienteId);
        var apelidoInput = document.getElementById("apelido-" + clienteId);
        var emailInput = document.getElementById("email-" + clienteId);
        var telefoneInput = document.getElementById("telefone-" + clienteId);
        var generoInput = document.getElementById("genero-" + clienteId);
        var data_nascimentoInput = document.getElementById("data_nascimento-" + clienteId);
        var paisInput = document.getElementById("pais-" + clienteId);
        var localidadeInput = document.getElementById("localidade-" + clienteId);
        var enderecoInput = document.getElementById("endereco-" + clienteId);
        var codigo_postalInput = document.getElementById("codigo_postal-" + clienteId);

        var editarButton = document.getElementById("editar-" + clienteId);
        var atualizarButton = document.getElementById("atualizar-" + clienteId);
        var rowColor = document.getElementById("linha-" + clienteId);

        nifInput.disabled = !nifInput.disabled;
        primeiroInput.disabled = !primeiroInput.disabled;
        apelidoInput.disabled = !apelidoInput.disabled;
        emailInput.disabled = !emailInput.disabled;
        telefoneInput.disabled = !telefoneInput.disabled;
        data_nascimentoInput.disabled = !data_nascimentoInput.disabled;
        generoInput.disabled = !generoInput.disabled;
        paisInput.disabled = !paisInput.disabled;
        localidadeInput.disabled = !localidadeInput.disabled;
        enderecoInput.disabled = !enderecoInput.disabled;
        codigo_postalInput.disabled = !codigo_postalInput.disabled;

        if (nifInput.disabled) {
          editarButton.style.display = "flex";
          atualizarButton.style.display = "none";
        } else {
          editarButton.style.display = "none";
          atualizarButton.style.display = "flex";
          rowColor.style.backgroundColor = "rgba(69, 140, 246, 0.2)";
          idInput.style.backgroundColor =  "rgba(0, 0, 0, 0)";
        }
      }

      function atualizarCliente(clienteId) {
        /* Validação feita com jQuery do lado do cliente */
        var nifInput = $("#nif-" + clienteId);
        var nif = nifInput.val();
        var primeiroInput = $("#primeiro-" + clienteId);
        var primeiro = primeiroInput.val();
        var apelidoInput = $("#apelido-" + clienteId);
        var apelido = apelidoInput.val();
        var emailInput = $("#email-" + clienteId);
        var email = emailInput.val();
        var telefoneInput = $("#telefone-" + clienteId);
        var telefone = telefoneInput.val();
        var generoInput = $("#genero-" + clienteId);
        var genero = generoInput.val();
        var data_nascimentoInput = $("#data_nascimento-" + clienteId);
        var data_nascimento = data_nascimentoInput.val();
        var paisInput = $("#pais-" + clienteId);
        var pais = paisInput.val();
        var localidadeInput = $("#localidade-" + clienteId);
        var localidade = localidadeInput.val();
        var enderecoInput = $("#endereco-" + clienteId);
        var endereco = enderecoInput.val();
        var codigo_postalInput = $("#codigo_postal-" + clienteId);
        var codigo_postal = codigo_postalInput.val();
        var error = false;
        var filter = /^\d{9}$/;
        var email_filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        var codigo_postal_filter = /^\d{4}-\d{3}$/;

        if ($.trim(nif).length == 0) {
          nifInput.addClass("has-error");
          error = true;
        } else {
          if (!filter.test(nif)) {
            nifInput.addClass("has-error");
            error = true;
          } else {
            nifInput.removeClass("has-error");
          }
        }
        if ($.trim(telefone).length == 0) {
          telefoneInput.addClass("has-error");
          error = true;
        } else {
          if (!filter.test(telefone)) {
            telefoneInput.addClass("has-error");
            error = true;
          } else {
            telefoneInput.removeClass("has-error");
          }
        }
        if($.trim(email).length == 0){
          emailInput.addClass("has-error");
          error = true;
        }else{
          if(!email_filter.test(email)){
            emailInput.addClass("has-error");
            error = true;
          }else{
            emailInput.removeClass("hass-error");
          }
        }
        if($.trim(codigo_postal).length == 0){
          codigo_postalInput.addClass("has-error");
          error = true;
        }else{
          if(!codigo_postal_filter.test(codigo_postal)){
            codigo_postalInput.addClass("has-error");
            error = true;
          }else{
            codigo_postalInput.removeClass("hass-error");
          }
        }
        if ($.trim(primeiro).length == 0) {
          primeiroInput.addClass("has-error");
          error = true;
        } else {
          primeiroInput.removeClass("has-error");
        }
        if ($.trim(apelido).length == 0) {
          apelidoInput.addClass("has-error");
          error = true;
        } else {
          apelidoInput.removeClass("has-error");
        }
        if ($.trim(genero).length == 0) {
          generoInput.addClass("has-error");
          error = true;
        } else {
          generoInput.removeClass("has-error");
        }
        if ($.trim(data_nascimento).length == 0) {
          data_nascimentoInput.addClass("has-error");
          error = true;
        } else {
          data_nascimentoInput.removeClass("has-error");
        }
        if ($.trim(pais).length == 0) {
          paisInput.addClass("has-error");
          error = true;
        } else {
          paisInput.removeClass("has-error");
        }
        if ($.trim(localidade).length == 0) {
          localidadeInput.addClass("has-error");
          error = true;
        } else {
          localidadeInput.removeClass("has-error");
        }
        if ($.trim(endereco).length == 0) {
          enderecoInput.addClass("has-error");
          error = true;
        } else {
          enderecoInput.removeClass("has-error");
        }

        if (error) {
          /* Sai da função */
          return;
        }else{
          var url =
          "atualizar_cliente.php?IDcliente=" +
          clienteId +
          "&nif=" +
          encodeURIComponent(nif) +
          "&primeiro=" +
          encodeURIComponent(primeiro) +
          "&apelido=" +
          encodeURIComponent(apelido) +
          "&email=" +
          encodeURIComponent(email) +
          "&telefone=" +
          encodeURIComponent(telefone) +
          "&genero=" +
          encodeURIComponent(genero) +
          "&data_nascimento=" +
          encodeURIComponent(data_nascimento) +
          "&pais=" +
          encodeURIComponent(pais) +
          "&localidade=" +
          encodeURIComponent(localidade) +
          "&endereco=" +
          encodeURIComponent(endereco) +
          "&codigo_postal=" +
          encodeURIComponent(codigo_postal);
          window.location.href = url;
        }
      }

      /* modal */
      var modalConfirmar = document.querySelector(".modal-confirmar")
      var clienteDelete;

      window.onclick = function(event) {
      var modal = document.querySelector("dialog");
      if (event.target == modal) {
          modal.close();
          document.body.classList.remove('modal-scroll');
      }
      }

      function confirmarEliminar(confirmar) {
          if (confirmar) {
            var url = "eliminar_cliente.php?IDcliente=" + clienteDelete;
            window.location.href = url;
          } else {
            fecharModalEliminar();
          }
        } 

      function eliminarCliente(clienteId) {
        clienteDelete = clienteId;
        modalConfirmar.showModal();
        document.body.classList.add('modal-scroll');
      }


      function fecharModalEliminar() {
        modalConfirmar.close();
        document.body.classList.remove('modal-scroll');
      }

      function adicionarCliente(table) {
        /* Validação fieta com jQuery da parte do cliente */
        var nifInput = $("#nif");
        var nif = nifInput.val();
        var primeiroInput = $("#primeiro");
        var primeiro = primeiroInput.val();
        var apelidoInput = $("#apelido");
        var apelido = apelidoInput.val();
        var emailInput = $("#email");
        var email = emailInput.val();
        var telefoneInput = $("#telefone");
        var telefone = telefoneInput.val();
        var generoInput = $("#genero");
        var genero = generoInput.val();
        var data_nascimentoInput = $("#data_nascimento");
        var data_nascimento = data_nascimentoInput.val();
        var paisInput = $("#pais");
        var pais = paisInput.val();
        var localidadeInput = $("#localidade");
        var localidade = localidadeInput.val();
        var enderecoInput = $("#endereco");
        var endereco = enderecoInput.val();
        var codigo_postalInput = $("#codigo_postal");
        var codigo_postal = codigo_postalInput.val();
        var error = false;
        var filter = /^\d{9}$/;
        var email_filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        var codigo_postal_filter = /^\d{4}-\d{3}$/;

        if ($.trim(nif).length == 0) {
          nifInput.addClass("has-error");
          error = true;
        } else {
          if (!filter.test(nif)) {
            nifInput.addClass("has-error");
            error = true;
          } else {
            nifInput.removeClass("has-error");
          }
        }
        if ($.trim(telefone).length == 0) {
          telefoneInput.addClass("has-error");
          error = true;
        } else {
          if (!filter.test(telefone)) {
            telefoneInput.addClass("has-error");
            error = true;
          } else {
            telefoneInput.removeClass("has-error");
          }
        }
        if($.trim(email).length == 0){
          emailInput.addClass("has-error");
          error = true;
        }else{
          if(!email_filter.test(email)){
            emailInput.addClass("has-error");
            error = true;
          }else{
            emailInput.removeClass("hass-error");
          }
        }
        if($.trim(codigo_postal).length == 0){
          codigo_postalInput.addClass("has-error");
          error = true;
        }else{
          if(!codigo_postal_filter.test(codigo_postal)){
            codigo_postalInput.addClass("has-error");
            error = true;
          }else{
            codigo_postalInput.removeClass("hass-error");
          }
        }
        if ($.trim(primeiro).length == 0) {
          primeiroInput.addClass("has-error");
          error = true;
        } else {
          primeiroInput.removeClass("has-error");
        }
        if ($.trim(apelido).length == 0) {
          apelidoInput.addClass("has-error");
          error = true;
        } else {
          apelidoInput.removeClass("has-error");
        }
        if ($.trim(genero).length == 0) {
          generoInput.addClass("has-error");
          error = true;
        } else {
          generoInput.removeClass("has-error");
        }
        if ($.trim(data_nascimento).length == 0) {
          data_nascimentoInput.addClass("has-error");
          error = true;
        } else {
          data_nascimentoInput.removeClass("has-error");
        }
        if ($.trim(pais).length == 0) {
          paisInput.addClass("has-error");
          error = true;
        } else {
          paisInput.removeClass("has-error");
        }
        if ($.trim(localidade).length == 0) {
          localidadeInput.addClass("has-error");
          error = true;
        } else {
          localidadeInput.removeClass("has-error");
        }
        if ($.trim(endereco).length == 0) {
          enderecoInput.addClass("has-error");
          error = true;
        } else {
          enderecoInput.removeClass("has-error");
        }
        if (error) {
          /* Sai da função */
          return;
        }else{
          var url =
          "adicionar_cliente.php?nif=" +
          encodeURIComponent(nif) +
          "&primeiro=" +
          encodeURIComponent(primeiro) +
          "&apelido=" +
          encodeURIComponent(apelido) +
          "&email=" +
          encodeURIComponent(email) +
          "&telefone=" +
          encodeURIComponent(telefone) +
          "&genero=" +
          encodeURIComponent(genero) +
          "&data_nascimento=" +
          encodeURIComponent(data_nascimento) +
          "&pais=" +
          encodeURIComponent(pais) +
          "&localidade=" +
          encodeURIComponent(localidade) +
          "&endereco=" +
          encodeURIComponent(endereco) +
          "&codigo_postal=" +
          encodeURIComponent(codigo_postal);
          window.location.href = url;
          var inputs = table.getElementsByTagName("input");
          var selects = table.getElementsByTagName("select");
          disableInputFields(inputs, selects);
        }

      }

      function criarTabela(){
        var table = document.getElementById("clientesTable");
        var newRow = table.insertRow(table.rows.length);
        var buttonContainer = document.createElement("td");
        buttonContainer.className = "acoes flutuante";
        buttonContainer.style.background = "rgb(255, 255, 255)";
        buttonContainer.style.background = "linear-gradient(90deg, rgba(255, 255, 255, 0) 0%, rgb(255, 255, 255) 25%)";
        var adicionarButton;

        for (var i = 0; i <= table.rows[0].cells.length -1; i++) {
          var newCell = newRow.insertCell(i);
          /* console.log(newCell); */
          if (i === 7) {
            var selectField = document.createElement("select");
            selectField.className = "form-select";
            selectField.id = "genero";

            var optionM = document.createElement("option");
            optionM.value = "Masculino";
            optionM.text = "Masculino";
            selectField.appendChild(optionM);

            var optionF = document.createElement("option");
            optionF.value = "Feminino";
            optionF.text = "Feminino";
            selectField.appendChild(optionF);

            var optionN = document.createElement("option");
            optionN.value = "Não Indicado";
            optionN.text = "Não Indicado";
            selectField.appendChild(optionN);

            newCell.appendChild(selectField);
          } else if (i === table.rows[0].cells.length - 1) {
            var adicionarButton = document.createElement("button");
            adicionarButton.className = "btn btn-primary adicionar";
            adicionarButton.onclick = function() {
              adicionarCliente(table); 
            };
            
            var adicionarImg = document.createElement("img");
            adicionarImg.src = "img/Certo.svg";
            adicionarButton.appendChild(adicionarImg);
            buttonContainer.appendChild(adicionarButton);

            var eliminarButton = document.createElement("button");
            eliminarButton.className = "btn btn-danger eliminar";
            eliminarButton.value = "delete";
            eliminarButton.onclick = function() {
              eliminarCliente(table); 
            };
            
            var eliminarImg = document.createElement("img");
            eliminarImg.src = "img/Lixo.svg";
            eliminarButton.appendChild(eliminarImg);
            buttonContainer.appendChild(eliminarButton);
          } else {
            var inputField = document.createElement("input");
            inputField.type = "text";
            inputField.className = "form-control";
            if(i === 0){
              inputField.disabled = true;
            }else if(i === 1){
              inputField.id = "nif" ;
              inputField.setAttribute("maxlength", "9");
            }else if(i === 2){
              inputField.id = "primeiro" ;
              inputField.setAttribute("maxlength", "50");
            } else if(i === 3){
              inputField.id = "apelido" ;
              inputField.setAttribute("maxlength", "50");
            }else if(i === 4){
              inputField.id = "email" ;
              inputField.type = "email";
              inputField.setAttribute("maxlength", "100");
            }else if(i === 5){
              inputField.id = "telefone" ;
              inputField.setAttribute("maxlength", "9");
            }else if(i=== 6){
              inputField.type = "date";
              inputField.id = "data_nascimento" ;
              inputField.setAttribute('data-relmax', '-18');
              inputField.setAttribute('max', getMaxDate('-18'));
              inputField.setAttribute('format', "yyyy-mm-dd");
            }else if(i=== 8){
              /* 7 é um Select, criado no início da função */
              inputField.id = "pais";
              inputField.setAttribute("maxlength", "50");
            }else if(i=== 9){
              inputField.id = "endereco";
              inputField.setAttribute("maxlength", "150");
            }else if(i=== 10){
              inputField.id = "codigo_postal";
              inputField.setAttribute("maxlength", "8");
            }else if(i=== 11){
              inputField.id = "localidade";
              inputField.setAttribute("maxlength", "50");
            }
            newCell.appendChild(inputField);
          }
        }
        newRow.deleteCell(12); /* Eliminar ultima célula (reservada para os botoes) */
        newRow.appendChild(buttonContainer);
        adicionarButton.style.display = "flex";
      }

      function disableInputFields(inputs, selects) {
        for (var i = 0; i < inputs.length; i++) {
          inputs[i].disabled = true;
        }
        for (var i = 0; i < selects.length; i++) {
          selects[i].disabled = true;
        }
      }

      function getMaxDate(relmax) {
        var maxDate = new Date();
        maxDate.setFullYear(maxDate.getFullYear() + parseInt(relmax));
        return maxDate.toISOString().split('T')[0];
      }
    </script>
  </body>
</html>

<?php 
}else{
     header("Location: http://localhost/dev/pages/valentimoryshchuk/perfil/index.php?error=Nãoo tem acesso ao painel de administrador.");
     exit();
}
 ?>
