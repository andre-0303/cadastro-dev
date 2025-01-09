<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "cadastro_dev"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $conn->real_escape_string($_POST['nome']);
    $email = $conn->real_escape_string($_POST['email']);
    $linguagem = $conn->real_escape_string($_POST['linguagem']);
    $senioridade = $conn->real_escape_string($_POST['senioridade']);
    $desenvolvedor = $conn->real_escape_string($_POST['desenvolvedor']);

    $sql = "INSERT INTO devs (nome, email, linguagem, senioridade, desenvolvedor)
            VALUES ('$nome', '$email', '$linguagem', '$senioridade', '$desenvolvedor')";

    if ($conn->query($sql) === TRUE) {
        echo "Novo registro criado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}
?>
