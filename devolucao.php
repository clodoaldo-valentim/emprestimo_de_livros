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
<form method="POST" action="registrar_devolucao.php">
  <label for="titulo_livro">Título do livro:</label>
  <input type="text" id="titulo_livro" name="titulo_livro">

  <label for="return_date">Data de Devolução:</label>
<input type="date" id="return_date" name="return_date" required>
</div>
<div class="form-group">
<label for="returned">Devolvido?</label>
<select id="returned" name="returned" required>
<option value="">Selecione...</option>
<option value="0">Não</option>
<option value="1">Sim</option>
</select>
</div>
<button type="submit" class="btn btn-primary">Registrar Devolução</button>
</form>
</div>

  </div>
</body>
</html>
