<?php
session_start();
require_once("../functions/library.php");
require_once("../functions/user.php");
$logged_cond = condition($_SESSION["logged"]);
if($logged_cond && (time() - $_SESSION["logged"][0]) < 9000)
{
    
}
else
{
    header("Location: http://localhost/BetterPKP/index.php?err=2");
    exit();
}
if(isset($_POST["zgloszenie"]))
{
    $user = new User("", "", $_SESSION["logged"][1], "");
    $user->AddPermission();
    echo "<p style='font-size:15pt; color: red;'>Brawo! Zostałeś pracownikiem naszej firmy! Za chwilę zostaniesz przekierowany.</p>";
    $_SESSION["logged"][2] == "employee";
    header("Refresh:5; url='http://localhost/BetterPKP/page/site.php'");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zgłoszenia o pracę</title>
</head>
<body>
    <p>
        Zgłoś się do nas o pracę!<br>
        Oferujemy:<br>
        -nieelastyczne godziny pracy<br>
        -złe samopoczucie<br>
        -stary i niedynamiczny zespół<br>
        -skarpety z logiem BetterPKP
    </p><br>
    <form action="zgloszenia.php" method="POST">
        Załącz CV:<input type="file"><br>
        <input type="submit" value="Wyślij" name="zgloszenie">
    </form>
</body>
</html>