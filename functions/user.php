<?php
require_once("library.php");
class User {
    public function __construct($email, $pswd, $imie, $ulga) {
        $this->email = $email;
        $this->pswd = $pswd;
        $this->imie = $imie;
        $this->ulga = $ulga;
    }

    function CreateUser() {
        $pswd_h = password_hash($this->pswd, PASSWORD_BCRYPT);
        connect("INSERT INTO userdata(email, pswd, name, ulga)
        VALUES('{$this->email}', '{$pswd_h}', '{$this->imie}', '{$this->ulga}')");
    }

    function CheckUser() {
        $conn = connect("SELECT email, pswd FROM userdata WHERE email = '{$this->email}'");
        $rowCount = mysqli_num_rows($conn);
        if($rowCount != 0)
        {
            $row = mysqli_fetch_row($conn);
            if($row[0] == $this->email && password_verify($this->pswd, $row[1])) return true;
            else return false;
        }
        else return false;
    }

    function CheckName() {
        $conn = connect("SELECT name FROM userdata WHERE email = '{$this->email}'");
        $row = mysqli_fetch_row($conn);
        return $row[0];
    }

    function CheckPermission() {
        $conn = connect("SELECT permission FROM userdata WHERE email = '{$this->email}'");
        $row = mysqli_fetch_row($conn);
        return $row[0];
    }

    function AddPermission() {
        connect("UPDATE userdata SET permission = 'employee' WHERE name = '{$this->imie}'");
    }
}
?>