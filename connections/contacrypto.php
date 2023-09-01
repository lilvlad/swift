<?php 
$sname= "localhost";
$unmae= "root";
$password = "";
$db_name = "swift";
$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
    echo "Falha ao conectar!";
    exit();
}

if (isset($_SESSION['IDconta'])){
	$nometabela = "contacrypto";
	$IDconta = $_SESSION['IDconta'];
	$sql = "SELECT * FROM $nometabela WHERE IDconta = $IDconta";
	$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
            $_SESSION['IDcrypto'] = $row['IDcrypto'];
            $_SESSION['saldo'] = $row['saldo'];
            $_SESSION['IDconta'] = $row['IDconta'];
		}else {
			$sql = "INSERT INTO contacrypto (saldo, IDconta) VALUES (0, $IDconta)";
			if (mysqli_query($conn, $sql)) {
				$IDcrypto = mysqli_insert_id($conn);
				$_SESSION['IDcrypto'] = $IDcrypto;
				$_SESSION['saldo'] = 0;
				$_SESSION['IDconta'] = $IDconta;
			}
		}
}else{
	echo "A tabela ($nometabela) precisa de ter dados inseridos.";
	}
?>