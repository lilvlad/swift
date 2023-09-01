<style>
  /* *{
    transition: all 0.3s !important;
  } */
  .navbar {
    background-color: #F1F1F1 !important;
  }
  .btn-warning {
    background-color: white !important;
    border: none !important;
    border-radius: 10px !important;
    color: #313131 !important;
  }

  .btn-warning:hover {
    color: white !important;
    background-color: #171717 !important;
  }

  .btn-primary {
    background-color: #171717 !important;
    border: none !important;
    border-radius: 10px !important;
    color: white !important;
  }

  .btn-primary:hover {
    background-color: #18a86b !important;
    border: none !important;
  }

  /* .navbar-nav {
    border: 0px !important;
    justify-content: center !important;
    text-align: center !important;
    align-items: center !important;
  } */


</style>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-center">
  <!-- Container wrapper -->
  <div class="container justify-content-center">
    <!-- Navbar brand -->
    <a class="navbar-brand me-2" href="http://localhost/dev/pages/rubenteixeira/home-page/">
      <img
      src="https://i.imgur.com/P1vrGMq.png"
        height="25"
        alt="Swift Logo"
        loading="lazy"
        style="margin-top: -5px;"
      />
    </a>

    <!-- Toggle button -->
    <button
      class="navbar-toggler "
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarButtonsExample"
      aria-controls="navbarButtonsExample"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse justify-content-center" id="navbarButtonsExample">
      <!-- Left links -->
      <!-- este <ul> está aqui para permitir meter o texto ao centro -->
      <ul class="navbar-nav me-auto mb-4 mb-lg-0 ">
      </ul>
        <ul class="navbar-nav me-2 mb-2 mb-lg-0 ">
        <li class="nav-item">
          <a class="nav-link " href="http://localhost/dev/pages/rubenteixeira/home-page/">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/dev/pages/alexandremarcelino/services_bank/services_bank.php">Cartões</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/dev/pages/franciscoassis/Pagina_Cripto/pagina_cripto.php">Cripto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/dev/pages/rafaligeirinho/FAQ/HelpCenter.php">Suporte</a>
        </li>
      </ul>

      <!-- Left links -->

      <div class="d-flex align-items-center ms-auto mb-2 mb-lg-0">
        <a type="button" class="btn btn-warning px-3 me-2" href="http://localhost/dev/pages/valentimoryshchuk/entrar/index.php">
          Login
        </a>
        <a type="button" class="btn btn-primary me-3" href="http://localhost/dev/pages/valentimoryshchuk/registar/index.php">
          Registar
        </a>
      </div>
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>