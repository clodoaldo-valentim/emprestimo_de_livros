<?php
  // Conexão com o banco de dados
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "database_name";
  
  // Criar conexão
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  
  // Verificar conexão
  if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
  }
  
  // Consulta aos livros
  $sql = "SELECT books.registration_number, books.title, book_borrow.borrow_date, book_borrow.return_date, book_borrow.status, users.name
  FROM books
  INNER JOIN book_borrow ON books.id = book_borrow.book_id
  INNER JOIN users ON users.id = book_borrow.user_id";
  $result = mysqli_query($conn, $sql);
  
  // Verificar se há resultados
  if (mysqli_num_rows($result) > 0) {
    // Loop para exibir cada linha de resultado
    while($row = mysqli_fetch_assoc($result)) {
      echo "Registro: " . $row["registration_number"]. " - Título: " . $row["title"]. " - Empréstimo: " . $row["borrow_date"]." - Devolução: " . $row["return_date"]. " - Status: " . $row["status"]. " - Nome: " . $row["name"]."" . "<br>";
    }
  } else {
    header('Location: nenhum_resuitado_encontrado.html');
  }
  
  // Fechar conexão
  mysqli_close($conn);
  