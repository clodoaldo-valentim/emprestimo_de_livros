<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "database_name";
$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

//if (isset($_POST['submit'])) {
  // Receber dados do formulário  
  $book_id = $_POST['livro_id'];
  $user_id = $_POST['usuario_id'];
  $borrow_date = $_POST['data_emprestimo'];
  $return_date = $_POST['data_devolucao'];
  // Validar dados do formulário
  /*$errors = [];
  if (empty($user_id)) {
    $errors[] = "O ID do usuário é obrigatório";
  }
  if (empty($book_id)) {
    $errors[] = "O ID do livro é obrigatório";
  }
  if (empty($borrow_date)) {
    $errors[] = "A data de empréstimo é obrigatória";
  }
  if (empty($return_date)) {
    $errors[] = "A data de devolução é obrigatória";
  }

  // Se não houver erros, salvar os dados no banco de dados
  if (empty($errors)) {*/
    $query = "INSERT INTO book_borrow (book_id, user_id, borrow_date, return_date)
              VALUES ('$book_id', '$user_id', '$borrow_date', '$return_date')";
    // Executar a consulta no banco de dados
    $result = mysqli_query($conn, $query);
    if ($result) {
      // Exibir mensagem de sucesso
      echo "Empréstimo realizado com sucesso";
    } else {
      echo "Erro ao registrar empréstimo no banco de dados: " . mysqli_error($conn);
    }
//}

?>
