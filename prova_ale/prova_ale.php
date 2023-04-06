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
  $dbconn = pg_connect("host=localhost password=password user=postgres port=5433 dbname=prova_ale") or die("Errore di connesione: " . preg_last_errork());
?>
</body>
</html>