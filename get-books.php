<?php
// Conexão com o banco de dados
$servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "database_name";
$conn = mysqli_connect("localhost", "root", "", "database_name");

// Verificação da conexão
if (mysqli_connect_errno()) {
  echo "Falha ao conectar ao MySQL: " . mysqli_connect_error();
  exit();
}

// Consulta SQL para selecionar todos os livros
$sql = "SELECT title, author, subject FROM books";
$result = mysqli_query($conn, $sql);

// Verificação do resultado da consulta
if (mysqli_num_rows($result) > 0) {
  // Array para armazenar os livros
  $books = array();
  
  // Loop através dos resultados da consulta
  while ($row = mysqli_fetch_assoc($result)) {
    // Adiciona cada livro ao array
    $books[] = $row;
  }
  
  // Imprime o resultado em formato JSON
  header('Content-Type: application/json');
  echo json_encode($books);
} else {
  echo "Nenhum livro encontrado.";
}

// Fecha a conexão com o banco de dados
mysqli_close($conn);
?>
