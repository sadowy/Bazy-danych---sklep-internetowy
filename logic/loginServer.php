<?php

  session_start();

  $ADMIN = "admin@gruszka.net";
  
  $emailInput = strtolower($_POST['mail']);

  require_once "connect.php";

  $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

  if ($polaczenie->connect_errno!=0)
  {
    echo "Error: ".$polaczenie->connect_errno;
  }
  else if ($emailInput == $ADMIN && $_POST['password'] == "admin" )
  {
    $sql = "SELECT * FROM users WHERE Mail='$ADMIN' AND password='admin'";
    if ($rezultat = @$polaczenie->query($sql))
      {
        $ilu_userow = $rezultat->num_rows;
        if($ilu_userow>0)
        {
          //sesja admina
          $_SESSION['admin'] = true;

          $wiersz = $rezultat->fetch_assoc();
          $_SESSION['mail'] = $wiersz['Mail'];
          $_SESSION['userName'] = $wiersz['Name'];

          unset($_SESSION['blad']);
          $rezultat->free_result();
          header('Location: ../index.php');
        }
      }
      $polaczenie->close();
  }
  else 
  {
    $mail = $emailInput;
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM users WHERE Mail='$mail' AND password='$password'";

    if ($rezultat = @$polaczenie->query($sql))
      {
        $ilu_userow = $rezultat->num_rows;
        if($ilu_userow>0)
        {
          //sesja uzytkownika
          $_SESSION['zalogowany'] = true;

          $wiersz = $rezultat->fetch_assoc();
          $_SESSION['id'] = $wiersz['ID'];
          $_SESSION['mail'] = $wiersz['Mail'];
          $_SESSION['userName'] = $wiersz['Name'];

          unset($_SESSION['blad']);
          $rezultat->free_result();
          header('Location: ../index.php');
        }
        else
        {
            $_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło.</span>';
            header('Location: ../login.php');
        }
      }
    $polaczenie->close();
  }


?>


