<?php
  $title = $_POST['title'];
  $author = $_POST['author'];
  $subject = $_POST['subject'];
  $edition = $_POST['edition'];
  $year = $_POST['year'];
  $registration_number = $_POST['registration-number'];
  $call_number = $_POST['call-number'];
  $publication_year = $_POST['publication-year'];
  $city = $_POST['city'];

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "database_name";

  // Cria a conexão com o banco de dados
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Verifica se a conexão foi bem-sucedida
  if ($conn->connect_error) {
      die("Falha na conexão: " . $conn->connect_error);
  }

  $sql = "INSERT INTO books (title, author, subject, edition, year, registration_number, call_number, publication_year, city)
  VALUES ('$title', '$author', '$subject', '$edition', '$year', '$registration_number', '$call_number', '$publication_year', '$city')";

  if ($conn->query($sql) === TRUE) {
    header('Location: sucesso_livro.html');
  } else {
    header('Location: erro_livro.html');
  }

  $conn->close();
?>
