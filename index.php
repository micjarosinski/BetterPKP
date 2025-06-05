<?php
session_start();
include_once("./functions/errors.php");
if((time() - @$_SESSION["logged"][0]) < 900)
{
    header("Location: http://localhost/BetterPKP/page/site.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="index_script.js"></script>
    <link rel="stylesheet" href="index_style.css">
    <title>BetterPKP</title>
</head>
<body>
    <div id="logowanie">
        <form action="./page/logowanie.php" method="POST">
            <h1>BetterPKP</h1>
            <input type="email" name="email" placeholder="Email"><br>
            <input type="password" name="pswd" placeholder="Hasło"><br>
            <input type="submit" value="Zaloguj"><br>
            <input type="button" value="Zarejestruj się" onClick="btn1()">
        </form>
        <?php
            if(substr(get_included_files()[1], -10) == "errors.php") checkErrors();
        ?>
    </div>
    <div id="rejestracja">
        <form action="./page/rejestracja.php" method="POST">
            <input type="name" name="name" placeholder="Imię i Nazwisko"><br>
            <input type="email" name="email" placeholder="Email"><br>
            <input type="password" name="pswd" placeholder="Hasło"><br>
            <input type="password" name="pswd_r" placeholder="Powtórz Hasło"><br>
            <label class="select" for="slct">
            <select id="slct" name="ulga" required="required">
                <option value="" disabled="disabled" selected="selected">Wybierz ulgę</option>
                <option value="normalny">Normalny</option>
                <option value="uczen">Uczeń (do 24 lat.) - 37% ulgi</option>
                <option value="dziecko">Dziecko do lat 4. - 100% ulgi</option>
                <option value="doktorant">Doktorant (do 35 lat.) - 51% ulgi</option>
                <option value="weteran">Weteran - 37% ulgi</option>
            </select>
            <svg>
                <use xlink:href="#select-arrow-down"></use>
            </svg>
            </label>
            <svg class="sprites">
                <symbol id="select-arrow-down" viewbox="0 0 10 6">
                    <polyline points="1 1 5 5 9 1"></polyline>
                </symbol>
            </svg><br>
            <input type="submit" value="Zarejestruj"><br>
            <input type="button" value="Wróć do logowania" onClick="btn2()">
        </form>
    </div>
</body>
</html>