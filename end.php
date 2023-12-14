<?php
session_start();

if (!isset($_SESSION["active_login"])) header("Location:index.php");
$user = $_SESSION["active_login"];


if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (isset($_GET["back"])) {
        header("Location: teatro.php");
    }
    if (isset($_GET["logout"])) {
        unset($_SESSION["active_login"]);
    }
}




$to = $_SESSION['email'];
$oggetto = 'Conferma prenotazione';
$corpo_email = "Signor " . $_SESSION['nominativo'] . " , la ringraziamo per avere comprato il biglietto per il " . $_SESSION['data'] . " !!! Le ricordiamo che e' severamente proibito fare foto e video allo spettacolo.";

mail($to, $oggetto, $corpo_email);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style4.css">
    <title>Venduto</title>
</head>

<body>
    <div class="contenitore">
        <div class="nav">
            <div class="nav_ul">
                <ul>
                    <li>Palace Theatre</li>
                    <li><a href="?back=ok">indietro</a></li>
                    <li><a href="?logout=ok">logout</a></li>
                </ul>
            </div>
        </div>

        <div class="corpo">

            <?php
            $scritta = <<< HTML
                    <h2>Proprietario biglietto: $_SESSION[nominativo]<h2>
                        <h2>Eta: $_SESSION[eta]</h2>
                        <h2>Biglietto per il giorno: $_SESSION[data]</h2>
                        <h2>Data inizio: $_SESSION[ora]</h2>
                        <h2>Durata: 4h</h2>
                        <h2>Email di conferma inviata a: $_SESSION[email]</h2>

                HTML;
            echo $scritta;
            ?>
        </div>
</body>

</html>