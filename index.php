<?php
session_start();
if (!isset($_COOKIE["tempo"])) {

    $scritta = "Benvenuto nel  nostro sito";
    $tempo = date('d/m/Y');
    setcookie("tempo", $tempo, time() + (86400 * 30));
} else {
    $tempo = date('d/m/Y');
    $scritta = "Bentornato sul nostro sito, non ci vediamo da:" . $tempo;

    setcookie("tempo", $tempo, time() + (86400 * 30));
}

if (isset($_SESSION["active_login"])) header("Location: teatro.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>

<body>
    <div class="contenitore">


        <div class="form">
            <script>
                alert("<?= $scritta ?>");
            </script>

            <div class="cerchio"></div>
            <form action="" method="post">
                <input type="text" name="username" placeholder="Username"><img src="img/email.png" width="20px" height="20px" alt="">
                <input type="password" name="password" placeholder="password"><img src="img/padlock.png" width="20px" height="20px" alt="">
                <input class="submit" type="submit" name="submit" value="Accedi">
                <h2>
                <?php
                if (isset($_POST["submit"])) {
                    $user = $_POST["username"];
                    $psw  = $_POST["password"];

                    if ($user == "utente" && $psw == "locale") {
                        $_SESSION["active_login"] = $user;
                        header("Location: teatro.php");
                    } else echo $error = "Username o password errati!";
                }
                ?>
                </h2>
            </form>
        </div>
    </div>
</body>

<script src="./script.js"></script>

</html>