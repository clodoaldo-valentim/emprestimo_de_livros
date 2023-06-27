<?php
//Verificar se o formulário está sendo enviado corretamente:
if (isset($_POST['submit'])) {
  echo "Formulário enviado";
  // ...
}
//Verificar se as variáveis estão sendo preenchidas corretamente:
if (isset($_POST['submit'])) {
    // Receber dados do formulário  
    $book_id = $_POST['book_id'];
    $user_id = $_POST['user_id'];
    $borrow_date = $_POST['borrow_date'];
    $return_date = $_POST['return_date'];
    
    echo "book_id: " . $book_id . "<br>";
    echo "user_id: " . $user_id . "<br>";
    echo "borrow_date: " . $borrow_date . "<br>";
    echo "return_date: " . $return_date . "<br>";
    // ...
  }
  //Verificar se a consulta SQL está sendo montada corretamente:
    if (empty($errors)) {
        $query = "INSERT INTO book_borrow (book_id, user_id, borrow_date, return_date)
                  VALUES ('$book_id', '$user_id', '$borrow_date', '$return_date')";
        echo "SQL: " . $query;
        // ...
      }
      
  

