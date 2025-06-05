<?php
session_start();
require_once("../functions/library.php");
require_once("../functions/trainConn.php");
require_once("../functions/train.php");
$logged_cond = condition($_SESSION["logged"]);
if($logged_cond && (time() - $_SESSION["logged"][0]) < 9000 && $_SESSION["logged"][2] == "employee")
{
    
}
else
{
    header("Location: http://localhost/BetterPKP/page/site.php?err=6");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Narzędzia Pracownika</title>
</head>
<body>
    <h2>Dodaj połączenie</h2>
    <form action="employee_tools.php" method="POST">
        Numer pociągu:<select name="train_id_1">
            <?php
            $train = new Train("", "", "", "");
            $arr = $train->CheckTrainsId();
            @$rowCount = mysqli_num_rows($arr);
            if($rowCount != 0)
            {
                while($row = mysqli_fetch_row($arr))
                {
                    echo "<option value='{$row[0]}'>{$row[0]}</option>";
                }
            }
            ?>
        </select><br>
        Z:<select name="from_1">
            <option value="buk" default>Buk</option>
            <option value="poznan_glowny">Poznań Główny</option>
        </select><br>
        Do:<select name="to_1">
            <option value="buk">Buk</option>
            <option value="poznan_glowny" default>Poznań Główny</option>
        </select><br>
        Godzina wyjazdu:<input type="time" name="time_1"><br>
        <input type="submit" name="add_conn" value="Dodaj połączenie">
    </form>
    <br>
    <h2>Dodaj pociąg</h2>
    <form action="employee_tools.php" method="POST">
        Numer pociągu:<input type="text" name="train_id_2"><br>
        Liczba miejsc:<input type="number" name="seats_c" maxlength="3"><br>
        Liczba wagonów:<input type="number" name="carr_c"><br>
        Maksymalna prędkość pociągu (w km/h):<input type="number" name="max_speed"><br>
        <input type="submit" name="add_train" value="Dodaj pociąg">
    </form>
    <br>
    <h2>Usuń połączenie</h2>
    <form action="employee_tools.php" method="POST">
        Numer pociągu:<select name="train_id_3">
            <?php
            $train = new Train("", "", "", "");
            $arr = $train->CheckTrainsId();
            @$rowCount = mysqli_num_rows($arr);
            if($rowCount != 0)
            {
                while($row = mysqli_fetch_row($arr))
                {
                    echo "<option value='{$row[0]}'>{$row[0]}</option>";
                }
            }
            ?>
        </select><br>
        Z:<select name="from_2">
            <option value="buk" default>Buk</option>
            <option value="poznan_glowny">Poznań Główny</option>
        </select><br>
        Do:<select name="to_2">
            <option value="buk">Buk</option>
            <option value="poznan_glowny" default>Poznań Główny</option>
        </select><br>
        Godzina wyjazdu:<input type="time" name="time_2"><br>
        <input type="submit" name="del_conn" value="Usuń połączenie">
    </form>
    <br>
    <h2>Usuń pociąg</h2>
    <form action="employee_tools.php" method="POST">
        Numer pociągu:<input type="text" name="train_id_4"><br>
        <input type="submit" name="del_train" value="Usuń pociąg">
    </form>
    <?php
    if(isset($_POST["add_conn"]))
    {
        $train_id_1_cond = condition($_POST["train_id_1"]);
        $from_cond_1 = condition($_POST["from_1"]);
        $to_cond_1 = condition($_POST["to_1"]);
        $time_cond_1 = condition($_POST["time_1"]);
        if($train_id_1_cond && $from_cond_1 && $to_cond_1 && $time_cond_1)
        {
            $trainConn = new TrainConn($_POST["from_1"], $_POST["to_1"], $_POST["time_1"], $_POST["train_id_1"]);
            $trainConn->AddTrainConn();
        }
    }
    
    if(isset($_POST["add_train"]))
    {
        $train_id_2_cond = condition($_POST["train_id_2"]);
        $seats_c_cond = condition($_POST["seats_c"]);
        $carr_c_cond = condition($_POST["carr_c"]);
        $max_speed_cond = condition($_POST["max_speed"]);

        if($train_id_2_cond && $seats_c_cond && $carr_c_cond && $max_speed_cond)
        {
            $train = new Train($_POST["train_id_2"], $_POST["seats_c"], $_POST["max_speed"], $_POST["carr_c"]);
            $train->AddTrain();
        }
    }

    if(isset($_POST["del_conn"]))
    {
        $train_id_3_cond = condition($_POST["train_id_3"]);
        $from_cond_2 = condition($_POST["from_2"]);
        $to_cond_2 = condition($_POST["to_2"]);
        $time_cond_2 = condition($_POST["time_2"]);
        if($train_id_3_cond && $from_cond_2 && $to_cond_2 && $time_cond_2)
        {
            $trainConn = new TrainConn($_POST["from_2"], $_POST["to_2"], $_POST["time_2"], $_POST["train_id_3"]);
            $trainConn->DeleteTrainConn();
        }
    }

    if(isset($_POST["del_train"]))
    {
        $train_id_4_cond = condition($_POST["train_id_4"]);

        if($train_id_4_cond)
        {
            $train = new Train($_POST["train_id_4"], "", "", "");
            $train->DeleteTrain();
        }
    }
    ?>
</body>
</html>