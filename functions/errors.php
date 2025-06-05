<?php
require_once("library.php");
function checkErrors() {
    if(condition(@$_GET["err"]))
    {
        $err = $_GET["err"];
        switch($err)
        {
            case 1:
                echo "<p style='color: red;'>Uzupełnij wszystkie pola!</p>";
                break;
            case 2:
                echo "<p style='color: red;'>Najpierw zaloguj się!</p>";
                break;
            case 3:
                echo "<p style='color: red;'>Niezgodne informacje!</p>";
                break;
            case 4:
                echo "<p style='color: red;'>Nie można jechać z tej samej stacji do której się jedzie!</p>";
                break;
            case 5:
                echo "<p style='color: red;'>Brak połączeń po tej godzinie!</p>";
                break;
            case 6:
                echo "<p style='color: red;'>Brak uprawnień!</p>";
                break;
            case 7:
                echo "<p style='color: red;'>Brak takiego połączenia!</p>";
                break;
            case 8:
                echo "<p style='color: red;'>Brak takiego pociągu!</p>";
                break;
        }
    }
}
?>