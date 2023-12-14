<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (isset($_GET["back"])) {
        header("Location: teatro.php");
    }
    if (isset($_GET["logout"])) {
        unset($_SESSION["active_login"]);
    }
}


if (isset($_POST['submit'])) {
    header("Location: end.php");
}

if (!isset($_SESSION["active_login"])) header("Location:index.php");

$user = $_SESSION["active_login"];

if ($_SESSION['eta'] > 18)
    $sconto = "intero";
else
    $sconto = "scontanto";



switch ($_SESSION['posto']) {
    case "Balcony":
        $prezzo = 106 * $_SESSION['qty'];
        break;

    case "Grand circle":
        $prezzo = 138 * $_SESSION['qty'];
        break;

    case "Dress circle":
        $prezzo = 162 * $_SESSION['qty'];
        break;

    case "Stalls":
        $prezzo = 186 * $_SESSION['qty'];
}

if ($_SESSION['eta'] > 18)
    $totale = $prezzo;
else {
    $togliere = $prezzo * 10 / 100;
    $totale = $prezzo - $togliere;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style3.css">
    <title>Scontrino</title>
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
            <div class="scritte">
                <h2><b>Palace Theater</b></h2>
                <h2>113 Shaftesbury Ave</h2>
                <h2>Londra</h2>
            </div>

            <?php
            $scritta = <<< HTML
            <div class="corpo_scontrino">
                <h2>$_SESSION[qty]  X  $_SESSION[posto]</h2>
                <h2>Data:  $_SESSION[data]  alle ore:  $_SESSION[ora]</h2>
                <h2>Biglietto di: $_SESSION[nominativo] Prezzo: $sconto</h2>
                <h3>TOTALE: $totale$</h3>
                <div class="bottone">
                <form action="" method="post">
                    <input type="submit" name="submit" value="Conferma acquisto">
                </form>
            </div>



           

            HTML;
            echo $scritta;
            ?>
        </div>

    </div>
    </div>
</body>

</html>