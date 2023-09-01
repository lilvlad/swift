<?php 
$sname= "localhost";
$unmae= "root";
$password = "";
$db_name = "swift";
$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Falha ao conectar!";
}
        $nometabela = "funcionarios";
		$sql = "SELECT * FROM $nometabela";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
            	$_SESSION['IDfuncionario'] = $row['IDfuncionario'];
            	$_SESSION['cargo'] = $row['cargo'];
            	$_SESSION['IDcliente'] = $row['IDcliente'];
		}else{
            echo "A tabela ($nometabela) precisa de ter dados inseridos.";
	        exit();
		}
?>