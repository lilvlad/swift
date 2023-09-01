<?php
session_start();
$sname = "localhost";
$unmae = "root";
$password = "";
$db_name = "swift";
$conn = mysqli_connect($sname, $unmae, $password, $db_name);


if (!$conn) {
    echo "Falha ao conectar!";
    exit();
}

if (isset($_POST['email']) && isset($_POST['palavra_passe']) && isset($_POST['primeiro']) && isset($_POST['apelido']) && isset($_POST['telefone']) && isset($_POST['nif']) && isset($_POST['genero']) && isset($_POST['pais']) && isset($_POST['endereco']) && isset($_POST['localidade']) && isset($_POST['codigo_postal']) && isset($_POST['data_nascimento'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = validate($_POST['email']);
    $pass = validate($_POST['palavra_passe']);
    $primeiro = validate($_POST['primeiro']);
    $apelido = validate($_POST['apelido']);
    $telefone = validate($_POST['telefone']);
    $nif = validate($_POST['nif']);
    $genero = validate($_POST['genero']);
    $pais = validate($_POST['pais']);
    $endereco = validate($_POST['endereco']);
    $localidade = validate($_POST['localidade']);
    $codigo_postal = validate($_POST['codigo_postal']);
    $data_nascimento = validate($_POST['data_nascimento']);

    // Hash the password using bcrypt
    $pass = password_hash($pass, PASSWORD_DEFAULT);

    $sql_nif = "SELECT * FROM cliente WHERE nif = ?";
    $stmt = $conn->prepare($sql_nif);
    $stmt->bind_param('s', $nif);
    $stmt->execute();
    $result_nif = $stmt->get_result();

    if ($result_nif->num_rows > 0) {
        header("Location: index.php?error=O NIF indicado já se encontra em uso ");
        exit();
    }

    $sql_telefone = "SELECT * FROM cliente WHERE telefone = ?";
    $stmt = $conn->prepare($sql_telefone);
    $stmt->bind_param('s', $telefone);
    $stmt->execute();
    $result_telefone = $stmt->get_result();

    if ($result_telefone->num_rows > 0) {
        header("Location: index.php?error=O telefone indicado já se encontra em uso ");
        exit();
    }

    $sql_email = "SELECT * FROM cliente WHERE email = ?";
    $stmt = $conn->prepare($sql_email);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result_email = $stmt->get_result();

    if ($result_email->num_rows > 0) {
        header("Location: index.php?error=O email indicado já se encotra em uso");
        exit();
    } else {
        /* Gerar Dados Conta */
        $iban = generateRandomIBAN();
        $nib = generateRandomNIB();

        /* Gerar Cartão */
        $debitCardNumber = generateRandomNumber(16);
        $pin = generateRandomNumber(4);
        $cvv = generateRandomNumber(3);
        $expiryDate = generateExpiryDate();

        $sql2 = "INSERT INTO cliente(email, palavra_passe, primeiro, apelido, telefone, nif, genero, pais, endereco, localidade, codigo_postal, data_nascimento) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql2);
        $stmt->bind_param('ssssssssssss', $email, $pass, $primeiro, $apelido, $telefone, $nif, $genero, $pais, $endereco, $localidade, $codigo_postal, $data_nascimento);
        $result2 = $stmt->execute();

        if ($result2) {
            /* Receber o ID do utilizador na sessão atual */
            $clienteId = $stmt->insert_id;
            /* falta adicionar o campo da "foto" criado recentemente e no resto das páginas também (perfil) */
            $sql3 = "INSERT INTO conta(saldo, iban, nib, IDcliente) VALUES('0', ?, ?, ?)";
            $stmt3 = $conn->prepare($sql3);
            $stmt3->bind_param('ssi', $iban, $nib, $clienteId);
            $result3 = $stmt3->execute();
            
            if ($result3) {
				$contaId = $stmt3->insert_id; 
                $sql4 = "INSERT INTO cartao(num_cartao, pin, cvv, data_validade, IDconta) VALUES (?, ?, ?, ?, ?)";
                $stmt4 = $conn->prepare($sql4);
                $stmt4->bind_param('ssssi', $debitCardNumber, $pin, $cvv, $expiryDate, $contaId);
                $result4 = $stmt4->execute();

                if ($result4) {
                    header("Location: index.php?success=Registo completo com sucesso!");
                    exit();
                } else {
                    header("Location: index.php?error=Erro na criação do cartão: " . $stmt4->error);
                    exit();
                }
            } else {
                header("Location: index.php?error=Erro na criação da conta: " . $stmt3->error);
                exit();
            }
        } else {
            header("Location: index.php?error=Ocorreu um erro desconhecido");
            exit();
        }
    }
} else {
    header("Location: index.php");
    exit();
}

function generateRandomIBAN()
{
    $countryCode = "PT";
    $bankCode = "0007";
    $branchCode = "9966";
    $accountNumber = generateRandomNumber(10);

    $checkDigits = generateIBANCheckDigits($countryCode, $bankCode, $branchCode, $accountNumber);

    return $countryCode . $checkDigits . $bankCode . $branchCode . $accountNumber;
}

function generateRandomNIB()
{
    $bankCode = "0007";
    $branchCode = "9966";
    $accountNumber = generateRandomNumber(10);

    $checkDigits = generateNIBCheckDigits($bankCode, $branchCode, $accountNumber);

    return $bankCode . $branchCode . $checkDigits . $accountNumber;
}

function generateRandomNumber($length)
{
    $digits = "";
    for ($i = 0; $i < $length; $i++) {
        $digits .= mt_rand(0, 9);
    }
    return $digits;
}

function generateIBANCheckDigits($countryCode, $bankCode, $branchCode, $accountNumber)
{
    $iban = $bankCode . $branchCode . $accountNumber . $countryCode . "00";
    $iban = str_replace(range('A', 'Z'), range(10, 35), $iban);

    $remainder = 0;
    foreach (str_split($iban, 7) as $part) {
        $remainder = ($remainder . $part) % 97;
    }

    $checkDigits = str_pad(98 - $remainder, 2, '0', STR_PAD_LEFT);
    return $checkDigits;
}

function generateNIBCheckDigits($bankCode, $branchCode, $accountNumber)
{
    $nib = $bankCode . $branchCode . $accountNumber;
    $weights = [73, 17, 89, 38, 62, 45, 53, 15, 50, 5, 49, 34, 81, 76, 27, 90, 9, 30, 3, 49];
    $sum = 0;
    for ($i = 0; $i < strlen($nib); $i++) {
        $sum += $nib[$i] * $weights[$i];
    }
    $checkDigits = 98 - ($sum % 97);
    return str_pad($checkDigits, 2, '0', STR_PAD_LEFT);
}

function generateExpiryDate()
{
    $currentYear = date('Y');
    $expiryYear = $currentYear + 3;
    $expiryDate = date('Y-m-d', mktime(0, 0, 0, rand(1, 12), 1, $expiryYear));
    return $expiryDate;
}
?>
