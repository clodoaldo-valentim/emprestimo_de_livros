<?php

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$age = $_POST['age'];
$responsible = $_POST['responsible'];

$conn = mysqli_connect("localhost", "username", "password", "database_name");

$sql = "INSERT INTO users (name, phone, email, age, responsible)
VALUES ('$name', '$phone', '$email', '$age', '$responsible')";

if (mysqli_query($conn, $sql)) {
    echo "Usuário adicionado com sucesso.";
} else {
    echo "Erro ao adicionar usuário: " . mysqli_error($conn);
}

mysqli_close($conn);

?>
