<!DOCTYPE html>
<html>
<head>
  <title>Contact Us</title>
  <link rel="stylesheet" href="contactUs.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

</head>
<body>
    <?php 
    session_start();
    if (isset($_SESSION['IDcliente']) && isset($_SESSION['email'])) {
        /* navbar para utilizadores COM conta */
    include "../../../components/header_connected.php";
    include "ligacaoMensagem.php";
    ?>


      
          
          
  <div class="container-all">
  <?php if (isset($_GET['error'])) { ?>
        <div class="all">
          <div class="alert alert-success alert-dismissible mt-3 fade show mensagemErro" role="alert" align="center">
          <p class="Mensagem"><?php echo $_GET['error']; ?></p>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        </div>
      <?php } ?>
    <div class="container-contato">
    <h1>Contacte-nos</h1>
    <form method="POST">
      <div class="grupo-formulario">
        <label for="nome">Nome</label>
        <input type="text" id="nome" name="nome" placeholder="Digite o seu nome" required>
        <span id="error_name" class="text-danger"> </span>
      </div>
      <div class="grupo-formulario">
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" placeholder="Digite o seu e-mail" required>
      <span id="error_email" class="text-danger"> </span>  
      </div>
      <div class="grupo-formulario">
        <label for="mensagem">Mensagem</label>
        <textarea id="mensagem" name="mensagem" placeholder="Digite a sua mensagem" required></textarea>
      <span id="error_mes" class="text-danger"> </span>
      </div>
      <button type="submit" name="submit" class="botao">Enviar Mensagem</button>
    </form>
  </div>
  </div>        
  
  <?php include "../../../components/footer.php"?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script>
      $(document).ready(function() {
       
      $(".botao").click(function () {
      var error_email = "";
      var error_name = "";
      var error_mes = "";
      var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

      //email validação
      var emailInput = $("#email").val().trim();
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
            }
          }
      
      //nome validação
      var nomeInput = $("#nome").val().trim();
      if (nomeInput.length === 0) {
      error_nome = "Nome obrigatório";
      $("#error_nome  ").text(error_nome);
      $("#nome").addClass("has-error");
    } else {
      error_nome = "";
      $("#error_nome").text(error_nome);
      $("#nome").removeClass("has-error");
      }

      //mensagem validação
      var mesInput = $("#mensagem").val().trim();
      if (mesInput.length === 0) {
      error_mes = "Mensagem obrigatória";
      $("#error_mes").text(error_mes);
      $("#mensagem").addClass("has-error");
    } else {
      error_mes = "";
      $("#error_mes").text(error_mes);
      $("#mensagem").removeClass("has-error");
      }
      
    });
      });
    </script>
</body>
</html>
<?php 
}else{
     header("Location: http://localhost/dev/pages/valentimoryshchuk/entrar/index.php?error=Precisa de entrar na sua conta primeiro ou registar uma conta.");
     exit();
}
 ?>