<?php 

$host = "localhost";
$dbname = "agenda2";
$user = "root";
$pass = "";

try {

    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    
    // ativar modo de erros
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
    // erro na conexão
    $error = $e->getMessage();
    echo "erro: $error";
}



?>