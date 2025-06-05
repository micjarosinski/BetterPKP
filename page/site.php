<?php
session_start();
require_once("../functions/library.php");
require_once("../functions/trainConn.php");
include_once("../functions/errors.php");
if(isset($_POST["logout"]))
{
    unset($_SESSION["logged"]);
    header("Location: http://localhost/BetterPKP/index.php");
    exit();
}
$logged_cond = condition($_SESSION["logged"]);
if($logged_cond && (time() - $_SESSION["logged"][0]) < 9000)
{
    
}
else
{
    header("Location: http://localhost/BetterPKP/index.php?err=2");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="site_style.css">
    <title>BetterPKP</title>
</head>
<body>
    <header>
        <a href='site.php' id="logo"><h1>BetterPKP</h1></a>
        
        <?php
        if($_SESSION["logged"][2] == "user")
        {
            echo "<a href='zgloszenia.php' class='hdr-btn'>Zostań pracownikiem</a>";
        }
        else
        {
            echo "<a href='employee_tools.php' class='hdr-btn'>Narzędzia pracownika</a>";
        }

        $name = $_SESSION["logged"][1];
        $perm_en = $_SESSION["logged"][2];
        switch($perm_en)
        {
            case "user":
                $perm = "Użytkownik";
                break;
            case "employee":
                $perm = "Pracownik";
                break;
        }
        echo "<div id='info'><p id='name'>{$name}</p><p id='perm'>{$perm}</p></div>";
        

        ?>
        <form action="site.php" method="POST">
            <input type="submit" name="logout" value="Wyloguj się" id="logout">
        </form>
    </header>
    
    <div id="main">
        <form action="site.php" method="POST">
            <label class="select" for="slct">
                <select id="slct" name="from" required="required">
                    <option value="" disabled="disabled" selected="selected">Z:</option>
                    <option value="buk">Buk</option>
                    <option value="otusz">Otusz</option>
                    <option value="dopiewo">Dopiewo</option>
                    <option value="paledzie">Palędzie</option>
                    <option value="poznan_junikowo">Poznań Junikowo</option>
                    <option value="poznan_gorczyn">Poznań Górczyn</option>
                    <option value="poznan_glowny">Poznań Główny</option>
                </select>
                <svg>
                    <use xlink:href="#select-arrow-down"></use>
                </svg>
            </label>
            <label class="select" for="slct">
                <select id="slct" name="to" required="required">
                    <option value="" disabled="disabled" selected="selected">Do:</option>
                    <option value="buk">Buk</option>
                    <option value="otusz">Otusz</option>
                    <option value="dopiewo">Dopiewo</option>
                    <option value="paledzie">Palędzie</option>
                    <option value="poznan_junikowo">Poznań Junikowo</option>
                    <option value="poznan_gorczyn">Poznań Górczyn</option>
                    <option value="poznan_glowny">Poznań Główny</option>
                </select>
                <svg>
                    <use xlink:href="#select-arrow-down"></use>
                </svg>
            </label>

            <svg class="sprites">
                <symbol id="select-arrow-down" viewbox="0 0 10 6">
                    <polyline points="1 1 5 5 9 1"></polyline>
                </symbol>
            </svg>
            <input type="time" name="time" id="time">
            <input type="submit" name="search" value="Wyszukaj połączenia" id="search">
            <?php
                if(substr(get_included_files()[3], -10) == "errors.php") checkErrors();
                if(isset($_POST["search"]))
                {
                    $from_cond = condition($_POST["from"]);
                    $to_cond = condition($_POST["to"]);
                    $time_cond = condition($_POST["time"]);
                    if($from_cond && $to_cond && $time_cond)
                    {
                        $trainConn = new TrainConn($_POST["from"], $_POST["to"], $_POST["time"], "");
                        $trainConn->SearchTrainConn();
                    }
                }
            ?>
        </form>
        
    </div>
    
    <?php

    

    
    ?>
</body>
</html>