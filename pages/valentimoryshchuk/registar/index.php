<html>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registar Conta</title>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
      integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
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
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
    <link
      rel="shortcut icon"
      href="../../../assets/icon.png"
      type="image/x-icon"
    />
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
  <?php 
    session_start();
    if (isset($_SESSION['IDcliente']) && isset($_SESSION['email'])) {~
        /* navbar para utilizadores COM conta */
    include "../../../components/header_connected.php";
    }else{
        /* navbar para utilizadores SEM conta */
        include "../../../components/header.php"; 
    }
 ?>

    <div class="container box">
      <br />
      <h2 align="center">Registar Conta</h2>
      <br />
      <?php if (isset($_GET['error'])) { ?>
          <div class="alert alert-danger alert-dismissible mt-3 fade show" role="alert" align="center">
            <?php echo $_GET['error']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <?php } ?>
          <?php if (isset($_GET['success'])) { ?>
          <div class="alert alert-success alert-dismissible mt-3 fade show" role="alert" align="center">
            <?php echo $_GET['success']; ?>
            <a href="http://localhost/dev/pages/valentimoryshchuk/entrar/index.php"
          >Pode entrar na sua conta</a>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <?php } ?>

      <form action="registar_cliente.php" method="post" id="register_form">
        <!-- Possiblidade de usar nav-pills em vez de nav-tabs e modificar para 1, 2, 3 passos -->
        <ul class="nav nav-tabs justify-content-center">
          <li class="nav-item">
            <a class="nav-link active_tab1 active" id="list_login_details"
              >Dados Login</a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link inactive_tab1" id="list_personal_details"
              >Pessoais</a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link inactive_tab1" id="list_contact_details"
              >Contacto</a
            >
          </li>
        </ul>
        <div class="tab-content" style="margin-top: 1rem">
          <div class="tab-pane active" id="login_details">
            <div class="panel panel-default">
              <!--  <div class="panel-heading">Dados Login</div> -->
              <div class="panel-body">
                <div class="form-group mt-2">
                  <label>Email</label>
                  <input
                    type="text"
                    name="email"
                    id="email"
                    class="form-control"
                    placeholder="valentim@swift.com"
                    maxlength="200"
                  />
                  <span id="error_email" class="text-danger"> </span>
                </div>
                <div class="form-group mt-2">
                  <label>Palavra-passe</label>
                  <input
                    type="password"
                    name="palavra_passe"
                    id="palavra_passe"
                    class="form-control"
                    placeholder="•••••••••••••"
                    maxlength="200"
                  />
                  <span id="error_palavra_passe" class="text-danger"></span>
                </div>
                <br />
                <div align="center">
                  <button
                    type="button"
                    name="btn_login_details"
                    id="btn_login_details"
                    class="btn btn-primary"
                  >
                    Seguinte
                    <i class="bi bi-arrow-right"></i>
                  </button>
                </div>
                <br />
              </div>
            </div>
          </div>
          <div class="tab-pane" id="personal_details">
            <div class="panel panel-default">
              <!-- <div class="panel-heading">Preencha os dados pessoais</div> -->
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Nome</label>
                      <input
                        type="text"
                        name="primeiro"
                        id="nome"
                        placeholder="Valentim"
                        class="form-control"
                        maxlength="100"
                      />
                      <span id="error_nome" class="text-danger"></span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Apelido</label>
                      <input
                        type="text"
                        name="apelido"
                        id="apelido"
                        placeholder="Oryshchuk"
                        class="form-control"
                        maxlength="100"
                      />
                      <span id="error_apelido" class="text-danger"></span>
                    </div>
                  </div>
                </div>
                <div class="form-group mt-2">
                  <label>Número de Identificação Fical</label>
                  <input
                    type="text"
                    inputmode="numeric"
                    name="nif"
                    id="nif"
                    class="form-control"
                    placeholder="223348554"
                    maxlength="9"
                  />
                  <span id="error_nif" class="text-danger"></span>
                </div>
                <div class="form-group mt-2">
                  <label>Data de Nascimento</label>
                  <input
                    type="date"
                    class="form-control"
                    data-relmax="-18"
                    placeholder="24-09-2004"
                    id="data_nascimento"
                    name="data_nascimento"
                  />
                  <span id="error_data_nascimento" class="text-danger"></span>
                </div>
                <div class="form-group mt-2">
                  <label>Género</label>
                  <label class="radio-inline">
                    <input type="radio" name="genero" value="masculino" />
                    Masculino
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="genero" value="femenino" />
                    Femenino
                  </label>
                  <label class="radio-inline">
                    <input
                      type="radio"
                      name="genero"
                      value="nao_indicado"
                      checked
                    />
                    Não Indicado
                  </label>
                </div>
                <br />
                <div align="center">
                  <button
                    type="button"
                    name="previous_btn_personal_details"
                    id="previous_btn_personal_details"
                    class="btn btn-primary"
                  >
                    <i class="bi bi-arrow-left"></i>
                    Anterior
                  </button>
                  <button
                    type="button"
                    name="btn_personal_details"
                    id="btn_personal_details"
                    class="btn btn-primary"
                  >
                    Seguinte
                    <i class="bi bi-arrow-right"></i>
                  </button>
                </div>
                <br />
              </div>
            </div>
          </div>
          <div class="tab-pane" id="contact_details">
            <div class="panel panel-default">
              <!-- <div class="panel-heading">Preencha os dados de contacto</div> -->
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>País</label>
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Portugal"
                        id="pais"
                        name="pais"
                        maxlength="50"
                      />
                      <span id="error_pais" class="text-danger"></span>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="form-group">
                      <label>Endereço</label>
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Rua Santa Maria Madalena N27"
                        id="endereco"
                        name="endereco"
                        maxlength="200"
                      />
                      <span id="error_endereco" class="text-danger"></span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group mt-2">
                      <label>Localidade</label>
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Batalha"
                        id="localidade"
                        name="localidade"
                        maxlength="100"
                      />
                      <!-- <select
                        class="form-select"
                        id="localidade"
                        name="localidade"
                        required
                      >
                        <option selected disabled value="">
                          Escolher...
                        </option>
                        <option>Aveiro</option>
                        <option>Açores</option>
                        <option>Beja</option>
                        <option>Braga</option>
                        <option>Bragança</option>
                        <option>Bragança</option>
                        <option>Coimbra</option>
                        <option>Évora</option>
                        <option>Faro</option>
                        <option>Guarda</option>
                        <option>Leiria</option>
                        <option>Lisboa</option>
                        <option>Madeira</option>
                        <option>Portalegre</option>
                        <option>Porto</option>
                        <option>Santarém</option>
                        <option>Setúbal</option>
                        <option>Viana do Castelo</option>
                        <option>Vila Real</option>
                        <option>Viseu</option>
                      </select> -->
                      <span id="error_localidade" class="text-danger"></span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group mt-2">
                      <label>Código Postal</label>
                      <input
                        type="text"
                        inputmode="numeric"
                        class="form-control"
                        placeholder="0000-000"
                        maxlength="8"
                        min
                        id="codigo_postal"
                        name="codigo_postal"
                      />
                      <span id="error_codigo_postal" class="text-danger"></span>
                    </div>
                  </div>
                  <div class="form-group mt-2">
                    <label>Telefone</label>
                    <input
                      type="text"
                      inputmode="numeric"
                      name="telefone"
                      id="telefone"
                      class="form-control"
                      placeholder="912345678"
                      maxlength="9"
                    />
                    <span id="error_telefone" class="text-danger"></span>
                  </div>
                </div>
                <br />
                <div align="center">
                  <button
                    type="button"
                    name="previous_btn_contact_details"
                    id="previous_btn_contact_details"
                    class="btn btn-primary"
                  >
                    <i class="bi bi-arrow-left"></i>
                    Anterior
                  </button>
                  <button
                    type="button"
                    name="btn_contact_details"
                    id="btn_contact_details"
                    class="btn btn-primary"
                  >
                    Registar
                    <i class="bi bi-check-lg"></i>
                  </button>
                </div>
                <br />
              </div>
            </div>
          </div>
        </div>
        <div align="center" class="already-user">
          Já tem conta?
          <a
            href="http://localhost/dev/pages/valentimoryshchuk/entrar/index.php"
            >Entre na sua conta</a
          >
        </div>
      </form>
    </div>
    <?php include "../../../components/footer.php" ?>
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
      $(document).ready(function () {
         /* Vaildar +18anos */
         $('input[data-relmax]').each(function () {
          var oldVal = $(this).prop('value');
          var relmax = $(this).data('relmax');
          var max = new Date();
          max.setFullYear(max.getFullYear() + relmax);
          $.prop(this, 'max', $(this).prop('valueAsDate', max).val());
          $.prop(this, 'value', oldVal);
          });
          
        $("#btn_login_details").click(function () {
          var error_email = "";
          var error_palavra_passe = "";
          var filter =
            /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

          if ($.trim($("#email").val()).length == 0) {
            error_email = "Email obrigatório";
            $("#error_email").text(error_email);
            $("#email").addClass("has-error");
          } else {
            if (!filter.test($("#email").val())) {
              error_email = "Email inválido";
              $("#error_email").text(error_email);
              $("#email").addClass("has-error");
            } else {
              error_email = "";
              $("#error_email").text(error_email);
              $("#email").removeClass("has-error");
            }
          }

          if ($.trim($("#palavra_passe").val()).length == 0) {
            error_palavra_passe = "Palavra-passe obrigatória";
            $("#error_palavra_passe").text(error_palavra_passe);
            $("#palavra_passe").addClass("has-error");
          } else {
            error_palavra_passe = "";
            $("#error_palavra_passe").text(error_palavra_passe);
            $("#palavra_passe").removeClass("has-error");
          }

          if (error_email != "" || error_palavra_passe != "") {
            return false;
          } else {
            $("#list_login_details").removeClass("active active_tab1");
            $("#list_login_details").removeAttr("href data-toggle");
            $("#login_details").removeClass("active");
            $("#list_login_details").addClass("inactive_tab1");
            $("#list_personal_details").removeClass("inactive_tab1");
            $("#list_personal_details").addClass("active_tab1 active");
            $("#list_personal_details").attr("href", "#personal_details");
            $("#list_personal_details").attr("data-toggle", "tab");
            $("#personal_details").addClass("active in");
          }
        });

        $("#previous_btn_personal_details").click(function () {
          $("#list_personal_details").removeClass("active active_tab1");
          $("#list_personal_details").removeAttr("href data-toggle");
          $("#personal_details").removeClass("active in");
          $("#list_personal_details").addClass("inactive_tab1");
          $("#list_login_details").removeClass("inactive_tab1");
          $("#list_login_details").addClass("active_tab1 active");
          $("#list_login_details").attr("href", "#login_details");
          $("#list_login_details").attr("data-toggle", "tab");
          $("#login_details").addClass("active in");
        });

        $("#btn_personal_details").click(function () {
          var error_nome = "";
          var error_apelido = "";
          var error_nif = "";
          var nif_validation = /^\d{9}$/;
          var error_data_nascimento = "";

          if ($.trim($("#nome").val()).length == 0) {
            error_nome = "Nome obrigatório";
            $("#error_nome").text(error_nome);
            $("#nome").addClass("has-error");
          } else {
            error_nome = "";
            $("#error_nome").text(error_nome);
            $("#nome").removeClass("has-error");
          }

          if ($.trim($("#apelido").val()).length == 0) {
            error_apelido = "Apelido obrigatório";
            $("#error_apelido").text(error_apelido);
            $("#apelido").addClass("has-error");
          } else {
            error_apelido = "";
            $("#error_apelido").text(error_apelido);
            $("#apelido").removeClass("has-error");
          }

          if ($.trim($("#nif").val()).length == 0) {
            error_nif = "NIF obrigatório";
            $("#error_nif").text(error_nif);
            $("#nif").addClass("has-error");
          } else {
            if (!nif_validation.test($("#nif").val())) {
              error_nif = "NIF inválido, são necessários 9 números";
              $("#error_nif").text(error_nif);
              $("#nif").addClass("has-error");
            } else {
              error_nif = "";
              $("#error_nif").text(error_nif);
              $("#nif").removeClass("has-error");
            }
          }

          if ($.trim($("#data_nascimento").val()).length == 0) {
            error_data_nascimento = "Data de Nascimento obrigatória";
            $("#error_data_nascimento").text(error_data_nascimento);
            $("#data_nascimento").addClass("has-error");
          } else {
            error_data_nascimento = "";
            $("#error_data_nascimento").text(error_data_nascimento);
            $("#data_nascimento").removeClass("has-error");
          }

          if (
            error_nome != "" ||
            error_apelido != "" ||
            error_nif != "" ||
            error_data_nascimento != ""
          ) {
            return false;
          } else {
            $("#list_personal_details").removeClass("active active_tab1");
            $("#list_personal_details").removeAttr("href data-toggle");
            $("#personal_details").removeClass("active");
            $("#list_personal_details").addClass("inactive_tab1");
            $("#list_contact_details").removeClass("inactive_tab1");
            $("#list_contact_details").addClass("active_tab1 active");
            $("#list_contact_details").attr("href", "#contact_details");
            $("#list_contact_details").attr("data-toggle", "tab");
            $("#contact_details").addClass("active in");
          }
        });

        $("#previous_btn_contact_details").click(function () {
          $("#list_contact_details").removeClass("active active_tab1");
          $("#list_contact_details").removeAttr("href data-toggle");
          $("#contact_details").removeClass("active in");
          $("#list_contact_details").addClass("inactive_tab1");
          $("#list_personal_details").removeClass("inactive_tab1");
          $("#list_personal_details").addClass("active_tab1 active");
          $("#list_personal_details").attr("href", "#personal_details");
          $("#list_personal_details").attr("data-toggle", "tab");
          $("#personal_details").addClass("active in");
        });

        $("#btn_contact_details").click(function () {
          var error_pais = "";
          var error_endereco = "";
          var error_localidade = "";
          var error_codigo_postal = "";
          var error_telefone = "";
          var mobile_validation = /^\d{9}$/;

          if ($.trim($("#pais").val()).length == 0) {
            error_pais = "País obrigatório";
            $("#error_pais").text(error_pais);
            $("#pais").addClass("has-error");
          } else {
            error_pais = "";
            $("#error_pais").text(error_pais);
            $("#pais").removeClass("has-error");
          }

          if ($.trim($("#endereco").val()).length == 0) {
            error_endereco = "Endereço obrigatório";
            $("#error_endereco").text(error_endereco);
            $("#endereco").addClass("has-error");
          } else {
            error_endereco = "";
            $("#error_endereco").text(error_endereco);
            $("#endereco").removeClass("has-error");
          }

          if ($.trim($("#localidade").val()).length == 0) {
            error_localidade = "Localidade obrigatória";
            $("#error_localidade").text(error_localidade);
            $("#localidade").addClass("has-error");
          } else {
            error_localidade = "";
            $("#error_localidade").text(error_localidade);
            $("#localidade").removeClass("has-error");
          }

          if ($.trim($("#codigo_postal").val()).length == 0) {
            error_codigo_postal = "Cód. Postal obrigatório";
            $("#error_codigo_postal").text(error_codigo_postal);
            $("#codigo_postal").addClass("has-error");
          } else {
            error_codigo_postal = "";
            $("#error_codigo_postal").text(error_codigo_postal);
            $("#codigo_postal").removeClass("has-error");
          }

          if ($.trim($("#telefone").val()).length == 0) {
            error_telefone = "Telefone obrigatório";
            $("#error_telefone").text(error_telefone);
            $("#telefone").addClass("has-error");
          } else {
            if (!mobile_validation.test($("#telefone").val())) {
              error_telefone = "Telefone inválido";
              $("#error_telefone").text(error_telefone);
              $("#telefone").addClass("has-error");
            } else {
              error_telefone = "";
              $("#error_telefone").text(error_telefone);
              $("#telefone").removeClass("has-error");
            }
          }
          if (
            error_telefone != "" ||
            error_pais != "" ||
            error_endereco != "" ||
            error_localidade != "" ||
            error_codigo_postal != ""
          ) {
            return false;
          } else {
            $("#btn_contact_details").attr("disabled", "disabled");
            $(document).css("cursor", "progress");
            $("#register_form").submit();
          }
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
