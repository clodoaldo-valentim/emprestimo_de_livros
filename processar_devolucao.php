<?php
// Conectar ao banco de dados
$conn = mysqli_connect ("localhost", "root", "", "database_name");

// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Obter os valores do formulário
  $registration_number = $_POST["registration_number"];
  $user = $_POST["nome"];
  $status = $_POST["status"];

  // Consultar o livro com base no número de registro
  $sql = "SELECT users.name, book_borrow.book_id
  FROM users
  JOIN book_borrow ON users.id = book_borrow.user_id;'";
  $result = mysqli_query($conn, $sql);

  // Verificar se o livro foi encontrado
  if (mysqli_num_rows($result) == 0) {
    header('Location:livro_nao_encontrado.html');
  } else {
    // Obter o ID do livro
    $row = mysqli_fetch_assoc($result);
    $book_id = $row["id"];

    // Consultar o empréstimo do livro com base no ID do livro e ID do usuário
    $sql = "SELECT * FROM book_borrow WHERE book_id = $book_id AND user = $user";
    $result = mysqli_query($conn, $sql);

    // Verificar se o empréstimo foi encontrado
    if (mysqli_num_rows($result) == 0) {
        header('Location:emprestimo_nao_encontrado.html');
    } else {
      // Atualizar o status do empréstimo
      $sql = "UPDATE book_borrow SET status = '$status' WHERE book_id = $book_id AND user_id = $user_id";
      mysqli_query($conn, $sql);

      header('Location:devolucao_com_sucesso.html');
    }
  }
}
?>
