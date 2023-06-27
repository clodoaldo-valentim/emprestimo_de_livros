
  <!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
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
    <link rel="manifest" href="manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    
  </head>
  <body>
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
  $sql = "SELECT id, title, author  FROM books";
  $result = mysqli_query($conn, $sql);
  
  // Verificar se há resultados
  if (mysqli_num_rows($result) > 0) {
    // Loop para exibir cada linha de resultado
    while($row = mysqli_fetch_assoc($result)) {
      echo "ID: " . $row["id"]. " - Título: " . $row["title"]. " - Autor: " . $row["author"]. "" . "<br>";
    }
  } else {
    header('Location: nenhum_resuitado_encontrado.html');
  }
  
  // Fechar conexão
  mysqli_close($conn);
  ?>
</body>
</html>
