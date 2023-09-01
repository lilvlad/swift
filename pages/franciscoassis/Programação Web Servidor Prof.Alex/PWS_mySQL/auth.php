<?php
session_start();
$_SESSION['errors'] = array(); // Cleanup previous errors
if(isset($_POST['email'])) $email = trim($_POST['email']);
    else $email = "";
if(isset($_POST['pass'])) $password = trim($_POST['pass']);
    else $password = "";
if (strlen($email) == 0)
    $_SESSION['errors']['email'] = 'Empty email';
if (strlen($password) == 0)
    $_SESSION['errors']['pass'] = 'Empty password';
if (count($_SESSION['errors']) == 0) {
            $db = new mysqli("localhost", "root", "", "pws");
        if($db->connect_errno)
            $_SESSION['errors']['auth'] = "Erro ao estabelecer ligação com a base de dados";
        else{
            $email = mysqli_real_escape_string($db, $email);
            $sql = "SELECT email,pass FROM utilizador where email='$email'";
            $result = $db->query($sql);
            if($result && $result->num_rows!=0 && 
            ($result->fetch_object()->pass==/*hash('sha152', */$password/*)*/)){
                $_SESSION['authenticated'] = true;
                $_SESSION['email'] = $email;
                header('Location: listar_Utilizador.php');
            }else{
                $_SESSION['errors']['auth'] = "Erro ao estabelecer ligação com a base de dados";
            }
        }
    }
    else
        $_SESSION['errors']['auth'] = 'Authentication failed';
if (count($_SESSION['errors']) != 0)
    header('Location:login.php');
exit(0);
?>