<?php

// Conecte-se ao banco de dados
$host = "localhost";
$username = "root";
$password = "";
$dbname = "database_name";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

// Recuperar os dados do formulário de cadastro de usuários
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$age = $_POST['age'];
$birth = $_POST['birth'];
$guardian = $_POST['responsib
// Verificar se os dados já existem no banco de dados
$check_query = "SELECT * FROM users WHERE email = '$email'";
$check_result = mysqli_query($conn, $check_query);

if (mysqli_num_rows($check_result) > 0) {
    header('Location: usuario_ja_existe.html');
    exit;
}

// Inserir os dados no banco de dados
$query = "INSERT INTO users (name, phone, email, age, birth, responsible) VALUES ('$name', '$phone', '$email', $age, '$birth', '$guardian')";

if (mysqli_query($conn, $query)) {
    header('Location: sucesso.html');
} else {
    header('Location: erro_cad_usuario.html');
}

// Fechar a conexão com o banco de dados
mysqli_close($conn);

?>
