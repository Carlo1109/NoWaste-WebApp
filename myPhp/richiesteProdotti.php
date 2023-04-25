<?php
// Connessione al database Postgres
$dbcon = pg_connect("host=localhost user=postgres password=ltwsql port=5432 dbname=DatabaseRichieste");

// Recupera i dati inviati tramite la richiesta POST
$data = json_decode(file_get_contents('php://input'), true);

// Inserisci i dati nella tabella richieste Postgres
$darichiesta = date('Y-m-d');
foreach ($data as $row) {
  $prodotto = pg_escape_string($row['prodotto']);
  $quantita = pg_escape_string($row['quantita']);
  $caricatoda = pg_escape_string($row['caricatoDa']);
  $richiestoda = pg_escape_string($row['richiestoDa']);
  $query = "INSERT INTO richieste (prodotto, quantita, caricatoda, richiestoda, datarichiesta) VALUES ('$prodotto', '$quantita','$caricatoda', '$richiestoda', '$darichiesta')";
  pg_query($dbcon, $query);
}

// Chiudi la connessione al database
pg_close($dbcon);

// Restituisci una risposta JSON al client
$response = array('success' => true);
echo json_encode($response);
?>