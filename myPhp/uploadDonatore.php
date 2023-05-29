<!--
  Questo file php è utilizzato per poter popolare la pagina DONATORE e visualizzare i prodotti caricati dal donatore loggato. Interagisce con il database dei prodotti.
-->
<?php
  session_start();
  $dbconn = pg_connect("host=localhost user=postgres password=ltwsql port=5432 dbname=DatabaseProdotti");
  
  if (!$dbconn) {
    die("Connessione al database fallita: " . pg_last_error());
  }
  
  $sessionUser = $_SESSION["username"];
  $query = "SELECT * FROM immagini WHERE email='$sessionUser'";
  $result = pg_query($dbconn, $query);
  
  $prodotti = array();
  while ($row = pg_fetch_assoc($result)) {
    $id = $row['id'];
    $email = $row['email'];
    $titolo = $row['titolo'];
    $marca = $row['marca'];
    $isvegano = $row['isvegano'];
    $isvegetariano = $row['isvegetariano'];
    $isceliaco = $row['isceliaco'];
    $scad = $row['scad'];
    $descrizione = $row['descrizione'];
    $immagineBytea = $row['immagine'];
    $immagineBin = pg_unescape_bytea($immagineBytea);

    $immagineBase64 = base64_encode($immagineBin);

    $immagine = "data:image/jpeg;base64,$immagineBase64";

    $prodotto = array($id, $email, $titolo, $marca, $isvegano, $isvegetariano, $isceliaco, $scad, $descrizione, $immagine);

    //immagine è il percorso dell'immagine quindi quando la devi stampare metti <img src='...'/> 

    array_push($prodotti, $prodotto);
}
  echo json_encode($prodotti); // Restituzione del dato come JSON
?>
