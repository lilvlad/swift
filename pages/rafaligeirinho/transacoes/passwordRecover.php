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
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
  <?php 
    session_start();
    if (!isset($_SESSION['IDcliente']) && !isset($_SESSION['email'])) {
        /* navbar para utilizadores SEM conta */
        include "../../../components/header.php"; 
    }
 ?>

    <div class="container box">
      <br />
      <h2 align="center">Recuperação da Password</h2>
      <br />
      
      <!-- ERROS -->
      <?php if (isset($_GET['error'])) { ?>
      <div class="alert alert-danger alert-dismissible mt-3 fade show" role="alert" align="center">
        <?php echo $_GET['error']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php } ?>
      <!-- ERROS  -->

      <div>
        <form
          action="login.php"
          method="POST"
          id="register_form"
          class="justify-content-center"
        >
          <ul class="nav nav-tabs justify-content-center">
            <li class="nav-item">
              <a class="nav-link active_tab1 active" id="list_login_details"
                >Palavra-Passe</a
              >
            </li>
          </ul>
          <div class="tab-content" style="margin-top: 1rem">
            <div class="tab-pane active" id="login_details">
              <div class="panel panel-default">
                <div class="panel-body">
                  <div class="form-group">
                    <label>Introduza o email</label>
                    <input
                      type="text"
                      name="email"
                      id="email"
                      class="form-control emailForm"
                      placeholder="valentim@swift.com" 
                    />
                    <span id="error_email" class="text-danger"> </span>
                  </div><br>
                  
                  <div class="form-group mt-3 disabled newPass" id="pass-mg">
                    <label>Introduza a nova palavra-passe</label>
                    <input
                      type="password"
                      name="palavra_passe"
                      id="palavra_passe"
                      class="form-control"
                      placeholder="•••••••••••••"
                    />
                    <span id="error_palavra_passe" class="text-danger"></span>
                  </div>
                  <div class="form-group mt-3 disabled codigoEmail" id="pass-mg">
                    <label>Introduza o código que foi enviado para o seu Email</label>
                    <input
                      type="password"
                      name="codigo"
                      id="codigo"
                      class="form-control"
                      placeholder="•••••••••••••"
                    />
                    <span id="error_cod" class="text-danger"></span>
                  </div>
                  <br>
                  <div align="center" class="d-grid">
                    <button
                      type="button"
                      name="btn_login_details"
                      id="btn_login_details"
                      class="btn btn-primary codigo"
                    >
                      Enviar Código para o email
                    </button>
                    <button
                      type="button"
                      name="btn_login_details"
                      id="btn_login_details"
                      class="btn btn-primary disabled codigoVerificacao"
                    >
                      Verificar codigo
                    </button>
                  </div>
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
                      class="btn btn-primary disabled mudarButton"
                    >
                      Mudar pass e entrar
                      <i class="bi bi-check-lg"></i>
                    </button>
                  </div>
                  <br />
                </div>
              </div>
            </div>
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
  });

    function limparURL(parameter) {
      var url = new URL(window.location.href);
      url.searchParams.delete(parameter);
      window.history.replaceState({}, document.title, url.href);
    }


    $(".codigo").click(function () {
      var error_email = "";
      var error_cod = "";
      var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

      
      var emailInput = $("#email").val().trim();
      var inputField = document.getElementById("email");
      if (emailInput.length === 0) {
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
	            $(".codigoEmail").removeClass("disabled");
              $(".codigo").addClass("disabled");
              $(".codigoVerificacao").removeClass("disabled");
              inputField.setAttribute("readonly", "readonly");
              inputField.classList.add('readonly-style');
            }
          }
      
    });

    $(function () {
      $(".codigoVerificacao").click(function () {
        var error_cod = "";

                if($.trim($("#codigo").val()).length == 0)
                {
                error_cod = "Código Obrigatório";
                $("#error_cod").text(error_cod);
                $("#codigo").addClass("has-error");
              } else if($.trim($("#codigo").val()) != 1234){
                error_cod = "Código Errado";
                $("#error_cod").text(error_cod);
                $("#codigo").addClass("has-error");
            }else{
                error_cod = "";
                $("#error_cod").text(error_cod);
                $(".codigoEmail").addClass("disabled");
                $("#codigo").removeClass("has-error");
                $(".mudarButton").removeClass("disabled");
                $(".codigoVerificacao").addClass("disabled");
                $(".newPass").removeClass("disabled");
            }

        
      });
    });

    $(function () {
      $(".mudarButton").click(function () {
        var error_palavra_passe = "";
        if (password.length == 0) {
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
      });
    });

  
</script>


    <script
      src="https://kit.fontawesome.com/886bff6256.js"
      crossorigin="anonymous"
    ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
