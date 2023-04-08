<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
    $email = $_POST["email"];
    $password = $_POST["password"];
    $nomeP = $_POST["nomeP"];
    $cognomeP = $_POST["cognomeP"];
    $idAzienda = $_POST["idAzienda"];
    $nomeAssociazione = $_POST["nomeAssociazione"];
    $tel = $_POST["telDonatore"];
    if ($_POST["telDonatore"]=="") {
      $tel = $_POST["telAssociazione"];
    }

  ?>
</body>
</html>