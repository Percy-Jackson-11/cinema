<?php
session_start();

if (isset($_COOKIE["tempo"])) {

    $tempo = date('d/m/Y');
    $scritta = "Bentornato sul nostro sito, non ci vediamo da:" . $tempo;

    setcookie("tempo", $tempo, time() + (86400 * 30));
}

if (isset($_POST["logout"])) unset($_SESSION["active_login"]); //se attivo il logout (bottone sotto) chiudi la sessione
if (!isset($_SESSION["active_login"])) header("Location:index.php"); // se non è stata attivata la sessione torna alla pagina precedente

$user = $_SESSION["active_login"]; //assegna a $user il nome memorizzato 

if (isset($_POST['submit'])) {
    var_dump($_POST);
    $_SESSION['nominativo'] = $_POST['nominativo'];
    $_SESSION['eta'] = $_POST['eta'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['data'] = $_POST['data'];
    $_SESSION['ora'] = $_POST['ora'];
    $_SESSION['posto'] = $_POST['posto'];
    $_SESSION['qty'] = $_POST['qty'];
    header("Location:scontrino.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>The Chursed Child</title>
</head>

<body>
    <div class="contenitore">
        <script>
            alert("<?= $scritta ?>");
        </script>
        <div class="nav">
            <ul>
                <li><img src="img/ticket.png" alt="" onclick="apri_biglietto()"></li>
                <form method="post">
                    <li><input class="logout" type="submit" value="" name="logout"></li>
                </form>
            </ul>
        </div>
        <div class="corpo">
            <h2>Harry Potter and The Cursed Child</h2>
            <div class="testo">
                <p>He comes to see the unique and inimitable theatre show sequel to Harry Potter. Discover the hard inheritance that must bring the son of the One who lives and the mission that this, together with the best friend Scorpius will face in order not to help a father destroyed by the death of his son.</p>
            </div>
            <input type="button" onclick="apri_biglietto()" value="Prenota il biglietto">
            <input type="button" onclick="apri_piantina()" value="Vedi piantina">
        </div>

        <div class="piantina">
            <img src="img/piantina.png" alt="">
        </div>
        <div class="biglietto">
            <div class="titolo">
                <h2>Biglietto</h2>
            </div>
            <div class="form_biglietto">
                <form action="" method="post">
                    <div class="input_biglietto">
                        <h2>Proprietario</h2>
                        <input type="text" name="nominativo" placeholder="Nominativo" required>
                        <input type="number" name="eta" placeholder="eta" min="1" max="99" required>
                        <input type="email" name="email" placeholder="email" required>
                    </div>
                    <div class="input_biglietto">
                        <h2>Quando</h2>
                        <input type="date" name="data" required>
                        <select name="ora" required>
                            <option value="1">19:30</option>
                            <option value="2">20:45</opiton>
                            <option value="3">21:30</opiton>
                        </select>
                    </div>
                    <div class="input_biglietto">
                        <h2>Posto</h2>
                        <select name="posto" required>
                            <option value="Balcony">Balcony 106£</option>
                            <option value="Grand circle">Grand circle 138£</option>
                            <option value="Dress circle">Dress circle 162£</option>
                            <option value="Stalls">Stalls 186£</option>
                        </select>
                        <input type="number" name="qty" value="1" min="1" max="10" required>
                    </div>
                    <div class="input_biglietto">
                        <input type="submit" name="submit" value="prenota">
                    </div>
                </form>
            </div>
        </div>
        <div class="img_logo">
            <img src="img/logo_cursed.png" width="500px" height="720px" alt="">
        </div>
    </div>
</body>

<script src="./script2.js"></script>

</html>