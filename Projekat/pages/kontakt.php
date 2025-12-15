<?php

$servername = "localhost";
$username = "root";   
$password = "";       
$dbname = "kontakt_forma";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Greška: " . $conn->connect_error);
}


$feedback = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $email = $_POST['email'];
    $telefon = $_POST['telefon'];
    $poruka = $_POST['poruka'];

    $sql = "INSERT INTO kontakt_forma (ime, prezime, email, telefon, poruka)
            VALUES ('$ime', '$prezime', '$email', '$telefon', '$poruka')";

    if ($conn->query($sql) === TRUE) {
        $feedback = "<p style='color:green; font-weight:bold;'> Vaša poruka je uspešno poslata!</p>";
    } else {
        $feedback = "<p style='color:red;'> Greška: " . $conn->error . "</p>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon"  href="../	images/slika-stranice.png">
	<title>Baki-Fitness</title>
        <link rel="stylesheet" href="css4.css">
</head>
<body>
<div class="navbar">
        <ul>
                <li><a href="../index.html"> Home </a></li>
                <li><a href="clanovi.html"> Clanovi tima</a></li>
                <li><a href="galerija.html"> Galerija </a></li>
                <li><a href="#"> Kontakt </a></li>
                <li><a href="search.php"> Search </a></li>
        </ul>
</div>

<div class="forma">
<form action="kontakt.php" method="POST">
        <h2> Popunite da biste nas kontaktirali. </h2>

        <p>Ime:</p>
        <input type="text" name="ime" required>

        <p>Prezime:</p>
        <input type="text" name="prezime" required>

        <p>Email:</p>
        <input type="email" name="email" placeholder="example@gmail.com" required minlength="5">

        <p>Telefon:</p>
        <input type="tel" name="telefon" placeholder="+381" required> <br> <br>

        <textarea name="poruka"cols="20" rows="10" maxlength="200" placeholder="Napisite nam poruku" required></textarea>
        
        <br><br><br>
        <button type="submit" id="Potvrda">Submit</button>
</form>
</div>
<script src="script.js"></script>
</body>
</html>