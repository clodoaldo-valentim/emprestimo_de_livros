<!DOCTYPE html>
<html>
<head>
  <title>Consultar Status do Livro</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="manifest" href="/manifest.json">
    <!--Favicon-->
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <script>
      //pwa -  registrar o service worker
    if ('serviceWorker' in navigator) {
      window.addEventListener('load', function() {
        navigator.serviceWorker.register('/sw.js').then(function(registration) {
          console.log('Service worker registered: ', registration);
        }, function(err) {
          console.log('Service worker registration failed: ', err);
        });
      });
    }
  </script>
</head>
<body>  
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



  $book_title = $_POST['book_title'];
  $book_title = mysqli_real_escape_string($conn, $book_title);
  /*
  Este é um código de consulta SQL que seleciona informações de uma tabela "book_borrow" (bb) e de uma tabela de usuários (u). A consulta junta as informações dessas duas tabelas usando o tipo de junção LEFT JOIN.

A consulta seleciona três colunas:

bb.status: O status de empréstimo do livro na tabela "book_borrow".
bb.borrowed_by: A ID do usuário que pegou emprestado o livro na tabela "book_borrow".
u.name: O nome do usuário na tabela de usuários.
A consulta também especifica uma condição para retornar as informações apenas para o livro especificado pela variável "$book_title". A condição é "WHERE bb.book_id = '$book_title'".
*/

$query = "SELECT books.title, users.name AS user_name, book_borrow.borrow_date, book_borrow.return_date, book_borrow.status, book_borrow.user_id
FROM book_borrow
JOIN books ON book_borrow.book_id = books.id
JOIN users ON book_borrow.user_id = users.id
WHERE books.title = '$book_title' AND book_borrow.status = 1";

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
$row = mysqli_fetch_assoc($result);
$status = $row['status'];
$borrowed_by = $row['user_id'];
$name = $row['user_name'];

if ($status == 0) {
$status = "Não emprestado";
} elseif ($status == 1) {
$status = "Emprestado";
$borrowed_by = "$name";
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
echo "<h1>Livro não encontrado<h1/>";
header('Location: consulta_status_do_livro.html');
exit;
}

?>
</body>
</html>