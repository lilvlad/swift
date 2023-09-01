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
    <title>Perfil</title>
  </head>
  <body>
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
              <span>Bem vindo,<br /></span>
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
          <h3 class="mt-5">Informação Pessoal</h3>
          <form action="atualizar_perfil.php" method="post" id="perfil_form">
            <div class="row">
              <div class="col-md-2 mt-4">
                <div class="form-group">
                  <label>Nº de Cliente</label>
                  <input
                    disabled
                    type="text"
                    class="form-control"
                    maxlength="9"
                    placeholder="263777189"
                    value="<?php echo $_SESSION['IDcliente']; ?>"
                  />
                </div>
              </div>
              <div class="col-md-4 mt-4">
                <div class="form-group">
                  <label>Número de Identificação Fiscal</label>
                  <input
                    disabled
                    type="text"
                    class="form-control"
                    maxlength="9"
                    placeholder="263777189"
                    value="<?php echo $_SESSION['nif']; ?>"
                  />
                </div>
              </div>
              <div class="col-md-3 mt-4">
                <label>Número Telefone</label>
                <div class="input-group">
                  <span class="input-group-text"
                    ><img src="img/portugal.svg" alt="portugal flag" />
                    +351</span
                  >
                  <input
                    class="form-control"
                    id="telefone"
                    type="tel"
                    maxlength="9"
                    max="9"
                    placeholder="912345678"
                    value="<?php echo $_SESSION['telefone']; ?>"
                    name="telefone"
                  />
                </div>
                <span id="error_telefone" class="text-danger"></span>
              </div>
              <div class="col-md-3 mt-4">
                <div class="form-group">
                  <label>Data de Nascimento</label>
                  <input
                    type="date"
                    class="form-control"
                    data-relmax="-18"
                    format="yyyy-mm-dd"
                    value="<?php echo $_SESSION['data_nascimento']; ?>"
                    name="data_nascimento"
                    id="data_nascimento"
                  />
                  <span id="error_data_nascimento" class="text-danger"></span>
                </div>
              </div>
              <div class="col-md-3 mt-4">
                <div class="form-group">
                  <label>Nome</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Valentim"
                    value="<?php echo $_SESSION['primeiro']; ?>"
                    name="primeiro"
                    min="2"
                    id="nome"
                  />
                  <span id="error_nome" class="text-danger"></span>
                </div>
              </div>
              <div class="col-md-3 mt-4">
                <div class="form-group">
                  <label>Apelido</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Oryshchuk"
                    value="<?php echo $_SESSION['apelido']; ?>"
                    name="apelido"
                    id="apelido"
                  />
                  <span id="error_apelido" class="text-danger"></span>
                </div>
              </div>
              <div class="col-md-2 mt-4">
                <div class="form-group">
                  <label>País</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Portugal"
                    value="<?php echo $_SESSION['pais']; ?>"
                    name="pais"
                    id="pais"
                  />
                  <span id="error_pais" class="text-danger"></span>
                </div>
              </div>
              <div class="col-md-4 mt-4">
                <div class="form-group">
                  <label>Morada</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Rua Santa Maria Madalena N27"
                    value="<?php echo $_SESSION['endereco']; ?>"
                    name="endereco"
                    id="endereco"
                  />
                  <span id="error_endereco" class="text-danger"></span>
                </div>
              </div>
              <div class="col-md-6 mt-4">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input
                    type="email"
                    id="email"
                    class="form-control"
                    placeholder="valentim@swift.com"
                    value="<?php echo $_SESSION['email']; ?>"
                    name="email"
                    pattern="/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/"
                  />
                  <span id="error_email" class="text-danger"></span>
                </div>
              </div>
              <div class="col-md-4 mt-4">
                <div class="form-group">
                  <label>Localidade</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Batalha"
                    value="<?php echo $_SESSION['localidade']; ?>"
                    name="localidade"
                    id="localidade"
                  />
                  <span id="error_localidade" class="text-danger"></span>
                </div>
              </div>
              <div class="col-md-2 mt-4">
                <label>Cod.Postal</label>
                <div class="form-group">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="2440-368"
                    value="<?php echo $_SESSION['codigo_postal']; ?>"
                    name="codigo_postal"
                    id="codigo_postal"
                  />
                </div>
                <span id="error_codigo_postal" class="text-danger"></span>
              </div>
            </div>

            <h3 class="mt-5">Informação Adicional</h3>
            <div class="row">
              <div class="col-md-6 mt-4">
                <div class="form-group">
                  <label>Género</label>
                  <select
                    class="form-select"
                    id="genero"
                    name="genero"
                  >
                    <option <?php if ($_SESSION['genero'] === 'Masculino') echo 'selected'; ?>>Masculino</option>
                    <option <?php if ($_SESSION['genero'] === 'Feminino') echo 'selected'; ?>>Feminino</option>
                    <option <?php if ($_SESSION['genero'] === 'Não Indicado') echo 'selected'; ?>>Não Indicado</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6 mt-4">
                <div class="form-group">
                  <div class="texto-pass">
                  <label>Palavra-Passe</label>
                  <a onclick="mostrarPass()" id="mostrar-pass">Mudar Palavra-Passe</a>
                  </div>
                  <input
                    type="password"
                    class="form-control"
                    placeholder="••••••••••••••"
                    id="palavra_passe"
                    name="palavra_passe"
                    autocomplete="on"
                  />
                  <span id="error_palavra_passe" class="text-danger"></span>
                </div>
              </div>
              <div class="col-md-6 mt-4 mostrar">
                <div class="form-group ">
                  <label>Palavra-Passe Nova</label>
                  <input
                    type="password"
                    class="form-control"
                    placeholder="••••••••••••••"
                    id="nova_pass"
                    name="nova_pass"
                  />
                  <span id="error_nova_pass" class="text-danger"></span>
                </div>
              </div>
              <div class="col-md-6 mt-4 mostrar">
                <div class="form-group ">
                  <label>Confirmar Palavra-Passe Nova</label>
                  <input
                    type="password"
                    class="form-control"
                    placeholder="••••••••••••••"
                    id="confirm_pass"
                    name="confirm_pass"
                  />
                  <span id="error_confirm_pass" class="text-danger"></span>
                </div>
              </div>
            </div>

            <div class="mt-5 mb-5">
              <button class="btn btn-primary" id="btn_perfil_update">
                Guardar Alterações
                <i class="bi bi-check-lg"></i>
              </button>
              <button class="btn btn-danger" onclick="cancelarForm(event)">
                Cancelar <i class="bi bi-x-lg"></i>
              </button>
            </div>
          </form>
        </div>
      </div>

      <?php include "../../../components/footer.php" ?>
    </div>
    <script>

      function mostrarPass(){
        var mostrarLinha = document.getElementsByClassName("mostrar");
        var mostrarLinhaTexto = document.getElementById("mostrar-pass");
          for (var i = 0; i < mostrarLinha.length; i++) {
            if(mostrarLinha[i].style.display === "block"){
              mostrarLinhaTexto.textContent = "Mudar Palavra-Passe";
              mostrarLinha[i].style.display = "none";
            }else{
              mostrarLinhaTexto.textContent = "Ocultar";
              mostrarLinha[i].style.display = "block";
            }
          }
      }
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

      function cancelarForm(event) {
        event.preventDefault();
        document.getElementById("perfil_form").reset();
      }
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

          /* Validar Dados Perfil */
        $("#btn_perfil_update").click(function () {
          var error_email = "";
          var error_palavra_passe = "";
          var error_nova_pass = "";
          var error_confirm_pass = "";
          var filter =
            /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
          var error_nome = "";
          var error_apelido = "";
          var error_data_nascimento = "";
          var error_pais = "";
          var error_endereco = "";
          var error_localidade = "";
          var error_codigo_postal = "";
          var error_telefone = "";
          var mobile_validation = /^\d{9}$/;

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
            error_palavra_passe = "Introduza a sua palavra-passe para aplicar as alterações";
            $("#error_palavra_passe").text(error_palavra_passe);
            $("#palavra_passe").addClass("has-error");
          } else {
            error_palavra_passe = "";
            $("#error_palavra_passe").text(error_palavra_passe);
            $("#palavra_passe").removeClass("has-error");
          }

           /* Verificação de mudança palavra passe */
           if ($.trim($("#nova_pass").val()).length >= 1 && $.trim($("#confirm_pass").val()).length == 0) {
            error_confirm_pass = "Confirme a sua nova palavra-passe para mudar de palavra-passe";
            $("#error_confirm_pass").text(error_confirm_pass);
            $("#confirm_pass").addClass("has-error");
          } else {
            error_confirm_pass = "";
            $("#error_confirm_pass").text(error_confirm_pass);
            $("#confirm_pass").removeClass("has-error");
          }

           if ($.trim($("#confirm_pass").val()).length >= 1 && $.trim($("#nova_pass").val()).length == 0) {
            error_nova_pass = "Introduza a sua nova palavra-passe para mudar de palavra-passe";
            $("#error_nova_pass").text(error_nova_pass);
            $("#nova_pass").addClass("has-error");
          } else {
            error_nova_pass = "";
            $("#error_nova_pass").text(error_nova_pass);
            $("#nova_pass").removeClass("has-error");
  
          }

          if ($.trim($("#confirm_pass").val()) != $.trim($("#nova_pass").val())){
              error_nova_pass = "Os campos devem estar iguas";
            $("#error_nova_pass").text(error_nova_pass);
            $("#nova_pass").addClass("has-error");
              error_confirm_pass = "Os campos devem estar iguas";
            $("#error_confirm_pass").text(error_confirm_pass);
            $("#confirm_pass").addClass("has-error");
            }else{
              error_nova_pass = "";
            $("#error_nova_pass").text(error_nova_pass);
            $("#nova_pass").removeClass("has-error");
              error_confirm_pass = "";
            $("#error_confirm_pass").text(error_confirm_pass);
            $("#confirm_pass").removeClass("has-error");
            }

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

          if ($.trim($("#data_nascimento").val()).length == 0) {
            error_data_nascimento = "Data de Nascimento obrigatória";
            $("#error_data_nascimento").text(error_data_nascimento);
            $("#data_nascimento").addClass("has-error");
          } else {
            error_data_nascimento = "";
            $("#error_data_nascimento").text(error_data_nascimento);
            $("#data_nascimento").removeClass("has-error");
          }

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

          /* Validação Final */
          if (error_email != "" || error_palavra_passe != "" || error_nova_pass != "" || error_confirm_pass != "" || error_nome != "" || error_apelido != "" || error_data_nascimento != "" || error_telefone != "" || error_localidade != "" || error_pais != "" || error_endereco != "" || error_codigo_postal != "") {
            return false;
          } else {
            $(document).css("cursor", "progress");
            $("#perfil_form").submit();
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

<?php 
}else{
     header("Location: http://localhost/dev/pages/valentimoryshchuk/entrar/index.php?error=Precisa de entrar na sua conta primeiro.");
     exit();
}
 ?>
