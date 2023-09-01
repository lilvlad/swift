<html>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Entrar na Conta</title>
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
    if (isset($_SESSION['IDcliente']) && isset($_SESSION['email'])) {
        /* navbar para utilizadores COM conta */
    include "../../../components/header_connected.php";
    }else{
        /* navbar para utilizadores SEM conta */
        include "../../../components/header.php"; 
    }
 ?>

    <div class="container box">
      <br />
      <h2 align="center">Entrar na Conta</h2>
      <br />
      <?php if (isset($_GET['error'])) { ?>
          <div class="alert alert-danger alert-dismissible mt-3 fade show" role="alert" align="center">
            <?php echo $_GET['error']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <?php } ?>


      <!-- ISTO É MEU VALENTIM -->
      <?php if (isset($_GET['success'])) { ?>
          <div class="alert alert-success alert-dismissible mt-3 fade show" role="alert" align="center">
          <?php echo $_GET['success']; ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <?php } ?>
      <!-- ISTO É MEU VALENTIM -->  




      <div>
        <form
          action="login.php"
          method="post"
          id="register_form"
          class="justify-content-center"
        >
          <!-- POssiblidade de usar nav-pills em vez de nav-tabs e modificar para 1, 2, 3 passos -->
          <ul class="nav nav-tabs justify-content-center">
            <li class="nav-item">
              <a class="nav-link active_tab1 active" id="list_login_details"
                >Dados Login</a
              >
            </li>
          </ul>
          <div class="tab-content" style="margin-top: 1rem">
            <div class="tab-pane active" id="login_details">
              <div class="panel panel-default">
                <!--  <div class="panel-heading">Dados Login</div> -->
                <div class="panel-body">
                  <div class="form-group">
                    <label>Introduza o email</label>
                    <input
                      type="text"
                      name="email"
                      id="email"
                      class="form-control"
                      placeholder="valentim@swift.com"
                    />
                    <span id="error_email" class="text-danger"> </span>
                  </div>
                  <div class="form-group mt-3" id="pass-mg">
                    <label>Introduza a palavra-passe</label>
                    <input
                      type="password"
                      name="palavra_passe"
                      id="palavra_passe"
                      class="form-control"
                      placeholder="•••••••••••••"
                    />
                    <span id="error_palavra_passe" class="text-danger"></span>
                    <div class="mt-3" id="forgot-mg">
                      <a
                        href="http://localhost/dev/pages/rafaligeirinho/transacoes/passwordRecover.php"
                        >Esqueceu-se da palavra-passe?</a
                      >
                    </div>
                  </div>
                  <br />
                  <div align="center" class="d-grid">
                    <!-- <button
                    type="button"
                    name="btn_login_details"
                    id="btn_login_details"
                    class="btn btn-info btn-lg"
                  >
                    Seguinte
                  </button> -->
                    <button
                      type="submit"
                      name="btn_login_details"
                      id="btn_login_details"
                      class="btn btn-primary"
                    >
                      Entrar
                      <i class="bi bi-check-lg"></i>
                    </button>
                  </div>
                  <br />
                </div>
              </div>
            </div>
          </div>
          <div  align="center">
            Ainda não é utilizador?
            <a
              href="http://localhost/dev/pages/valentimoryshchuk/registar/index.php"
              >Crie uma conta</a
            >
          </div>
        </form>
      </div>
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
      $(function () {
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
            $("#pass-mg").addClass("mg");
            $("#forgot-mg").addClass("mg");
          } else {
            error_palavra_passe = "";
            $("#error_palavra_passe").text(error_palavra_passe);
            $("#palavra_passe").removeClass("has-error");
            $("#pass-mg").removeClass("mg");
            $("#forgot-mg").removeClass("mg");
          }

          if (error_email != "" || error_palavra_passe != "") {
            return false;
          } else {
            /* sucesso */
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
