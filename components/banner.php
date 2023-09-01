<style>
.banner-utilizador {
    background-color: #101928;
    padding: 20px;
    background-image: url(../../../assets/Mapa.svg);
    background-size: cover;
    background-repeat: no-repeat;
    height: 250px;
  } 


.banner-utilizador .bem-vindo {
    padding: 40px 40px 0 40px;
    margin-left: 20px;
    color: aliceblue;
    font-size: 36px;
    font-weight: 500;
    text-align: left;  
}

.conteudo-banner {
    max-width: 1400px;
    margin: 0 auto;
}

.banner-utilizador .links{
    text-align: left;
}

.links{
    width: fit-content;
    display: flex;
    margin-left: 60px;
    margin-top: -3rem;
    padding: 0;
    border-bottom: 2px solid rgb(255, 255, 255);
    cursor: pointer;
    list-style: none;
}

.links a{
    list-style: none;
    font-size: 16px;
    color: rgba(255, 255, 255,1);
    text-decoration: none;
    padding: 5px 20px 0px 0px;
    transition: all .5s ease;
}

.links a:hover {
     color: rgba(255, 255, 255, 0.5);
}

.banner-perfil {
  height: 80px;
  width: 80px;
  border-radius: 100%;
  object-fit: cover;
}

.banner-photos {
    display: flex;
  
}

.links img{
    width: 20px;
    height: 20px;
    color: rgba(255, 255, 255, 0.5);
}

.banner-imagens{
    margin-left: auto;
    padding: 40px 40px 0 40px;
    margin-right: 20px;
}
.banner-imagens img,
.banner-imagens .round{
   opacity: 1;
}
.banner-imagens img:hover,
.banner-imagens img:hover .round 
{
   opacity: .8;
}

.round {
position: relative;
  background: #2fb383;
  left: 60%;
  bottom: 20%;
  width: 32px;
  height: 32px;
  text-align: center;
  border-radius: 50%;
  overflow: hidden;
  line-height: 30px;
  /* transition: all 0.3s ease; */
}
</style>

<div class="banner-utilizador">
    <div class="conteudo-banner">
        <div class="banner-photos">
            <h1 class="bem-vindo">Bem vindo, <?php echo $_SESSION['primeiro'] ?></h1>
            <a class="banner-imagens" href="http://localhost/dev/pages/valentimoryshchuk/perfil/">
            <!-- <img class="banner-perfil" src="../../../assets/foto.jpg" alt="Foto de perfil"> -->
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
            <img class="banner-perfil" src="<?php echo $fotoPerfil; ?>" alt="Foto de perfil">
            <div class="round">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                </svg>
            </div>
            </a>
        </div>
        <div class="links">
            <a href="../../../pages/rubenteixeira/dashboard/index.php">Resumo</a>
            <a href="../../../pages/rafaligeirinho/transacoes/transacao.php">Transações</a>
            <a href="../../../pages/alexandremarcelino/statistics/statistics.php">Estatisticas</a>
            <a href="../../../pages/rubenteixeira/plano/index.php">Plano</a>
            <a href="../../../pages/rubenteixeira/cofre/index.php">Cofre</a>
        </div>
    </div>
</div>
