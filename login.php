<?php
  session_start();
  // Conectar ao banco de dados
  $host = "localhost";
$username = "u216342583_mj";
$password = "*Eu212223";
$dbname = "u216342583_database_name";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}
  // ...
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recuperar dados do formulário
    $email = $_POST['email'];
    $password = $_POST['password'];
    // Consultar usuário no banco de dados
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    // Executar consulta
    $result = mysqli_query($conn, $query);
    // Verificar se o usuário existe
    if (mysqli_num_rows($result) > 0) {
      // Armazenar dados do usuário na sessão
      $user = mysqli_fetch_assoc($result);
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['user_name'] = $user['name'];
      // Redirecionar para a página inicial
      header('Location: painel.html');
      exit;
    } else {
      // Exibir mensagem de erro
      header('Location: email_senha_invalidos.html');
    }
  }
?>
