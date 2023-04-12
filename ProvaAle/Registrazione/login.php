<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<body>
  <?php
    session_start();
    $email = $_POST["username"];
    $dbconn = pg_connect("host=localhost user=postgres password=password port=5433 dbname=DatabaseUtenti");
    $query = "SELECT * FROM utente where email=$1";
    $result = pg_query_params($dbconn,$query,array($email));
    if ($line=pg_fetch_array($result)) {
      $pswd = $_POST["psw"];
      $query2 = "SELECT * FROM utente WHERE email=$1 and pswd=$2";
      $result = pg_query_params($dbconn,$query2,array($email, $pswd));
      if ($line=pg_fetch_array($result)) {
        $_SESSION["logged_in"] = true;
        $_SESSION["username"] = $_POST["username"];
        header("Location: index.php?login=success");
        exit(); 
      }
      else {
        die("Il login non è andato a buon fine");
      }
    }
    else {
      echo "L'utente non è registrato";
    }
  ?>
</body>
</html>