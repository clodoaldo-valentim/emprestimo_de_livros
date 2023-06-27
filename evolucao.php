<?php

// Início da sessão
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
  header('Location: login.php');
  exit;
}

// Conexão com o banco de dados
$conn = mysqli_connect('localhost', 'root', '', 'database_name');

// Verifica se a conexão foi estabelecida
if (!$conn) {
  die("Erro ao se conectar ao banco de dados: " . mysqli_connect_error());
}

// Consulta para buscar informações dos livros emprestados
$query = "SELECT books.title, books.author, book_borrow.borrow_date,  book_borrow.return_date
FROM books
JOIN book_borrow ON books.id =  book_borrow.book_id
WHERE  book_borrow.user_id = {$_SESSION['user_id']}
ORDER BY  book_borrow.borrow_date DESC";

// Executa a consulta
$result = mysqli_query($conn, $query);

// Verifica se a consulta retornou resultados
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    // Exibe as informações dos livros emprestados
    echo "Título: {$row['title']} <br>";
    echo "Autor: {$row['author']} <br>";
    echo "Data de empréstimo: {$row['borrow_date']}"."\n";
    echo "Data de devolução: {$row['return_date']}"."\n";
    echo "<hr>";
  }
} else {
  // Exibe uma mensagem caso não hajam livros emprestados
  echo "Você ainda não emprestou nenhum livro.";
}
// Função para adicionar pontos ao usuário quando o livro é devolvido
function addPoints($user_id) {
    $points = 100;
    $date_earned = date('Y-m-d H:i:s');
    $query = "INSERT INTO user_points (user_id, points, date_earned) VALUES ($user_id, $points, '$date_earned')";
    // Executar a consulta no banco de dados
    // ...
  }
  
  // Função para subtrair pontos do usuário quando o livro não é devolvido a tempo
  function subtractPoints($user_id) {
    $points = -100;
    $date_earned = date('Y-m-d H:i:s');
    $query = "INSERT INTO user_points (user_id, points, date_earned) VALUES ($user_id, $points, '$date_earned')";
    // Executar a consulta no banco de dados
    // ...
  }
  
  // Função para obter a pontuação total de um usuário
  function getTotalPoints($user_id) {
    $query = "SELECT SUM(points) as total_points FROM user_points WHERE user_id = $user_id";
    // Executar a consulta no banco de dados e retornar o resultado
    // ...
  }

// Fecha a conexão com o banco de dados
mysqli_close($conn);

?>
