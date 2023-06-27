<?php

// Conectar ao banco de dados
$host = "localhost";
$username = "root";
$password = "";
$dbname = "database_name";

// Criar conexão
$conn = mysqli_connect($host, $username, $password, $dbname);
// Verificar conexão
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



  $book_id = $_POST['book_title'];
  $book_id = mysqli_real_escape_string($conn, $book_id);
  /*
  Este é um código de consulta SQL que seleciona informações de uma tabela "book_borrow" (bb) e de uma tabela de usuários (u). A consulta junta as informações dessas duas tabelas usando o tipo de junção LEFT JOIN.

A consulta seleciona três colunas:

bb.status: O status de empréstimo do livro na tabela "book_borrow".
bb.borrowed_by: A ID do usuário que pegou emprestado o livro na tabela "book_borrow".
u.name: O nome do usuário na tabela de usuários.
A consulta também especifica uma condição para retornar as informações apenas para o livro especificado pela variável "$book_title". A condição é "WHERE bb.book_id = '$book_title'".
*/

  $query = "SELECT book_borrow.status, book_borrow.user_id, users.name FROM book_borrow  LEFT JOIN users ON  book_borrow.user_id = users.id WHERE book_borrow.id = '$book_id'";

  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $status = $row['book_borrow.status'];
    $borrowed_by = $row['book_borrow.user_id'];
    $name = $row['users.name'];

    if ($status == 0) {
      $status = "Não emprestado";
    } elseif ($status == 1) {
      $status = "Emprestado";
      $borrowed_by = "Emprestado para: $name";
    } else {
      $status = "Devolvido";
    }

    echo "<table>
            <tr>
              <th>Status</th>
              <td>$status</td>
            </tr>
            <tr>
              <th>Emprestado para</th>
              <td>$borrowed_by</td>
            </tr>
          </table>";
  } else {
    echo "Livro não encontrado";
  }


?>