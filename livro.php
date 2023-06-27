<?php

$title = $_POST['title'];
$author = $_POST['author'];
$subject = $_POST['subject'];
$edition = $_POST['edition'];
$year = $_POST['year'];
$registration_number = $_POST['registration_number'];
$call_number = $_POST['call_number'];
$publication_year = $_POST['publication_year'];
$city = $_POST['city'];

$conn = mysqli_connect("localhost", "username", "password", "database_name");

$sql = "INSERT INTO books (title, author, subject, edition, year, registration_number, call_number, publication_year, city)
VALUES ('$title', '$author', '$subject', '$edition', '$year', '$registration_number', '$call_number', '$publication_year', '$city')";

if (mysqli_query($conn, $sql)) {
    echo "Livro adicionado com sucesso.";
} else {
    echo "Erro ao adicionar livro: " . mysqli_error($conn);
}

mysqli_close($conn);

?>
