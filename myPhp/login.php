<!DOCTYPE html>
<html lang="ita">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../libraries/sweetalert2.min.css">
  <script src="../libraries/sweetalert2.all.min.js"></script>
  <title>Login</title>
</head>
<body>
  <?php
    session_start();
    $email = $_POST["username"];
    $dbconn = pg_connect("host=localhost user=postgres password=ltwsql port=5432 dbname=DatabaseUtenti");
    $query = "SELECT * FROM utente where email=$1";
    $result = pg_query_params($dbconn,$query,array($email));
    if ($line=pg_fetch_array($result)) {
      $pswd = $_POST["psw"];
      $query2 = "SELECT * FROM utente WHERE email=$1 and pswd=$2";
      $result = pg_query_params($dbconn,$query2,array($email, $pswd));
      if ($line=pg_fetch_array($result)) {
        $query3 = "SELECT nomeass FROM utente WHERE email="."'"."$email"."'";
        $result = pg_query($query3);
        $line = pg_fetch_assoc($result);
        if ($line["nomeass"]==null) { //non è una associazione
          $_SESSION["assBoolean"]=false;
        }
        else {
          $_SESSION["assBoolean"]=true;
        }
        $_SESSION["logged_in"] = true;
        $_SESSION["username"] = $_POST["username"];
        $_SESSION["pswCurr"] = $_POST["psw"];
        header("Location: ../pages/index.php?login=success");
        exit(); 
      }
      else {
        $_SESSION["login_error_psw"] = "La password inserita non è corretta";
      }
    }
    else {
      $_SESSION["login_error_unreg"] = "L'utente non è registrato, clicca OK per registrarti.";
    }
  ?>
  <script>
  <?php
  if (isset($_SESSION["already_reg"])){
    echo 'Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "' . $_SESSION["already_reg"] . '"
    });';
    unset($_SESSION["already_reg"]);
  }
  if(isset($_SESSION["success"])){
    echo 'Swal.fire({
      icon: "success",
      title: "Successo!",
      text: "' . $_SESSION["success"] . '"
    });';
    unset($_SESSION["success"]);
  }
  ?>
</script>
</body>
</html>