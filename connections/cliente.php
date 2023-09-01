<?php 
$sname= "localhost";
$unmae= "root";
$password = "";
$db_name = "swift";
$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Falha ao conectar!";
}
        $nometabela = "cliente";
		$sql = "SELECT * FROM $nometabela";
		$resultado = mysqli_query($conn, $sql);

		if (mysqli_num_rows($resultado) > 0) {
			$row = mysqli_fetch_assoc($resultado);
            	$_SESSION['IDcliente'] = $row['IDcliente'];
            	$_SESSION['primeiro'] = $row['primeiro'];
            	$_SESSION['apelido'] = $row['apelido'];
            	$_SESSION['data_nascimento'] = $row['data_nascimento'];
            	$_SESSION['telefone'] = $row['telefone'];
            	$_SESSION['email'] = $row['email'];
                $_SESSION['nif'] = $row['nif'];
                $_SESSION['endereco'] = $row['endereco'];
                $_SESSION['codigo_postal'] = $row['codigo_postal'];
                $_SESSION['localidade'] = $row['localidade'];
                $_SESSION['pais'] = $row['pais'];
                $_SESSION['palavra_passe'] = $row['palavra_passe'];
                $_SESSION['genero'] = $row['genero'];
		}else{
            echo "A tabela ($nometabela) precisa de ter dados inseridos.";
	        exit();
		}
	
?>