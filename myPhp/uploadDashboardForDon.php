<!--
  Questo file php gestisce la richiesta AJAX per caricare i dati relativi alle richieste effettuate dal database delle richieste, cosi da poter popolare le dashboard DONATORE. 
-->
<?php
  session_start();
  $dbconn = pg_connect("host=localhost user=postgres password=ltwsql port=5432 dbname=DatabaseRichieste");
  
  if (!$dbconn) {
    die("Connessione al database fallita: " . pg_last_error());
  }
  
  $sessionUser = $_SESSION["username"];
  $query = "SELECT * FROM richieste WHERE caricatoda='$sessionUser'";
  $result = pg_query($dbconn, $query);
  
  $richieste = array();
  while ($row = pg_fetch_assoc($result)) {
    $prodotto = $row['prodotto'];
    $quantita = $row['quantita'];
    $richiestoda = $row['richiestoda'];
    $datarichiesta = $row['datarichiesta'];

    $richiesta = array($prodotto, $quantita, $richiestoda, $datarichiesta);

    array_push($richieste, $richiesta);
}
  echo json_encode($richieste); // Restituzione del dato come JSON
?>