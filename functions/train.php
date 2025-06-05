<?php
require_once("library.php");
class Train {
    public function __construct($train_id, $seats_c, $max_speed, $carr_c) {
        $this->train_id = $train_id;
        $this->seats_c = $seats_c;
        $this->max_speed = $max_speed;
        $this->carr_c = $carr_c;
    }

    function AddTrain() {
        connect("INSERT INTO trains VALUES('{$this->train_id}', {$this->seats_c},
        {$this->max_speed}, {$this->carr_c})");
    }

    function CheckTrainsId() {
        $conn = connect("SELECT train_id FROM trains");
        return $conn;
    }

    function DeleteTrain() {
        $conn = connect("SELECT train_id FROM trains WHERE train_id = '{$this->train_id}'");
        $rowCount = mysqli_num_rows($conn);
        if($rowCount != 0)
        {
            connect("DELETE FROM trains WHERE train_id = '{$this->train_id}'");
            echo "Usunięto pociąg";
        }
        else
        {
            header("Location: http://localhost/BetterPKP/page/site.php?err=8");
            exit();
        }
    }
}
?>