<?php
require_once("library.php");
class TrainConn {

    public function __construct($from, $to, $time, $train_id) {
        $this->from = $from;
        $this->to = $to;
        $this->time = $time;
        $this->train_id = $train_id;
    }

    function AddTrainConn() {
        if($this->from == "poznan_glowny")
        {
            $place_list = ["poznan_glowny", "poznan_gorczyn", "poznan_junikowo", "paledzie", "dopiewo", "otusz", "buk"];
            $time_list = [NULL, 0, 3, 4, 6, 7, 11, 12, 15, 16, 20, 21, 25, NULL];
        }
        else if($this->from == "buk")
        {
            $place_list = ["buk", "otusz", "dopiewo", "paledzie", "poznan_junikowo", "poznan_gorczyn", "poznan_glowny"];
            $time_list = [NULL, 0, 3, 4, 8, 9, 12, 13, 17, 18, 21, 22, 25, NULL];
        }
        
        for($i = 0; $i < count($time_list); $i += 2)
        {
            $place = $place_list[$i / 2];
            if($time_list[$i] != NULL)
            {
                $arv_time_2 = date("H:i", strtotime($this->time . "+{$time_list[$i]} minutes"));
                $arv_time = "'{$arv_time_2}'";
            }
            else $arv_time = "NULL";
            if($time_list[$i + 1] != 0)
            {
                if($time_list[$i + 1] != NULL)
                {
                    $dep_time_2 = date("H:i", strtotime($this->time . "+{$time_list[$i + 1]} minutes"));
                    $dep_time = "'{$dep_time_2}'";
                }
                else $dep_time = "NULL";
            }
            else $dep_time = "'{$this->time}'";

            connect("INSERT INTO sch_{$place} VALUES('{$this->train_id}', '{$this->from}', '{$this->to}', {$dep_time}, {$arv_time}, '')");
        }

        echo "Dodano połączenie!";
    }

    function SearchTrainConn() {
        switch ($this->from)
        {
            case "poznan_glowny":
                $from = "Poznań Główny";
                $from_index = 1;
                break;
            case "poznan_gorczyn":
                $from = "Poznań Górczyn";
                $from_index = 2;
                break;
            case "poznan_junikowo":
                $from = "Poznań Junikowo";
                $from_index = 3;
                break;
            case "paledzie":
                $from = "Palędzie";
                $from_index = 4;
                break;
            case "dopiewo":
                $from = "Dopiewo";
                $from_index = 5;
                break;
            case "otusz":
                $from = "Otusz";
                $from_index = 6;
                break;
            case "buk":
                $from = "Buk";
                $from_index = 7;
                break;
        }
        switch ($this->to)
        {
            case "poznan_glowny":
                $to = "Poznań Główny";
                $to_index = 1;
                break;
            case "poznan_gorczyn":
                $to = "Poznań Górczyn";
                $to_index = 2;
                break;
            case "poznan_junikowo":
                $to = "Poznań Junikowo";
                $to_index = 3;
                break;
            case "paledzie":
                $to = "Palędzie";
                $to_index = 4;
                break;
            case "dopiewo":
                $to = "Dopiewo";
                $to_index = 5;
                break;
            case "otusz":
                $to = "Otusz";
                $to_index = 6;
                break;
            case "buk":
                $to = "Buk";
                $to_index = 7;
                break;
        }
        if($from_index == $to_index)
        {
            header("Location: http://localhost/BetterPKP/page/site.php?err=4");
            exit();
        }
        else if($from_index < $to_index) $to_where = "buk";
        else if($from_index > $to_index) $to_where = "poznan_glowny";
        $conn = connect("SELECT sch_{$this->from}.dep_time, sch_{$this->to}.arv_time, sch_{$this->from}.train_id
        FROM sch_{$this->from} LEFT JOIN sch_{$this->to} ON sch_{$this->from}.conn_id = sch_{$this->to}.conn_id
        WHERE sch_{$this->from}.dep_time > '{$this->time}' AND sch_{$this->from}.dep_time IS NOT NULL
        AND sch_{$this->to}.arv_time IS NOT NULL AND  sch_{$this->from}.to_where = '{$to_where}'
        ORDER BY sch_{$this->from}.dep_time LIMIT 3");
        @$rowCount = mysqli_num_rows($conn);
        if($rowCount != 0)
        {
            echo "<table>";
            echo "<tr><th>Z:<th>Do:</th><th>Odjazd:</th><th>Przyjazd:</th><th>Rodzaj pociągu:</th></tr>";
            while($row = mysqli_fetch_row($conn))
            {
                for($i = 0; $i < $rowCount; $i = $i + 3)
                {
                    echo "<tr><td>{$from}</td><td>{$to}</td>";
                    $row[$i] = substr($row[$i], 0, -3);
                    $row[$i + 1] = substr($row[$i + 1], 0, -3);
                    $row[$i + 2] = substr($row[$i + 2], 0, -5);
                    echo "<td>{$row[$i]}</td>";
                    echo "<td>{$row[$i + 1]}</td>";
                    echo "<td>{$row[$i + 2]}</td>";
                }
            }
            echo "</table>";
        }
        else
        {
            header("Location: http://localhost/BetterPKP/page/site.php?err=5");
            exit();
        }
    }

    function DeleteTrainConn() {
        $conn = connect("SELECT conn_id FROM sch_{$this->from} WHERE train_id = '{$this->train_id}'
        AND from_where = '{$this->from}' AND to_where = '{$this->to}' AND dep_time = '{$this->time}'");
        $rowCount = mysqli_num_rows($conn);
        if($rowCount != 0)
        {
            $row = mysqli_fetch_row($conn);
            $conn_id = $row[0];
            $place_list = ["poznan_glowny", "poznan_gorczyn", "poznan_junikowo", "paledzie", "dopiewo", "otusz", "buk"];
            for($i = 0; $i < count($place_list); $i++)
            {
                connect("DELETE FROM sch_{$place_list[$i]} WHERE conn_id = {$conn_id}");
            }
            echo "Usunięto połączenie";
        }
        else
        {
            header("Location: http://localhost/BetterPKP/page/site.php?err=7");
            exit();
        }
    }
}
?>