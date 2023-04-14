<!DOCTYPE html>
<html>
<head>
    <title>Dati dal Database</title>
</head>
<body>
    <?php
    $dbconn = pg_connect("host=localhost dbname=DatabaseProdotti user=postgres password=ltwsql");

    $query = "SELECT * FROM immagini WHERE email='alexdeluca1103@gmail.com'";
    $result = pg_query($dbconn, $query);

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

        echo "<p>ID: $id</p>";
        echo "<p>Email: $email</p>";
        echo "<p>Titolo: $titolo</p>";
        echo "<p>Marca: $marca</p>";
        echo "<p>IsVegano?: $isvegano</p>";
        echo "<p>IsVegetariano?: $isvegetariano</p>";
        echo "<p>IsCeliaco: $isceliaco</p>";
        echo "<p>Scad: $scad</p>";
        echo "<p>Descrizione: $descrizione</p>";
        echo "<p>Immagine: <img src='".$immagine."'/></p>";

    }
    pg_close($dbconn);
    ?>
</body>
</html>
