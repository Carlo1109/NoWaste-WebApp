<?php
  session_start();
  $dbconn = pg_connect("host=localhost user=postgres password=ltwsql port=5432 dbname=DatabaseDonazioniMonetarie");
  
  if (!$dbconn) {
    die("Connessione al database fallita: " . pg_last_error());
  }
  
  $sessionUser = $_SESSION["username"];
  $query = "SELECT * FROM monetaria WHERE email='$sessionUser'";
  $result = pg_query($dbconn, $query);
  
  $prodotti = array();
  while ($row = pg_fetch_assoc($result)) {
    $nome = $row['nome'];
    $cognome = $row['cognome'];
    $email = $row['email'];
    $telefono = $row['telefono'];
    $nascita = $row['nascita'];
    $paese = $row['paese'];
    $provincia = $row['provincia'];
    $citta = $row['citta'];
    $cap = $row['cap'];
    $indirizzo = $row['indirizzo'];
    $importo = $row['importo'];
    $datadon = $row['datadon'];

    $prodotto = array($nome, $cognome, $email, $telefono, $nascita, $paese, $provincia, $citta, $cap, $indirizzo, $importo, $datadon);

    array_push($prodotti, $prodotto);
}
  echo json_encode($prodotti); // Restituzione del dato come JSON
?>
