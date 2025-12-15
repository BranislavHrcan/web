<?php

$servername = "localhost";
$username = "root";   
$password = "";       
$dbname = "kontakt_forma";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Greška pri konekciji: " . $conn->connect_error);
}

$rezultat = "";
if (isset($_POST['pretraga'])) {
    $unos = $_POST['unos'];

    
    $sql = "SELECT * FROM kontakt_forma 
            WHERE ime LIKE '%$unos%' OR email LIKE '%$unos%'";

    $res = $conn->query($sql) or die("Greška u upitu: " . $conn->error);

    if ($res->num_rows > 0) {
        $rezultat .= "<table border='1' cellpadding='10'>";
        $rezultat .= "<tr>
                        <th>Ime</th>
                        <th>Prezime</th>
                        <th>Email</th>
                        <th>Telefon</th>
                        <th>Poruka</th>
                      </tr>";
        while ($row = $res->fetch_assoc()) {
            $rezultat .= "<tr>
                            <td>".$row['ime']."</td>
                            <td>".$row['prezime']."</td>
                            <td>".$row['email']."</td>
                            <td>".$row['telefon']."</td>
                            <td>".$row['poruka']."</td>
                          </tr>";
        }
        $rezultat .= "</table>";
    } else {
        $rezultat = "<p style='color:red;'>Nema rezultata za uneti pojam.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pretraga poruka</title>
    <link rel="stylesheet" href="css5.css">
</head>
<body>
    <div class="navbar">
        <ul>
            <li><a href="../index.html"> Home </a></li>
            <li><a href="clanovi.html"> Clanovi tima</a></li>
            <li><a href="galerija.html"> Galerija </a></li>
            <li><a href="kontakt.php"> Kontakt </a></li>
            <li><a href="search.php"> Search </a></li>
        </ul>
    </div>
    <div class="search">
    <h2>Pretraži poruke</h2>
    <form method="post" action="">
        <input type="text" name="unos" placeholder="Unesi ime ili email" required>
        <button type="submit" name="pretraga">Pretraga</button>
    </form>
</div>
    <br>
     <?php echo $rezultat; ?>
</body>
</html>
