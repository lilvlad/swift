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
    <link rel="shortcut icon" href="../../../assets/icon.png" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
        integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Painel Administrador</title>
</head>

<body>
    <?php include "cargo.php" ?>
    <?php include "listar_cripto.php" ?>
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff"
                                class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                <path
                                    d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                            </svg>
                        </div>
                    </div>
                    <h1 class="bem-vindo">
                        <span>Painel de Administrador |
                            <?php echo $_SESSION['cargo'].' (#'.$_SESSION['IDfuncionario'].')'; ?><br /></span>
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

                <div class="container-principal">
                    <div class="box">
                        <div class="container-titulo">
                        <div class="titulos">
                <p class="box-titulo active">Criptomoedas</p>
                <a href="../../valentimoryshchuk/admin/index.php"><p class="box-titulo">Utilizadores Swift</p></a>
                </div>
                            <button class="btn btn-info criar" onclick="criarTabela()">
                                Adicionar
                                <img src="img/Adicionar.svg" alt="" />
                            </button>

                        </div>
                        <div>
                            <div class="table-responsive">
                                <table id="criptoTable" class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nome</th>
                                            <th>Valor</th>
                                            <th class="flutuante">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody class="dados-input">
                                        <?php foreach ($_SESSION['criptomoeda'] as $criptos) { ?>
                                        <tr id="linha-<?php echo $criptos['IDmoeda']?>">
                                            <td>
                                                <input type="text" id="idmoeda-<?php echo $criptos['IDmoeda']; ?>"
                                                    value="<?php echo $criptos['IDmoeda'] ?>" disabled
                                                    class="form-control" />
                                            </td>
                                            <td>
                                                <input type="text" id="nome-<?php echo $criptos['IDmoeda']; ?>"
                                                    value="<?php echo $criptos['nome'] ?>" disabled class="form-control"
                                                    required />
                                            </td>
                                            <td>
                                                <input type="number" id="valor-<?php echo $criptos['IDmoeda']; ?>"
                                                    value="<?php echo $criptos['valor'] ?>" disabled
                                                    class="form-control" required step="0.00001" />
                                            </td>
                                            <td class="acoes flutuante">
                                                <button class="btn btn-primary editar"
                                                    id="editar-<?php echo $criptos['IDmoeda']; ?>"
                                                    onclick="editarCripto(<?php echo $criptos['IDmoeda']; ?>)">
                                                    <img src="img/Lapis.svg" alt="" />
                                                </button>
                                                <button class="btn btn-primary atualizar"
                                                    id="atualizar-<?php echo $criptos['IDmoeda']; ?>"
                                                    onclick="atualizarCripto(<?php echo $criptos['IDmoeda']; ?>)">
                                                    <img src="img/Certo.svg" alt="" />
                                                </button>
                                                <button class="btn btn-danger eliminar" value="delete"
                                                    onclick="eliminarCripto(<?php echo $criptos['IDmoeda']; ?>)">
                                                    <img src="img/Lixo.svg" alt="" />
                                                </button>
                                            </td>
                                        </tr>
                                        <dialog class="modal-confirmar">
                                            <div class="box">
                                                <h4 style="font-weight: 600">Eliminar Utilizador</h4>
                                                <p class="text-primary">A eliminação do utilizador é irreversível. <br>
                                                    Tem a certeza que pretende eliminar o utilizador?</p>
                                                <hr>
                                                <div class="botoes-modal">
                                                    <button class="btn btn-primary"
                                                        onclick="confirmarEliminar(true)">Eliminar</button>
                                                    <button class="btn btn-danger"
                                                        onclick="confirmarEliminar(false)">Cancelar</button>
                                                </div>
                                            </div>
                                        </dialog>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <?php include "../../../components/footer.php" ?>
    </div>
    <script src="https://kit.fontawesome.com/886bff6256.js" crossorigin="anonymous"></script>
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

    function editarCripto(criptoId) {
        var nomeInput = document.getElementById("nome-" + criptoId);
        var valorInput = document.getElementById("valor-" + criptoId);

        var editarButton = document.getElementById("editar-" + criptoId);
        var atualizarButton = document.getElementById("atualizar-" + criptoId);
        var rowColor = document.getElementById("linha-" + criptoId);

        nomeInput.disabled = !nomeInput.disabled;
        valorInput.disabled = !valorInput.disabled;

        if (nomeInput.disabled) {
            editarButton.style.display = "flex";
            atualizarButton.style.display = "none";
        } else {
            editarButton.style.display = "none";
            atualizarButton.style.display = "flex";
            rowColor.style.backgroundColor = "rgba(69, 140, 246, 0.2)";
        }
    }

    function atualizarCripto(criptoId) {
        var nomeInput = document.getElementById("nome-" + criptoId);
        var nome = nomeInput.value;
        var valorInput = document.getElementById("valor-" + criptoId);
        var valor = valorInput.value;

        var filter = /^[a-zA-Z0-9\s]+$/;
        var error = false;

        if (nome.trim().length === 0 || !filter.test(nome)) {
            nomeInput.classList.add("has-error");
            error = true;
        } else {
            nomeInput.classList.remove("has-error");
        }

        if (valor.trim().length === 0 || isNaN(valor)) {
            valorInput.classList.add("has-error");
            error = true;
        } else {
            valorInput.classList.remove("has-error");
        }

        if (error) {
            return;
        } else {
            nomeInput.disabled = true;
            valorInput.disabled = true;
            document.getElementById("editar-" + criptoId).style.display = "flex";
            document.getElementById("atualizar-" + criptoId).style.display = "none";
            document.getElementById("linha-" + criptoId).style.backgroundColor = "transparent";

            var url =
                "atualizar_cripto.php?IDmoeda=" +
                criptoId +
                "&nome=" +
                encodeURIComponent(nome) +
                "&valor=" +
                encodeURIComponent(valor);
            window.location.href = url;
        }
    }



    var modalConfirmar = document.querySelector(".modal-confirmar")
    var criptoDelete;

    window.onclick = function(event) {
        var modal = document.querySelector("dialog");
        if (event.target == modal) {
            modal.close();
            document.body.classList.remove('modal-scroll');
        }
    }

    function confirmarEliminar(confirmar) {
        if (confirmar) {
            var url = "eliminar_cripto.php?IDmoeda=" + criptoDelete;
            window.location.href = url;
        } else {
            fecharModalEliminar();
        }
    }

    function eliminarCripto(criptoId) {
        criptoDelete = criptoId;
        modalConfirmar.showModal();
        document.body.classList.add('modal-scroll');
    }


    function fecharModalEliminar() {
        modalConfirmar.close();
        document.body.classList.remove('modal-scroll');
    }

    function adicionarCripto(table, criptoId) {
        var nomeInput = document.getElementById("nome");
        var nome = nomeInput.value;
        var valorInput = document.getElementById("valor");
        var valor = valorInput.value;

        var filter = /^[a-zA-Z0-9\s]+$/;
        var error = false;

        if (nome.trim().length === 0 || !filter.test(nome)) {
            nomeInput.classList.add("has-error");
            error = true;
        } else {
            nomeInput.classList.remove("has-error");
        }

        if (valor.trim().length === 0 || isNaN(valor)) {
            valorInput.classList.add("has-error");
            error = true;
        } else {
            valorInput.classList.remove("has-error");
        }

        if (error) {
            return;
        } else {
            var url =
                "adicionar_cripto.php?IDmoeda=" +
                encodeURIComponent(criptoId) +
                "&nome=" +
                encodeURIComponent(nome) +
                "&valor=" +
                encodeURIComponent(valor);
            window.location.href = url;
            var inputs = table.getElementsByTagName("input");
            var selects = table.getElementsByTagName("select");
            disableInputFields(inputs, selects);
        }
    }



    function criarTabela() {
        var table = document.getElementById("criptoTable");
        var newRow = table.insertRow(table.rows.length);
        var buttonContainer = document.createElement("td");
        buttonContainer.className = "acoes flutuante";
        buttonContainer.style.background = "rgb(255, 255, 255)";
        buttonContainer.style.background = "linear-gradient(90deg, rgba(255, 255, 255, 0) 0%, rgb(255, 255, 255) 25%)";
        var adicionarButton;

        for (var i = 0; i <= table.rows[0].cells.length - 1; i++) {
            var newCell = newRow.insertCell(i);
            if (i === table.rows[0].cells.length - 1) {
                var adicionarButton = document.createElement("button");
                adicionarButton.className = "btn btn-primary adicionar";
                adicionarButton.onclick = function() {
                    console.log("Botão clicado!");
                    adicionarCripto(table);
                };

                var adicionarImg = document.createElement("img");
                adicionarImg.src = "img/Certo.svg";
                adicionarButton.appendChild(adicionarImg);
                buttonContainer.appendChild(adicionarButton);

                var eliminarButton = document.createElement("button");
                eliminarButton.className = "btn btn-danger eliminar";
                eliminarButton.value = "delete";
                eliminarButton.onclick = function() {
                    eliminarCripto(table);
                };

                var eliminarImg = document.createElement("img");
                eliminarImg.src = "img/Lixo.svg";
                eliminarButton.appendChild(eliminarImg);
                buttonContainer.appendChild(eliminarButton);
            } else {
                var inputField = document.createElement("input");
                inputField.type = "text";
                inputField.className = "form-control";
                if (i === 0) {
                    inputField.disabled = true;
                } else if (i === 1) {
                    inputField.id = "nome";
                    inputField.setAttribute("maxlength", "50");
                } else if (i === 2) {
                    inputField.id = "valor";
                }
                newCell.appendChild(inputField);
            }
        }
        newRow.deleteCell(3);
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
    </script>
</body>

</html>

<?php 
}else{
     header("Location: http://localhost/dev/pages/valentimoryshchuk/perfil/index.php?error=Nãoo tem acesso ao painel de administrador.");
     exit();
}
 ?>